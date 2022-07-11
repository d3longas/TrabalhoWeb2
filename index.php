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
    <title>Portifólio Web</title>
    <?php
    require './vendor/autoload.php';
    $connection = new MongoDB\Client;

    $db = $connection->TrabalhoWeb;
    ?>
</head>

<body>

    <div id="corpo-main">
        <h1>Nos Conheça!</h1>
        <hr>
        <div id="lista_perfis" style="margin-top: 30px;">
            <?php
            $collection = $db->perfis;
            $cursor = $collection->find();
            $imagem_collection = $db->imagens;
            
            foreach ($cursor as $document) {
                    $imagem = $imagem_collection->findOne(array('nick' => $document['nick']));
                    if($imagem== null){
                        $imagem = $imagem_collection->findOne(array('nick' => 'Anon'));
                        $srcimage = $imagem["imagem"];
                    }
                    echo "
                    <div class='perfis'>
                    <a href='perfil.php?nick={$document["nick"]}'><img src='data:image/jpg;charset=utf8;base64,{$imagem["imagem"]}' class='imagem-redonda' alt='{$document["nick"]}'></a>
                    <h2>{$document["nome"]}</h2>
                    </div>
                    ";
                
            }
            ?>
        </div>

    </div>
    <footer>
        Todos os direitos reservados;
    </footer>
    <button id="dark" onclick="myFunction()">🌙</button>

</body>

</html>