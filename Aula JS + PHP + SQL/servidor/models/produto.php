<?
require_once './models/generic.entity.php';
class Produto {
    private $id;
    private $nome;
    private $preco;
    private $fabricante;

    public function __construct($id, $nome, $preco, $fabricante) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->fabricante = $fabricante;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
    }
    public function getFabricante(){
        return $this->fabricante;
    }
}