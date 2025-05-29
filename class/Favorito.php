<?php
require_once 'Connection.php';

class Favorito extends Connection {
    private int $id;
    private int $usuario_id;
    private ?int $temporada_id = null;
    private ?int $actor_id = null;
    private ?int $monstruo_id = null;

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setUsuarioId(int $usuario_id): void { $this->usuario_id = $usuario_id; }
    public function setTemporadaId(?int $temporada_id): void { $this->temporada_id = $temporada_id; }
    public function setActorId(?int $actor_id): void { $this->actor_id = $actor_id; }
    public function setMonstruoId(?int $monstruo_id): void { $this->monstruo_id = $monstruo_id; }

    // Getters
    public function getId(): int { return $this->id; }
    public function getUsuarioId(): int { return $this->usuario_id; }
    public function getTemporadaId(): ?int { return $this->temporada_id; }
    public function getActorId(): ?int { return $this->actor_id; }
    public function getMonstruoId(): ?int { return $this->monstruo_id; }
}