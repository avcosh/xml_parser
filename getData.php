<?php
//Функция получения данных из БД
function getData($vendor = null)
{
    require 'config.php';
    
	$sql = ('SELECT s.shop_name, s.company, s.shop_url, o.available, o.url, o.price, o.optprice, 
	         o.category_id, o.picture, o.name, o.articul, o.vendor, o.description, o.extprops_season, 
             o.extprops_name, o.status_new, o.status_action, o.status_top FROM shop s, offers o');
	
	if($vendor != null){
		$sql .= (' WHERE o.vendor = :vendor');
	}
	$result = $db->prepare($sql);
	$result->bindParam(':vendor', $vendor, PDO::PARAM_STR);
	$result->execute();
	$offerList = [];
	$i = 0;
	while($row = $result->fetch()){
		$offerList[$i]['shop_name'] = $row['shop_name'];
		$offerList[$i]['company'] = $row['company'];
		$offerList[$i]['shop_url'] = $row['shop_url'];
		$offerList[$i]['available'] = $row['available'];
		$offerList[$i]['url'] = $row['url'];
		$offerList[$i]['price'] = $row['price'];
		$offerList[$i]['optprice'] = $row['optprice'];
		$offerList[$i]['category_id'] = getCategoryName($row['category_id']);
		$offerList[$i]['picture'] = $row['picture'];
		$offerList[$i]['name'] = $row['name'];
		$offerList[$i]['articul'] = $row['articul'];
		$offerList[$i]['vendor'] = $row['vendor'];
		$offerList[$i]['description'] = $row['description'];
		$offerList[$i]['extprops_season'] = $row['extprops_season'];
		$offerList[$i]['extprops_name'] = $row['extprops_name'];
		$offerList[$i]['status_new'] = $row['status_new'];
		$offerList[$i]['status_action'] = $row['status_action'];
		$offerList[$i]['status_top'] = $row['status_top'];
		$i++;
	}
	return $offerList;
}

//функция получения имени категории по ее id
function getCategoryName($id)
{
	
	require 'config.php';

	$sql = ("SELECT name FROM category WHERE category_id = :id");
	$result = $db->prepare($sql);
	$result->bindParam(':id', $id, PDO::PARAM_INT);
	$result->execute();
	return $result->fetch();  
}



