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
    <?php
    require './vendor/autoload.php';
    $connection = new MongoDB\Client;

    $db = $connection->TrabalhoWeb;
    ?>
</head>

<body>

    <div id="navbar">
        <button class="navbar_button">
            Login
        </button>
        <a href="fileupload.php"><button class="navbar_button">
            Cadastro
        </button></a>
        
    </div>
    <div id="corpo">


        <div id="perfil" class="perfil">

            <div id="fotoperfil">
            <?php
            $collection = $db->imagens;
            $cursor = $collection->findOne(array('nick' => $_GET['nick']));
                if($cursor== null){
                    $cursor = $collection->findOne(array('nick' => 'Anon'));
                    $srcimage = $cursor["imagem"];
                }
                echo "
                <img src='data:image/jpg;charset=utf8;base64,{$cursor["imagem"]}' class='img' alt='{$_GET["nick"]}'></a>
                ";
                
            ?>
            </div>
            <div>
                <h2 id="nome"></h2>
            </div>
            <p id="ocupacao"><em class="fa-solid fa-briefcase lista"></em></p>
            <p id="endereco"><em class="fa-solid fa-house-chimney lista"></em></p>
            <p id="email"><em class="fa-solid fa-envelope lista"></em></p>
            <p><em class="fa-brands fa-github lista"></em><a id="git" title="Link do github" target="_blank" class="link">Github</a></p>
            <hr>
            <h3><em class="fa-solid fa-laptop-code lista"></em>Linguagens mais utilizadas</h3>
            <em class="fa-brands fa-js linguagens"></em>
            <div class="progresso">
                <div class="progresso-js-arthur"></div><strong class="dados">4.8%</strong>
            </div>
            <br>
            <em class="fa-brands fa-css3-alt linguagens"></em>
            <div class="progresso">
                <div class="progresso-css-arthur"></div><strong class="dados">45.1%</strong>
            </div>
            <br>
            <em class="fa-brands fa-html5 linguagens"></em>
            <div class="progresso">
                <div class="progresso-html-arthur"></div><strong class="dados">50.1%</strong>
            </div>
            <script>
                function perfil() {
                    var ocupacao = document.getElementById("ocupacao");
                    var nome = document.getElementById("nome");
                    var endereco = document.getElementById("endereco");
                    var email = document.getElementById("email");
                    var git = document.getElementById("git");

                    <?php

                    $nick = $_GET["nick"];
                    $collection = $db->perfis;
                    $document = $collection->findOne(array('nick' => $nick));
                    echo "ocupacao.innerHTML += '" . $document["ocupacao"] . "';";
                    echo "nome.innerHTML += '" . $document["nome"] . "';";
                    echo "endereco.innerHTML += '" . $document["endereco"] . "';";
                    echo "email.innerHTML += '" . $document["email"] . "';";
                    echo "git.href += '" . $document["link"] . "';";
                    ?>
                }
                perfil();
            </script>
        </div>

        <div class="experiencias">
            <h1><em class="fa-solid fa-suitcase linguagens"></em>Experiências</h1>

            <div id="experiencias">
                <?php

                $nick = $_GET["nick"];
                $collection = $db->experiencias;
                $cursor = $collection->find(array('nick' => $nick));
                foreach ($cursor as $document) {
                    echo "
                        <div class='conteudo'>
                        <h2><strong>{$document["experiencia"]}</strong></h2>
                        <p class='datas'><em class='fa fa-calendar lista'></em>{$document["data_inicio"]} - {$document["data_termino"]} </p>
                        <p style='padding-left: 10px;'>{$document["descricao"]}</p>
                        </div>
                        <hr>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="escolaridade">

            <h1><em class="fa-solid fa-graduation-cap linguagens"></em>Escolaridade</h1>
            <div id="escolaridades">

                <?php

                $nick = $_GET["nick"];
                $collection = $db->escolaridade;
                $cursor = $collection->find(array('nick' => $nick));
                foreach ($cursor as $document) {
                    echo "
                            <div class='conteudo'>
                            <h2><strong>{$document["escolaridade"]}</strong></h2>
                            <p class='datas'><em class='fa fa-calendar lista'></em>{$document["data_inicio"]} - {$document["data_termino"]} </p>
                            </div>
                            <hr>
                        ";
                }
                ?>
            </div>
        </div>

    </div>
    <footer>
        Todos os direitos reservados.
    </footer>
    <button id="dark" onclick="myFunction()">🌙</button>
</body>

</html>