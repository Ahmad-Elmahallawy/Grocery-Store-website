<?php
$dom=new DOMDocument();
$dom->load("./Products/products.xml");

$root=$dom->documentElement; 

$name = $_POST['name'];
$value = $_POST['value'];

$markers=$root->getElementsByTagName('info');

// Loop through childNodes
foreach ($markers as $marker) {
    $productName=$marker->getElementsByTagName('name')->item(0)->textContent;

    if($name == $productName){
        if ($value == '0') 
            $marker->parentNode->removeChild($marker);
        else {
            $quantity=$marker->getElementsByTagName('quantity')->item(0);
            $quantity->nodeValue = $value;
        }
    }

}

$fp = fopen("./Products/products.xml", 'w');
fwrite($fp, $dom->saveXML());
fclose($fp);
echo $dom->saveXML();
?>