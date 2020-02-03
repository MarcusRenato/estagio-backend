<?php
session_start();
require "autoload.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];

if (empty($id) || empty($nome) || empty($categoria) || empty($preco)) {
    $_SESSION['error'] = "Não pode haver campos vazios";
    header("Location: index.php");
    exit;
}

$produto = new Produto($id);
$produto->setNome($nome);
$produto->setIdCategoria($categoria);
$produto->setPreco($preco);

if ($produto->updateProdutos()) {
    $_SESSION['success'] = "Produto editado com sucesso";
    header("Location: index.php");
    exit;
}
