---
paths:
  - app/Http/Requests/StoreDiscoveryRequest.php
  - app/Http/Requests/StoreContactRequest.php
---

# Requests

## Derive corporate discovery classification server-side
When source_page is kurumsal-cozumler, require firma_adi and kurum_turu, derive urun_grubu=diger and isyeri_talebi=true on the server, and require branch count. Do not trust hidden client fields for this classification.

## Normalize contact marketing preferences server-side
Treat unchecked contact-form checkboxes as false. Exclude phone, email, and SMS preferences unless kampanya_izni is true, and never trust preference values submitted while the main consent is off.
