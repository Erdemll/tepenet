---
paths:
  - resources/views/admin/bloglar/_form.blade.php
---

# Bloglar

## Preserve contenteditable selections for toolbar commands
The HTML editor mirrors its contenteditable value to the hidden icerik textarea. Toolbar mousedown must not steal focus, and the saved Range must be restored before document.execCommand so selected text updates visibly.
