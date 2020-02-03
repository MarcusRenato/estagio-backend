<?php
require "pages/header.php";
$id = $_GET['id'];

if (empty($id)) {
    header("Location: index.php");
    exit;
}

$produto = new Produto($id);

$info = $produto->getProduto();

if (count($info) > 0):
?>

<div class="card mt-5">
    <div class="card-title text-center pt-2">
        <h1><?= $info['nome'] ?></h1>
        <hr>
    </div>

    <div class="card-body">
        <h3>Categoria: <?= $info['categoria'] ?></h3>
        <h3>Preço: R$ <?= number_format($info['preco'], 2) ?></h3>
    </div>
</div>
<?php
else:
?>
    <h1 class="mt-5 text-center">Produto inexistente</h1>
<?php
endif;
?>
    <a href="index.php" class="btn btn-primary mt-4">Voltar à página inicial</a>
<?php
require "pages/footer.php";
?>