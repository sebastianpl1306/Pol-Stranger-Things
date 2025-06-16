<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
* La clase ReporteAdmin contiene los métodos necesarios para obtener estadísticas generales del blog
* sobre Stranger Things. Hereda de Connection para acceder a la base de datos con mysqli.
*/
class ReporteAdmin extends Connection {

    // Obtener el total de usuarios registrados
    public function obtener_total_usuarios() {
        $this->connectToDB();
        $sql = "SELECT COUNT(*) AS total FROM usuarios";
        $result = mysqli_query($this->get_connection(), $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }
    
    // Obtener el total de personajes registrados
    public function obtener_total_personajes() {
        $this->connectToDB();
        $sql = "SELECT COUNT(*) AS total FROM actores";
        $result = mysqli_query($this->get_connection(), $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }

    // Obtener el total de monstruos registrados
    public function obtener_total_monstruos() {
        $this->connectToDB();
        $sql = "SELECT COUNT(*) AS total FROM monstruos";
        $result = mysqli_query($this->get_connection(), $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }

    // Obtener el total de temporadas
    public function obtener_total_temporadas() {
        $this->connectToDB();
        $sql = "SELECT COUNT(*) AS total FROM temporadas";
        $result = mysqli_query($this->get_connection(), $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }

    // Obtener el total de visitas (usamos la cantidad de registros en "favoritos" como referencia)
    public function obtener_total_favoritos() {
        $this->connectToDB();
        $sql = "SELECT COUNT(*) AS total FROM favoritos";
        $result = mysqli_query($this->get_connection(), $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'] ?? 0;
    }

    // Obtener los personajes más populares (más veces añadidos a favoritos)
    public function obtener_personajes_mas_populares($limite = 5) {
        $this->connectToDB();
        $items = [];

        $sql = "SELECT a.personaje AS nombre, COUNT(f.actor_id) AS visitas
                FROM favoritos f
                INNER JOIN actores a ON a.id = f.actor_id
                GROUP BY f.actor_id
                ORDER BY visitas DESC
                LIMIT ?";
        
        $stmt = mysqli_prepare($this->get_connection(), $sql);
        mysqli_stmt_bind_param($stmt, 'i', $limite);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }

        return $items;
    }

    // Obtener los monstruos más populares (más veces añadidos a favoritos)
    public function obtener_monstruos_mas_populares($limite = 5) {
        $this->connectToDB();
        $items = [];

        $sql = "SELECT m.nombre, COUNT(f.monstruo_id) AS visitas
                FROM favoritos f
                INNER JOIN monstruos m ON m.id = f.monstruo_id
                GROUP BY f.monstruo_id
                ORDER BY visitas DESC
                LIMIT ?";

        $stmt = mysqli_prepare($this->get_connection(), $sql);
        mysqli_stmt_bind_param($stmt, 'i', $limite);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }

        return $items;
    }

    // Obtener temporadas con más publicaciones (también desde la tabla "favoritos")
    public function obtener_temporadas_mas_populares($limite = 5) {
        $this->connectToDB();
        $items = [];

        $sql = "SELECT t.numero, COUNT(f.temporada_id) AS publicaciones
                FROM favoritos f
                INNER JOIN temporadas t ON t.id = f.temporada_id
                GROUP BY f.temporada_id
                ORDER BY publicaciones DESC
                LIMIT ?";

        $stmt = mysqli_prepare($this->get_connection(), $sql);
        mysqli_stmt_bind_param($stmt, 'i', $limite);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }

        return $items;
    }
}