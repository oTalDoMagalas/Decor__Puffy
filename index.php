<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exemplo Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link ícones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgb(255, 255, 255);
    margin: 0;
    padding: 0;
}

/* Cabeçalho */
header {
    background-color: #919191 !important;
    color: white;
    padding: 15px 30px;
}

header .logo {
    height: 40px;
    width: auto;
}

header .fw-bold {
    font-size: 1.5rem;
}

header .d-flex {
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

header input {
    max-width: 300px;
    border-radius: 5px;
    border: none;
    padding: 5px 10px;
}

header .icon-group {
    display: flex;
    align-items: center;
    gap: 15px;
}

header .icon-group i {
    font-size: 20px;
    cursor: pointer;
}

/* Faixa de frete */
.frete-banner {
    background-color: #919191;
    color: #dfbf1d;
    padding: 10px;
    font-weight: bold;
    font-size: 26px;
    text-align: center;
    margin-top: 20px;
}

/* Carrossel */
.carousel-container {
    max-width: 365px;
    margin: 30px auto;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.carousel-item img {
    height: 365px;
    object-fit: cover;
    width: 100%;
    border-radius: 8px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.6);
    border-radius: 50%;
}

/* Cartões de produto */
.product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    padding: 15px; 
    margin: 10px;  
}


.product-card:hover {
    transform: translateY(-10px);
}

.product-card img {
    max-height: 250px;
    object-fit: cover;
    width: 100%;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.product-card p {
    font-size: 1.1rem;
    margin-top: 10px;
    padding: 0 10px;
}

.product-card .d-flex {
    font-size: 1rem;
    margin-top: 10px;
    justify-content: space-between;
    padding: 0 10px 10px;
}

.product-card .d-flex span {
    font-weight: bold;
}

/* Modal */
.modal-dialog {
    max-width: 500px;
}

.modal-body p {
    font-size: 1.2rem;
}

.custom-h-1{
    background-color: #dfbf1d !important;
}
</style>
</head>
<body>

  <!-- Cabeçalho -->
  <header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-2">
      <img src="img/logo.png" alt="Logo" class="logo">
      <span class="fw-bold fs-4">Decor Puffy</span>
    </div>
    <input type="text" class="form-control w-25" placeholder="Procure aqui...">
    <div class="d-flex gap-3">
      <a href="public/login.php" class="btn btn-dark">
        Entrar <i class="bi bi-person-fill"></i>
      </a>
    </div>
  </header>

  <!-- Faixa de frete -->
  <div class="frete-banner text-center">
    Agora o frete é mais barato! Aproveite em compras acima de R$79,90!
  </div>
    <br>
  <!-- Carrossel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" id="dispal">
      <img src="img/decoracao_branco.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">

        <p>Decoração Noivado</p>
      </div>
    </div>
    <div class="carousel-item" id="dispal">
      <img src="img/decoração_azul.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <p>Decoração safari (aluguel)</p>
      </div>
    </div>
    <div class="carousel-item" id="dispal">
      <img src="img/decoração_rosa.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <p>Decoração provençal de paris</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">proximo</span>
  </button>
</div>
  <br>
  <!-- Texto abaixo do carrossel -->
  <div class="text-center py-3" style="background-color: #919191; color: #dfbf1d;">
    <p class="mb-0">Achadinhos surpreendentes aí em baixo dele Decoração de aniversário !!</p>
  </div>

  <!-- Produtos -->
  <main class="container py-5">
    <div class="row justify-content-center g-4">
      <div class="col-md-3 product-card text-center">
        <img src="img/decoracao-formula-1-decoracao-ferrari.jpg" class="img-fluid rounded" alt="Produto 1">
        <p>Decoração do Lewis Hamilton</p>
        <div class="d-flex justify-content-between">
          <span>R$678,50</span>
          <span>4,8 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="img/decoracao-snoop-alicenopaisdasmaravilhas.jpg" class="img-fluid rounded" alt="Produto 2">
        <p>Decoração da Alice no pais das maravilhas</p>
        <div class="d-flex justify-content-between">
          <span>R$620,99</span>
          <span>4,8 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="img/decoracao-homem-aranha-peter-parker.jpg" class="img-fluid rounded" alt="Produto 3">
        <p>Decoração do Homem-Aranha</p>
        <div class="d-flex justify-content-between">
          <span>R$878,00</span>
          <span>4,8 ⭐</span>
        </div>
      </div>
    </div>

    <!-- Novos Negócios abaixo dos produtos -->
    <div class="row justify-content-center g-4 mt-4">
      <div class="col-md-3 product-card text-center">
        <img src="img/festa-policia-policia.jpg" class="img-fluid rounded" alt="Negócio 1">
        <p>Decoração da Policia</p>
        <div class="d-flex justify-content-between">
          <span>R$450,90</span>
          <span>4,5 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="img/decoracao-deadpool-locacao-deadpool.jpg" class="img-fluid rounded" alt="Negócio 2">
        <p>Decoração do Deadpool</p>
        <div class="d-flex justify-content-between">
          <span>R$980,99</span>
          <span>4,7 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="img/decoracao_branco.jpg" class="img-fluid rounded" alt="Negócio 3">
        <p>Decoração Noivado</p>
        <div class="d-flex justify-content-between">
          <span>R$819,00</span>
          <span>4,9 ⭐</span>
        </div>
      </div>
    </div>

  </main>

  <!-- Modal do Carrinho -->
  <div class="modal fade" id="carrinhoModal" tabindex="-1" aria-labelledby="carrinhoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="carrinhoModalLabel">Carrinho de Compras</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <p>O carrinho está vazio. Adicione produtos para ver aqui.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </div>

  <footer style="background-color: #343a40; color: white; text-align: center; padding: 20px 0; margin-top: auto; width: 100%;">
    <p style="margin: 0;">Entre em contato • © 2025 Decor Puffy</p>
    <p>DecorPuffy@gmail.com</p>
</footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>
