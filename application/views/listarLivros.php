<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>css/reset.css">  
        <link rel="stylesheet" href="<?=base_url();?>css/styleGeral.css">
        <link rel="stylesheet" href="<?=base_url();?>css/styleListarLivros.css">
    </head>
    
    <body onload="buscarTodosOsLivros()">

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

        <form id= "pesquisa" >       
            <input type="search" id="texto" placeholder="Busque aqui por títulos de livros" onkeyup="tratarEvento()">
            <img  src="<?=base_url();?>img/lupa.png" id="btnPesquisar"> 

        </form>      
       
        <!--  A div a seguir será preenchida com dados dinamicamente via JS-->
        <div id="container">          
        </div>

          <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Detalhes do Livro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detalhesLivro">

                    <div class="form-group" id="labelDetalhes">
                        <form>
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" id="titulo">
                            </div>

                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor">
                            </div>

                            <div class="form-group">
                                <label for="editora">Editora</label>
                                <input type="text" class="form-control" id="editora">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="num_edicao">Número de Edição</label>
                                    <input type="number" class="form-control" id="num_edicao">
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label for="num_exemplares">Número de Exemplares</label>
                                    <input type="number" class="form-control" id="num_exemplares">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ano_publicacao">Ano de Publicação</label>
                                    <input type="date"  id="anoPublicacao" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="genero">Genero</label>
                                    <input type="text" class="form-control" id="genero">
                                </div>
                            </div>

                            <div class="form-group resenhaLivro">
                                <label for="resenhaDoLivro">Resenha do Livro</label><br>
                                <textarea rows="4" cols="80" name="comment" id="resenha" form="usrform"></textarea>
                            </div>
                        
                        </form>
         
                    </div>

                    <div id="caixaDeImagens">
                        <div id= "previewImagens">
                            <h1 id="tituloLivro">Imagens do Livro</h1>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" id="carousel-imagens">
                            </div>
                                <div id="passarImagem">
                                    <a class="carousel-control-prev"  href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #015285;"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #015285;"></span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <input id='btnSalvar' type="button" value="Salvar Livro Editado">

                        
                    </div>


                </div>
               
                </div>
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

        <script src="<?=base_url();?>js/telaListarLivros.js"></script>

    </body>
</html>