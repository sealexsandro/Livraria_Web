<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>css/reset.css">
	<link rel="stylesheet" href="<?=base_url();?>css/styleGeral.css">
	<link rel="stylesheet" href="<?=base_url();?>css/login.css">
</head>
<body>	
    <header>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #015285;">
			<a class="navbar-brand" href= "<?=site_url("panel/index");?>"><h1 id ="logo">Luna Books</h1></a>
		</nav>
    </header>

	<div class="login">
		<legend>Acesso do Usuário</legend>
		<div class="form">
			
			<h3>Login</h3>
			<input type="text" name="login" id="login" placeholder="Digite seu login">

			<h3>Senha</h3>
			<input type="password" name="senha" id="senha" placeholder="Digite senha">

			<h4 id="erro">Algum campo não preenchido!</h4>
			<div class="center">
				<div class="lds-ring" id="load"><div></div><div></div><div></div><div></div></div>
			</div>

			<button class="bt_entrar" onclick="logar()">Entrar</button>	
			<button class="bt_cadastrar" onclick="cadastrarUsuario()">Cadastre-se</button>			
		
		</div>
	</div>

	<div class="footer">
		<footer>
			<div class="coluna col3">
				<span>Copyright &copy; 2019 - Luna Books</span>
			</div>
		</footer>
    </div>
       
	<script>var base_url = '<?= base_url() ?>';</script>
	<script src="<?=base_url();?>js/jquery-3.4.1.min.js" type="text/javascript"></script>

	<script src="<?=base_url();?>js/popper.min.js"></script>
	<script src="<?=base_url();?>js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>js/bootbox.min.js"></script>
	<script src="<?=base_url();?>js/bootbox.locales.min.js"></script>
	<script src="<?=base_url();?>js/login.js"></script>

</body>
</html>