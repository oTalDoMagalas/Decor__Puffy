<?php
// Incluir o Autoloas do composer para carregar automaticamente as classes utilizadas
require_once __DIR__ . '/../vendor/autoload.php';

// Incluir o arquivo com as variáveis
// Uso o DIR para mostrar qual diretório devo puxar o arquivo
require_once __DIR__ . '/../config/config.php';

// Iniciar a sessão
session_start();

// Inserir a classe de autenticação
use Services\Auth;

// Inicializa a variável para as mensagens de erro
$mensagem = '';

// Instanciar a classe de autenticação
$auth = new Auth();

// Verificar se já foi autenticado
if (Auth::verificarLogin()) {
    // Direcionar usuário para a tela principal
    header('Location: index.php');
    exit;
}

// Se o usuário não estiver logado / verifica se o formulário está correto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Se a verificação na tela de login receber os dados de NOME e SENHA, ou envia para a outra tela, ou mostra a mensagem de erro
    if ($auth->login($username, $email, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $mensagem = 'Falha ao executar o login! Verifique se o usuário e a senha estão corretos.';
    }
}
?>


<!-- Front End -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Locadora de Roupas</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link ícones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 

    <!-- CSS Interno -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-image: url('../img/6172659.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            width: 100%;
            background-color: #343a40;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
        }

        header img {
            height: 40px;
            margin-right: 15px;
        }

        header h1 {
            font-size: 20px;
            color: rgb(255, 255, 255);
        }

        .container {
            background-color: rgba(255, 255, 255, 0.71);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-top: 40px;
        }

        h2 {
            margin-bottom: 25px;
            color: rgb(0, 0, 0);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: none;
            background-color: #eee;
            border-radius: 8px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            background-color: #FFD700;
            border: none;
            padding: 12px 20px;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #FFD700;
        }

        .google-btn {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 12px;
            border-radius: 8px;
            background-color: white;
            color: #444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .google-btn i {
            margin-right: 10px;
            color: #DB4437;
        }

        .google-btn:hover {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        header .fw-bold {
            font-size: 1.5rem;
            color: #fff;
        }
    </style>
</head>
    </style>

</head>

<body>
    <header>
        <div style="display: flex; align-items: center;">
            <img src="../img/logo.png" alt="Logo">
            <h1 class="fw-bold fs-4">Decor Puffy</h1>
        </div>
        <a href="../index.php" class="btn btn-warning">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </header>
    

    <div class="container">
        <?php if ($mensagem): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
                <?php endif; ?>
        <h2>Login</h2>
        <form method="post" class="needs-validation" novalidate>
            <div class="mb-4">
                        <label for="username" class="form-label">
                            Usuário:
                        </label>
                        <input type="text" name="username" class="form-control" required autocomplete="off" placeholder="Digite seu usuário aqui..." id="username">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">
                        E-Mail:
                    </label>
                    <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Digite seu e-mail aqui..." id="email">
                </div>
            <div class="mb-4 position-relative">
                        <label for="password" class="form-label">
                            Senha:
                        </label>
                        <input type="password" name="password" class="form-control" required placeholder="Digite sua senha aqui..." id="password">

                        <span class="password-toggle mt-3" onclick="togglePassword()">
                            <i class="bi bi-eye-slash" id="olho"></i>
                        </span>
                    </div>

            <div class="button-container">
                <button type="submit" class="btn">Entrar</button>
                <a href="signin.php"><button type="button" class="btn">Cadastrar-se</button></a>
            </div>
        </form>

        <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dlemail%26oq%3Dlemail%26gs_lcrp%3DEgZjaHJvbWUyBggAEEUYOdIBCDI3MTRqMGoxqAIAsAIB%26sourceid%3Dchrome%26ie%3DUTF-8%26sei%3DyooHaLSUCci65OUPioSb-A8&ec=GAZAAQ&hl=pt-BR&ifkv=AXH0vVunzOuCUUg7uMo_9vtAjAihfS0t_ZqdZTO_cEdM1T6_Ke4y_jTYIhrJjxyWpHWdlBfUo1Riyw&passive=true&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S438279765%3A1745324752546731" class="google-btn">
            <i class="fab fa-google"></i> Entrar com Google
        </a>
    </div>


    <script>
        function togglePassword() {
            // Alterna o tipo do campo de senha entre "password" e "text"
            let passwordInput = document.getElementById('password');
            passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';

            // Alterna a classe do ícone
            let olho = document.getElementById('olho');
            if (olho.classList.contains('bi-eye')) {
                olho.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                olho.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>

</html>