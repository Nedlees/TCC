<?php 
include "config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Ônibus</title>
  <link rel="stylesheet" href="../css/blog_onibus.css">
</head>

<body>

  <header>
    <?php 
  include "navbar.php";
  ?>
  </header>

  <a href="blog.php" class="Back">Voltar</a>

  <h1>Lei determina regras para transporte de pets nos ônibus de BH; confira</h1>

  <div class="container-blog">

    <img src="https://f.i.uol.com.br/fotografia/2013/03/13/253125-970x600-1.jpeg" alt="">

    <p class="texto">
      Belo Horizonte estabeleceu novas regras para o transporte de animais de estimação de pequeno porte nos ônibus
      municipais. A lei foi publicada no Diário Oficial de sábado (24) e atualizada na edição de terça (27).
      <br><br>
      O texto autoriza o transporte de animais de <b> até 12 quilos</b>, desde que algumas condições sejam seguidas.
    </p>
    <li class="lista">
      Cada passageiro poderá transportar <b>um único animal</b> por viagem;
    </li>
    <li class="lista">
      O tutor deverá realizar <b>o pagamento da tarifa regular</b> para o assento ocupado pelo pet;
    </li>
    <li class="lista">
      O tutor deverá <b>portar o certificado de vacinação</b> emitido por um veterinário registrado no Conselho Regional de
      Medicina Veterinária (CRMV);
    </li>
    <li class="lista">
      O transporte deverá ser feito com <b>o uso de uma caixa adequada</b>, feita de material resistente e à prova de
      vazamentos, com tamanho compatível com a espécie;
    </li>
    <li class="lista">
      As caixas devem ter até 41cm de comprimento, 36cm de largura e 33cm de altura;
    </li>
    <li class="lista">
      É proibido o uso de caixas de papelão ou o transporte do animal solto;
    </li>
    <li class="lista">
      Os animais não podem ser transportados em <b>horário de pico </b>(das 5h às 8h e das 16h às 19h dos dias úteis e das 6h
      às 9h e das 11h às 13h dos sábados).
    </li>
<br>
    <p class="texto">
    O transporte de aves domésticas, exóticas e silvestres está proibido, pelo risco de transmissão de doenças.
<br><br>
Além disso, nenhum animal pode ser transportados junto com alimentos, água ou dejetos.
<br><br>
Caso o pet precise se alimentar ou a caixa de transporte necessite de limpeza durante o trajeto, o tutor deverá descer na próxima parada.
<br><br>
Importante destacar que cães-guia são isentos de algumas dessas exigências, como o uso da caixa de transporte.
<br><br>
A lei também proíbe o transporte de animais que possam comprometer a segurança ou o conforto dos passageiros, como espécies consideradas ferozes, peçonhentas ou com problemas de saúde. Os tutores são totalmente responsáveis por quaisquer danos causados.
    </p>

  </div>

  <p class="referencia">Referência: <a href="https://g1.globo.com/mg/minas-gerais/noticia/2024/08/24/lei-regras-transporte-pets-animais-onibus-bh.ghtml">g1.globo.com</a></p>

  <footer>
    <?php 
  include "footer.php";
  ?>
  </footer>

</body>

</html>