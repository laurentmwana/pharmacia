<?php

    /**
     * Undocumented function
     *
     * @param [type] $product
     * @param [type] $price
     * @param [type] $format
     * @param [type] $num
     * @param [type] $descrip
     * @param [type] $submit
     * @return void
     */
    function AddModelStock($product , $price , $format , $num , $descrip, $submit) 
    {
        if(isset($submit)){
            $add = connect()->prepare(" INSERT INTO stock SET  product = :product , price = :price , formats = :formats , num = :num , descrip = :descrip , created_at = NOW()");


            $add->execute([
                ':product' =>  $product,
                ':price' =>  $price,
                ':formats' => $format,
                ':num' => $num,
                ':descrip' => $descrip,
        
            ]);
        
            if($add == true){
                return $success['addstock'] = " Vous avez ajouter un produit ";
            }
            
        
        }
        
    }


    /**
     * J'ai verifie si le produit qui vient d'etre insere est != de celle qui se trouve dans on stock 
     *
     * @param [type] $product
     * @param [type] $format
     * @return void
     */
    function AddModelStockExist( $product , $format)
    {
        $danger = [];
        $req = connect()->prepare("SELECT  * FROM stock WHERE product = ? AND formats = ? ");
        $req->execute([$product , $format]);

        $product = $req-> fetch();

        if($product == true){
            return $danger['product'] = "Ce produit existe déjà " ;
           
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $info
     * @return array
     */
    function infoModelStock( $info = null) : array
    {
        if((isset($info) && !empty($info))){
            $id = (int)trim($info);
            
            $req = connect()->prepare("SELECT * FROM stock WHERE id = :id");

            $req->execute([':id' => $id]);

             $result = $req->fetch(); 

            if($result == true){
                return $result;
            } else {
                return false;
            }
        } 

        




    }

    

    /**
     *  supprime un produit dans le stock 
     *
     * @param string $id
     * @return void
     */
    function deleteProductStockModel(string $id = null )
    {   
        $success = null ;
        
        isset($id) && !empty($id) ?? $id;

        $prepare = connect()->prepare("SELECT id FROM stock WHERE id = ?");
        $prepare->execute([$id]);

        $index = $prepare->fetch();
        
        if($index){    
            $delete = connect()->prepare("DELETE FROM stock WHERE id = ?");
            $delete->execute([$index['id']]);  

            if($delete){
               return  $success = ['Votre produit a été supprimer avec succes '];
            }
            
        }

        
    }

    /**
     * Recupere le bon produit a partir de l'id
     *
     * @param string $id
     * @return void
     */
    function ParamUpdateStockModel(string $id = null) 
    {
        $data = [];
        isset($id) && !empty($id) ?? $id ;

        $prepare = connect()->prepare("SELECT * FROM stock WHERE id = ?");
        $prepare->execute([$id]);


       $fetch = $prepare->fetch();

        if($fetch){
            return $fetch ;
        }

    }


    /**
     * Fait la requete de la modification des produit qui sont dans le stock 
     *
     * @param string $product
     * @param string $price
     * @param string $format
     * @param string $num
     * @param string $descrip
     * @param array $param
     * @param string $id
     * @return void
     */
    function UpdateStockModel( $submit ,  $product , $price ,  $format ,  $num , $descrip , $id = null) 
    {
        if(isset($submit)) {
           $prepare = connect()->prepare("UPDATE stock SET 
            product = :product ,
            price = :price ,
            num = :num,
            formats = :format,
            descrip = :descrip,
            created_at = NOW()
           WHERE id = :id");

           $prepare->execute([
               ':product' => $product,
               ':price' => $price,
               ':num' => $num,
               ':format' => $format,
               ':descrip' => $descrip,
               ':id' => $id
           ]);


           if($prepare == true){
               return [
                   "Votre produit a été mis a jour "
               ];
           }
        }
        
    }