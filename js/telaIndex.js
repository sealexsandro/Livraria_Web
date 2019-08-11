
var listaDeLivros;
var campoBusca = document.getElementById('texto');
formData = new FormData();

var contador= 0;

function tratarEvento(){
    if(campoBusca.value.length ===0 || !campoBusca.value.trim()){
        buscarTodosOsLivros();
        return;
    }else{
         buscarLivro(campoBusca.value);
    }
}


function buscarTodosOsLivros() {
  $.ajax({
    type: "GET",         
    url:  base_url+ "control_Livros/get_All_LivrosComImagens",    // Metodo de buscar 
  }).done(function(data){
    var array = JSON.parse(data);
    listaDeLivros = array;
    exibirLivros(array);
    });
}


function buscarLivro(filtro) {
  $.ajax({
    type: "POST",                   
    url:  base_url+ "control_Livros/getLivroPorTituloComImagem",    // Metodo de buscar 
    data: {titulo: filtro},
    
  }).done(function(result){
    var array = JSON.parse(result);
    listaDeLivros = array;
    console.log(array);
    exibirLivros(array);
  });
}
function exibirLivros(array){
  var div_containerGeral= document.getElementById('container');
  limparImagensDaTela();
    
    if( (array!= null) && array.length> 0){

          for(var i=0; i< array.length; i++){ 
              
              if(array[i]['imagem_exibicao'] != null){
                  console.log("Imagem não é nula");

                  var div_Interna = document.createElement('div'); 
                  var divInformacoes = document.createElement('div');
                  var divImagens =   document.createElement('div'); 
                  var divBotoes = document.createElement('div');
                  var img = document.createElement('img');
                  img.src = base_url+"img/"+array[i]['imagem_exibicao'];
                  img.classList.add('redimensionarImagem');

                  h3 = document.createElement('h3');
                  var texto  = document.createTextNode(array[i]['titulo']);
                  h3.appendChild(texto);

                  h3 = document.createElement('h3');
                  var textoTitulo  = document.createTextNode(array[i]['titulo']);
                  h3.appendChild(textoTitulo);

                  var labelAutores = document.createElement('label');
                  var textoAutores  = document.createTextNode(array[i]['autor']);
                  labelAutores.appendChild(textoAutores);

                  var labelEditora = document.createElement('label');
                  var textoEditora  = document.createTextNode('Editora: '+array[i]['editora']);
                  labelEditora.appendChild(textoEditora);

                  var labelAnoPublicacao = document.createElement('label');
                  var textoAnoPublicacao  = document.createTextNode(array[i]['ano_publicacao']);
                  labelAnoPublicacao.appendChild(textoAnoPublicacao);

                  var labelGenero = document.createElement('label');
                  var textoGenero  = document.createTextNode('Gênero: '+array[i]['genero']);
                  labelGenero.appendChild(textoGenero);

                  btVisualizar = document.createElement('button');
                  btVisualizar.innerHTML = 'Ver Mais Detalhes';
                  btVisualizar.setAttribute('onclick', "verDetalhes("+i+")");
                  btVisualizar.classList.add('button');
                  btVisualizar.classList.add('buttonVerDetahes');

                  divBotoes.appendChild(btVisualizar);
                  divBotoes.classList.add('divBotoes');
                 
                  divInformacoes.appendChild(h3); 
                  divInformacoes.appendChild(document.createElement('br'));
                  divInformacoes.appendChild(labelAutores); 
                  divInformacoes.appendChild(document.createElement('br')); 
                  divInformacoes.appendChild(document.createElement('br'));


                  divInformacoes.appendChild(labelEditora); 
                  divInformacoes.appendChild(document.createElement('br'));
                  divInformacoes.appendChild(labelGenero); 

                  divInformacoes.classList.add('divInformacoes');

                  divImagens.appendChild(img);
                  divImagens.classList.add('card_livro');

                  div_Interna.appendChild(divImagens);
                  div_Interna.appendChild(divInformacoes);
              
                  div_Interna.appendChild(divBotoes);

                  div_Interna.classList.add('containerInterno');
                 
                  div_containerGeral.appendChild(div_Interna);

              }else{
                console.log("Imagem  é nula");

              }
          }
    }else{
    //  limparTabela();
    console.log("Lista Vazia");
      limparImagensDaTela();

    }
}
// function exibirLivros(array){
//     var div_containerImagens= document.getElementById('container');
//     limparImagensDaTela();
      
