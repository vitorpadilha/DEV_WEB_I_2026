<?php
if (empty($_SESSION['usuario'])){
    header('Location: /HagaNenaPHP/TRI2/Dia2/Tentando/login.php');
    exit;
}
?>