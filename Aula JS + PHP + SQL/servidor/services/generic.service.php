<?php

abstract class GenericService {

    protected final $dao;

    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        if($this->dao === null) {
            $this->dao = $this->getDAOPrincipal();
        }
    }

    public abstract function getDAOPrincipal();

    public function listarTodos($filtros) {
        $this->dao->listarTodos($filtros);
    }
    public abstract function cadastrar($obj);
    public abstract function atualizar($obj);
    public abstract function deletar($obj);
}

?>