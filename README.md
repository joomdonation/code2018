# View

## Tồng quan
View dùng để hiển thị dữ liệu, ví dụ hiển thị danh sách các items, item detail hoạc form để thêm 1 item mới. Joomla dựa vào dữ liệu của biến view để quyết đình hiển thị view nào

Ví dụ index.php?option=com_code&view=items sẽ hiển thị view items. index.php?option=com_code&view=item&id=1 sẽ hiển thị dữ liệu của view item (record với id = 1).....

## Quy ước đặt tên

View class sẽ có tên là PrefixViewName (ví dụ CodeViewItems, CodeViewItem). Code cho view class đước đặt trong file view.html.php trong view folder.

## Chuẩn bị dữ liệu cho view

Thông thường, 1 view sẽ hiển thị dữ liệu nào đó, ví dụ danh sách các items, item detail. Code để lấy về dữ liệu để hiển thị được đặt trong model tương ứng (mỗi view sẽ có một model tương ứng). Trong display method của view class, chúng ta call get method để lấy về dữ liệu, gán vào 1 thuộc tính của view.

```php
$this->items = $this->get('Data');
```

Lệnh ở trên tương ứng với
```php
$model = $this->getModel();
$this->item = $model->getData();
```

### Hiển thị dữ liệu
Code để hiển thị dữ liệu của 1 view được đặt trong file layout riêng. Trong file layout, ta có thể call $this->loadTemplate() method để load 1 sub-layout (trong trường hợp 1 layout lớn, nên chia thành nhiều sub-layouts để dễ quản lý / maintain code)

## Lưu ý
Cố gắng sử dụng model class method để lấy về dữ liệu để hiển thị. Trong 1 số trường hợp đơn giản, ta có thể query database directly trong view class để lấy về dữ liệu
