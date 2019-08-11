<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Controle Livraria </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>css/reset.css">
        <link rel="stylesheet" href="<?=base_url();?>css/styleGeral.css">
        <link rel="stylesheet" href="<?=base_url();?>css/styleTelaInicial.css">
    </head>
    
    <body onload="buscarTodosOsLivros()">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #015285;" id="navbar">
                <a class="navbar-brand" href= "<?=site_url("panel/index");?>"><h1 id ="logo">Luna Books</h1></a>
                
                <div class="acesso">
                    <nav>
                        <a href="<?=site_url("autenticacao/login");?>" ><img src= "<?=site_url("img/avatarLogin.png");?>"  width='40px' height='40px' id="imgLogin"/></a>
                         
                    </nav>
                </div> 
            </nav>

        </header>

        <div class="conteudo">

            <form id= "pesquisa" >       
                <input type="search" id="texto" placeholder=" Pesquise aqui pelo título de livro que você quer" onkeyup="tratarEvento()">
                <img  src="<?=base_url();?>img/lupa.png" id="btnPesquisar"> 
            </form>      
        
            <!--  A div a seguir será preenchida com dados dinamicamente via JS-->
            <div id="container">          
            </div>
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
                        <label for="tituloLabel" class="labelModal">Titulo do Livro:</label> 
                        <label id="tituloLabel"></label><br><br>

                        <label for="autor" class="labelModal">Autor(es):</label> 
                        <label id="autor"></label><br><br>

                        <label for="editora" class="labelModal">Editora:</label> 
                        <label id="editora"></label><br><br>

                        <label for="anoPublicacao" class="labelModal">Ano de Publicação:</label> 
                        <label id="anoPublicacao"></label><br><br>

                        <label for="genero" class="labelModal">Gênero Literário:</label> 
                        <label id="genero"></label><br><br>

                        <label for="resenha" class="labelModal">Resenha:</label> 
                        <label id="resenha"></label>
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
                    </div>

                </div>
                <div class="modal-footer">
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

        <script src="<?=base_url();?>js/telaIndex.js"></script>
        
    </body>
</html>