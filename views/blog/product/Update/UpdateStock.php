<?php
requireStockView();

 isset($_POST['update']) && !empty($_POST) ? UpdateStockController([
    'button' => $_POST['update'],
    'product' => $_POST['product'],
    'price' => (int)$_POST['price'],
    'num' => (int)$_POST['num'],
    'format' => $_POST['format'],
    'descrip' => $_POST['descrip']
    ]) : UpdateStockController();

    isset($_GET['update']) && !empty($_GET['update']) ? $param = ParamStockController($_GET['update']): ParamStockController(); 

    isset($_POST) && !empty($_POST) ? UpdateStockController($_POST , $param) : UpdateStockController();

?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="#" method="post">
            <div class="form-row">
            <input  type="hidden" name="id" value="<?=  $param['id'] ?>">
                <div class="form-group col-md-6">
                    <label for=""> Nom du produit </label>
                    <input id="product" class="form-control " type="text" name="product" placeholder="Le nom du produit " value="<?=  $param['product'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Prix </label>
                    <input id="price" class="form-control" type="number" name="price" placeholder="Prix d'achat " value="<?=  $param['price'] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Nombre des produits </label>
                    <input id="" class="form-control" type="number" name="num" placeholder="Nombre de produit à  stocké" value="<?=  $param['num'] ?>">
                </div>

                <div class="form-group col-md-7">
                    <label for="">Format du produit </label>
                    <select  class="form-control" name="format">
                        <option value="<?=  $param['formats'] ?>"> Format du produit </option>
                        <option value="Petit(e)">Petit(e)</option>
                        <option value="Grand(e)">Grand(e)</option>
                        <option value="Litre">Litre</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description du produit </label>
                <textarea id="description" class="form-control" name="descrip" rows="3" placeholder="Description du produit " ><?=  $param['descrip'] ?></textarea>
            </div>

            <button type="submit" class="shadow btn btn-success" name="update"><i class="fa fa-edit"></i> Modifier </button>
        </form>
    </div>
    <div class="col-md-2"></div>   
</div>

