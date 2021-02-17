<?php
    requireStockView();
    
    /** Recuperation des informations saisit
     * On recupere toute les information sous forme de'un tableau 
     */

    /**
     * 
     */
    isset($_POST['save']) && !empty($_POST) ? AddControllerStock([
    'button' => $_POST['save'],
    'product' => $_POST['product'],
    'price' => (int)$_POST['price'],
    'num' => (int)$_POST['num'],
    'format' => $_POST['format'],
    'descrip' => $_POST['descrip']
    ]) : AddControllerStock();
    
    if(isset($_GET['delete']) && !empty( $_GET['delete'])){
        deleteProductStockController($_GET['delete']);
    }

    session_start();
    isset($_SESSION['message']) && !empty($_SESSION['message']) ? success($_SESSION['message']) : success() ; 
    unset($_SESSION['message']);
?> 



    

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix </th>
                        <th>Format</th>
                        <th>Nombre</th>
                        <th>Date </th>
                        <th>Action </th>
                       
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Produit</th>
                        <th>Prix </th>
                        <th>Format</th>
                        <th>Nombre</th>
                        <th>Date </th>
                        <th>Action </th>
                       
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    $query = connect()->query("SELECT * FROM stock ORDER BY created_at DESC ");
                    
                    while($data = $query->fetch()): ?>

                    <tr>
                        <td><?= $data['product'] ?> </td>
                        <td><?= $data['price'] . ' Fc' ?> </td>
                        <td><?= $data['formats'] ?> </td>
                        <td><?= $data['num'] ?> </td>
                        <td><?= $data['created_at'] ?> </td>
                        <td>
                            <div class="btn-group btn-sm" role="group">
                                <a href="/product/stock-product?delete=<?= $data['id']?>" class=" btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                <a href="/product/stock-product/InfoStock?info=<?= $data['id']?>" class=" btn btn-info btn-sm"><span class="fa fa-info"></span></a>
                                <a href="/product/stock-product/UpdateStock?update=<?= $data['id']?>" class="  btn btn-secondary btn-sm"><span class="fa fa-edit"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php  endwhile ?>
                </tbody>
                
                
            </table>
        </div>
    </div>
</div>


