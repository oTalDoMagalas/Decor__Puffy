<?php
namespace Models;
use Interfaces\Locavel;

class Forma extends Decoracao implements Locavel {
    protected string $tamanho;
    private ?string $imagem;

    public function __construct(string $tema, string $tamanho, ?string $imagem = null)
    {
        parent::__construct($tema, $tamanho);
        $this->tamanho = $tamanho;
        $this->imagem = $imagem;
    }

    public function setImagem(?string $imagem): void
    {
        $this->imagem = $imagem;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function getTamanho(): string {
    return $this->tamanho;
}

    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_FORMA;
    }

    public function alugar(): string {
        if ($this->isDisponivel()) {
            $this->setDisponivel(false);
            return "Decoração '{$this->getTema()}' alugada com sucesso!";
        }
        return "Decoração '{$this->getTema()}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->isDisponivel()) {
            $this->setDisponivel(true);
            return "Decoração '{$this->getTema()}' devolvida com sucesso!";
        }
        return "Decoração '{$this->getTema()}' já está disponível.";
    }
}
?>
