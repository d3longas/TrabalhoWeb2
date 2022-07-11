<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>

<form action="fileupload.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>
</form>

<?php

require './vendor/autoload.php';
//conexao com o mongodb
$connection = new MongoDB\Client;

if (isset($_POST['Submit1'])) {

    $filepath = "images/" . $_FILES["file"]["name"];
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
    //imprime a imagem enviada
    //echo "<img src=".$filepath." height=200 width=300 />";
    $databaseMongo = $connection->selectDatabase('TrabalhoWeb');
    $imagens = $databaseMongo->selectCollection("imagens");
    $contents = base64_encode(file_get_contents($filepath));

    //echo $contents;
    //echo "<img src='data:image/jpg;charset=utf8;base64,$contents'/>";
    
    $document = array(
        "nick" => "Europh",
        "type" => "jpg",
        "imagem" => $contents,
    );
    if ($imagens->insertOne($document)) {
        return true;
    }
    return false;
} else {
    echo "Erro ao enviar a imagem";
    }
}
//mostrar imagem
$databaseMongo1 = $connection->selectDatabase('TrabalhoWeb');
$imagens1 = $databaseMongo1->selectCollection("imagens");
$cursor = $imagens1->findOne(array('nick' => 'Europh'));

//echo $cursor["imagem"] . "\n";

//$codigo = "Binary('QzpceGFtcHBcdG1wXHBocDYyMjMudG1w', 0)";

echo "<img src='data:image/jpg;charset=utf8;base64,{$cursor["imagem"]}'/>";

//echo "<img src=data:image/jpg;charset=utf8;base64," . $codigo . " />";


?>

</body>
</html>