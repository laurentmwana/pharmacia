<?php

/**
 * Database , connexion à la base de données 
 *
 * @return OBJET PDO
 */
function connect() 
{

    try {
        return $pdo =  new PDO('mysql:host=localhost;dbname=pharmacia', 'root' , '' , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (\Throwable $th) {
        echo "Probleme de base de données " . $th->getMessage();
    }


}


