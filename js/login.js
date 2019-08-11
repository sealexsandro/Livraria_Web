
function logar(){
    let login = document.getElementById('login').value;
    let senha = document.getElementById('senha').value;

    if(login.trim().length > 0 && senha.trim().length > 0){
        noneErr("erro");
       


         document.getElementById('load').style.display = 'inline-block';

         var timeout;   
         timeout = setTimeout(function () { // quando o timer for disparado...
          
          }, 5000);
          clearTimeout(timeout); 


         isLoginCorreto(login, senha);       
	

        //validar login e senha
    }else{
        alertarCampoVazio("erro");
    }
}

function alertarCampoVazio(id){
    document.getElementById(id).style.display = "block";
}

function noneErr(id){
    document.getElementById(id).style.display = "none";
}

function isLoginCorreto(login, senha){

    let formData = new FormData();
    formData.append("usuario", login);
    formData.append("senha", senha);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      
        if (this.readyState == 4 && this.status == 200) {
           let texto = this.responseText;
        //   console.log(texto);
        //    alert(texto);

          if(texto!= 0){
          //  console.log(texto);

             document.getElementById('load').style.display = "none";

             window.location.replace (texto); 
          }else{
            alert("Login ou Senha Incorreta");
            document.getElementById('load').style.display = "none";

          }
        }

    };

    xhttp.open("POST","verificar", true);
    xhttp.send(formData);
}

function cadastrarUsuario(){
    let login = document.getElementById('login').value;
    let senha = document.getElementById('senha').value;

    let formData = new FormData();
    formData.append("usuario", login);
    formData.append("senha", senha);

    $.ajax({
        type: "POST",                   
        url:  base_url+ "autenticacao/cadastrarUsuario",    // Metodo para cadastro
        data: formData,
        processData: false,
        cache: false,
        contentType: false
        
      }).done(function(data){

        console.log(data);
    
        // if(data = true){
        //   console.log(data);
        //   bootbox.alert({
        //     message: "Livro Salvo com Sucesso!",
        //     size: 'small',
        //     centerVertical: true
        //   });
        //   }

        if((data.length>0) && data == "Login_Repetido"){
            alert("Login já existe tente outro Login");
            document.getElementById('load').style.display = "none";
        }else{
            alert("Usuário Cadastrado Com Sucesso");

            document.getElementById('load').style.display = "none";
            window.location.replace (data); 
        }
      });
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
      
    //     if (this.readyState == 4 && this.status == 200) {
    //        let texto = this.responseText;
         
    //        alert(texto);
    //         // if(texto == "Login_Repetido"){
    //         //     alert("Login já existe tente outro Login");
    //         //     document.getElementById('load').style.display = "none";
    //         // }else{
    //         //  alert("Usuário Cadastrado Com Sucesso");

    //         //  document.getElementById('load').style.display = "none";
    //         //  window.location.replace (texto); 
    //         // }
         
    //     }

    // };

    // xhttp.open("POST","cadastrarUsuario", true);
    // xhttp.send(formData);
}