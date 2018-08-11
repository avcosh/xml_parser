<?php
require_once 'getData.php';
$vendor = null;
if(isset($_GET['submit'])){
    $vendor = $_GET['vendor'];
}
    $list = getData($vendor);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
    <title>Table</title>
	</head>
<body>
        <h1>Содержимое базы товаров</h1>	
		<table>
		<tr><th>Название магазина</th><th>Компания</th><th>Адрес магазина</th><th>Наличие</th><th>Адрес товара</th><th>Цена</th><th>Оптовая цена</th>
		<th>Категория</th><th>Изображение</th><th>Название</th><th>Артикул</th><th>Производитель</th><th>Описание</th><th>Доп1</th><th>Доп2</th>
		<th>Новый</th><th>Акция</th><th>Топ</th>

		<?php foreach ($list as $item):?>
		  
		  <tr>
		  <td><?= $item['shop_name']?></td>
		  <td><?= $item['company']?></td>
		  <td><?= $item['shop_url']?></td> 
		  <td><?= $item['available']?></td>
		  <td><?= $item['url']?></td>
		  <td><?= $item['price']?></td>
		  <td><?= $item['optprice']?></td>
		  <td><?= $item['category_id']['name']?></td>
		  <td><?= $item['picture']?></td>
		  <td><?= $item['name']?></td>
		  <td><?= $item['articul']?></td>
		  <td><?= $item['vendor']?></td>
		  <td><?= $item['description']?></td>
		  <td><?= $item['extprops_season']?></td>
		  <td><?= $item['extprops_name']?></td>
		  <td><?= $item['status_new']?></td>
		  <td><?= $item['status_action']?></td>
		  <td><?= $item['status_top']?></td>
		  </tr>
		  
		<?php endforeach ?>
		</tr>
		</table>
		<h3>Фильтрация товаров по полю производитель</h3>
		<p>
		  <form action = "" method = "get">
		    <select name="vendor">
			  <option value="">Все:</option>
			  <option value="APPLE">APPLE:</option>
			  <option value="Xiaomi">Xiaomi:</option>
			  <option value="Samsung">Samsung:</option>
			  <option value="LG">LG:</option>
			</select>
			<input type = "submit" name = "submit" value = "Отфильтровать">
		  </form>
		</p>
</body>
</html>



