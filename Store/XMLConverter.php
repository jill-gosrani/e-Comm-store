<?php

/// fetching and converting the products from db to JSON data form.
$db = mysqli_connect("localhost","root","","ecom_store");
$query='SELECT * FROM products;';
$xml = new XMLWriter();
$result = mysqli_query($db,$query);
$values = array();
$xml->openURI('data.xml');
$xml->startDocument();
$xml->setIndent(true);
$xml->startElement('products'); //creating parent tag for parent element.

while($row = mysqli_fetch_assoc($result)) {
	$xml->startElement('product'); //creating child element product.
	$xml->writeAttribute('id',$row['product_id']); //adding attribute with its corresponding values.
	$xml->writeAttribute('image',$row['product_img1']);
	$xml->writeAttribute('price',$row['product_price']);
	$xml->writeAttribute('title',$row['product_title']);
	$xml->writeRaw($row['product_title']);

	$xml->endElement(); //finally closing the the product tag.

}
$xml->endElement(); //ending the main parent tag.
header('Content-type:text/xml');
$xml->flush(); //final flush values.

?>