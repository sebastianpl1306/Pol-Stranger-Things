<?php
require_once 'Connection.php';

class PersonajeTemporada extends Connection {
    private int $id;
    private string $personaje;
    private int $temporada_id;
    private int $actor_id;

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setPersonaje(string $personaje): void { $this->personaje = $personaje; }
    public function setTemporadaId(int $temporada_id): void { $this->temporada_id = $temporada_id; }
    public function setActorId(int $actor_id): void { $this->actor_id = $actor_id; }

    // Getters
    public function getId(): int { return $this->id; }
    public function getPersonaje(): string { return $this->personaje; }
    public function getTemporadaId(): int { return $this->temporada_id; }
    public function getActorId(): int { return $this->actor_id; }
}