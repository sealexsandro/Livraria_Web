
$('.carousel').carousel({
  pause: true,
  interval: false
});

var contador= 0;

(function(){
  var input = document.getElementById("fotos");
  var div_carousel = document.getElementById('carousel-imagens');

  function exibirImagens(source){
    // var list = document.getElementById();
    console.log("Chegou na função, valor do contador: "+contador);

    div = document.createElement("div");
    img = document.createElement("img");
    img.src= source;
    img.classList.add('redimensionarImagem');


    div.classList.add('carousel-item');
    if(contador ==0){
      div.classList.add('active');
    }
    div.appendChild(img);
    div_carousel.appendChild(div);
  }

  input.addEventListener('change', function(evt){
    limparCarousel();
    document.querySelector('#passarImagem').style.display = 'block';

    var i= 0, len= this.files.length, img, render, file;

    for(; i<len; i++){
      file = this.files[i];
      if(!!file.type.match(/image.*/)){

        if(window.FileReader){
          render = new FileReader();
          render.onloadend = function(e){
            
            exibirImagens(e.target.result, file.fileName);
            contador++;
          };
          render.readAsDataURL(file);
        }
      }
    }

  }, false);

}());

function limparCarousel(){
  document.querySelector('#passarImagem').style.display = 'none';
  $("#carousel-imagens").empty();
  contador= 0;
}

function salvarLivro(){
    formData = new FormData();

    var editora = document.querySelector('#editora').value;
    var titulo = document.querySelector('#titulo').value;
    var numero_edicao = document.querySelector('#num_edicao').value;
    var ano_publicacao = document.querySelector('#ano_publicacao').value;
    var numero_exemplares = document.querySelector('#num_exemplares').value;
    var autor = document.querySelector('#autor').value;  
    var genero= document.querySelector('#genero').value; 
    var textarea = document.querySelector('#textarea').value;
    var fotos= document.querySelector('#fotos');
    var cont = 0;

    // for (var i = 0; i < files.length; i++) {
    //   var file = files[i];
    //   console.log("Objetos: "+file);
    //   formData.append('photos[]', file);

    //   cont+=1;
    // }
   
    

    // for (var i = 0; i < files.length; i++) {
    //   var file = files[i];
    
    //   // Check the file type.
    //   if (!file.type.match('image.*')) {
    //     continue;
    //   }
    
    //   // Add the file to the request.
    //   formData.append('photos[]', file, file.name);
    // }

      // console.log("Abrindo formData: "+formData.get("fotos"))
    //  var cont = files.size;
      

    if(titulo == ""){    
      exibirAlerta("Preencha O Campo Título!");
      return;
    }else if(editora === ""){
      exibirAlerta("Preencha O Campo Editora");
      return;
    }else if(autor == ""){
      exibirAlerta("Preencha O Campo Autor");
      return;
    }else if(numero_edicao == ""){
      exibirAlerta("Preencha O Campo Número da Edição");
      return;
    }else if(ano_publicacao.length ==0){
      exibirAlerta("Preencha O Campo Ano da Publicação");
      return;
    }else if(numero_exemplares == ""){
      exibirAlerta("Preencha O Campo Número de Exemplares");
      return;
    }else if(genero == ""){
      exibirAlerta("Preencha O Campo Gênero");
      return;
    }else if(textarea == ""){
      exibirAlerta("Preencha O Campo Resenha do Livro");
      return;
    }

    const files = document.querySelector('[type=file]').files;
    for (let i = 0; i < files.length; i++) {
      let file = files[i]
      console.log("Objetos: "+file);
      cont++;
      formData.append('fotos[]', file)
    }

    if(cont <= 0){
      exibirAlerta("Insira alguma imagem do Livro");
      return;     
    }
    formData.append("titulo", titulo);
    formData.append("editora", editora);
    formData.append("num_edicao", numero_edicao );
    formData.append("ano_publicacao", ano_publicacao);
    formData.append("num_exemplares", numero_exemplares);
    formData.append("autor", autor);
    formData.append("genero", genero);
    formData.append("resenha", textarea);


    $.ajax({
      type: "POST",                   
      url:  base_url+ "control_Livros/cadastrar_Livros",    // Metodo para cadastro
      data: formData,
      processData: false,
      cache: false,
      contentType: false
      
    }).done(function(data){
  
      if(data = true){
        console.log(data);
        bootbox.alert({
          message: "Livro Salvo com Sucesso!",
          size: 'small',
          centerVertical: true
        });

        document.querySelector('#editora').value = "";
        document.querySelector('#titulo').value= "";
        document.querySelector('#num_edicao').value= "";
        document.querySelector('#ano_publicacao').value= "";
        document.querySelector('#num_exemplares').value= "";
        document.querySelector('#autor').value= ""; 
        document.querySelector('#genero').value =""; 
        document.querySelector('#textarea').value ="";
        limparCarousel();

        }else{
        bootbox.alert({
          message: "Erro ao salvar livro!",
          size: 'small'
        });
      }
    });
}

function exibirAlerta(mensagem){

  if(mensagem != ""){
    bootbox.alert({
      message: mensagem,
      centerVertical: true
    });
  }

}