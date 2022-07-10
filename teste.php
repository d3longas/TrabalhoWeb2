<?php
    require './vendor/autoload.php';
    $connection = new MongoDB\Client;

    $db = $connection->TrabalhoWeb;

    $collection = $db->perfis;
    $cursor = $collection->findOne(array('nick' => 'D3longas'));

    echo $cursor["nick"] . "\n";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function imagem(){
            var arquivo = document.getElementById("imagem");
            console.log(arquivo.value);
        }
    </script>
</head>
<body>
    <br>
        <input type="file" id="imagem"><br>
        <button onclick="imagem()">Enviar</button>
</body>
</html>