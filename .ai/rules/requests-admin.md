---
paths:
  - 'app/Support/BlogHtmlSanitizer.php,app/Http/Requests/Admin/SaveBlogRequest.php'
---

# Requests Admin

## Sanitize admin blog HTML before persistence
Blog HTML is normalized in SaveBlogRequest::prepareForValidation and sanitized by BlogHtmlSanitizer. Keep the allow-list narrow and remove scripts, embeds, event attributes, and unsafe URL schemes before saving.
