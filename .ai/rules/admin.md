---
paths:
  - 'app/Http/Controllers/Admin/**'
---

# Admin

## Use the allow-listed admin table query
Use AdminTable for searchable, sortable admin indexes. Each resource controller must explicitly allow-list searchable and sortable columns before pagination.

## Ürün görsellerini public disk üzerinden yönet
Ürün görsellerini public diskte urunler/ altında rastgele oluşturulan dosya adlarıyla sakla; veritabanına yalnızca göreli resim_yolu değerini yaz. Yeni görsel kaydedilemezse yeni dosyayı temizle; görsel değiştiğinde, kaldırıldığında veya ürün silindiğinde önceki dosyayı da sil. Silme işlemini urunler/ dışındaki yolları etkilemeyecek şekilde sınırla.
