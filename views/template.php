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
    <link rel="stylesheet" href="load-css.php">
    <link rel="stylesheet" href="load-generoso.php">
    <style>
        label.form-label {
            color: #000000;
        }

        /* Wrapper para o campo de busca com ícone */
        .input-icon-wrapper {
            position: relative;
            display: block;
            max-width: 750px;
            width: 90vw;
            margin: 1rem auto;
            /* Centraliza o input na tela */
        }

        /* Estilo do input de busca */
        .input-icon-wrapper input {
            width: 100%;
            padding-left: 2.5rem;
            /* Espaço para o ícone */
            height: 38px;
            border-radius: 30px;
            border: 1px solid #ccc;
        }

        /* Ícone de busca dentro do input */
        .input-icon-wrapper i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #000000;
            font-size: 1rem;
        }

        /* Estilos responsivos para dispositivos menores */
        @media (max-width: 768px) {
            .input-icon-wrapper {
                margin: 1rem auto;
            }

            .carousel img {
                max-width: 50vh;
                max-height: 40vh;
            }

            .carousel-control-prev-icon {
                margin-left: -30px;
            }

            .carousel-control-next-icon {
                margin-right: -30px;
            }

            .card {
                margin-left: 25px;
            }
        }

        /* Ajustes de posição dos ícones do carrossel */
        .carousel-control-prev-icon {
            margin-left: -60px;
        }

        .carousel-control-next-icon {
            margin-right: -60px;
        }

        /* Cor geral do conteúdo da página */
        .container {
            color: #f0f0f0;
        }

        /* Imagens de produtos */
        .img-fluid {
            width: 200px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo base dos botões */
        .btn {
            font-size: 0.9rem;
            border-radius: 15px;
            transition: ease 0.3s;
        }

        /* Hover nos botões genéricos */
        .btn:hover {
            color: #FFFFFF;
            background-color: #084020;
        }

        /* Botões dentro de células da tabela */
        td .btn {
            width: 100px;
            border-radius: 0px;
        }

        /* Botão de edição personalizado */
        .custom-btn {
            background-color: #594432;
            color: #FFFFFF;
            font-size: 0.9rem;
            transition: 0.3s ease;
        }

        /* Hover no botão de edição */
        .custom-btn:hover {
            background-color: #8A694E;
            color: #000000;
        }

        /* Estilo do título principal */
        h1.text-center {
            color: #FFFFFF;
            font-family: lemonada, sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Imagem da tabela */
        .table-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Badge de status */
        .badge {
            color: #42825D;
            font-size: 1rem;
        }

        /* Badge com status de alerta */
        .badge.warning {
            color: #AD3939;
        }

        /* Cartões personalizados */
        .card {
            background-color: #594432;
            color: #FFFFFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Cabeçalho da tabela */
        .table thead th {
            color: #FFFFFF;
            background-color: #594432;
            padding: 10px;
        }

        /* Limita o tamanho da row */
        .row {
            max-width: 100%;
        }

        /* Largura da célula de status */
        .status {
            width: 110px !important;
        }

        /* Estilo do botão personalizado */
        .btn-custom {
            background-color: #594432;
            color: #FFFFFF;
            transition: ease 0.3s;
        }

        /* Hover do botão personalizado */
        .btn-custom:hover {
            background-color: #8A694E;
            color: #000000;
        }

        /* Cabeçalho do modal */
        .modal-header {
            background-color: #594432;
            color: #FFFFFF;
        }

        /* Inputs e selects dentro do modal */
        .modal-body input,
        .modal-body select {
            background-color: #BFB8AE;
        }

        /* Botões dentro do modal */
        .modal-body .btn-modal {
            background-color: #A27E60;
            border-radius: 0px;
            color: #FFFFFF;
            transition: ease 0.3s;
        }

        /* Hover do botão do modal */
        .modal-body .btn-modal:hover {
            background-color: #C8C3BC;
            color: #000000;
        }

        /* Células da tabela - altura fixa e centralização vertical */
        td {
            height: 120px !important;
            vertical-align: middle !important;
            padding: 7px !important;
            text-align: center;
            border: 2px solid #000000;
        }

        /* Parágrafos dentro de <td> centralizados verticalmente */
        td p {
            margin: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            /* Ocupa toda a altura da célula */
        }

        .pop-up {
            background-color: rgba(162, 126, 96, 0.7);
            border: none;
            color: #f0f0f0;
        }

        .pop-up-dk {
            color: rgba(0, 0, 0, 0.7);
        }

        .card-body {
            border-radius: 0px 0px 7px 7px;
        }

        .btn-warning {
            background-color: rgb(168, 125, 16);
            transition: 0.3s ease;
            border: none;
        }

        .btn-warning:hover {
            background-color: rgb(248, 222, 162);
            color: #000000 !important;
            border: none;
        }
        .btn-warning2{
            background-color: rgb(248, 222, 162);
            color: #000000 !important;
            border: none;
        }
        .btn-warning2:hover{
            background-color: rgb(168, 125, 16);
            transition: 0.3s ease;
            border: none;
            color: #FFFFFF !important;
        }
        .calcular-btn {
            background-color:rgb(167, 115, 70);
            border-radius: 0px;
            color: #FFFFFF;
            transition: ease 0.5s;
        }
        .calcular-btn:hover {
            background-color:rgb(220, 171, 132);
            color: #000000;
        }
    </style>
</head>

<body>
    <header id="header-festa" class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <img src="logo.png" alt="Logo" class="logo" style="height: 40px;">
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

        <!-- Formulário para adicionar novo Roupa -->
        <main class="mx-5">
            <div class="row same-height-row" id="cadastrar">
                <?php if (Auth::isAdmin()): ?>

                    <h1 class="my-5 mt-1">Sistema La Vie Elegance</h1>
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
                                        <select name="tipo" class="form-select custom-select-1" required>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Medio">Médio</option>
                                            <option value="Grande">Grandre</option>
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


                    <!-- Formulário para cálculo de aluguel -->
                    <div class="col md-12 div-custom">
                        <div class="card h-100 div-custom border-0">
                            <div class="card-header custom-c-header">
                                <h4 class="mb-0">Calcular Previsão de Aluguel</h4>
                            </div>
                            <div class="card-body custom-c-body">
                                <form method="post" class="needs-validation" novalidate>
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
        <?php endif; ?>
        <?php if (!Auth::isAdmin()): ?>

            <!-- Seção principal da página contendo o carrossel de promoções -->
            <main class="container">
                <h1 class="text-center mb-3 mt-3">Promoções do Mês</h1>

                <!-- Carrossel de imagens usando componente do Bootstrap -->
                <div class="d-flex justify-content-center">
                    <div class="carousel slide" id="carouselExemplo" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-inner text-center">
                            <!-- Imagem ativa (primeira a aparecer) -->
                            <div class="carousel-item active">
                                <img src="../img/decoracao-deadpool-locacao-deadpool.jpg" alt="img 1" class="d-block mx-auto">
                            </div>
                            <!-- Segunda imagem -->
                            <div class="carousel-item">
                                <img src="../img/decoracao-formula-1-decoracao-ferrari.jpg" alt="img 2" class="d-block mx-auto">
                            </div>
                            <!-- Terceira imagem -->
                            <div class="carousel-item">
                                <img src="../img/decoracao-homem-aranha-peter-parker.jpg" alt="img 3" class="d-block mx-auto">
                            </div>
                        </div>

                        <!-- Botão anterior do carrossel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExemplo"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon seta"></span>
                        </button>

                        <!-- Botão próximo do carrossel -->
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExemplo"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon seta"></span>
                        </button>
                    </div>
                </div>
            </main>

            <!-- Seção com 8 imagens de peças principais para aluguel -->
            
        <?php endif; ?>

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
                                    <?php foreach ($locadora->listarDecoracoes() as $decoracaodecoracao): ?>
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
                                                                    <button type="submit" name="alugar" class="btn btn-warning2 btn-sm"><i class="bi bi-bag-check"></i>  Alugar</button>
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
                                                                data-tipo="<?= basename(str_replace('\\', '/', get_class($decoracao))) ?>"><i class="bi bi-calculator"></i>  Calcular
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
                            <label for="tipoCalculo" class="form-label">Tipo de vestimenta</label>
                            <select class="form-select" id="tipoCalculo" name="tipo_calculo" required>
                                <option value="Terno_c">Terno completo</option>
                                <option value="Smoking">Smoking</option>
                                <option value="Blazer">Blazer</option>
                                <option value="Vestido_l">Vestido Longo</option>
                                <option value="Vestido_c">Vestido Curto</option>
                                <option value="Vestido_d">Vestido de Debutante</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantidadePecas" class="form-label">Quantidade de peças</label>
                            <input type="number" name="quantidade_pecas" class="form-control" id="quantidadePecas" min="1" value="1" required>
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
                            <input type="text" class="form-control" id="editarTamanho" name="tamanho" required>
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