<?php

namespace Models;

// Classe abstrata para todos os tipos de Roupas
abstract class Decoracao
{
    private string $tema;
    private string $tamanho;
    private bool   $disponivel;
    private ?string $imagem;  // Adiciona a variável para armazenar o nome do arquivo da imagem

    public function __construct(string $tema, string $tamanho, ?string $imagem = null)
    {
        $this->tema       = $tema;
        $this->tamanho      = $tamanho;
        $this->disponivel = true;
        $this->imagem     = $imagem;  // Inicializa a imagem
    }

    // Função para cálculo de aluguel
    abstract public function calcularAluguel(int $dias): float;

    public function isDisponivel(): bool
    {
        return $this->disponivel;
    }

    // Em Roupa.php
    public function setTema(string $tema): void
    {
        $this->tema = $tema;
    }

    public function setTamanho(string $tamanho): void
    {
        $this->tamanho = $tamanho;
    }


    public function getTema(): string
    {
        return $this->tema;
    }

    public function getTamanho(): string
    {
        return $this->tema;
    }

    public function setDisponivel(bool $disponivel): void
    {
        $this->disponivel = $disponivel;
    }

    // Método para obter a imagem
    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    // Método para definir a imagem
    public function setImagem(?string $imagem): void
    {
        $this->imagem = $imagem;
    }
}
