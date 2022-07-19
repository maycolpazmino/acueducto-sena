<?php

function tipoId($tipoId)
{
    switch ($tipoId) {
        case 'Cédula de Ciudadanía':
            $tipoId = 1;
            break;
        case 'Pasaporte':
            $tipoId = 2;
            break;
        case 'Tarjeta de Identidad':
            $tipoId = 3;
            break;
        case 'Cédula Extranjeria':
            $tipoId = 4;
            break;
        default:
            $tipoId = "Documento de Identificación";
            break;
    }
    return $tipoId;
}

function tipoDoc($tipoId)
{
    switch ($tipoId) {
        case 1:
            $tipoId = 'Cédula de Ciudadanía';
            break;
        case 2:
            $tipoId = 'Pasaporte';
            break;
        case 3:
            $tipoId = 'Tarjeta de Identidad';
            break;
        case 4:
            $tipoId = 'Cédula Extranjeria';
            break;
        default:
            $tipoId = "Documento de Identificación";
            break;
    }
    return $tipoId;
}

function tipoDenuncia($denuncia)
{
    switch ($denuncia) {
        case 'Derecho de Petición':
            $denuncia = 1;
            break;
        case 'Acción de Tutela':
            $denuncia = 2;
            break;
        case 'Proceso Penal':
            $denuncia = 3;
            break;
        case 'Nulidades y Restablecimiento':
            $denuncia = 4;
            break;
        case 'Reparación Directa';
            $denuncia = 5;
            break;
        default:
            $denuncia = "";
            break;
    }
    return $denuncia;
}

