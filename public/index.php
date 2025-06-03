<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir o autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Incluir o arquivo com as variáveis
require_once __DIR__ . '/../config/config.php';

session_start();

use Services\{Locadora, Auth};
use Models\{Decoracao, Forma, Casamento, Niver, Materiais};

// Verificar se o usuário está logado
if (!Auth::verificarLogin()) {
    header('Location: login.php');
    exit;
}

// Condição para logout
if (isset($_GET['logout'])) {
    (new Auth())->logout();
    header('Location: login.php');
    exit;
}

$locadora = new Locadora();
$mensagem = '';
$usuario = Auth::getUsuario();

// Verificar dados do formulário via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica permissão de admin para ações restritas
    if (isset($_POST['adicionar']) || isset($_POST['deletar']) || isset($_POST['devolver'])) {
        if (!Auth::isAdmin()) {
            $mensagem = "Você não tem permissão para realizar essa ação";
            goto renderizar;
        }
    }

    // Adicionar roupa
    if (isset($_POST['adicionar'])) {
        $tema  = $_POST['tema']  ?? '';
        $tamanho = $_POST['tamanho'] ?? '';
        $tipo  = $_POST['tipo']  ?? '';
        $imagem = null;

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $imagemNome = uniqid() . '.' . $ext;
            $caminhoDestino = __DIR__ . '/../uploads/' . $imagemNome;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)) {
                $imagem = '../uploads/' . $imagemNome; // Salva o caminho da imagem
            }
        }

        switch ($tipo) {
            case 'Niver':
                $decoracao = new Niver($tema, $tamanho, $imagem);
                break;
            case 'Casamento':
                $decoracao = new Casamento($tema, $tamanho, $imagem);
                break;
            case 'Forma':
                $decoracao = new Forma($tema, $tamanho, $imagem);
                break;
            case 'Materiais':
                $decoracao = new Materiais($tema, $tamanho, $imagem);
                break;
            default:
                $mensagem = "Tipo de decoração inválido.";
                goto renderizar;
        }

        // Adiciona e armazena a mensagem de retorno
        $mensagem = $locadora->adicionarDecoracao($decoracao);
    }

    // Alugar
    elseif (isset($_POST['alugar'])) {
        $dias = isset($_POST['dias']) ? (int)$_POST['dias'] : 1;
        $mensagem = $locadora->alugarDecoracao($_POST['tema'], $dias);
    }

    // Devolver
    elseif (isset($_POST['devolver'])) {
        $mensagem = $locadora->devolverDecoracao($_POST['tema']);
    }

    // Deletar
    elseif (isset($_POST['deletar'])) {
        $mensagem = $locadora->deletarDecoracao($_POST['tema'], $_POST['tamanho']);
    }

    // Calcular previsão de valor
    elseif (isset($_POST['calcular'])) {
        $dias = (int)$_POST['dias_calculo'];
        $tipo = $_POST['tipo_calculo'];
        $tamanho = $_POST['tamanho_calculo'] ?? null;
        $decoracaozinha = match ($tipo) {
            'Niver' => 'Aniversário',
            'Casamento' => 'Casamento',
            'Forma' => 'Formatura',
            'Materiais' => 'Materiais',
            default => null
        };
        $quantidade = (int)($_POST['quantidade_pecas'] ?? 1); // Pegando a quantidade, padrão 1

        $valor = $locadora->calcularPrevisaoAluguel($tipo, $tamanho, $dias, $quantidade);
        $mensagem = "Previsão de valor para {$quantidade} peça de {$decoracaozinha} por {$dias} dia(s): R$" . number_format($valor, 2, ',', '.');
    }


    // Editar roupa
    elseif (isset($_POST['editar'])) {
    $nomeOriginal  = $_POST['tema_original'];
    $novoNome      = $_POST['tema'];
    $novoTamanho   = $_POST['tamanho'];
    $novoTipo      = $_POST['tipo'];
    $imagemAtual   = $_POST['imagem_atual'] ?? null;
    $imagemNova    = null;

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // salvar arquivo enviado, definir $imagemNova
    }

    $imagemFinal = $imagemNova ?: $imagemAtual;

    // Instanciar um novo objeto do tipo correto, usando $novoNome, $novoTamanho, $imagemFinal
    switch ($novoTipo) {
        case 'Niver':
            $decoracao = new Niver($novoNome, $novoTamanho, $imagemFinal);
            break;
        case 'Casamento':
            $decoracao = new Casamento($novoNome, $novoTamanho, $imagemFinal);
            break;
        case 'Forma':
            $decoracao = new Forma($novoNome, $novoTamanho, $imagemFinal);
            break;
        case 'Materiais':
            $decoracao = new Materiais($novoNome, $novoTamanho, $imagemFinal);
            break;
        default:
            $mensagem = "Tipo de decoração inválido.";
            goto renderizar;
    }

    // Chamar o método que faz o update, passando $nomeOriginal e o novo objeto
    $mensagem = $locadora->editarDecoracao(
        $nomeOriginal,
        $novoNome,
        $novoTamanho,
        $novoTipo,
        $imagemFinal
    );
    }
} // <-- Fechando o if ($_SERVER['REQUEST_METHOD'] === 'POST')
renderizar:
require_once __DIR__ . '/../views/template.php';