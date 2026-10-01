<?
  class ProdutoDAO {
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    public function listarTodos() {
        $SQL = "SELECT * FROM produtos";
        $result = mysqli_query($this->conexao, $SQL);
        $produtos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $produto = new Produto($row['id'], $row['nome'], $row['preco'], $row['fabricante']);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    public function cadastrar($produto) {
        $SQL = "INSERT INTO produtos (nome, preco, fabricante) VALUES ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getFabricante()}')";
        mysqli_query($this->conexao, $SQL);
    }

    public function atualizar($produto) {
         $SQL = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, fabricante = '{$produto->getFabricante()}' WHERE id = {$produto->getId()}";
        mysqli_query($this->conexao, $SQL);
    }

    public function deletar($id) {
        $SQL = "DELETE FROM produtos WHERE id = $id";
        mysqli_query($this->conexao, $SQL);
    }
  }
?>