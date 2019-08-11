<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller {

	public function login()
	{
		$this->load->view('login');
	}
    
    public function verificar() {
        $this->load->database(); //está no autoload agora

		$this->load->model('usuario_model');

		// if(!(isset($_POST['usuario']) && isset($_POST['senha']))){
		// 	redirect(base_url());
		// }

		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
	    $existe = $this->usuario_model->isUsuario($usuario, $senha);
	  
		
 
	//	alert("Livro Alterado Com Sucesso");

        if($existe) {
			// usuario autenticado, registrando a sessão e redirecionando para o painel
			
			// $dados_sessao = array(
			// 		'usuario'  => $usuario,
			// 		'autenticado' => TRUE
			// );
			
			// $this->session->set_userdata($dados_sessao);

		//	return "1";
		//	echo($existe);
		//	echo  base_url ()."telaInicialAdm/index/" ; 
			echo site_url("panel/telaInicialAdm");

			//	redirect(site_url('panel/telaInicialAdm'));
        }
	}
	
	public function cadastrarUsuario(){
		 $this->load->database(); //está no autoload agora
		 $this->load->model('usuario_model');

		 $usuario = $this->input->post('usuario');
		 $senha = $this->input->post('senha');

		$isLoginRepetido = $this->usuario_model->isLoginUsuario($usuario);
		
		if($isLoginRepetido){
			$loginRepetido = "Login_Repetido";
			echo($loginRepetido);

			// echo($loginRepetido);
		}else{
			$usuario = array(
				'login' => $usuario,
				'senha' => $senha,
			);

			$this->usuario_model->cadastrarUsuario($usuario);
			echo site_url("panel/telaInicialAdm");

		}
	}
}
