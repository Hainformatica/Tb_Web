<?php
/*
 * Método de conexão sem padrões
 */

namespace app\Repository;

function getConexao(){
    try {
        $username = 'root';
        $password = 'Caminhodourado2204#';
        $conn = new PDO('mysql:host=localhost;dbname=tb_web', $username, $password);
        return $conn;

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    

}


 ?>