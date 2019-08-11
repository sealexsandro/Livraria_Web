<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastrar Livros</title>
        <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>css/reset.css">  
        <link rel="stylesheet" href="<?=base_url();?>css/styleGeral.css">
        <link rel="stylesheet" href="<?=base_url();?>css/styleSobre.css">

    </head>
    <body id="corpo">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #015285;">
                <a class="navbar-brand" href= "<?=site_url("panel/telaInicialAdm");?>"><h1 id = "logo">Luna Books</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <!-- <a class="nav-link" href="<?=site_url("painel");?>">Início <span class="sr-only">(atual)</span></a> -->
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Livros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=site_url("panel/listarLivros");?>">Listar</a>
                        <a class="dropdown-item" href="<?=site_url("panel/cadastrarLivros");?>">Cadastrar Livros</a>
                        <div class="dropdown-divider"></div>
                    </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?=site_url("panel/sobre");?>">Sobre</a>
                    </li>
                
                </ul>

                <div class= "logout">
                        <nav>
                            <a href="<?=site_url("panel/index");?>">Sair</a>
                        </nav>

                </div> 
                </div>
            </nav>
        </header>

        <div id= "info">
            <p class="textoinfo">O Luna Books é um sistema que tem como finalidade a execução de algumas tarefas pertinentes existentes
              no modelo de negócio de uma livraria online, tarefas como: cadastro, alteração, pesquisa e exclusão de livros 
              e de usuários.</p>
              <p class="textoinfo"> O sistema em si, trata-se de uma versão simplificada do real potencial de uma aplicação deste 
              modelo de negócio, visto que, esta é  a versão  1.0 do sistema, portanto haverá muitas 
              outras versões com o desenvolvimento e aprimoramento do sistema.</p>

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
        
    </body>
</html>