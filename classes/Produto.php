<?php

class Produto extends Connection
{
    private $id;
    private $idCategoria;
    private $nome;
    private $preco;

    public function __construct($id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function setIdCategoria($cat)
    {
        $this->idCategoria = addslashes($cat);
    }

    public function getIdCatoria()
    {
        return $this->idCategoria;
    }

    public function setNome($n)
    {
        $this->nome = addslashes($n);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setPreco($p)
    {
        $this->preco = floatval(addslashes($p));
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getCategorias()
    {
        $dados = array();

        $sql = $this->db->query("SELECT * FROM categorias");

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $dados;
    }

    public function addProduto()
    {
        $sql = $this->db->prepare(" INSERT INTO
                                        produtos
                                    SET
                                        nome = ?,
                                        id_categoria = ?,
                                        preco = ?");
        return $sql->execute(array(
            $this->nome, $this->idCategoria, $this->preco
        ));
    }

    public function getAllProdutos()
    {
        $dados = array();

        $sql = $this->db->query("   SELECT
                                        p.*, c.titulo as categoria
                                    FROM
                                        produtos p, categorias c
                                    WHERE
                                        p.id_categoria = c.id
                                    ORDER BY p.id");

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $dados;
    }

    public function getProduto()
    {
        $dado = array();
        $sql = $this->db->prepare(" SELECT
                                        p.*, c.titulo as categoria 
                                    FROM
                                        produtos p, categorias c
                                    WHERE
                                        p.id = ? AND
                                        p.id_categoria = c.id");
        $sql->execute(array($this->id));

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return $dado;
    }

    public function updateProdutos()
    {
        $sql = $this->db->prepare(" UPDATE
                                        produtos
                                    SET
                                        nome = ?, id_categoria = ?, preco = ?
                                    WHERE
                                        id = ?");
        return $sql->execute(array(
            $this->nome, $this->idCategoria, $this->preco, $this->id,
        ));
    }

    public function destroyProduto()
    {
        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = ?");
        return $sql->execute(array($this->id));
    }
}
