<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/estilo.css">
    <script src="./JS/index.js"></script>
    <script src="https://kit.fontawesome.com/8388007d4a.js" crossorigin="anonymous"></script>
    
	<title>Portifólio Web</title>
	
</head>

<body>
  
<div id="corpo">
    
     
<div id="perfil" class="perfil">  
	<script>
        fetch('./JSON/pessoas.json')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                appendData(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
        function appendData(data) {
            
			//Adiciona caminho da foto
			var img = document.createElement("img");
			img.src = data[0].foto_perfil;
			img.alt = "Avatar";
			img.classList.add("img");
			document.getElementById('fotoperfil').appendChild(img);
			
			//Adiciona nome
			var h2 = document.createElement("h2");
			h2.classList.add = ("h2");
			h2.innerHTML = data[0].nome;
			document.getElementById("nome").appendChild(h2);

			//Adiciona ocupacao
			var ocupacao = document.getElementById("ocupacao");
			var ocupacaotexto = document.createTextNode(data[0].ocupacao);
			ocupacao.appendChild(ocupacaotexto);
			
			//Adiciona endereco
			var endereco = document.getElementById("endereco");
			var enderecotexto = document.createTextNode(data[0].endereco);
			endereco.appendChild(enderecotexto);	
			
			//Adiciona email	
			var email = document.getElementById("email");
			var emailtexto = document.createTextNode(data[0].email);
			email.appendChild(emailtexto);	
			
			//Adiciona endereco Github
			var git = document.getElementById("git");
            var a = document.createElement('a'); 
			var link = document.createTextNode("Github");
			a.appendChild(link); 
			a.title = "Link do github";        
            a.href = data[1].link;            
            git.appendChild(a); 
        }
    </script>  
	  <div id="fotoperfil"></div>  
	  <div id="nome"></div>
	  <p id="ocupacao"><em class="fa-solid fa-briefcase lista"></em></p>
	  <p id="endereco"><em class="fa-solid fa-house-chimney lista"></em></p>
	  <p id="email"><em class="fa-solid fa-envelope lista"></em></p>
      <hr>
      <h3><em class="fa-solid fa-laptop-code lista"></em>Linguagens mais utilizadas</h3>
      <em class="fa-brands fa-js linguagens"></em>
      <div class="progresso">
        <div class="progresso-js-pedro"></div><strong class ="dados">35%</strong>
      </div>
      <br>
      <em class="fa-brands fa-css3-alt linguagens"></em>
      <div class="progresso">
        <div class="progresso-css-pedro"></div><strong class ="dados">35%</strong>
      </div>
      <br>
      <em class="fa-brands fa-html5 linguagens"></em>
      <div class="progresso">
        <div class="progresso-html-pedro"></div><strong class ="dados">30%</strong>
      </div>
</div>

<div class="experiencias"> 
	<script>
        fetch('./JSON/exp_profissional.json')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                appendData_exp(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
        function appendData_exp(data) {
        
		//Adiciona exp_profissional_nome1	
			var exp = document.getElementById("exp1");
			var exptexto = document.createTextNode(data[2].xp);
			exp.appendChild(exptexto);
			
		//Adiciona data1
			var data1 = document.getElementById("data1");
			var data1text = document.createTextNode(""+data[2].data_inicio+" - "+data[2].data_termino);
			data1.appendChild(data1text);
        
		//Adiciona desc1
			var desc1 = document.getElementById("desc1");
			var data1text = document.createTextNode(data[2].descricao);
			desc1.appendChild(data1text);
			
		//Adiciona exp_profissional_nome2	
			var exp = document.getElementById("exp2");
			var exptexto = document.createTextNode(data[3].xp);
			exp.appendChild(exptexto);
			
		//Adiciona data2
			var data2 = document.getElementById("data2");
			var data2text = document.createTextNode(""+data[3].data_inicio+" - "+data[1].data_termino);
			data2.appendChild(data2text);
        
		//Adiciona desc2
			var desc2 = document.getElementById("desc2");
			var data2text = document.createTextNode(data[3].descricao);
			desc2.appendChild(data2text);
	
        }
    </script>
     <h1><em class="fa-solid fa-suitcase linguagens"></em>Experiências</h1>
      <div class="conteudo">
      <h2 id="exp1"><strong></strong></h2>
      <p id="data1" class="datas"><em class="fa fa-calendar lista"></em></p> 
      <p id="desc1" style="padding-left: 10px;"></p>
      </div>
	 <hr>
	  <div class="conteudo">
      <h2 id="exp2"><strong></strong></h2>
      <p id="data2" class="datas"><em class="fa fa-calendar lista"></em></p> 
      <p id="desc2" style="padding-left: 10px;"></p>
      </div>
</div>
<div class="escolaridade">
	<script>
        fetch('./JSON/escolaridade.json')
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                appendData_escolaridade(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
        function appendData_escolaridade(data) {
        
		//Adiciona escolaridade1	
			var escolaridade1 = document.getElementById("esc1");
			var escolaridadetexto1 = document.createTextNode(data[0].escolaridade);
			escolaridade1.appendChild(escolaridadetexto1);
			
		//Adiciona escolaridadedata1
			var escolaridadedata1 = document.getElementById("escdata1");
			var data1text = document.createTextNode(""+data[0].data_inicio+" - "+data[0].data_termino);
			escolaridadedata1.appendChild(data1text);
			
		//Adiciona escolaridade2	
			var escolaridade2 = document.getElementById("esc2");
			var escolaridadetexto2 = document.createTextNode(data[1].escolaridade);
			escolaridade2.appendChild(escolaridadetexto2);
			
		//Adiciona escolaridadedata2
			var escolaridadedata2 = document.getElementById("escdata2");
			var data2text = document.createTextNode(""+data[1].data_inicio+" - "+data[1].data_termino);
			escolaridadedata2.appendChild(data2text);
		
		//Adiciona escolaridade3	
			var escolaridade3 = document.getElementById("esc3");
			var escolaridadetexto3 = document.createTextNode(data[2].escolaridade);
			escolaridade3.appendChild(escolaridadetexto3);
			
		//Adiciona escolaridadedata3
			var escolaridadedata3 = document.getElementById("escdata3");
			var data3text = document.createTextNode(""+data[2].data_inicio+" - "+data[2].data_termino);
			escolaridadedata3.appendChild(data3text);
        }
    </script>
      <h1><em class="fa-solid fa-graduation-cap linguagens" ></em>Escolaridade</h1>
      
      <div class="conteudo">
        <h2 id="esc1"><strong></strong></h2>
        <p id="escdata1" class="datas"><em class="fa fa-calendar lista"></em></p>
      </div><hr>
      
      <div class="conteudo">
        <h2 id="esc2"><strong></strong></h2>
        <p id="escdata2" class="datas"><em class="fa fa-calendar lista"></em></p>
      </div><hr>
      
      <div class="conteudo">
        <h2 id="esc3"><strong></strong></h2>
        <p id="escdata3" class="datas"><em class="fa fa-calendar lista"></em></p>
      </div><hr>
    </div>

</div>
<footer>
    Todos os direitos reservados.
</footer>
    <button id="dark" onclick="myFunction()">🌙</button>
    <button id="proximo" onclick="location.href = 'arthur.php?nick=D3longas'">➡</button>
</body>
</html>