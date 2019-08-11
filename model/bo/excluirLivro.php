<?php

    include_once '../dao/livroDao.php';

    $id = $_GET['id'];
    $retornoDelete = livroDao::excluirLivro($id);   
    echo($retornoDelete);    
?>