<?php


function requirePage() : void
{
    // database
    require App . 'database' . DIRECTORY_SEPARATOR . 'connect.php';
     connect();

    // page qui ajoute un produit dans le stock 
    require App . 'function' . DIRECTORY_SEPARATOR . 'message.php';

   

    // controller

    require App . 'controller' . DIRECTORY_SEPARATOR . 'ControllerStock' . DIRECTORY_SEPARATOR . 'addStockController.php';

}