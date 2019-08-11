<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function telaInicialAdm(){
		$this->load->view('telaInicialAdm');
	}

	public function listarLivros(){
		$this->load->view('listarLivros');
	}

	public function cadastrarLivros(){
		$this->load->view('cadastrarLivros');
	}

	public function sobre(){
		$this->load->view('sobre');
	}



}
