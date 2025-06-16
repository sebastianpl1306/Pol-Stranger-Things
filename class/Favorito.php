<?php
//Permite importar la clase Connection
require_once __DIR__.'/../helpers/connectionDB.php';

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

    private function validarTipo(): void {
        $tipos = [$this->temporada_id, $this->actor_id, $this->monstruo_id];
        $noNulos = array_filter($tipos, fn($v) => $v !== null);
        if (count($noNulos) !== 1) {
            throw new Exception("Debe haber exactamente un tipo de favorito definido.");
        }
    }

    public function existe(): bool {
        $this->validarTipo();
        try {
            $this->connectToDB();
            $conn = $this->get_connection();

            // Construcción dinámica segura
            $sql = "SELECT id FROM favoritos WHERE usuario_id = ?";
            $parametros = [$this->usuario_id];
            $tipos = "i";

            if ($this->temporada_id !== null) {
                $sql .= " AND temporada_id = ?";
                $parametros[] = $this->temporada_id;
                $tipos .= "i";
            } elseif ($this->actor_id !== null) {
                $sql .= " AND actor_id = ?";
                $parametros[] = $this->actor_id;
                $tipos .= "i";
            } elseif ($this->monstruo_id !== null) {
                $sql .= " AND monstruo_id = ?";
                $parametros[] = $this->monstruo_id;
                $tipos .= "i";
            }

            // Preparar consulta
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Error en prepare: " . $conn->error . " | SQL: " . $sql);
            }

            $stmt->bind_param($tipos, ...$parametros);
            $stmt->execute();
            $stmt->store_result();

            $existe = $stmt->num_rows > 0;
            $stmt->close();

            return $existe;

        } catch (Exception $e) {
            echo "Error en existe(): " . $e->getMessage();
            return false;
        }
    }

    public function agregar(): bool {
        $this->validarTipo();
        try {
            if ($this->existe()) {
                return false; // Ya existe, no insertar
            }

            $this->connectToDB();
            $conn = $this->get_connection();

            $sql = "INSERT INTO favoritos (usuario_id, temporada_id, actor_id, monstruo_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Error en prepare: " . $conn->error . " | SQL: " . $sql);
            }

            // Asegurar que los valores sean enteros o null
            $usuario_id = $this->usuario_id;
            $temporada_id = $this->temporada_id ?? null;
            $actor_id = $this->actor_id ?? null;
            $monstruo_id = $this->monstruo_id ?? null;

            $stmt->bind_param("iiii", $usuario_id, $temporada_id, $actor_id, $monstruo_id);

            $resultado = $stmt->execute();
            if (!$resultado) {
                throw new Exception("Error al ejecutar INSERT: " . $stmt->error);
            }

            $stmt->close();
            return true;

        } catch (Exception $e) {
            echo "Error en agregar(): " . $e->getMessage();
            return false;
        }
    }

    public function eliminar() {
        $this->connectToDB();
        $conexion = $this->get_connection();

        $consulta = "DELETE FROM favoritos WHERE usuario_id = ?";
        $stmt = null;

        if ($this->temporada_id !== null) {
            $consulta .= " AND temporada_id = ?";
            $stmt = mysqli_prepare($conexion, $consulta);
            if (!$stmt) {
                echo "Error en prepare (temporada): " . mysqli_error($conexion);
                return false;
            }
            mysqli_stmt_bind_param($stmt, 'ii', $this->usuario_id, $this->temporada_id);

        } elseif ($this->actor_id !== null) {
            $consulta .= " AND actor_id = ?";
            $stmt = mysqli_prepare($conexion, $consulta);
            if (!$stmt) {
                echo "Error en prepare (actor): " . mysqli_error($conexion);
                return false;
            }
            mysqli_stmt_bind_param($stmt, 'ii', $this->usuario_id, $this->actor_id);

        } elseif ($this->monstruo_id !== null) {
            $consulta .= " AND monstruo_id = ?";
            $stmt = mysqli_prepare($conexion, $consulta);
            if (!$stmt) {
                echo "Error en prepare (monstruo): " . mysqli_error($conexion);
                return false;
            }
            mysqli_stmt_bind_param($stmt, 'ii', $this->usuario_id, $this->monstruo_id);

        } else {
            echo "Error: No se definió ningún tipo (actor, temporada o monstruo).";
            return false;
        }

        // Ejecutar y retornar el resultado
        return mysqli_stmt_execute($stmt);
    }
}