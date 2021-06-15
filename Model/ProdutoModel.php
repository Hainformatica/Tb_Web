<?php

namespace app\Model;

class ProdutoModel {

    private $codProduto;
    private $descricao;
    private $valor;
    private $codEan;
    private $qtde;

    public function getCodProduto() {
        return $this->codProduto;
    }

    public function setCodProduto($codProduto): void {
        $this->codProduto = $codProduto;
    }

    
    public function getId() {
        return $this->codProduto;
    }

    public function setId($codProduto): void {
        $this->id = $codProduto;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor): void {
        $this->valor = $valor;
    }
    
    public function getCodEan() {
        return $this->codEan;
    }

    public function setCodEan($codEan) {
        $this->valor = $codEan;
    }
    
    
    public function getQtde() {
        return $this->qtde;
    }

    public function setQtde($qtde): void {
        $this->qtde = $qtde;
    }


}

?>