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
    <a href="index.php" class="Back"><</a>
      <h2>Descubra Qual pet é ideal para você</h2>
      <br>

      <div class="Linha"></div>

      <form action="resultado.php" method="post" id="quizForm">
        <div id="perguntas-container"></div>
        <div class="Linha"></div>
        <br>

        <button id="nextButton" type="Button" onclick="proximaPergunta()">Próxima</button>
        <button type="submitButton" id="submitButton" onclick="mostrarResultado()" style="display: none;">Ver
          Resultado</button>
      </form>
    </div>

    <script>
    const perguntas = <?php echo json_encode($perguntas) ?>;
    console.log(perguntas);

    let perguntaAtual = 0;

    function mostrarPergunta() {
      const perguntaContainer = document.getElementById('perguntas-container');
      perguntaContainer.innerHTML = `
        <div class="pergunta">
        <h3>${perguntas[perguntaAtual].pergunta}</h3>
        <br>
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
      const respostaSelecionada = document.querySelector(`input[name="resposta${perguntaAtual}"]:checked`);
      if (respostaSelecionada) {
        perguntaAtual++;

        if (perguntaAtual < perguntas.length) {
          mostrarPergunta();
        } else {
          document.getElementById('nextButton').style.display = 'none';
          document.getElementById('submitButton').style.display = 'block';
        }
      } else {
        alert('Por favor, selecione uma resposta.');
      }
    }

    function finalizarQuiz() {
      // Oculta o container do quiz e exibe o botão para ver o resultado
      document.getElementById('quiz-container').style.display = 'none';
      document.getElementById('submitButton').style.display = 'block';
    }

    function mostrarResultado() {
      // Aqui você pode adicionar a lógica para calcular e exibir o resultado final do quiz
      alert('Exibindo o resultado do quiz.');
    }

    mostrarPergunta();
    </script>
  </body>

  </html>