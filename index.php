<?php
require "pages/header.php";
$produtos = new Produto();
?>

<a href="form-add-produto.php" class="btn btn-success mt-4">Adicionar novo produto</a>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success mt-4"><?= $_SESSION['success'] ?></div>
<?php
    unset($_SESSION['success']);
    endif;
?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger mt-4"><?= $_SESSION['error'] ?></div>
<?php
    unset($_SESSION['error']);
    endif;
?>

<?php if (count($produtos->getAllProdutos()) > 0): ?>
<h1 class="text-center mt-4">Produtos</h1>
<div class="table-responsive mt-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($produtos->getAllProdutos() as $item): ?>
                <tr>
                    <td><?= $item['nome'] ?></td>
                    <td><?= $item['categoria'] ?></td>
                    <td>R$ <?= number_format($item['preco'], 2) ?></td>
                    <td>
                        <a href="view-produto.php?id=<?= $item['id'] ?>" class="btn btn-secondary">
                            Visualizar
                        </a>
                        <a href="form-edit-produto.php?id=<?= $item['id'] ?>" class="btn btn-primary">
                            Editar
                        </a>

                        <a onclick="return confirm('Tem certeza que seja excluir o produto <?= $item['nome'] ?>?')" href="excluir-produto.php?id=<?= $item['id'] ?>" class="btn btn-danger">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php else: ?>
    <hr>
    <h2 class="mt-4 text-center">Não há produtos cadastrados</h2>
<?php endif;?>
<?php require "pages/footer.php";?>