<?php

namespace dimensoes;

class Sumario{
    public $quantidadeInclusoes;
    public $quantidadeAlteracoes;

    public function setQuantidadeInclusoes(){
        $this->setQuantidadeInclusoes ++;
    }
    public function setQuantidadeAlteracoes(){
        $this->setQuantidadeAlteracoes ++;
    }
}
?>