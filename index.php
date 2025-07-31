<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="archivo">
            Archivo:
            <input type="file" name="archivo" id="archivo" required>
        </label>

        <button type="submit">
            Subir archivo
        </button>
    </form>
</body>
</html>