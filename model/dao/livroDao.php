<?php

    include_once 'conexao.php';
    include_once '../livro.php';

    class LivroDao{
        var $con;

        public static function insert($livro){
            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_de_insercao = "insert into livro (editora, numero_edicao, ano_publicacao, titulo, numero_exemplares, autor) 
            values('$livro->editora', '$livro->numero_edicao', '$livro->ano_publicacao', '$livro->titulo', '$livro->numero_exemplares', '$livro->autor')";
            $resultado = mysqli_query($con, $sql_de_insercao);
            return $resultado;
        }
        

        function listAll(){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_listar_livros = "select * from livro;";

            $resultado = mysqli_query($con, $sql_listar_livros);

            if(mysqli_num_rows($resultado) > 0) {

                $livros = array();
                while($row = mysqli_fetch_assoc($resultado)) {
                    array_push($livros, array(
                        "id" => $row['id'],
                        "editora" => $row['editora'],
                        "numero_edicao" => $row['numero_edicao'],
                        "ano_publicacao" => $row['ano_publicacao'],
                        "titulo" => $row['titulo'],
                        "numero_exemplares" => $row['numero_exemplares'],
                        "autor" => $row['autor'])
                        );
                    }
                    return $livros;
            }else{
                return null;
            }
        }


        function getPorTitulo($titulo){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_get_por_titulo = "select * from livro where titulo like '%{$titulo}%';";
        //    "select * from livro where titulo like '%n%' and "n"!= """;
           
            $resultado = mysqli_query($con, $sql_get_por_titulo);

            if(mysqli_num_rows($resultado) > 0) {

                $livros = array();
                while($row = mysqli_fetch_assoc($resultado)) {
                    array_push($livros, array(
                        "id" => $row['id'],
                        "editora" => $row['editora'],
                        "numero_edicao" => $row['numero_edicao'],
                        "ano_publicacao" => $row['ano_publicacao'],
                        "titulo" => $row['titulo'],
                        "numero_exemplares" => $row['numero_exemplares'],
                        "autor" => $row['autor'])
                        );
                    }
                    return $livros;
            }else{
                return null;
            }
        }


        function editarLivro($livro){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_atualizar_livro = "update livro set id= {$livro->id}, editora= '{$livro->editora}', numero_edicao= {$livro->numero_edicao}, 
                                   ano_publicacao= {$livro->ano_publicacao},titulo= '{$livro->titulo}', 
                                   numero_exemplares= {$livro->numero_exemplares}, autor='{$livro->autor}' where id= {$livro->id};";

            $resultado = mysqli_query($con, $sql_atualizar_livro);
            return $resultado;
        }  
        
        
        function excluirLivro($id){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_excluir_livro = "delete from livro where id = {$id};";
            $resultado = mysqli_query($con, $sql_excluir_livro);
           return $resultado;
        }   
    }


?>