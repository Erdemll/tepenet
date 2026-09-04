---
paths:
  - 'resources/views/**/*.blade.php'
---

# Views

## Use named routes and public asset helpers
Link existing public pages with Laravel named routes instead of legacy .html paths. Resolve files under public with asset() so nested page URLs do not break CSS, logo, or image paths. Keep placeholder form actions unchanged until a real POST endpoint is implemented.

## Keep the public navbar in one partial
The shared top bar, desktop navigation, and mobile offcanvas live in partials/navbar.blade.php. Public pages include it with @include('partials.navbar'); update navigation markup and links only in the partial.

## Keep the public footer in one partial
The shared branch addresses, quick links, corporate links, and product links live in partials/footer.blade.php. Public pages include it with @include('partials.footer'); update footer content only in the partial.
