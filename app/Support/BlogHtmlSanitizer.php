<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMNodeList;

final class BlogHtmlSanitizer
{
    /** @var array<string, list<string>> */
    private const ALLOWED_ATTRIBUTES = [
        'a' => ['href', 'target', 'rel'],
        'li' => ['data-list'],
    ];

    /** @var list<string> */
    private const ALLOWED_TAGS = [
        'a', 'blockquote', 'br', 'em', 'h2', 'h3', 'li', 'ol', 'p', 's', 'strong', 'u', 'ul',
    ];

    /** @var list<string> */
    private const REMOVED_TAGS = [
        'applet', 'embed', 'form', 'iframe', 'input', 'math', 'object', 'script', 'style', 'svg', 'textarea', 'video',
    ];

    public function sanitize(string $html): string
    {
        if (trim($html) === '') {
            return '';
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $document->formatOutput = false;

        if (! @$document->loadHTML(
            '<?xml encoding="UTF-8"><div id="blog-content-root">'.$html.'</div>',
            LIBXML_NONET | LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        )) {
            return '';
        }

        $root = $document->getElementById('blog-content-root');

        if (! $root instanceof DOMElement) {
            return '';
        }

        $this->sanitizeChildren($root->childNodes);

        $output = '';

        foreach ($root->childNodes as $child) {
            $output .= $document->saveHTML($child) ?: '';
        }

        return trim($output);
    }

    private function sanitizeChildren(DOMNodeList $children): void
    {
        for ($index = $children->length - 1; $index >= 0; $index--) {
            $node = $children->item($index);

            if (! $node instanceof DOMElement) {
                continue;
            }

            $tagName = strtolower($node->tagName);

            if (in_array($tagName, self::REMOVED_TAGS, true)) {
                $node->parentNode?->removeChild($node);

                continue;
            }

            if (! in_array($tagName, self::ALLOWED_TAGS, true)) {
                $this->sanitizeChildren($node->childNodes);
                $this->unwrap($node);

                continue;
            }

            $this->sanitizeAttributes($node, $tagName);
            $this->sanitizeChildren($node->childNodes);
        }
    }

    private function sanitizeAttributes(DOMElement $element, string $tagName): void
    {
        $allowedAttributes = self::ALLOWED_ATTRIBUTES[$tagName] ?? [];

        for ($index = $element->attributes->length - 1; $index >= 0; $index--) {
            $attribute = $element->attributes->item($index);

            if ($attribute === null || ! in_array(strtolower($attribute->name), $allowedAttributes, true)) {
                if ($attribute !== null) {
                    $element->removeAttributeNode($attribute);
                }
            }
        }

        if ($tagName !== 'a' || ! $element->hasAttribute('href')) {
            if ($tagName === 'li' && ! in_array($element->getAttribute('data-list'), ['bullet', 'ordered'], true)) {
                $element->removeAttribute('data-list');
            }

            return;
        }

        $href = trim($element->getAttribute('href'));
        $scheme = strtolower((string) parse_url($href, PHP_URL_SCHEME));

        if ($scheme !== '' && ! in_array($scheme, ['http', 'https', 'mailto'], true)) {
            $element->removeAttribute('href');
            $element->removeAttribute('target');
            $element->removeAttribute('rel');

            return;
        }

        if ($element->getAttribute('target') === '_blank') {
            $element->setAttribute('rel', 'noopener noreferrer');
        } else {
            $element->removeAttribute('target');
            $element->removeAttribute('rel');
        }
    }

    private function unwrap(DOMElement $element): void
    {
        $parent = $element->parentNode;

        if (! $parent instanceof DOMNode) {
            return;
        }

        while ($element->firstChild !== null) {
            $parent->insertBefore($element->firstChild, $element);
        }

        $parent->removeChild($element);
    }
}
