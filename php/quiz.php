<?php 
include("config.php");

$perguntas = [
[
  "pergunta" => "Quanto espaço você tem disponivel em casa?",
  "opcoes" => ["Muito Espaço", "Espaço Moderado", "Pouco Espaço"]
],
[
  "pergunta" => "Quanto tempo livre você tem para se dedicar a um pet diariamente?",
  "opcoes" => ["Muito Tempo", "Tempo Moderado", "Pouco Tempo"],
],
[
  "pergunta" => "Você prefere um pet mais ativo ou mais tranquilo?",
  "opcoes" => ["Muito Ativo", "Moderamente Ativo", "Tranquilo"]
],
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/quiz.css">
  <title>Descubra seu tipo de pet</title>
</head>
<body>
  
<div class="quiz-container">
  <form action="resultado.php" method="post" id="quizForm">
    <div id="perguntas-container"></div>
    <button id="nextButton" type="Button" onclick="proximaPergunta()">Próxima</button>
    <button type="submitButton" id="submitButton" style="display: none;">Ver Resultado</button>
  </form>
</div>

  <script>
    const perguntas = <?php echo json_encode($perguntas) ?>;
    let perguntaAtual = 0;

    function mostrarPergunta() {
      const perguntaContainer =document.getElementById('perguntas-container');
      perguntasContainer.innerHTML = `
      <div class="pergunta">
      <h3>${perguntas[perguntaAtual].pergunta}</h3>
    ${perguntas[perguntaAtual].opcoes.map((opcao, index) => `
      <label>
      <input type="radio" name="resposta${perguntaAtual}" value="${opcao}" required>
      ${opcao}
      </label><br>
    `).join('')}
      </div>
      `;
    }

    function proximaPergunta() {
      if (document.querySelector(`input[name="resposta${perguntaAtual}"]checked`)) {
        perguntaAtual++;
        if (perguntaAtual < perguntas.lenght) {
          mostrarPergunta();
        } else {
          document.getElementById('nextButton').style.display = 'none';
          document.getElementById('submitButton').style.display = 'none';
        }
      } else {
        alert ('Por favor, selecione uma resposta.');
      }
    }

    mostrarPergunta();
  </script>
</body>
</html>