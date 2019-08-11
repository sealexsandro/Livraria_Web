<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Livros extends CI_Controller {

	public function index(){
		$this->load->view('telaInicialAdm');	
	}

	public function cadastrar_Livros(){
		$this->load->model("livros_model");
		$livro = array(
		//	'id' => $this->input->post('id'),
			'editora' => $this->input->post('editora'),
			'numero_edicao' => $this->input->post('num_edicao'),
			'ano_publicacao' => $this->input->post('ano_publicacao'),
			'titulo' => $this->input->post('titulo'),
			'numero_exemplares' => $this->input->post('num_exemplares'),
			'autor' => $this->input->post('autor'),
			'genero' => $this->input->post('genero'),
			'resenha' => $this->input->post('resenha'),
		);

		$imagens = array();
		if(isset($_FILES['fotos'])){

			for($i=0; $i< count($_FILES['fotos']['name']); $i++){
				// salvando dentro da pasta img
				//$nome_arquivo = md5($_FILES['fotos']['name'][$i].rand(1, 999)).'.jpg';
				$nome_arquivo = $_FILES['fotos']['name'][$i];
				move_uploaded_file($_FILES['fotos']['tmp_name'][$i], 'img/'.$nome_arquivo);
			
				//salvar nomes para enviar para o banco
				array_push($imagens, $nome_arquivo);
			}	
		}
		$id = $this->livros_model->salvar_Livro($livro);		
		if($id != null){
			$this->livros_model->salvar_imagens($imagens, $id);
			echo($id);
		}
	}

	public function get_All_Livros(){
      
        $this->load->model("livros_model");
        $livros = $this->livros_model->get_All_Livros();
		echo(json_encode($livros));  
	}
	
	public function get_Livro_Por_Titulo(){

		$this->load->model("livros_model");
      
		$titulo= $this->input->get("titulo");
		if($titulo != null) {
		  $livros = $this->livros_model->get_Livro_Por_Titulo($titulo);
		  echo(json_encode($livros));
		}
	}

	public function get_All_LivrosComImagens(){

		$this->load->model("livros_model");
        $livros = $this->livros_model->get_All_LivrosComImagens();
		echo(json_encode($livros)); 	
	}

	public function getLivroPorTituloComImagem(){
		$this->load->model("livros_model");
		$titulo = $this->input->post('titulo');
		$livros = $this->livros_model->getLivroPorTituloComImagem($titulo);
		echo(json_encode($livros));
	}

	public function get_All_Imagens(){
		$this->load->model("livros_model");
		$id = $this->input->post('id');
		$imagens = $this->livros_model->get_All_Imagens($id);
		echo(json_encode($imagens));
	}
	
	public function editar_Livros(){
		$this->load->model("livros_model");
		$livro = array(
			'id' => $this->input->post('id'),
			'editora' => $this->input->post('editora'),
			'numero_edicao' => $this->input->post('num_edicao'),
			'ano_publicacao' => $this->input->post('ano_publicacao'),
			'titulo' => $this->input->post('titulo'),
			'numero_exemplares' => $this->input->post('num_exemplares'),
			'autor' => $this->input->post('autor'),
			'genero' => $this->input->post('genero'),
			'resenha' => $this->input->post('resenha'),

		);
		 $isResult = $this->livros_model->editar_Livros($livro);
		 echo(json_encode($isResult));
	}

	public function excluir_Livros(){
		$this->load->model("livros_model");
		$id = $this->input->post('id');
		$isResult = $this->livros_model->excluir_Livros($id);
		echo(json_encode($isResult));
	}
	
	// Função para debugar no console, para ver o que está chegando ou saindo de outras funcoes
	function js_console_log($mixed) {
		printf('<script>console.log(%s);</script>', json_encode($mixed));
	}
}
