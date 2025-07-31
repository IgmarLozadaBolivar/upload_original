<?php
header('Content-Type: application/json');
function obtenerImagenes($directorio_raiz = "archivos"): array
{
    $imagenes = [];

    if (!is_dir($directorio_raiz)) {
        return $imagenes;
    }

    foreach (scandir($directorio_raiz) as $carpeta) {
        if ($carpeta === "." || $carpeta === "..") continue;

        $ruta = $directorio_raiz . '/' . $carpeta;

        if (is_dir($ruta)) {
            foreach (scandir($ruta) as $archivo) {
                if ($archivo === "." || $archivo === "..") continue;

                $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                    $imagenes[] = "$ruta/$archivo";
                }
            }
        }
    }

    return $imagenes;
}

$imagenes = obtenerImagenes();
echo json_encode($imagenes);
