<?php

include_once '../dao/livroDao.php';
include_once '../livro.php';

$livro = new livro;
$livro->editora = $_POST['editora'];
$livro->numero_edicao = $_POST['num_edicao'];
$livro->ano_publicacao= $_POST['ano_publicacao'];
$livro->titulo = $_POST['titulo'];
$livro->numero_exemplares=  $_POST['num_exemplares'];
$livro->autor=  $_POST['autor'];

if(livroDao::insert($livro)){
    echo('1');
}else{
    echo('0');
}

?>

