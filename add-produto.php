<?php
session_start();
require "autoload.php";

$produto = new Produto();

$nome = $_POST['nome'];
$idCategoria = $_POST['categoria'];
$preco = $_POST['preco'];

if (empty($nome) || empty($idCategoria) || empty($preco)) {
    $_SESSION['error'] = "Não pode haver campos vazios";
    header("Location: index.php");
    exit;
}

$produto->setNome($nome);
$produto->setIdCategoria($idCategoria);
$produto->setPreco($preco);

if ($produto->addProduto()) {
    $_SESSION['success'] = "Produto adicionado com sucesso";
    header("Location: index.php");
    exit;
}