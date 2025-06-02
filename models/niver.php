<?php
namespace Models;
use Interfaces\Locavel;

class Niver extends Decoracao implements Locavel {
    private ?string $imagem;

    public function __construct(string $tema, string $tamanho, ?string $imagem = null)
    {
        parent::__construct($tema, $tamanho);
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

    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_NIVER;
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
