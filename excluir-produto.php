<?php
session_start();
require "autoload.php";

$id = $_GET['id'];

if (empty($id)) {
    header("Location: index.php");
    exit;
}

$produto = new Produto($id);

if ($produto->destroyProduto()) {
    $_SESSION['success'] = "Produto excluído com sucesso";
    header("Location: index.php");
    exit;
}