<?php
$xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");
//fetching XML values.
foreach($xml->children() as $products) {
	$id=$products['id'];
 	$title=$products['title'];
 	$image=$products['image'];
 	$price=$products['price'];
 	$xmlValues[] = array('id'=> $id,'title'=>$title,'image'=>$image,'price'=>$price);
}
print_r($xmlValues);
?>