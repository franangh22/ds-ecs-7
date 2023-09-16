<?php

require_once '../Equipos/request/nuevoRequest.php';
require_once '../Equipos/responses/nuevoResponse.php';
require_once '../../modelo/Jugador.php';

header('Content-Type: application/json');

$resp = new nuevoRequest();

$json = file_get_contents('php://input', true);
// Convertir el body en un objeto
$req = json_decode($json);

$cantjugadores = 0;

foreach ($req->ListJugadores as $j) {

    $cantjugadores = $cantjugadores + 1;

}

if ($cantjugadores >= 1 && $cantjugadores <= 5) {
    $resp->IsOk = true;
    $resp->Mensaje = '';
} else {
    $resp->IsOk = false;
    $resp->Mensaje = 'El equipo posee ' . $cantjugadores . ' y debe poseer entre 1 y 5  jugadores';
}

echo json_encode($resp);