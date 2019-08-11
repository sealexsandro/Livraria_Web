<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros_model extends CI_Model {

	public function get_All_Livros() {
   
    $query = $this->db->get("livros");
    return $query->result();
  }

    public function get_Livro_Por_Titulo($titulo) {
      
      $this->db->like("titulo", $titulo);
      $query = $this->db->get("livros");
      return $query->result();
    }

    public function getLivroPorTituloComImagem($titulo) {
      $query = $this->db->query("select *,(select nome_imagem from imagens where fk_id_livro = livros.id limit 1) as imagem_exibicao from livros WHERE titulo like '%{$titulo}%'"); 
      return $query->result();
    }

    public function get_All_LivrosComImagens(){
      $query = $this->db->query("select *,(select nome_imagem from imagens where fk_id_livro = livros.id limit 1) as imagem_exibicao from livros");
      return $query->result();
    }

    public function get_All_Imagens($idLivro){    
      $query = $this->db->query("SELECT * FROM imagens im WHERE im.fk_id_livro = {$idLivro}");
      return $query->result();
    }

    public function salvar_Livro($livro){

      $this->db->insert( "livros", $livro);
      $id_livro = $this->db->insert_id();
      return $id_livro;   
    }
    public function salvar_imagens($imagens, $id_livro){

      if(count($imagens)> 0){
          for($i=0;$i< count($imagens); $i++){
            $nome_foto = $imagens[$i];
            $sql = "insert into imagens (nome_imagem, fk_id_livro) VALUES ('$nome_foto', '$id_livro')";
            $this->db->query($sql);
          }
        }
    }

    public function excluir_Imagens($fk_livro){
      $query = $this->db->query("DELETE FROM imagens WHERE fk_id_livro = .$fk_livro");
      $query->result();
    }
      
    public function editar_Livros($livro){   
      $this->db->where('id', $livro['id']);
      return  $this->db->update( "livros", $livro);
    }

    public function excluir_Livros($id){

      $this->db->where('id', $id);
      return  $this->db->delete( "livros");
    }

    function js_console_log($mixed) {
      printf('<script>console.log(%s);</script>', json_encode($mixed));
    }
}