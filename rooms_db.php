<?php

function get_product_attribute($id, $attr) {
$products = get_products();
$result = $products[$id][$attr] ?? null;
return $result;
}
function get_product_Room_number($id) {
return get_product_attribute($id, 'Room_number');
}
function get_product_Price($id) {
return get_product_attribute($id, 'Price');
}
function get_img_url($id) {
return get_product_attribute($id, 'img_url');
}

