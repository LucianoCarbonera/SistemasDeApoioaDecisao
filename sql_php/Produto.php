<?php
class Produto{
    public $nome;
    public $unidadeMedida;
    public $preco;

    public function setProduto($nome, $unidadeMedida, $preco){
        $this->nome = $nome;
        $this->unidadeMedida= $unidadeMedida;
        $this->preco= $preco;
    }
}

?>