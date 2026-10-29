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
       return "Entrou no listarTodos do ProdutoController";
    }

    public function cadastrar($parametros) {
        $nomeProduto = $parametros['nome'];
        $precoProduto = $parametros['preco'];
        $fabricanteProduto = $parametros['fabricante'];
        $produto = new Produto(null, $nomeProduto, $precoProduto, $fabricanteProduto);

        $this->service->cadastrar($produto);
        return "Entrou no cadastrar do ProdutoController";
    }

    public function atualizar($parametros) {
        // Lógica para atualizar um produto existente no banco de dados
        return "Entrou no atualizar do ProdutoController";
    }

    public function deletar($parametros) {
        // Lógica para deletar um produto do banco de dados
        return "Entrou no deletar do ProdutoController";
    }
}

?>