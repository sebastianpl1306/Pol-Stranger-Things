<?php
require_once __DIR__.'/../class/Favorito.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Debe iniciar sesión.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $favorito = new Favorito();
        $favorito->setUsuarioId($_SESSION['usuario_id']);

        // Establecer solo un tipo de ID
        $favorito->setTemporadaId(!empty($_POST['temporada_id']) ? (int)$_POST['temporada_id'] : null);
        $favorito->setActorId(!empty($_POST['actor_id']) ? (int)$_POST['actor_id'] : null);
        $favorito->setMonstruoId(!empty($_POST['monstruo_id']) ? (int)$_POST['monstruo_id'] : null);

        // Comprobar si ya existe
        if ($favorito->existe()) {
            // Si existe, eliminarlo
            $favorito->eliminar(); // Debes tener este método en tu clase
            $mensaje = "Favorito eliminado correctamente.";
        } else {
            // Si no existe, agregarlo
            if ($favorito->agregar()) {
                $mensaje = "Favorito agregado con éxito.";
            } else {
                $mensaje = "Hubo un error al agregar el favorito.";
            }
        }

        // Redirigir según el tipo
        if($favorito->getTemporadaId() !== null) {
            $id = $favorito->getTemporadaId();
            header("Location: ../views/detalleTemporada.php?id=$id&mensaje=" . urlencode($mensaje));
        } elseif ($favorito->getActorId() !== null) {
            $id = $favorito->getActorId();
            header("Location: ../views/detalleActor.php?id=$id&mensaje=" . urlencode($mensaje));
        } else {
            $id = $favorito->getMonstruoId();
            header("Location: ../views/detalleMonstruo.php?id=$id&mensaje=" . urlencode($mensaje));
        }

        exit();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}