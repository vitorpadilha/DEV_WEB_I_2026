<?php
class Livro {
    public $id;
    public $nome;
    public $editora;
    public $edicao;
    public $autor;
    public $estoque;

    public __construct($id, 
                         $nome, 
                         $editora, 
                         $autor, 
                         $estoque) {
        $this->nome = $nome;
        $this->id = $id;
        $this->editor = $editora;
        $this->autor = $autor;
        $this->estoque = $estoque;
    }
    public cadastrar($conn) {
        $sql = "INSERT INTO livro (nome, editora, edicao, autor, estoque) VALUES ('".$this->nome."', '".$this->editora."',".
        "'".$this->edicao."', '".$this->autor."',".$this->estoque.")";
        $conn->query($sql);
    }
    public listarTodos(){

    }
    public remover() {

    }
    public findById($id) {

    }
    public alterar($conn) {
        $sql = "UPDATE livro SET nome = '".$this->nome."', 
        editora = '".$this->editora."', 
        edicao = '".$this->edicao."', 
        autor = '".$this->autor."', 
        estoque = ".$this->estoque."
        WHERE id = ".$this->id."
        ";
        $conn->query($sql);
    }
}
?>