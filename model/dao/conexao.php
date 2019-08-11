<?php
class conexao {
public static function getInstance($servidor, $login, $senha, $banco){
    
    $con = new mysqli($servidor, $login, $senha, $banco);
    return $con;
}
}

?>