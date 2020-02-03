<?php
require "pages/header.php";

$id = $_GET['id'];

if (empty($id)) {
    header("Location: index.php");
    exit;
}

$produtos = new Produto($id);

$categorias = $produtos->getCategorias();
$produto = $produtos->getProduto();
?>

<h2 class="text-center mt-4">Editar produto</h2>
<div class="row justify-content-center">
    <div class="col-8">
        <form action="edit-produto.php" method="post" class="form-group">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $produto['nome'] ?>">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                    <?php foreach($categorias as $item): ?>
                        <option value="<?= $item['id'] ?>" <?= ($item['id'] == $produto['id_categoria']) ? 'selected="selected"' : '' ?>><?= $item['titulo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" class="form-control" value="<?= $produto['preco'] ?>">
            </div>

            <input type="submit" value="Atualizar" class="btn btn-primary">
        </form>

    </div>
</div>

<?php require "pages/footer.php"; ?>