<?php

    try {

        $conn = new mysqli("localhost", "root", "", "biblioteca");
        $conn->set_charset('utf8mb4');
        
    }
    catch(mysqli_sql_exception $e) {
        die("Erro ao conectar no banco de dados");
    }
    

?>