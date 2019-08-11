<?php

    include_once 'conexao.php';
    include_once '../administrador.php';

    class AdministradorDao{
        var $con;

        public static function insert($admin){
            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_de_insercao = "insert into admin (nome, login, senha) values('$admin->nome', '$admin->login', '$admin->senha')";
           // se a conexao resultar algo, entao $resultado=true;
            $resultado = mysqli_query($con, $sql_de_insercao);
            return $resultado; 
        }


        function listAll(){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_listar_admins = "select * from admin;";
    
            $resultado = mysqli_query($con, $sql_listar_admins);
    
            if(mysqli_num_rows($resultado) > 0) {
    
                $admins = array();
   
                   while($row = mysqli_fetch_assoc($resultado)) {
                       array_push($admins, array(
                        "id" => $row['id'],
                        "nome" => $row['nome'],
                        "login" => $row['login'],
                        "senha" => $row['senha'])
                        );
                    }
    
                //   $json_questoes = json_encode($questoes);
                 //  return $json_questoes;
                    return $admins;
               }else{
                   return null;
               }		
        }

        function getPorNome($nome){

            $con = Conexao::getInstance('localhost', 'root', '', 'livraria');
            $sql_get_por_nome = "select * from admin where titulo like '%{$nome}%';";

            $resultado = mysqli_query($con, $sql_get_por_nome);

  //          var_dump($resultado);
 //          return;

            if(mysqli_num_rows($resultado) > 0) {

                $funcionarios = array();
                while($row = mysqli_fetch_assoc($resultado)) {
                    array_push($funcionarios, array(
                    /*    "id" => $row['id'],
                        "editora" => $row['editora'],
                        "numero_edicao" => $row['numero_edicao'],
                        "ano_publicacao" => $row['ano_publicacao'],
                        "titulo" => $row['titulo'],
                        "numero_exemplares" => $row['numero_exemplares'])
                        */
                        );
                    }
                    return $funcionarios;
            }else{
                return null;
            }
        }
        
    }


?>