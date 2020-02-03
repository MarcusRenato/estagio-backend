<?php
require "pages/header.php";
$produtos = new Produto();

$categorias = $produtos->getCategorias();
?>
<h2 class="text-center mt-4">Cadastrar novo produto</h2>
<div class="row justify-content-center">
    <div class="col-8">
        <form action="add-produto.php" method="post" class="form-group">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                    <?php foreach($categorias as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['titulo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" class="form-control">
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>

    </div>
</div>

<?php require "pages/footer.php"; ?>