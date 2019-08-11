<?php

include_once '../dao/livroDao.php';


 //   function buscaLivrosPorTitulo(){
        $filtro = $_GET['filtro'];
        $retornoArray = livroDao::getPorTitulo($filtro);
        echo(json_encode($retornoArray));    
   // }
   
    // function buscaTodosOsLivros(){
    //     $filtro = $_GET['filtro'];
    //     $retornoArray = livroDao::getPorTitulo($filtro);
    //     echo(json_encode($retornoArray));    
    // }

?>
