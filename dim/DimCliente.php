<?php
namespace dimensoes;
mysqli_report(MYSQLI_REPORT_STRICT);
require_once('Cliente.php');
require_once('Sumario.php');
use dimensoes\Cliente;
use dimensoes\Sumario;


class DimCliente{
    public function carregarDimCliente(){
       $dataAtual = date('Y-m-d');
       $sumario = new Sumario();
       try{
          $connDimensao = $this->conectarBanco('dm_comercial');
          $connComercial = $this->conectarBanco('bd_comercial');
       }catch(\Exception $e){
          die($e->getMessage());
       }
       $sqlDim = $connDimensao->prepare('select SK_cliente, cpf, nome, sexo, idade, rua, bairro,
                                         cidade, uf
                                         from dim_cliente');
       $sqlDim->execute();
       $result = $sqlDim->get_result();
  
  
       if($result->num_rows === 0){
          $sqlComercial = $connComercial->prepare("select * from cliente"); //Cria variável com comando SQL
          $sqlComercial->execute(); //Executa o comando SQL
          $resultComercial = $sqlComercial->get_result(); //Atribui à variával o resultado da consulta
  
  
          if($resultComercial->num_rows !== 0){ //Testa se a consulta retornou dados
             while($linhaCliente = $resultComercial->fetch_assoc()){ //Atibui à variável cada linha até o último
                $cliente = new Cliente();
                $cliente->setCliente($linhaCliente['cpf'], $linhaCliente['nome'], $linhaCliente['sexo'],
                $linhaCliente['idade'], $linhaCliente['rua'], $linhaCliente['bairro'], $linhaCliente['cidade'], $linhaCliente['uf']);
  
  
                $slqInsertDim = $connDimensao->prepare("insert into dim_cliente
                                                       (cpf, nome, sexo, idade, rua, bairro, cidade, uf, data_ini)
                                                       values
                                                       (?,?,?,?,?,?,?,?,?)");
                $slqInsertDim->bind_param("sssisssss", $cliente->cpf, $cliente->nome, $cliente->sexo,
                                           $cliente->idade, $cliente->rua, $cliente->bairro,$cliente->cidade,
                                           $cliente->uf, $dataAtual);
                $slqInsertDim->execute();
                $sumario->setQuantidadeInclusoes();
             }
             $sqlComercial->close();
             $sqlDim->close();
             $slqInsertDim->close();
             $connComercial->close();
             $connDimensao->close();
          }
       }else{
  
  
       }
       return $sumario;
    }
    private function conectarBanco($banco){
       if(!defined('DS')){
          define('DS', DIRECTORY_SEPARATOR);
       }
       if(!defined('BASE_DIR')){
          define('BASE_DIR', dirname(__FILE__).DS);
       }
       require(BASE_DIR.'config.php');
  
  
       try{
          $conn = new \MySQLi($db_host, $user, $password, $banco);
          return $conn;
       }catch(mysqli_sql_exception $e){
          throw new \Exception($e);
          die;
       }
    }
  }
  
?>
 
 
 

