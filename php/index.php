<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetFinder</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
    <header>
        <?php include '../php/navbar.php' ?>
    </header>

    <div class="container-frase">
        <div class="Frase">
            <p>Construa memórias<b class="Cor"> Inesquecíveis</b>
                <b class="Cor">Adote </b>um animal e
                Compartilhe <b class="Cor">momentos Felizes</b>
            </p>
        </div>
        <div class="gatinho">
            <img src="../Imagens/cat.jpeg ">
        </div>
    </div>

    <!-- Cards de adoção -->
     
    <section class="adocao">
        <h1>Disponíveis Para Adoção</h1>
        <div class="animais">
            <div class="animal">
                <div class="imagem-animal">
                    <img src="../Imagens/dog1.jpg" alt="Pipoca cachorro">
                </div>
                <div class="info-animal">
                    <h2>Pipoca</h2>
                    <p>Macho | 6 anos | Porte Médio | Castrado</p>
                    <button><b>Ver</b></button>
                </div>
            </div>
            <div class="animal">
                <div class="imagem-animal">
                    <img src="../Imagens/Antonio Carangueijo.jpg" alt="Gato Miguel">
                </div>
                <div class="info-animal">
                    <h2>Antônio Caranguejo</h2>
                    <p>Macho | 7 anos | Porte Médio | Castrado</p>
                    <button onclick="window.location.href='detalhes_pet.php?id=1'"><b>Ver</b></button>
                </div>
            </div>
            <div class="animal">
                <div class="imagem-animal">
                    <img src="../Imagens/Neemiasb.jpg" alt="Neemias Black Hamster">
                </div>
                <div class="info-animal">
                    <h2>Neemias Black</h2>
                    <p>Macho | 5 anos | Porte Médio | Castrado</p>
                    <button><b>Ver</b></button>
                </div>
            </div>
            <div class="animal">
                <div class="imagem-animal">
                    <img src="../Imagens/anny.jpg" alt="Anny Cookie">
                </div>
                <div class="info-animal">
                    <h2>Anny Cookie</h2>
                    <p>fêmea | 2 anos | Porte Médio | Castrado</p>
                    <button><b>Ver</b></button>
                </div>
            </div>
        </div>
        <br>
        <div class="container-button">
            <button class="veja-mais" onclick="window.location.href='adocao.php'">Mais...</button>
        </div>

    </section>

    <!--ajuda-->
    <div class="background">
        <div class="blue-background">
            <h1 class="blue-title">Ajude o Petfinder</h1>
        </div>

        <div class="cont">
            <div class="box">
                <h2>Doação</h2>
                <p>Faça sua doação para ajudar nossos animais!</p>
                <a href="doacoes.php" class="doar">Doar Agora</a>
                <div class="image-placeholder">
                    <img src="../Imagens/doar.png" alt="">
                </div>
            </div>

            <div class="box">
                <h2>Adote</h2>
                <p>Conheça nossos animais disponíveis para adoção.</p>
                <a href="#" class="doar">Adotar Agora</a>
                <div class="image-placeholder">
                    <img src="../Imagens/adotar.png" alt="">
                </div>
            </div>

            <div class="box">
                <h2>Sobre nós</h2>
                <p>Venha conhecer o trabalho do Petfinder.</p>
                <a href="sobrenos.php" class="doar">Conhecer agora</a>
                <div class="image-placeholder">
                    <img src="../Imagens/sobre.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--Blog-->
    <section class="blog">
        <h1>Blog: Mundo dos pets</h1>
        <div class="materias">
            <div class="materia">
                <div class="imagem-mat">
                    <img src="../Imagens/gatoblog.png" alt="Por que gatos 'amassam pãozinho'?">
                </div>
                <div class="info-mat">
                    <h2>Por que gatos 'amassam pãozinho'? Entenda o comportamento do seu felino</h2>
                    <button><a href="blog_paozinho.php">Ver</a></button>
                </div>
            </div>
            <div class="materia">
                <div class="imagem-mat">
                    <img src="../Imagens/blogcac.jpg" alt="Ansiedade em cachorros">
                </div>
                <div class="info-mat">
                    <h2>Como lidar com um cachorro com ansiedade? Entenda as causas e como ajudar. </h2>
                    <button><a href="blog_ansiedade.php">Ver</a></button>
                </div>
            </div>
            <div class="materia">
                <div class="imagem-mat">
                    <img src="../Imagens/tartu.jpg" alt="Curiosidade das tartarugas">
                </div>
                <div class="info-mat">
                    <h2> Conheça as tartarugas domésticas: Curiosidades sobre esses animais casca-grossa.</h2>
                    <button><a href="blog_tartaruga.php">Ver</a></button>
                </div>
            </div>
            <div class="materia">
                <div class="imagem-mat">
                    <img src="../Imagens/fogo.jpg"
                        alt="Animais e fogos de artifício: como lidar com o medo dos pets na virada do ano">
                </div>
                <div class="info-mat">
                    <h2>Animais e fogos de artifício: como lidar com o medo dos pets nessa época do ano. </h2>

                    <button><a href=""></a></button>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <button class="veja-mais">Mais...</button>
    </section>
    <!--Quiz-->
    <div class="containerq">
        <div class="cardd">
            <h2>Participe do Quiz!</h2><br>
            <p>Está em dúvida em qual animalzinho escolher? Faça o teste e descubra qual se parece mais com você! </p>
            <a href="quiz.php" class="btn-quiz">Começar Quiz</a><br><br>
            <img src="../Imagens/quizi.png" alt="" width="220px" id="quiz"><br>
        </div>
    </div>
    <br>
    <br>
    <!--FAQ-->
    <div class="faq-container">
        <h1>Perguntas Frequentes</h1>
        <div class="faq-item">
            <h2 class="faq-question">Como ajudar o Petfinder?</h2>
            <p class="faq-answer">Temos a página "doações" que você pode doar quantias em dinheiro ou entrar em contato
                conosco caso queira doar casinhas, brinquedos, etc.</p>
        </div>
        <div class="faq-item">
            <h2 class="faq-question">Como o Petfinder ajuda os animais?</h2>
            <p class="faq-answer">O petfinder direciona todas as doações para ONGS e instituições com todo carinho e
                amor.</p>
        </div>
        <div class="faq-item">
            <h2 class="faq-question">Não posso mais ficar com o animal adotado, o que fazer?</h2>
            <p class="faq-answer">Os animais adotados podem ser devolvidos ao abrigo até 30 dias da data da adoção, por
                qualquer motivo. Passando desse prazo, não aceitamos a devolução, mas apoiamos o tutor nas ações de
                divulgação para que uma nova família seja identificada. Caso o tutor faça a doação para outra pessoa, é
                obrigado no termo de adoção a comunicar a entidade e passar os dados e contato do novo tutor para que
                seja atualizado no sistema.</p>
        </div>
    </div>
    <script>
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const faqItem = question.parentElement;
            faqItem.classList.toggle('active');
        });
    });
    </script>
    <!--RODAPÉ-->
    <footer>
        <?php include 'footer.php';?>
    </footer>

</html>