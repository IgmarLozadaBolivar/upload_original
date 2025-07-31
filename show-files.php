<?php

$path = __DIR__ . '/archivos';

if (!is_dir($path)) {
    echo "El directorio no existe.";
    exit;
}

$archivos = scandir($path);

echo "<h1>Archivos en 'archivos/':</h1><ul>";
foreach ($archivos as $archivo) {
    if ($archivo === '.' || $archivo === '..') continue;
    echo '<li><a href="archivos/$archivo">$archivo</a></li>';
}
echo '</ul>';