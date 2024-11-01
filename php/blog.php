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
                <h5>Por que gatos 'amassam pãozinho'? <br> Entenda o comportamento do seu felino.</h5>
                <p>Quem tem um felino em casa provavelmente <br> já viu seu gato amassando pãozinho...</p>
                <br>
                <a href="blog_paozinho.php" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../Imagens/dogblog.jpg" class="w-100" alt="cachorro com papel higiênico">
            <div class="carousel-caption">
                <h5>Como lidar com um cachorro com ansiedade? <br> Entenda as causas e como ajudar.</h5>
                <p>Você já ouviu falar em cachorro com ansiedade? <br> O quadro pode ser entendido como um distúrbio...</p>
                <br>
                <a href="blog_ansiedade.php" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/Tortuga.png" class="w-100" alt="tartaruga nadando">
            <div class="carousel-caption">
                <h5>tartarugas domésticas: Curiosidades sobre esses animais casca-grossa.</h5>
                <p>Se você quer um animal dócil e bem tranquilo <br> para se ter em casa, a tartaruga doméstica é uma ótima escolha...</p>
                <br>
                <a href="Blog_tartaruga.php" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="../Imagens/fogo2.jpg" class="w-100" alt="cachorro assustado">
            <div class="carousel-caption">
                <h5>Animais e fogos de artifício: como lidar com o medo dos pets</h5>
                <p>O fim de ano é um momento de alegria e comemoração, porém, isso é para os humanos, que em grande
                parte...</p>
                <br>
                <a href="blog_fogos.php" class="buttonb">Leia mais</a>
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
        <img src="https://www.petz.com.br/blog/wp-content/uploads/2023/05/porquinho-da-india-peruano.jpg" alt="Porquinho da India" class="w-100">
            <div class="carousel-caption">
                <h5>Porquinho da Índia: 12 Curiosidades.</h5>
                <p>Porquinho da Índia é um animal dócil, extremamente carinhoso...</p>
                <br>
                <a href="blog_porquinho.php" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://www.petz.com.br/blog/wp-content/uploads/2022/04/cachorro-e-vertebrado-ou-invertebrado2.jpg" class="w-100">
            <div class="carousel-caption">
                <h5>Por que os cachorros lambem os donos?</h5>
                <p>Se você é tutor de um cãozinho, sabe que ele adora dar “lambeijos”...</p>
                <br>
                <a href="blog_carinho.php" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="https://static.mundoeducacao.uol.com.br/mundoeducacao/2019/08/cavalo.jpg" class="w-100">
            <div class="carousel-caption">
                <h5>Por que os cavalos relincham? como interpretar os sons.</h5>
                <p>Não são apenas os humanos que fazem uso das cordas vocais...</p>
                <br>
                <a href="blog_cavalo.php" class="buttonb">Leia mais</a>
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
            <img src="https://www.petz.com.br/blog/wp-content/uploads/2019/05/centro-de-zoonoses-pet.jpg" class="w-100">
            <div class="carousel-caption">
            <h5>Crimes contra cães e gatos podem ter <br> multa mínima de R$ 10 mil; Câmara debate.</h5>
                <p>De acordo com o deputado Célio Studart, a Lei Sansão definiu em 2020 que os <br> crimes contra cães e gatos serão punidos...</p>
                <br>
                <a href="blog_crime.php" class="buttonb">Leia mais</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="../Imagens/onibus.jpeg" class="w-100">
            <div class="carousel-caption">
            <h5>Câmara de BH aprova projeto que libera <br> transporte de animais em ônibus da capital.</h5>
                <p>Segundo a Casa, projeto está em fase de redação final, <br> e vai à sanção do prefeito Fuad Noman(PSD) ...</p>
                <br>
                <a href="blog_onibus.php" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/ba5b/live/40734f20-d78e-11ed-a154-2ffac3be7fad.jpg.webp" class="w-100">
            <div class="carousel-caption">
            <h5>Em Bruxelas, carruagens elétricas substituem o uso de cavalos</h5>
                <p>Operador de carruagens em Bruxelas troca cavalos <br> por veículos elétricos, refletindo uma mudança global...</p>
                <br>
                <a href="blog_carruagem.php" class="buttonb">Leia mais</a>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="https://s2-g1.glbimg.com/C_9z3CqdK_DDYD83mkQjhbbBAxI=/0x0:1700x1065/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2024/y/f/tbOjIlSWGvrfco3JlDeQ/imagem-g1.png" class="w-100">
            <div class="carousel-caption">
            <h5>Brasileira ganha prêmio por projeto <br> que propõe substituir animais em teste de cosmético.</h5>
            <p>A pesquisa de Lauren demonstrou que as células-tronco dentárias podem <br> ser usadas para identificar substâncias...</p>
            <br>
                <a href="blog_premio.php" class="buttonb">Leia mais</a>
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