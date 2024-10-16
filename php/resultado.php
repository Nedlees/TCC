<?php 
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $respostas = $_POST;
  $contador_cachorro = 0;
  $contador_gato = 0;


foreach ($respostas as $respostas) {
  if ($respostas == 'Muito Ativo' || $respostas == 'Mutio Espaço' || $respostas == 'Muito Tempo') {
    $contador_cachorro++;
  } elseif ( $respostas == 'Pouco Espaço' || $respostas == 'Pouco Tempo' || $respostas == 'Tranquilo') {
    $contador_gato++;
  }
}

$tipo_pet='';
if ($contador_cachorro > $contador_gato) {
$tipo_pet = "Cachorro";
$imagem_pet = 'https://img.freepik.com/vetores-gratis/bonito-pug-dog-mordida-osso-ilustracao-do-icone-do-vetor-dos-desenhos-animados-conceito-de-icone-de-natureza-animal-isolado-premium_138676-7370.jpg?t=st=1729087281~exp=1729090881~hmac=54f34fc90aff434061dc7b5ffdbb419e6f7d4552d5ff97ec6f7e857a963285b0&w=826';
} elseif ($contador_gato > $contador_cachorro) {
  $tipo_pet = "Gato";
  $imagem_pet ='https://img.freepik.com/vetores-gratis/gato-bonito-sentado-ilustracao-em-vetor-icone-dos-desenhos-animados-conceito-de-icone-de-natureza-animal-isolado-de-vetor-premium-estilo-de-desenho-animado-plano_138676-4148.jpg?t=st=1729087216~exp=1729090816~hmac=c1df8659351048dc9b11676282e1e5aed59c84226dbbadfeb4398e218da80e22&w=826';
} else {
  $tipo_pet = "Empate entre Cachorro e Gato";
  $imagem_pet = 'https://img.freepik.com/vetores-gratis/gato-bonito-que-joga-com-ilustracao-do-icone-do-vetor-dos-desenhos-animados-do-cao-conceito-do-icone-da-natureza-animal-isolado-no-plano_138676-8574.jpg?t=st=1729087311~exp=1729090911~hmac=3d5c09a5df37dd32290527b52383c0f2db6a8c4b1009843127cc18510a03565e&w=826';
}
} else {
  header("Location: quiz.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/quiz.css">
  <title>Resultado</title>
</head>

<body>
  <div class="resultado-container">

    <a href="index.php" class="Back"><</a>
        <h1>Seu tipo de pet ideal é: <?php echo $tipo_pet ?></h1>
        <br>
        <?php if ($tipo_pet != 'Empate entre Cachorro e Gato') : ?>
            <img src="<?php echo $imagem_pet; ?>" alt="<?php echo $tipo_pet; ?>" style="width: 300px; height: auto; border-radius: 10px;">
        <?php else: ?>
            <img src="<?php echo $imagem_pet; ?>" alt="Empate" style="width: 300px; height: auto; border-radius: 10px;">
        <?php endif;
        ?>
        <a href="quiz.php" class="btn-reiniciar">Fazer o quiz Novamente</a>
  </div>

</body>

</html>