<?php
   namespace dimensoes;
 
   
/**
* Model da entidade cliente
* @author Paulo Roberto Córdova
*/
class Cliente{
    /**
     * CPF do cliente
     * @var string
     */
    public $cpf;
    /**
     * Nome do Cliente
     * @var string
     */
    public $nome;
    /**
     * Sexo do cliente
     * @var string
     */
    public $sexo;
    /**
     * Idade do cliente
     * @var int
     */
    public $idade;
    /**
     * Email do cliente
     * @var string
     */
    public $email;
    /**
     * Rua do cliente
     * @var string
     */
    public $rua;
    /**
     * Bairro do cliente
     * @var string
     */
    public $bairro;
    /**
     * Cidade do cliente
     * @var string
     */
    public $cidade;
    /**
     * UF do cliente
     * @var string
     */
    public $uf;
  
  
    /**
     * Carrega os atributos da classe Prospect
     * @param $cpf CPF do cliente
     * @param $nome Nome do cliente
     * @param $sexo Sexo do cliente
     * @param $idade Idade do cliente
     * @param $rua Rua do cliente
     * @param $bairo Bairro do cliente
     * @param $cidade Cidade do cliente
     * @param $uf UF do cliente
     *@return Void
     */
    public function setCliente($cpf, $nome, $sexo, $idade, $rua, $bairro, $cidade, $uf){
       $this->cpf = $cpf;
       $this->nome = $nome;
       $this->sexo = $sexo;
       $this->idade = $idade;
       $this->rua = $rua;
       $this->bairro = $bairro;
       $this->cidade = $cidade;
       $this->uf = $uf;
    }
  }
  
?>
 

