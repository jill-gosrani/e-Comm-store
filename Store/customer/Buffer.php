<?php

/// fetching and converting the products from db to JSON data form.
$db = mysqli_connect("localhost","root","","ecom_store");
$query='SELECT * FROM products;';
$result = mysqli_query($db,$query);
$values = array();

//product_id , product_title, product_img1 ,product_desc , product_price

//dynamically loading the above details of the product and storing in json file.
while($row = mysqli_fetch_assoc($result))
 {
 	$id=$row['product_id'];
 	$title=$row['product_title'];
 	$image=$row['product_img1'];
 	$price=$row['product_price'];
 	$values[] = array('id'=> $id,'title'=>$title,'image'=>$image,'price'=>$price);
 }
 $fp=fopen('data.json','w');
 fwrite($fp,json_encode($values));
 fclose($fp);


?>