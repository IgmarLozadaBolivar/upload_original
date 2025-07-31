<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 2rem;
        }
        .image {
            width: 200px;
            height: 200px;
        }
        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            cursor: pointer;
        }
    </style>
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

    <div id="imagenes" class="grid"></div>

    <script>
        async function cargarImagenes() {
            try {
                const response = await fetch("show-files.php");
                const imagenes = await response.json();
                const contenedor = document.getElementById("imagenes");
                imagenes.forEach((img, index) => {
                    const div = document.createElement("div");
                    div.className = "image";
                    const image = document.createElement("img");
                    image.src = img;
                    image.alt = `Imagen ${index + 1}`;
                    div.appendChild(image);
                    contenedor.appendChild(div);
                });
            } catch (err) {
                console.error("Error cargando imágenes:", err);
            }
        }

        cargarImagenes();
    </script>
</body>
</html>