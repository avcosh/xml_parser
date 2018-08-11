<?php
//Парсер товаров из goods.xml
require_once 'config.php';

$xml_text = file_get_contents('goods.xml');
$xml = simplexml_load_string($xml_text);

foreach ($xml->xpath('/yml_catalog/shop') as $element) {
   
	
	    $sql = "INSERT INTO shop (shop_name, company, shop_url) VALUES (:name, :company, :url)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $element->name, PDO::PARAM_STR);
		$result->bindParam(':company', $element->company, PDO::PARAM_STR);
		$result->bindParam(':url', $element->url, PDO::PARAM_STR);
        $result->execute();
		
    foreach ($element->xpath('categories/category') as $category) {
      
		$sql = "INSERT INTO category (category_id, parent_id, name) VALUES (:category_id, :parent_id, :name )";
		$result = $db->prepare($sql);
        $result->bindParam(':category_id', $category->attributes()->id, PDO::PARAM_INT);
		$result->bindParam(':parent_id', $category->attributes()->parentId, PDO::PARAM_INT);
		$result->bindParam(':name', $category, PDO::PARAM_STR);
        $result->execute();
		
    }
	
	foreach($element->xpath('offers/offer') as $item){
		
		
		$sql = "INSERT INTO offers (id, available, url, price, optprice, category_id, picture, name, articul, vendor, description, 
		         extprops_season, extprops_name, status_new, status_action, status_top) VALUES (:id, :available, :url, 
		         :price, :optprice, :category_id, :picture, :name, :articul, :vendor,
                 :description, :extprops_season, :extprops_name, :status_new, :status_action, :status_top)";
		$result = $db->prepare($sql);
		$result->bindParam(':id', $item->attributes()->id, PDO::PARAM_INT);
		$result->bindParam(':available', $item->attributes()->available, PDO::PARAM_STR);
		$result->bindParam(':url', $item->url, PDO::PARAM_STR);
		$result->bindParam(':price', $item->price, PDO::PARAM_INT);
		$result->bindParam(':optprice', $item->optprice, PDO::PARAM_INT);
		$result->bindParam(':category_id', $item->categoryId, PDO::PARAM_INT);
		$result->bindParam(':picture', $item->picture, PDO::PARAM_STR);
		$result->bindParam(':name', $item->name, PDO::PARAM_STR);
		$result->bindParam(':articul', $item->articul, PDO::PARAM_INT);
		$result->bindParam('vendor', $item->vendor, PDO::PARAM_STR);
		$result->bindParam(':description', $item->description, PDO::PARAM_STR);
		$result->bindParam(':extprops_season', $item->extprops->season, PDO::PARAM_STR);
		$result->bindParam(':extprops_name', $item->extprops->name, PDO::PARAM_STR);
		$result->bindParam(':status_new', $item->statusNew, PDO::PARAM_STR);
		$result->bindParam(':status_action', $item->statusAction, PDO::PARAM_STR);
		$result->bindParam(':status_top', $item->statusTop, PDO::PARAM_STR);
	   
		$result->execute();
		 
    }
		
}




