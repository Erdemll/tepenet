---
paths:
  - 'resources/views/**/*.blade.php'
  - resources/views/iletisim.blade.php
  - resources/views/is_ilanlari.blade.php
---

# Views

## Use named routes and public asset helpers
Link existing public pages with Laravel named routes instead of legacy .html paths. Resolve files under public with asset() so nested page URLs do not break CSS, logo, or image paths. Keep placeholder form actions unchanged until a real POST endpoint is implemented.

## Keep the public navbar in one partial
The shared top bar, desktop navigation, and mobile offcanvas live in partials/navbar.blade.php. Public pages include it with @include('partials.navbar'); update navigation markup and links only in the partial.

## Keep the public footer in one partial
The shared branch addresses, quick links, corporate links, and product links live in partials/footer.blade.php. Public pages include it with @include('partials.footer'); update footer content only in the partial.

## Contact location field contract
Keep the contact form's city and district fields as `id="iletisim-il"` and `id="iletisim-ilce"`. StoreContactRequest accepts a free-text district for any configured city, so do not reintroduce a partial city-to-district JavaScript list.

## Mobile job filter dialog
Below 992px, the job filter behaves as a modal dialog: preserve the backdrop, body scroll lock, Escape handling, focus trap, and focus restoration. Desktop retains the collapsible filter panel.
