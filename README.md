# Model

## Tồng quan
Trong 1 component, Model đóng vai trò trung gian kết nỗi giữa Controller va` View

1. Khi 1 view được hiển thị, model sẽ đóng vai trò lấy về dữ liệu để view hiển thị
2. Khi 1 action được thực hiện (ví dụ lưu 1 item vào database), controller sẽ lấy dữ liệu từ request (do người dùng nhập vào), gọi 1 method trong model để sử lý dữ liệu đầu vào. Model method thực hiện sử lý dữ liệu, trả về kết quả. Dựa trên kết quả do model trả về, control sẽ hiển thị thông tin về kết quả đó cho người dùng.

## Quy ước đặt tên

Model class sẽ có tên là PrefixModelName (ví dụ CodeModelItems, CodeModelItem). Model classes được luu trong models folder (hoặc model)

## Các methods thường được sử dụng

1. Get table onject

```php
$row = $this->getTable();
$row->bind($data);
$row->store();

return $row->id;
```

2. Get database object

```php
$db = $this->getDbo();
```

Lưu ý trong một model class, nên sử dụng $this->getDbo() method để get database object thay vì sử dụng JFactory::getDbo();
