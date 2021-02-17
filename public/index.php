<?php


require dirname(__DIR__) . DIRECTORY_SEPARATOR .'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


// pour charger le bon chemin 
define('PATH' , dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


// pour charger le bon chemin 
define('App' , dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR);


require App . 'controller' . DIRECTORY_SEPARATOR .'function'. DIRECTORY_SEPARATOR .'message.php';


require App . 'controller' . DIRECTORY_SEPARATOR .'function'. DIRECTORY_SEPARATOR .'requireViews'. DIRECTORY_SEPARATOR .'requireStockView.php';



// je declenche le proccessus  
ob_start();


// verification s' il ya quelque chose dans l'url 
!empty($_GET['url']) ? $url = $_GET['url'] : $url = 'dashboard' ;

if($url === 'dashboard'){
    require_once PATH . 'blog' . DIRECTORY_SEPARATOR . 'dashboard.php';
} elseif ($url === 'product/stock-product') {
    require_once PATH . 'blog' . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR.   'stock.php';
}  elseif ($url === 'product/vends-product') {
    require_once PATH . 'blog' . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR.   'vending.php';
} elseif ($url === 'product/stock-product/InfoStock') {
    require_once PATH . 'blog' . DIRECTORY_SEPARATOR .  DIRECTORY_SEPARATOR . 'product'  . DIRECTORY_SEPARATOR .  'info'  .  DIRECTORY_SEPARATOR  .'InfoStock.php';
} elseif ($url === 'product/stock-product/UpdateStock') {
    require_once PATH . 'blog' . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR.   'Update' . DIRECTORY_SEPARATOR . 'UpdateStock.php';
} else {
    require_once PATH . 'error' . DIRECTORY_SEPARATOR . '404.php';
}
$content = ob_get_clean();
require_once PATH . 'elements' . DIRECTORY_SEPARATOR . 'layout.php'; 















