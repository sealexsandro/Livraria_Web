<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $usuario;
    public $senha;

    //Verificar seo login e senha do usuario estão corretos
    public function isUsuario($usuario, $senha) {
         $this->usuario    = $usuario;
        $this->senha    = $senha;

        $this->db->where("login", $this->usuario);
        $this->db->where("senha", $this->senha);
    
        $query = $this->db->get('usuarios', 1);
        if ($query->num_rows() >= 1) {
            // Se o usuario existe, então retorna  true;
            return true;
        }
        return false;
    }

    //Verificar se o login é repetido
    public function isLoginUsuario($usuario) {

        $this->db->where("login", $usuario); 
        $query = $this->db->get("usuarios");
        if ($query->num_rows() >= 1) {
            return true;
        }else{
            return FALSE;
        }
    }

    //Salvar Novo Usuário
    public function cadastrarUsuario($usuario) {      
        $this->db->insert( "usuarios", $usuario);
    }

}