<?
require_once './models/generic.entity.php';
class Cliente {
    private $id;
    private $nome;
    private $endereco;

    public function __construct($id, $nome, $endereco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }
}