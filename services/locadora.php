<?php

namespace Services;

use Models\{Decoracao, Materiais, Casamento, Niver, Forma};

class Locadora
{
    private array $decoracoes = [];

    public function __construct()
    {
        $this->carregarDecoracoes();
    }

    private function carregarDecoracoes(): void
    {
        if (file_exists(ARQUIVO_JSON)) {
            $dados = json_decode(file_get_contents(ARQUIVO_JSON), true);

            foreach ($dados as $dado) {
                $imagem = $dado['imagem'] ?? null;

                switch ($dado['tipo']) {
                    case 'Niver':
                        $decoracao = new Niver($dado['tema'], $dado['tamanho'], $imagem);
                        break;
                    case 'Casamento':
                        $decoracao = new Casamento($dado['tema'], $dado['tamanho'], $imagem);
                        break;
                    case 'Forma':
                        $decoracao = new Forma($dado['tema'], $dado['tamanho'], $imagem);
                        break;
                    case 'Materiais':
                        $decoracao = new Materiais($dado['tema'], $dado['tamanho'], $imagem);
                        break;
                    default:
                        continue 2; // pula para o próximo se tipo for inválido
                }

                $decoracao->setDisponivel($dado['disponivel']);
                $this->decoracoes[] = $decoracao;
            }
        }
    }

    private function salvarDecoracoes(): void
    {
        $dados = [];

        foreach ($this->decoracoes as $decoracao) {
            $dados[] = [
                'tipo' => match (true) {
                    $decoracao instanceof Niver   => 'Niver',
                    $decoracao instanceof Casamento   => 'Casamento',
                    $decoracao instanceof Forma    => 'Forma',
                    $decoracao instanceof Materiais => 'Materiais',
                    default                     => 'Desconhecido'
                },
                'tema' => $decoracao->getTema(),
                'tamanho' => $decoracao->getTamanho(),
                'imagem' => $decoracao->getImagem() ?? null,
                'disponivel' => $decoracao->isDisponivel()
            ];
        }

        $dir = dirname(ARQUIVO_JSON);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        file_put_contents(ARQUIVO_JSON, json_encode($dados, JSON_PRETTY_PRINT));
    }

    public function adicionarDecoracao(Decoracao $decoracao): string
    {
        foreach ($this->decoracoes as $r) {
            if ($r->getTema() === $decoracao->getTema() && $r->getTamanho() === $decoracao->getTamanho()) {
                return "Decoração já cadastrada!";
            }
        }

        $this->decoracoes[] = $decoracao;
        $this->salvarDecoracoes();
        return "Decoração '{$decoracao->getTema()}' adicionada com sucesso!";
    }

    public function deletarDecoracao(string $tema, string $tamanho): string
    {
        foreach ($this->decoracoes as $key => $decoracao) {
            if ($decoracao->getTema() === $tema && $decoracao->getTamanho() === $tamanho) {
                unset($this->decoracoes[$key]);
                $this->decoracoes = array_values($this->decoracoes);
                $this->salvarDecoracoes();
                return "Decoração '{$tema}' removida com sucesso!";
            }
        }
        return "Decoração não encontrada!";
    }

    public function alugarDecoracao(string $tema, int $dias = 1): string
    {
        foreach ($this->decoracoes as $decoracao) {
            if ($decoracao->getTema() === $tema && $decoracao->isDisponivel()) {
                $valorAluguel = $decoracao->calcularAluguel($dias);
                $mensagem = $decoracao->alugar();
                $this->salvarDecoracoes();
                return $mensagem . " Valor do aluguel: R$" . number_format($valorAluguel, 2, ',', '.');
            }
        }
        return "Decoração não disponível";
    }

    public function devolverDecoracao(string $tema): string
    {
        foreach ($this->decoracoes as $decoracao) {
            if ($decoracao->getTema() === $tema && !$decoracao->isDisponivel()) {
                $mensagem = $decoracao->devolver();
                $this->salvarDecoracoes();
                return $mensagem;
            }
        }
        return "Decoração já disponível ou não encontrada.";
    }

    public function editarDecoracao(string $temaOriginal, string $novoTema, string $novoTamanho, string $novoTipo, ?string $imagemNova = null): string
    {
        foreach ($this->decoracoes as $key => $decoracao) {
            // Verifica se a roupa corresponde ao nome original
            if ($decoracao->getTema() === $temaOriginal) {
                // Atualiza os dados da roupa
                $decoracao->setTema($novoTema);
                $decoracao->setTamanho($novoTamanho);

                // Atualiza a imagem se fornecida
                if ($imagemNova) {
                    $decoracao->setImagem($imagemNova);
                }

                // Verifica qual tipo de roupa será instanciada
                switch ($novoTipo) {
                    case 'Niver':
                        $decoracaoAtualizada = new Niver($novoTema, $novoTamanho, $imagemNova ?? $decoracao->getImagem());
                        break;
                    case 'Casamento':
                        $decoracaoAtualizada = new Casamento($novoTema, $novoTamanho, $imagemNova ?? $decoracao->getImagem());
                        break;
                    case 'Forma':
                        $decoracaoAtualizada = new Forma($novoTema, $novoTamanho, $imagemNova ?? $decoracao->getImagem());
                        break;
                    case 'Materiais':
                        $decoracaoAtualizada = new Materiais($novoTema, $novoTamanho, $imagemNova ?? $decoracao->getImagem());
                        break;
                    default:
                        return "Tipo de decoração inválida.";
                }

                // Substitui a roupa original pela atualizada
                $this->decoracoes[$key] = $decoracaoAtualizada;
                $this->salvarDecoracoes();  // Salva as roupas após a atualização
                return "Roupa '{$novoTema}' editada com sucesso!";
            }
        }

        return "Decoração não encontrada!";
    }

    public function listarDecoracoes(): array
    {
        return $this->decoracoes;
    }

    public function calcularPrevisaoAluguel($tipo, $dias, $quantidade): float
    {
        return match ($tipo) {
            'Niver'   => (new Niver('', '', null))->calcularAluguel($dias) * $quantidade,
            'Casamento'   => (new Casamento('', '', null))->calcularAluguel($dias) * $quantidade,
            'Forma'    => (new Forma('', '', null))->calcularAluguel($dias) * $quantidade,
            'Materiais' => (new Materiais('', '', null))->calcularAluguel($dias) * $quantidade,
            default     => 0.0,
        };
    }
}
