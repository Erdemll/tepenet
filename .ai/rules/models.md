---
paths:
  - app/Models/UrunKategori.php
---

# Models

## Scope nested product binding through urunler
Public product detail routes use {urun} with scopeBindings(). Laravel pluralizes that child parameter as uruns, so UrunKategori must keep its resolveChildRouteBinding override mapping urun to the Turkish urunler relationship. This preserves category ownership checks and cross-category 404 responses.
