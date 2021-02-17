<?php

// page require App
requireStockView();

// Si l'index info n'existe pas ou s'il est vide 
isset($_GET['info']) && !empty($_GET['info']) ? $id = $_GET['info'] : $id = '';

?>


<h2 class="text-info text-center">Information du Produit  </h2>
<div class="container   m-5 bg-light shadow">
    <div class="row p-4">
        <div class="col-md-8">
            <h5 class="text-muted">Nom du produit :  <b> <?= infoStockController($id)['product'] ?> </b></h5>

            <hr>
            <h5 class="text-muted">Prix du produit :  <b> <?= infoStockController($id)['price'] ?></b></h5>

            <hr>
            <h5 class="text-muted">Format  du produit :  <b>  <?= infoStockController($id)['formats'] ?></b></h5>

            <hr>
            <h5 class="text-muted">Date de creation  :  <b>  <?= infoStockController($id)['created_at'] ?> </b></h5>

            <hr>
            <h5 class="text-muted">Description du produit :  <b>  <?= infoStockController($id)['descrip'] ?> </b></h5>
           
        </div>

        <div class="col-md-3">
            <a href="/product/stock-product?delete=<?= infoStockController($id)['id']?>"class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Supprimer</a>
            <a href="/product/stock-product/UpdateStock?update=<?= infoStockController($id)['id']?>"class="btn btn-secondary btn-sm"> <i class="fa fa-edit"></i> Modifier </a>
        </div>

        <div class="col-md-1"></div>
    </div>
</div>

