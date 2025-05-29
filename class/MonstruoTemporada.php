<?php
require_once 'Connection.php';

class MonstruoTemporada extends Connection {
    private int $id;
    private int $monstruo_id;
    private int $temporada_id;

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setMonstruoId(int $monstruo_id): void { $this->monstruo_id = $monstruo_id; }
    public function setTemporadaId(int $temporada_id): void { $this->temporada_id = $temporada_id; }

    // Getters
    public function getId(): int { return $this->id; }
    public function getMonstruoId(): int { return $this->monstruo_id; }
    public function getTemporadaId(): int { return $this->temporada_id; }
}