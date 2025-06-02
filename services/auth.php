<?php
// Define espaço para organização do código
namespace Services;

class Auth{
    private array $usuarios = [];

    // Construtor
    public function __construct()
    {
        $this->carregarUsuarios();
    }

    // Método para carregar usuários do arquivo JSON
    private function carregarUsuarios(): void {

        // Verificar se existe o arquivo
        if(file_exists(ARQUIVO_USUARIOS)){
            // Lê o conteúdo e decodifica o JSON para o array
            $conteudo = json_decode(file_get_contents(ARQUIVO_USUARIOS), true);

            // Verifica se é um array
            $this->usuarios = is_array($conteudo) ? $conteudo : [];
        } else {
            $this -> usuarios = [
                [
                    'username' => 'admin', 
                    'email' => '',
                    'password' => password_hash('123', PASSWORD_DEFAULT),
                    'perfil' => 'admin'
                ],
                [
                    'username' => 'usuario', 
                    'email' => 'teste@gmail.com',
                    'password' => password_hash('123', PASSWORD_DEFAULT),
                    'perfil' => 'usuario'
                ],

            ];
            $this->salvarUsuarios();
        }
    }

    // Função para salvar usuários no arquivo JSON
    private function salvarUsuarios():void{
        $dir = dirname(ARQUIVO_USUARIOS);

        if(!is_dir($dir)){
            mkdir($dir, 0777, true);
        }

        file_put_contents(ARQUIVO_USUARIOS, json_encode($this->usuarios, JSON_PRETTY_PRINT));
    }

    // Método para realizar login
    public function login(string $username, string $email, string $password): bool{
        foreach ($this -> usuarios as $usuario){
            if ($usuario['username'] === $username && $usuario['email'] === $email && password_verify($password, $usuario['password'])){
                $_SESSION['auth'] = [
                    'logado' => true,
                    'username' => $username,
                    'perfil' => $usuario['perfil']
                ];
                return true; //login realizado
            }
        }
        return false; // não realizou login
    }

    public function logout() :void{
        session_destroy();
    }

    // Verificar se o usuário está logado

    public static function verificarLogin():bool{
        return isset($_SESSION['auth']) && $_SESSION['auth']['logado'] === true;
    }

    public static function isPerfil(string $perfil):bool{
        return isset($_SESSION['auth']) && $_SESSION ['auth']['perfil'] === $perfil;
    }

    public static function isAdmin():bool{
        return self::isPerfil('admin');
    }

    public static function getUsuario(): ?array {
        // Retorna os dados da sessão ou nulo se não existir
        return $_SESSION['auth'] ?? null;
    }

}

?>