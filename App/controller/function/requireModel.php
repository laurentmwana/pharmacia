<?php

require_once App . 'database' . DIRECTORY_SEPARATOR . 'connect.php';
/**
 * chargement {model} de stock 
 *
 * @return void
 */
function requireModelStock() 
{
     
 require_once App . 'Model' . DIRECTORY_SEPARATOR . 'ModelStockProduct' . DIRECTORY_SEPARATOR . 'AddModelStock.php';

    
}


/**
 * chargement {model} product vending 
 *
 * @return void
 */
function requireProduct()
{
        
 require_once App . 'Model' . DIRECTORY_SEPARATOR . 'ModelStockProduct' . DIRECTORY_SEPARATOR . 'AddModelProduct.php';

}