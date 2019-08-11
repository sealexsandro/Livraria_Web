
var listaDeLivros;
var campoBusca = document.getElementById('texto');

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
    url:  base_url+ "control_Livros/get_All_LivrosComImagens",    
  }).done(function(data){
    var array = JSON.parse(data);
    listaDeLivros = array;
    exibirLivros(array);
  });
}


function buscarLivro(filtro) {
  $.ajax({
    type: "POST",                   
    url:  base_url+ "control_Livros/getLivroPorTituloComImagem",   
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
                    btVisualizar.innerHTML = 'Ver / Editar';
                    btVisualizar.setAttribute('onclick', "verDetalhes("+i+")");
                    btVisualizar.classList.add('button');
                    btVisualizar.classList.add('buttonVerEditar');

                    btExcluir = document.createElement('button');
                    btExcluir .innerHTML = 'Excluir Livro';
                    btExcluir .setAttribute('onclick', "excluirLivro("+i+")");
                    btExcluir.classList.add('button');
                    btExcluir.classList.add('buttonExcluir');

                    divBotoes.appendChild(btExcluir);
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
                    // div_Interna.appendChild(btExcluir);
                    // div_Interna.appendChild(btVisualizar);
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

function verDetalhes(indiceArray){

    livro = listaDeLivros[indiceArray];
    
    document.querySelector('#titulo').value = livro['titulo'];
    document.querySelector('#autor').value = livro['autor'];
    document.querySelector('#editora').value = livro['editora'];
    document.querySelector('#num_edicao').value = livro['numero_edicao'];
    document.querySelector('#num_exemplares').value = livro['numero_exemplares'];
    document.querySelector('#anoPublicacao').value = livro['ano_publicacao'];
    document.querySelector('#genero').value = livro['genero'];
    document.querySelector('#resenha').value = livro['resenha'];
   
    var id= livro['id'];
    get_All_Imagens(id);
    $('#modal').modal('show');
    document.querySelector('#btnSalvar').setAttribute('onclick', "salvarLivroEditado("+id+")");
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
 

function salvarLivroEditado(idLivro){

  formData = new FormData();

  var editora = document.querySelector('#editora').value;
  var titulo = document.querySelector('#titulo').value;
  var numero_edicao = document.querySelector('#num_edicao').value;
  var ano_publicacao = document.querySelector('#anoPublicacao').value;
  var numero_exemplares = document.querySelector('#num_exemplares').value;
  var autor = document.querySelector('#autor').value;
  var resenha = document.querySelector('#resenha').value;
  var genero =  document.querySelector('#genero').value;


    if(titulo == ""){
      alert("Preencha O Campo Título!");
      return;
    }else if(editora === ""){
      alert("Preencha O Campo Editora!");
      return;
    }else if(autor == ""){
      alert("Preencha O Campo Autor!");
      return;
    }else if(numero_edicao == ""){
      alert("Preencha Número da Edição!");
      return;
    }else if(ano_publicacao  == ""){
      alert("Preencha O Campo Ano da Publicação!");
      return;
    }else if(numero_exemplares == ""){
      alert("Preencha O Campo Número de Exemplares!");
      return;
    }else if(genero == ""){
      alert("Preencha O Campo Gênero!");
      return;
    }
    
    formData.append("id", idLivro);
    formData.append("titulo", titulo);
    formData.append("editora", editora);
    formData.append("num_edicao", numero_edicao );
    formData.append("ano_publicacao", ano_publicacao);
    formData.append("num_exemplares", numero_exemplares);
    formData.append("resenha", resenha);
    formData.append("genero", genero);
    formData.append("autor", autor);

    $.ajax({
      type: "POST",                   
      url:  base_url+ "control_Livros/editar_Livros",    // Metodo de buscar 
      data: formData,
      processData: false,
      cache: false,
      contentType: false
      
    }).done(function(data){

      if(data = true){
        console.log(data);
        bootbox.alert({
          message: "Livro Alterado com Sucesso!",
          size: 'small'
        });
        }else{
        bootbox.alert({
          message: "Erro ao alterar livro!",
          size: 'small'
        });
      }
      tratarEvento();
    });
  }

  function excluirLivro(indiceArray){
    var livro = listaDeLivros[indiceArray];
    var id= livro['id'];
    console.log("Id no inicio: "+id);

    bootbox.confirm("Deseja mesmo excluir este Livro? ", function(result){ 

      if(result == true){
          $.ajax({
            type: "POST",                   
            url:  base_url+ "control_Livros/excluir_Livros",   
            data: {id: id},     
          }).done(function(data){
      
            console.log(data);
      
            if(data = true){
              console.log(data);
              bootbox.alert({
                message: "Livro Deletado!",
                size: 'small'
              });
              }else{
              bootbox.alert({
                message: "Erro ao Deletar livro!",
                size: 'small'
              });
            }
            tratarEvento();
          });
      }
    
    });
   }


// var listaDeLivros;
// var campoBusca = document.getElementById('texto');
// formData = new FormData();

// function tratarEvento(){
//     if(campoBusca.value.length ===0 || !campoBusca.value.trim()){
//         buscarTodosOsLivros();
//         return;
//     }else{
//          console.log(campoBusca.value);
//          buscarLivro(campoBusca.value);
//     }
// }


// function buscarTodosOsLivros() {
//   $.ajax({
//     type: "GET",         
//     url:  base_url+ "control_Livros/get_All_Livros",    // Metodo de buscar 
//   }).done(function(data){
//     var array = JSON.parse(data);
//     listaDeLivros = array;
//     preencherTabela(array);
//     //   console.log(str);
//     });

// }


// function buscarLivro(filtro) {
//   $.ajax({
//     type: "GET",                   
//     url:  base_url+ "control_Livros/get_Livro_Por_Titulo",    // Metodo de buscar 
//     data: {titulo: filtro},
    
//   }).done(function(result){
//     var array = JSON.parse(result);
//     listaDeLivros = array;
//     preencherTabela(array);
//   });
// }

// function limparTabela(){
//   var tabela = document.getElementById('tabelaLivros');
//   var linhas = tabela.rows;
  
//   for (var i = linhas.length-1; i > 0; i--){
//     tabela.deleteRow(i);
//   }
//   document.getElementById('tabelaLivros').style.display = 'none';

// }

//   function preencherTabela(array){
//       let tabela = document.getElementById('tabelaLivros');
//       limparTabela();
      
//       if( (array!= null) && array.length> 0){

//             tabela.style.display = 'block';
//             var cont=0;
//             for(var i=0; i< array.length; i++){                
//                 var tr = document.createElement('tr');

//                 cont+=1;
//                 var td_indice = document.createElement('td');
//                 td_indice.innerHTML = ""+cont;

//                 var td_genero = document.createElement('td');
//                 td_genero.innerHTML = array[i]['genero'];

//                 var td_titulo = document.createElement('td');
//                 td_titulo.innerHTML = array[i]['titulo'];

//                 var td_editora = document.createElement('td');
//                 td_editora.innerHTML = array[i]['editora'];

//                 var td_num_edicao = document.createElement('td');
//                 td_num_edicao.innerHTML = array[i]['numero_edicao'];

//                 var td_ano_publicacao = document.createElement('td');
//                 td_ano_publicacao.innerHTML = array[i]['ano_publicacao'];

//                 var td_num_exemplares = document.createElement('td');
//                 td_num_exemplares.innerHTML = array[i]['numero_exemplares'];

//                 var td_autor = document.createElement('td');
//                 td_autor.innerHTML = array[i]['autor'];

//                 var td_editar = document.createElement('td');
//                 var btEditar =  document.createElement('button');
//                 btEditar.innerHTML = 'Editar';
//                 td_editar.appendChild(btEditar);

//                 btEditar.setAttribute('onclick', "editarLivro("+i+")");  
//                 btEditar.classList.add('configButonSalvarEditar');
//                 btEditar.classList.add('bt_Editar');

//                 var td_excluir = document.createElement('td');
//                 var btExcluir =  document.createElement('button');

//                 btExcluir.innerHTML = 'Excluir';
//                 td_excluir.appendChild(btExcluir);
//                 btExcluir.setAttribute('onclick', "excluirLivro("+i+")");
//                 btExcluir.classList.add('configButonCancelarExcluir');
//                 btExcluir.classList.add('bt_Excluir');

//                 tr.appendChild(td_indice);
//                 tr.appendChild(td_titulo);
//                 tr.appendChild(td_genero);
//                 tr.appendChild(td_editora);
//                 tr.appendChild(td_autor);
//                 tr.appendChild(td_num_edicao);
//                 tr.appendChild(td_ano_publicacao);
//             //    tr.appendChild(td_num_exemplares);
//                 tr.appendChild(td_editar);
//                 tr.appendChild(td_excluir);
//                 tabela.appendChild(tr);
    
//             }
//       }else{
//         limparTabela();
//       }
//   }

//   function editarLivro(indiceArray){
//       console.log("Indice do array: "+indiceArray);
//       livro = listaDeLivros[indiceArray];
//       document.querySelector('#titulo').value = livro['titulo'];
//       document.querySelector('#editora').value = livro['editora'];
//       document.querySelector('#num_edicao').value = livro['numero_edicao'];
//       document.querySelector('#ano_publicacao').value = livro['ano_publicacao'];
//       document.querySelector('#num_exemplares').value = livro['numero_exemplares'];
//       document.querySelector('#autor').value = livro['autor'];
//       document.querySelector('#resenha').value = livro['resenha'];


//       document.querySelector('#form').style.display = 'block';

//       var entries = formData.entries();
//       for(var pair of entries ) {
//         formData.delete( pair[0] );
//       }

//       formData.append("id", livro['id']);
//   }      

//   function salvarLivroEditado(indice){

//     var editora = document.querySelector('#editora').value;
//     var titulo = document.querySelector('#titulo').value;
//     var numero_edicao = document.querySelector('#num_edicao').value;
//     var ano_publicacao = document.querySelector('#ano_publicacao').value;
//     var numero_exemplares = document.querySelector('#num_exemplares').value;
//     var autor = document.querySelector('#autor').value;
//     var resenha = document.querySelector('#resenha').value;


//     if(titulo == ""){
//       alert("Preencha O Campo Título");
//       return;
//     }else if(editora === ""){
//       alert("Preencha O Campo Editora");
//       return;
//     }else if(autor == ""){
//       alert("Preencha O Campo Autor");
//       return;
//     }else if(numero_edicao == ""){
//       alert("Preencha Número da Edição");
//       return;
//     }else if(ano_publicacao  == ""){
//       alert("Preencha O Campo Ano da Publicação");
//       return;
//     }else if(numero_exemplares == ""){
//       alert("Preencha O Campo Número de Exemplares");
//       return;
//     }else if(resenha == ""){
//       alert("Preencha O Campo Resenha");
//       return;
//     }
//     formData.append("titulo", titulo);
//     formData.append("editora", editora);
//     formData.append("num_edicao", numero_edicao );
//     formData.append("ano_publicacao", ano_publicacao);
//     formData.append("num_exemplares", numero_exemplares);
//     formData.append("resenha", resenha);

//     formData.append("autor", autor);

//     $.ajax({
//       type: "POST",                   
//       url:  base_url+ "control_Livros/editar_Livros",    // Metodo de buscar 
//       data: formData,
//       processData: false,
//       cache: false,
//       contentType: false
      
//     }).done(function(data){

//       if(data = true){
//         console.log(data);
//         bootbox.alert({
//           message: "Livro Alterado com Sucesso!",
//           size: 'small'
//         });
//         }else{
//         bootbox.alert({
//           message: "Erro ao alterar livro!",
//           size: 'small'
//         });
//       }
//       document.querySelector('#form').style.display = 'none';
//       tratarEvento();
//     });
//   }

//   function excluirLivro(indiceArray){
//     var livro = listaDeLivros[indiceArray];
//     var id= livro['id'];
//     console.log("Id no inicio: "+id);

//     bootbox.confirm("Deseja mesmo excluir este Livro? ", function(result){ 

//       if(result == true){
//           $.ajax({
//             type: "POST",                   
//             url:  base_url+ "control_Livros/excluir_Livros",   
//             data: {id: id},     
//           }).done(function(data){
      
//             console.log(data);
      
//             if(data = true){
//               console.log(data);
//               bootbox.alert({
//                 message: "Livro Deletado!",
//                 size: 'small'
//               });
//               }else{
//               bootbox.alert({
//                 message: "Erro ao Deletar livro!",
//                 size: 'small'
//               });
//             }
//             tratarEvento();
//           });
//       }
    
//     });
//    }
//   function fecharForm(){
//     document.querySelector('#form').style.display = 'none';
//   }

