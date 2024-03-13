<!DOCTYPE html>
<html>
<head>
    <title>Listado de Posts</title>
    <style>
        /* Estilos CSS para tu PDF de posts */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f0f0f0;
            text-align: left;
        }

        td {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Listado de Publicaciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenido</th>
                <th>Fecha de Publicación</th>
                <th>Nombre de Usuario</th>
                <!-- Otras columnas que quieras incluir -->
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->post_date }}</td>
                <td>{{ $post->user->name }}</td> <!-- Agregado -->
                <!-- Otras celdas de datos -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
