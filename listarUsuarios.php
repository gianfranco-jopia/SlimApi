<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Lista de Usuarios api reqres.in</h2>
        <a href="logout.php" class="btn btn-danger mb-3">Cerrar Sesión</a>
        <table id="userTable" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody id="userTableBody"></tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "https://reqres.in/api/users?page=2",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let usuarios = data.data;
                    let tabla = "";
                    usuarios.forEach(user => {
                        tabla += `<tr>
                            <td>${user.id}</td>
                            <td>${user.first_name} ${user.last_name}</td>
                            <td>${user.email}</td>
                            <td><img src="${user.avatar}" width="50" class="rounded-circle"></td>
                        </tr>`;
                    });
                    $("#userTableBody").html(tabla);

                    $("#userTable").DataTable({
                        "paging": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "language": {
                            "lengthMenu": "Mostrar _MENU_ registros por página",
                            "zeroRecords": "No se encontraron resultados",
                            "info": "Mostrando página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                            "search": "Buscar:",
                            "paginate": {
                                "first": "Primero",
                                "last": "Último",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud:", status, error);
                }
            });
        });
    </script>
</body>
</html>