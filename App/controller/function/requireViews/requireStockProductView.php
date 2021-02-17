<?php

function requireStockView() : void
{
    require App . 'controller' . DIRECTORY_SEPARATOR . 'ControllerStockProduct' . DIRECTORY_SEPARATOR . 'addStockController.php';
    
}


function requireProductView() : void
{
    require App . 'controller' . DIRECTORY_SEPARATOR . 'ControllerStockProduct' . DIRECTORY_SEPARATOR . 'addProductController.php';
}