//       if( (array!= null) && array.length> 0){

//             for(var i=0; i< array.length; i++){ 
                
//                 if(array[i]['imagem_exibicao'] != null){
//                     console.log("Imagem não é nula");
//                     var div =   document.createElement('div'); 
//                     div.classList.add('card_livro');

//                     var img = document.createElement('img');
//                     img.src = base_url+"img/"+array[i]['imagem_exibicao'];
//                     img.classList.add('redimensionarImagem');

//                     h3 = document.createElement('h3');
//                     var texto  = document.createTextNode(array[i]['titulo']);
//                     h3.appendChild(texto);

//                     btVisualizar = document.createElement('button');
//                     btVisualizar.innerHTML = 'Ver Detalhes';
//                     btVisualizar.setAttribute('onclick', "verDetalhes("+i+")");
//                     div.appendChild(h3); 
//                     div.appendChild(img);
//                     div.appendChild(btVisualizar);
//                     div_containerImagens.appendChild(div);
//                 }else{
//                   console.log("Imagem  é nula");

//                 }
//             }
//       }else{
//         console.log("Lista Vazia");
//         limparImagensDaTela();

//       }
//   }

  function verDetalhes(indiceArray){

    livro = listaDeLivros[indiceArray];
    // var div_containerImagens= document.getElementById('detalhesLivro');
    // div =   document.createElement('div'); 

    document.querySelector('#tituloLabel').innerHTML = livro['titulo'];
    document.querySelector('#autor').innerHTML = livro['autor'];
    document.querySelector('#editora').innerHTML = livro['editora'];
    document.querySelector('#anoPublicacao').innerHTML = livro['ano_publicacao'];
    document.querySelector('#genero').innerHTML = livro['genero'];
    document.querySelector('#resenha').innerHTML = livro['resenha'];
   
    // var fotos= document.querySelector('#fotos');

    var id= livro['id'];
    get_All_Imagens(id);
    $('#modal').modal('show');
  }
 
  function get_All_Imagens(idLivro) {
    var array;
    limparCarousel();

    $.ajax({
      type: "POST",                   
      url:  base_url+ "control_Livros/get_All_Imagens",   
      data: {id: idLivro},     
    }).done(function(data){
      array = JSON.parse(data);
      console.log(array);

      if( (array!= null) && array.length> 0){
        var div_carousel = document.getElementById('carousel-imagens');

        if(array.length> 1){
          document.querySelector('#passarImagem').style.display = 'block';
        }
        for(var i=0; i< array.length; i++){ 
            
            if(array[i]!= null){
              console.log("Enderecos: "+array[i]);

              div = document.createElement("div");
              img = document.createElement("img");
              img.src = base_url+"img/"+array[i]['nome_imagem'];
              img.classList.add('redimensionarImagemModal');         
              div.classList.add('carousel-item');
              if(contador ==0){
                div.classList.add('active');
                contador++;
              }
              div.appendChild(img);
              div_carousel.appendChild(div);
            }
        }
        }else{
        //  limparTabela();
        console.log("Lista Vazia");
        }
    });
      
  }

  function limparCarousel(){
    document.querySelector('#passarImagem').style.display = 'none';
    $("#carousel-imagens").empty();
    contador= 0;
  }

  function limparImagensDaTela(){
    $("#container").empty();
    contador= 0;
  }
 

