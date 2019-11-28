/**
  * Função para criar um objeto XMLHTTPRequest
  */
 function CriaRequest() {
     try{
         request = new XMLHttpRequest();
     }catch (IEAtual){

         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");
         }catch(IEAntigo){

             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(falha){
                 request = false;
             }
         }
     }

     if (!request)
         alert("Seu Navegador não suporta Ajax :(");
     else
         return request;
 }

 /**
  * Função para enviar os dados
  */
 function getDados() {

     // Declaração de Variáveis
     var pesquisa   = document.getElementById("pesquisa").value;
     var resultado  = document.getElementById("resultado");
     var xmlreq     = CriaRequest();

     // Exibi a imagem de progresso
     resultado.innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>';

     // Iniciar uma requisição
     xmlreq.open("GET", "contatoServer.php?palavra=" + pesquisa, true);

     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 resultado.innerHTML = xmlreq.responseText;
             }else{
                 resultado.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }
