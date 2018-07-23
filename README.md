# Controller

## Tồng quan

Controller là trung tâm trong hoạt động của một component. Thông thường, 1 component sẽ có nhiều controllers:

1. Base controller nằm ở root folder của component. Ví dụ CodeController class.
2. Sub-controllers nằm trong thư mục controllers. Ví dụ Category controller để quản lý categories, Product controller để quản lý product (mỗi đối tượng mà component càn quản lý sẽ có 1 controller riêng)

Joomla thực hiện 1 method của 1 trong các controller của component dựa trên value của biến **task** từ dữ liệu đầu vào (request):
1. Khi request có dạng index.php?option=com_code&view=categories, Joomla sẽ thực hiện **display** method của base controller (hiển thị 1 view dựa vào giá trị của biến view).
2. Khi request có dạng **index.php?option=com_code&task=do_something**, method **do_something** của controller class sẽ được thực hiện (ví dụ sử lý login, download 1 file...). Nếu controller class **không có method do_something**, **display** method sẽ được thực hiện.
3. Khi request có dạng **index.php?option=com_code&task=item.do_another_thing** (chú ý dấu . trong biến task), Joomla sẽ thục hiện **do_another_thing** method của item **sub-controller**.

## Quy ước đặt tên

1. Base controller class sẽ có dạng **PrefixController** (Prefix là tên component). Ví dụ CodeController
2. Sub-controller class sẽ có dạng PrefixControllerSubcontroler. Ví dụ CodeControllerCategory, CodeControllerProduct. Chú ý sử dụng cố ít trong tiếng anh khi đặt tên cho sub-controller (ví dụ CodeControlerItem thay vì CodeControllerItems, CodeControllerCategory thay vì CodeControllerCategories)

## Lấy dữ liệu từ request

Thông thường, trong code của 1 method trong controller, chúng ta cần lấy dữ liệu từ request để sử lý. Toàn bộ dữ liều đầu vào có thể được lấy từ application input:

```php
$input = JFactory::getApplication()->input;
```

Sau đó, chúng ta có thể call methods của $input object để lấy về dữ liều cần thiết. Mặc đình, dữ liều từ input bao gồm cả POST và GET, dể lấy dữ liệu từ GET, sử dụng **$input->get**, đễ lấy dữ liệu từ POST, sử dụng **$input->post**

Sample code:

```php
$input = JFactory::getApplication()->input;

$option      = $input->getCmd('option');
$task        = $input->getCmd('task');
$a           = $input->getInt('a');
$b           = $input->getFloat('b');
$title       = $input->getString('title');
$description = $input->getHtml('description');
$data        = $input->getArray(array(), null, 'raw');

// To get data from GET, use similar code, just change $input to $input->get
$a = $input->get->getInt('a', 0);
$b = $input->get->getFloat('b');

// To get data from POST, use similar code, just change $input to $input->post
$description = $input->post->getHtml('description');
```
## Các method hay sử dụng

1. Lấy dữ liệu đầu vào

```php
$input = JFactory::getApplication()->input;
```

2. Tạo model object sử dùng **getModel** method. Nếu model class không tồn tại, hệ thống sẽ trả về null

```php
$model = $this->getModel();
```
Ở lệnh phía trên, hệ thống sẽ tạo default model class. Name của model phụ thuộc vào controller class hiện tại. Ví dụ nếu controller class hiện tại là Item, hệ thống sẽ tạo Item model class (**CodeModelItem**), nếu controller class hiện tại là Category, hệ thống sẽ tạo **CodeModelCategory** class...

```php
$model = $this->getModel('Item');
```
Trong trường hợp này, hệ thống sẽ trả về Item model (**CodeModelItem**)

```php
$model = $this->getModel('Item', 'CodeModel', ['ignore_request' => true]);
```
Mặc đinh, khi một model object được tạo, Joomla sẽ call **populateState** method của model để thiết lập giá trị cho model states. Nếu chúng ta muốn bỏ qua việc thực hiện hàm đó, sử dụng lệnh phía trên (chú ý 'ignore_request' => true flag)

3. Set redirect sử dụng **setRedirect** Method

Method này thường được sử dụng khi chúng ta muốn redirect users đến 1 trang nào đó sau khi thực hiên 1 action. Ví dụ, sau khi lưu dữ liệu cho 1 item vào database, redirect users đến view items (hiển thị danh sách các items)

1. Redirect và hiển thị success message

```php
$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saved'));
```

2. Redirect và hiển thị warning message

```php
$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saving error'), 'warning');
```

3. Redirect và hiển thị error message
```php
$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saving error'), 'error');
```

4. Set message trước khi redirect sử dụng **setMessage** method

Thông thường method này được sử dụng cùng với setRedirect method. Ví dụ

```php
$result = true;

if ($result)
{
	$this->setMessage(JText::_('Item save success'));
}
else
{
	$this->setMessage(JText::_('Error saving item'));
}

$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false));
```

## Lưu ý
- Tránh viết code thực hiện toàn bộ logic của 1 task trong controller method. Cách code tốt nhất là controller lấy sữ liệu đầu vào, create 1 model object, gọi một hàm của model, truyền dữ liệu vào cho hàm đó. Toàn bộ logic của action nên được thực hiện trong hàm của model
- Nắm vững logic method nào của controller (hoặc sub-controller) sẽ được thực hiện dựa trên dữ liệu của biến task

## Bài tập
- Thêm 1 controller mới training
- Them add method để hiển thị tổng của 2 sớ truyền vào từ URL (ví dụ http://localhost/joomla/administrator/index.php?option=com_code&task=training.add&a=100&b=40).
- Them add_use_model method để hiển thị tổng của 2 sớ truyền vào từ URL (ví dụ http://localhost/joomla/administrator/index.php?option=com_code&task=training.add_use_model&a=100&b=40). Trong trường hợp này, cần tạo model class, method....
