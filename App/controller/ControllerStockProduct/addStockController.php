<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'requireModel.php';

requireModelStock();

/**
 * Undocumented function
 *
 * @param array $stock
 * @return void
 */
function AddControllerStock(array $stock = null) 
{
    
    if(isset($stock['button'])){ 

        $success = [];
        $danger = [];
        if(empty(trim($stock['product'])) ){

            $danger['product'] = 'Le  champs produit est vide';

        } else {
           $danger = AddModelStockExist($stock['product'] , $stock['format']);

        }

        if(empty(trim($stock['price']))){
            $danger['price'] = 'Le  champs prix est vide';
        }

        if(empty(trim($stock['format']))){
            $danger['format'] = 'Le champs format  est vide';
        }

        if(empty(trim($stock['num']))){
            $danger['num'] = 'Le champs nombre de produit   est vide';
        }


        if(empty(trim($stock['descrip']))){
            $danger['descrip'] = 'Le champs  Description du produit est vide ';
        }


        elseif (empty($danger) ) {
            $success = AddModelStock(
                $stock['product'] , 
                $stock['price'], 
                $stock['format'],
                $stock['num'],
                $stock['descrip'],
                $stock['button']
            );
        }
        
        !empty($danger) ?  danger($danger) : danger();

        !empty($success)  ?  success($success) : success();
    }

}

/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
function infoStockController($data = null)
{
    return infoModelStock($data);
}

/**
 * recuperation de la fonction qui supprime le product dans le stock  , 
 * si ça passe on affiche un message de success sinon on affiche rien 
 *
 * @param string $data
 * @return void
 */
function deleteProductStockController(string  $data = null ) : void
{
    $success = deleteProductStockModel($data);
    
    if(isset($success) && !empty($success)){
        success($success);
    } else {
        success();
    }
}

/**
 * verification de l'id pour faire la requete de modification 
 *
 * @param [type] $id
 * @return void
 */
function ParamStockController( $id = null) 
{
    return ParamUpdateStockModel($id);
}

/**
 * Modification du produit dans le stock 
 *
 * @param array $update
 * @param array $param
 * @return void
 */
function UpdateStockController(array $update = null , array $param = null)
{
    if(isset($update['update'])){ 

        $success = [];
        $danger = [];
        if(empty(trim($update['product'])) ){

            $danger['product'] = 'Le  champs produit est vide';

        } 

        if(empty(trim($update['price']))){
            $danger['price'] = 'Le  champs prix est vide';
        }

        if(empty(trim($update['format']))){
            $danger['format'] = 'Le champs format  est vide';
        }

        if(empty(trim($update['num']))){
            $danger['num'] = 'Le champs nombre de produit   est vide';
        }


        if(empty(trim($update['descrip']))){
            $danger['descrip'] = 'Le champs  Description du produit est vide ';
        }


        elseif (empty($danger) && is_array($param)) {
            $success = UpdateStockModel(
                $update['update'],
                $update['product'] , 
                $update['price'], 
                $update['format'],
                $update['num'],
                $update['descrip'],
                $update['id']
            );

            if($success){
                session_start();
                $_SESSION['message'] = $success;
                header("Location: /product/stock-product");

            }

           
            
        }
        
        !empty($danger) ?  danger($danger) : danger();

        !empty($success)  ?  success($success) : success();
    }

}





