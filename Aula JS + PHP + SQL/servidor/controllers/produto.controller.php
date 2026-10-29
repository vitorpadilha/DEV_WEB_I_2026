<?
require_once './controllers/generic.controller.php';
require_once './models/Produto.php';
class ProdutoController extends GenericController {

    private $service;

    public function __construct($conn) {
        parent::__construct($conn);
        $this->service = new ProdutoService($conn);
    }

    public function listarTodos($parametros) {
       return $this->service->listarTodos($parametros);
    }

    public function cadastrar($parametros) {
        $nomeProduto = $parametros['nome'];
        $precoProduto = $parametros['preco'];
        $fabricanteProduto = $parametros['fabricante'];
        $produto = new Produto(null, $nomeProduto, $precoProduto, $fabricanteProduto);

        return $this->service->cadastrar($produto);
    }

    public function atualizar($parametros) {
        $id = $parametros['id'];
        $nomeProduto = $parametros['nome'];
        $precoProduto = $parametros['preco'];
        $fabricanteProduto = $parametros['fabricante'];
        $produto = new Produto($id, $nomeProduto, $precoProduto, $fabricanteProduto);
        // Lógica para atualizar um produto existente no banco de dados
        return $this->service->atualizar($produto);
    }

    public function deletar($parametros) {
        // Lógica para deletar um produto do banco de dados
        return $this->service->deletar($parametros['id']);
    }
}

?>