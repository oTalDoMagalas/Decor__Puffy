<?php
require_once __DIR__ . '/../services/Auth.php';

use Services\Auth;

$usuario = Auth::getUsuario();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Locadora de Decorações</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
      background-color: #f8f9fa;
    }

    .logo {
      width: 50px;
      height: 50px;
    }

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

    .card-header {
      background-color: #343a40;
      color: white;
    }

    .card-body {
      background-color: #ffffff;
      border-top: 1px solid #ddd;
    }

    .table thead {
      background-color: #007bff;
      color: white;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }

    .badge {
      font-size: 14px;
    }

    .btn-primary,
    .btn-info,
    .btn-danger,
    .btn-success {
      border-radius: 20px;
      padding: 10px 20px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-info {
      background-color: #17a2b8;
      border-color: #17a2b8;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .user-info .welcome-text {
      font-size: 16px;
    }
    .table img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}

  </style>
</head>

<body>
    <header id="header-festa" class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="../img/logo.png" alt="Logo" class="logo" style="height: 40px;">
            <span class="fw-bold fs-4">Decor Puffy</span>
        </div>
        <input type="text" class="form-control w-25" placeholder="Procure aqui...">
        <div class="d-flex gap-3">
            <a href="#" class="btn btn-outline-light">
                Olá, <?= htmlspecialchars($usuario['username']) ?> <i class="bi bi-person-fill"></i>
            </a>
            <div class="d-flex gap-3">
                <a href="?logout=1" class="btn btn-outline-danger">
                    Sair <i class="bi bi-box-arrow-in-right"></i>
                </a>
            </div>
        </div>
    </header>
    
    <div class="container py-4">

        <!-- Barra superior com informações do usuário -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                </div>
            </div>
        </div>

        <?php if ($mensagem): ?>
            <div class="alert alert-info alert-dismissible fade show pop-up" role="alert">
                <?= htmlspecialchars($mensagem) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (!Auth::isAdmin()): ?>

            <!-- Seção principal da página contendo o carrossel de promoções -->
            <main class="container">
                <h1 class="text-center mb-3 mt-3">Promoções do Mês</h1>

                <!-- Carrossel de imagens usando componente do Bootstrap -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" id="dispal">
      <img src="../img/decoracao_branco.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">

        <p>Decoração Noivado</p>
      </div>
    </div>
    <div class="carousel-item" id="dispal">
      <img src="../img/decoração_azul.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <p>Decoração safari (aluguel)</p>
      </div>
    </div>
    <div class="carousel-item" id="dispal">
      <img src="../img/decoração_rosa.jpg" class="d-block w-100" alt="">
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

  <div class="row justify-content-center g-4">
      <div class="col-md-3 product-card text-center">
        <img src="../img/decoracao-formula-1-decoracao-ferrari.jpg" class="img-fluid rounded" alt="Produto 1">
        <p>Decoração do Lewis Hamilton</p>
        <div class="d-flex justify-content-between">
          <span>R$678,50</span>
          <span>4,8 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="../img/decoracao-snoop-alicenopaisdasmaravilhas.jpg" class="img-fluid rounded" alt="Produto 2">
        <p>Decoração da Alice no pais das maravilhas</p>
        <div class="d-flex justify-content-between">
          <span>R$620,99</span>
          <span>4,8 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="../img/decoracao-homem-aranha-peter-parker.jpg" class="img-fluid rounded" alt="Produto 3">
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
        <img src="../img/festa-policia-policia.jpg" class="img-fluid rounded" alt="Negócio 1">
        <p>Decoração da Policia</p>
        <div class="d-flex justify-content-between">
          <span>R$450,90</span>
          <span>4,5 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="../img/decoracao-deadpool-locacao-deadpool.jpg" class="img-fluid rounded" alt="Negócio 2">
        <p>Decoração do Deadpool</p>
        <div class="d-flex justify-content-between">
          <span>R$980,99</span>
          <span>4,7 ⭐</span>
        </div>
      </div>

      <div class="col-md-3 product-card text-center">
        <img src="../img/decoracao_branco.jpg" class="img-fluid rounded" alt="Negócio 3">
        <p>Decoração Noivado</p>
        <div class="d-flex justify-content-between">
          <span>R$819,00</span>
          <span>4,9 ⭐</span>
        </div>
      </div>
    </div>
            </main>

            <!-- Seção com 8 imagens de peças principais para aluguel -->

        <?php endif; ?>

        <!-- Formulário para adicionar novo Roupa -->
        <main class="mx-5">
            <div class="row same-height-row" id="cadastrar">
                <?php if (Auth::isAdmin()): ?>

                    <h1 class="my-5 mt-1">Sistema Decor Puffy</h1>
                    <div class="col-md-6 div-custom">
                        <div class="card h-100 custom-card border-0">
                            <div class="card-header">
                                <h4 class="mb-0">Adicionar Nova Decoração</h4>
                            </div>
                            <div class="card-body custom-c-body">
                                <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="tema" class="form-label">Tema:</label>
                                        <input type="text" name="tema" class="form-control custom-form-1" required>
                                        <div class="invalid-feedback">Informe um tema válido.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tamanho" class="form-label">Tamanho:</label>
                                        <select name="tamanho" class="form-select custom-select-1" required>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Medio">Médio</option>
                                            <option value="Grande">Grande</option>
                                        </select>
                                        <div class="invalid-feedback">Informe um Tamanho válida.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipo:</label>
                                        <select name="tipo" class="form-select custom-select-1" required>
                                            <option value="Niver">Aniversário</option>
                                            <option value="Casamento">Casamento</option>
                                            <option value="Forma">Formatura</option>
                                            <option value="Materiais">Materiais de Artesanato</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagem" class="form-label">Imagem da Decoração:</label>
                                        <input type="file" name="imagem" accept="image/*" class="form-control custom-form-1">
                                    </div>
                                    <button type="submit" name="adicionar" class="btn btn-success w-100">Adicionar Decoração</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
        <?php endif; ?>


                    <!-- Formulário para cálculo de aluguel -->
                    <div class="col md-12 div-custom">
                        <div class="card h-100 div-custom border-0">
                            <div class="card-header custom-c-header">
                                <h4 class="mb-0">Calcular Previsão de Aluguel</h4>
                            </div>
                            <div class="card-body custom-c-body">
                                <form method="post" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="tamanho_calculo" class="form-label">Tamanho:</label>
                                        <select name="tamanho_calculo" class="form-select" required>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Medio">Médio</option>
                                            <option value="Grande">Grande</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipo_calculo" class="form-label">Tipo de vestimenta:</label>
                                        <select name="tipo_calculo" class="form-select custom-select-1" required>
                                            <option value="Niver">Aniversário</option>
                                            <option value="Casamento">Casamento</option>
                                            <option value="Forma">Formatura</option>
                                            <option value="Materiais">Materiais de Artesanato</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qtd_pecas" class="form-label">Quantidade de dias:</label>
                                        <input type="number" name="dias_calculo" class="form-control custom-form-1" min="1" value="1" required>
                                    </div>
                                    <button type="submit" name="calcular" class="btn btn-success w-100">Calcular Previsão</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        

        <!-- Tabela de Roupas cadastrados -->
        <div class="row mt-4 justify-content-center" id="decoracoes">
            <?php if (Auth::isAdmin()): ?>
                <h1 class="text-center mb-4 mt-4">
                    Decorações Cadastradas
                </h1>
            <?php else: ?>
                <h1 class="text-center mb-4 mt-4">
                    Decorações Disponíveis
                </h1>
            <?php endif; ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Tema</th>
                                        <th>Tamanho</th>
                                        <th>Tipo</th> <!-- NOVO -->
                                        <th>Disponibilidade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    // Função para traduzir o nome da classe em um tipo de roupa mais legível
                                    function traduzTipo($classe)
                                    {
                                        switch ($classe) {
                                            case 'Models\Niver':
                                                return 'Aniversário';
                                            case 'Models\Forma':
                                                return 'Formatura';
                                            case 'Models\Casamento':
                                                return 'Casamento';
                                            case 'Models\Materiais':
                                                return 'Materiais de Artesanato';
                                            default:
                                                return 'Tipo Desconhecido';
                                        }
                                    }
                                    ?>
                                    <?php foreach ($locadora->listarDecoracoes() as $decoracao): ?>
                                        <tr>
                                            <td>
                                                <?php if (!empty($decoracao->getImagem())): ?>
                                                    <img src="../uploads/<?= htmlspecialchars($decoracao->getImagem()) ?>" alt="Imagem da Decoração" class="table-img">
                                                <?php else: ?>
                                                    <span class="text-muted">Sem imagem</span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?= htmlspecialchars($decoracao->getTema()) ?></td>
                                            <td><?= htmlspecialchars($decoracao->getTamanho()) ?></td>
                                            <td><?= traduzTipo(get_class($decoracao)) ?></td> <!-- Aqui está a modificação -->
                                            <td>
                                                <span class="badge text-<?= $decoracao->isDisponivel() ? 'success' : 'danger' ?>">
                                                    <?= $decoracao->isDisponivel() ? 'Disponível' : 'Indisponível' ?>
                                                </span>
                                            </td>
                                            <?php if (Auth::isAdmin()): ?>
                                                <td>
                                                    <div class="action-wrapper">
                                                        <form method="post" class="btn-group-actions">
                                                            <input type="hidden" name="tema" value="<?= htmlspecialchars($decoracao->getTema()) ?>">
                                                            <input type="hidden" name="tamanho" value="<?= htmlspecialchars($decoracao->getTamanho()) ?>">

                                                            <!-- Botão Deletar (sempre disponível para admin) -->
                                                            <button type="submit" name="deletar" class="btn btn-custom btn-sm mb-2"><i class="bi bi-trash"></i> Deletar</button>

                                                            <!-- Botões condicionais baseados no status do Roupa -->
                                                            <div class="rent-group">
                                                                <?php if (!$decoracao->isDisponivel()): ?>
                                                                    <!-- Roupa alugado: Botão Devolver -->
                                                                    <button type="submit" name="devolver" class="text-white btn btn-warning btn-sm"><i class="bi bi-arrow-left-right"></i> Devolver</button>
                                                                <?php else: ?> <!-- Roupa disponível: Campo de dias e Botão Alugar -->
                                                                    <button type="button"
                                                                        class="btn btn-modal btn-success btn-sm mb-2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editarModal"
                                                                        data-tema="<?= htmlspecialchars($decoracao->getTema()) ?>"
                                                                        data-tamanho="<?= htmlspecialchars($decoracao->getTamanho()) ?>"
                                                                        data-tipo="<?= basename(str_replace('\\', '/', get_class($decoracao))) ?>">
                                                                        <i class="bi bi-pencil-square"></i> Editar
                                                                    </button>
                                                                <?php endif; ?>

                                                                <?php if ($decoracao->isDisponivel()): ?>
                                                                    <button type="submit" name="alugar" class="btn btn-warning2 btn-sm"><i class="bi bi-bag-check"></i> Alugar</button>
                                                                <?php endif; ?>
                                                            </div>
                                                    </div>
                                                    </form>
                        </div>
                        </td>
                    <?php endif; ?>
                    <?php if (!Auth::isAdmin()): ?>
                        <td>
                            <div class="action-wrapper">
                                <form method="post" class="btn-group-actions">
                                    <input type="hidden" name="tem,a" value="<?= htmlspecialchars($decoracao->getTema()) ?>">
                                    <input type="hidden" name="tamanho" value="<?= htmlspecialchars($decoracao->getTamanho()) ?>">

                                    <button
                                        type="button"
                                        class="btn btn-sm calcular-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#calculoModal"
                                        data-tema="<?= htmlspecialchars($decoracao->getTema()) ?>"
                                        data-tamanho="<?= htmlspecialchars($decoracao->getTamanho()) ?>"
                                        data-tipo="<?= basename(str_replace('\\', '/', get_class($decoracao))) ?>"><i class="bi bi-calculator"></i> Calcular
                                    </button>
                                </form>
                            </div>
                        </td>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <!-- Modal de Cálculo -->
    <div class="modal fade" id="calculoModal" tabindex="-1" aria-labelledby="calculoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" class="modal-content needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="calculoModalLabel">Calcular Previsão de Aluguel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tema_calculo" id="calculoTema">
                        <div class="mb-3">
                                        <label for="tamanho_calculo" class="form-label">Tamanho:</label>
                                        <select name="tamanho_calculo" class="form-select" required>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Medio">Médio</option>
                                            <option value="Grande">Grande</option>
                                        </select>
                                    </div>
                    <div class="mb-3">
                        <label for="tipoCalculo" class="form-label">Tipo de decoração</label>
                        <select class="form-select" id="tipoCalculo" name="tipo_calculo" required>
                            <option value="Niver">Aniversário</option>
                            <option value="Casamento">Casamento</option>
                            <option value="Forma">Formatura</option>
                            <option value="Materiais">Materiais de Artesanato</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="diasCalculo" class="form-label">Quantidade de dias</label>
                        <input type="number" name="dias_calculo" class="form-control" id="diasCalculo" min="1" value="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="calcular" class="btn btn-success w-100">Calcular Previsão</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de Edição -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Decoração</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="tema_original" id="editarTemaOriginal">
                    <input type="hidden" name="id_produto" id="editarIdProduto"> <!-- Campo oculto para ID do produto -->

                    <div class="mb-3">
                        <label for="editarTema" class="form-label">Tema</label>
                        <input type="text" class="form-control" id="editarTema" name="tema" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarTamanho" class="form-label">Tamanho</label>
                        <select name="tamanho" class="form-select" id="editarTamanho" required>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Medio">Médio</option>
                                            <option value="Grande">Grande</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editarTipo" class="form-label">Tipo</label>
                        <select class="form-select" id="editarTipo" name="tipo" required>
                            <option value="Niver">Aniversário</option>
                            <option value="Casamento">Casamento</option>
                            <option value="Forma">Formatura</option>
                            <option value="Materiais">Materiais de Artesanato</option>
                        </select>
                    </div>

                    <!-- Campo de upload de imagem -->
                    <div class="mb-3">
                        <label for="editarImagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="editarImagem" name="imagem">
                        <small class="text-muted">Deixe em branco para manter a imagem atual.</small>
                    </div>
                    <div class="mb-3" id="imagemPreviewContainer" style="display: none;">
                        <label for="imagemPreview" class="form-label">Imagem Atual</label>
                        <img id="imagemPreview" src="" alt="Imagem atual" style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="editar" class="btn btn-success">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Rodapé -->
    <footer style="background-color: #343a40; color: white; text-align: center; padding: 20px 0; margin-top: auto; width: 100%;">
        <p style="margin: 0;">Entre em contato • © 2025 Decor Puffy</p>
    </footer>

    <script>
        const calculoModal = document.getElementById('calculoModal');
        calculoModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const tema = button.getAttribute('data-tema');
            const tipo = button.getAttribute('data-tipo');

            document.getElementById('calculoTema').value = tema;
            const selectTipo = document.getElementById('tipoCalculo');
            selectTipo.value = tipo;

            document.getElementById('diasCalculo').value = 1;
            document.getElementById('qtdPecasCalculo').value = 1;
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script modal editar -->
    <script src="../script/script.js"></script>
</body>

</html>