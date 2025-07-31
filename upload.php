<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $directorio_raiz = __DIR__;
    $directorio = "archivos/";

    $ip = $_SERVER["REMOTE_ADDR"];
    error_log("IP detectada: $ip");

    $carpeta_ip = str_replace([".", ":"], "-", $ip);
    $ruta_carpeta = $directorio . $carpeta_ip;


    if (!is_dir($ruta_carpeta)) {
        mkdir($ruta_carpeta);
    }

    $check = getimagesize($_FILES["archivo"]["tmp_name"]);
    if ($check === false) {
        echo "Archivo no es una imagen";
        exit;
    }

    if ($_FILES["archivo"]["size"] > 1000000) {
        echo "Archivo es muy grande, no debe ser superior a 2Mb";
        exit;
    }

    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $ruta_destino = $ruta_carpeta . "/" . $nombre_archivo;

    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta_destino)) {
        echo "El archivo se subió correctamente";
        header("Location: show-files.php");
    } else {
        echo "Error al subir el archivo";
    }
}