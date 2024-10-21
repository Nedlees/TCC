<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/blog.css">
    <title>Blog</title>
</head>
<body>

<header>
    <?php include 'navbar.php' ?>
</header>

<main>
    <div class="banner">
        <br>
        <h1>Bem-vindo ao Blog: Mundo dos pets</h1>
        <br>
        <p>Descubra dicas, notícias e informações sobre o mundo dos pets!</p>
    </div>
</main>
<h1 class="titulob">Destaques</h1>

<div class="carousel slide"
id="carouselDestaques"
data-bs-wrap="true"
data-bs-ride="carousel">

    <div class="carousel-inner">
        
        <div class="carousel-item active">
            <img src="../Imagens/Gato Pãozinho.png" class="w-100" alt="Gato amassando pão">
            <div class="carousel-caption">
                <h5>Por que gatos 'amassam pãozinho'? Entenda o comportamento do seu felino.</h5>
                <p>Quem tem um felino em casa provavelmente já viu seu gato amassando pãozinho...</p>
                <a href="blog_ansiedade.php" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../Imagens/dogblog.jpg" class="w-100" alt="cachorro com papel higiênico">
            <div class="carousel-caption">
                <h5>Como lidar com um cachorro com ansiedade? Entenda as causas e como ajudar.</h5>
                <p>Você já ouviu falar em cachorro com ansiedade? O quadro pode ser entendido como um distúrbio...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/Tortuga.png" class="w-100" alt="tartaruga nadando">
            <div class="carousel-caption">
                <h5>Conheça as tartarugas domésticas: Curiosidades sobre esses animais casca-grossa.</h5>
                <p>Se você quer um animal dócil e bem tranquilo para se ter em casa, a tartaruga doméstica é uma ótima escolha...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/fogo2.jpg" class="w-100" alt="cachorro assustado">
            <div class="carousel-caption">
                <h5>Animais e fogos de artifício: como lidar com o medo dos pets nessa época do ano.</h5>
                <p>O fim de ano é um momento de alegria e comemoração, porém, isso é para os humanos, que em grande
                parte...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" 
    type="button"
    data-bs-target="#carouselDestaques"
    data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next"
    type="button"
    data-bs-target="#carouselDestaques"
    data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
<br>
    <div class="carousel-indicators">
        <button type="button" class="active"
        data-bs-target="#carouselDestaques"
        data-bs-slide-to="0"></button>

        <button type="button"
        data-bs-target="#carouselDestaques"
        data-bs-slide-to="1"></button>

        <button type="button"
        data-bs-target="#carouselDestaques"
        data-bs-slide-to="2"></button>

        <button type="button"
        data-bs-target="#carouselDestaques"
        data-bs-slide-to="3"></button>
    </div>

</div>

<h1 class="titulob">Curiosidades</h1>

<div class="carousel slide"
id="carouselCuriosidades"
data-bs-wrap="true"
data-bs-ride="carousel">

    <div class="carousel-inner">
        
        <div class="carousel-item active">
        <img src="../Imagens/porqui.jfif" alt="Porquinho da India" class="w-100">
            <div class="carousel-caption">
                <h5>Porquinho da Índia: 12 Curiosidades que você deveria saber sobre esse bichinho.</h5>
                <p>Porquinho da Índia é um animal dócil, extremamente carinhoso e, que é um tanto quanto tímido em algumas situações...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../Imagens/cablog.jfif" class="w-100">
            <div class="carousel-caption">
                <h5>Por que os cachorros lambem os donos? Será mesmo que é uma demonstração de carinho?</h5>
                <p>Se você é tutor de um cãozinho, sabe que ele adora dar “lambeijos”. Mas, por que cachorros lambem os donos?...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/cavalo.jfif" class="w-100">
            <div class="carousel-caption">
                <h5>Por que os cavalos relincham? Saiba como interpretar os sons emitidos pelos cavalos.</h5>
                <p>Não são apenas os humanos que fazem uso das cordas vocais e dos músculos faciais para transmitir mensagens...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" 
    type="button"
    data-bs-target="#carouselCuriosidades"
    data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next"
    type="button"
    data-bs-target="#carouselCuriosidades"
    data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
<br>
    <div class="carousel-indicators">
        <button type="button" class="active"
        data-bs-target="#carouselCuriosidades"
        data-bs-slide-to="0"></button>

        <button type="button"
        data-bs-target="#carouselCuriosidades"
        data-bs-slide-to="1"></button>

        <button type="button"
        data-bs-target="#carouselCuriosidades"
        data-bs-slide-to="2"></button>
    </div>

</div>

<h1 class="titulob">Notícias</h1>

<div class="carousel slide"
id="carouselNoticias"
data-bs-wrap="true"
data-bs-ride="carousel">

    <div class="carousel-inner">
        
        <div class="carousel-item active">
            <img src="../Imagens/notdog.jpg" class="w-100">
            <div class="carousel-caption">
            <h5>Crimes contra cães e gatos podem ter multa mínima de R$ 10 mil; Câmara debate.</h5>
                <p>De acordo com o deputado Célio Studart, a Lei Sansão definiu em 2020 que os crimes contra cães e gatos serão punidos...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../Imagens/onibus.jpeg" class="w-100">
            <div class="carousel-caption">
            <h5>Câmara de BH aprova projeto que libera transporte de animais em ônibus da capital.</h5>
                <p>Segundo a Casa, projeto está em fase de redação final, e vai à sanção do prefeito Fuad Noman(PSD) ...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/carroagem.jpg" class="w-100">
            <div class="carousel-caption">
            <h5>Em Bruxelas, carruagens elétricas substituem o uso de cavalos</h5>
                <p>Operador de carruagens em Bruxelas troca cavalos por veículos elétricos, refletindo uma mudança global...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/brasileira.jpg" class="w-100">
            <div class="carousel-caption">
            <h5>Brasileira ganha prêmio por projeto que propõe substituir animais em teste de cosmético.</h5>
            <p>A pesquisa de Lauren demonstrou que as células-tronco dentárias podem ser usadas para identificar substâncias...</p>
                <a href="#" class="buttonb">Leia mais</a>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" 
    type="button"
    data-bs-target="#carouselNoticias"
    data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next"
    type="button"
    data-bs-target="#carouselNoticias"
    data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
<br>
    <div class="carousel-indicators">
        <button type="button" class="active"
        data-bs-target="#carouselNoticias"
        data-bs-slide-to="0"></button>

        <button type="button"
        data-bs-target="#carouselNoticias"
        data-bs-slide-to="1"></button>

        <button type="button"
        data-bs-target="#carouselNoticias"
        data-bs-slide-to="2"></button>

        <button type="button"
        data-bs-target="#carouselNoticias"
        data-bs-slide-to="3"></button>
    </div>

</div>

<footer>
    <?php include 'footer.php';?>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>