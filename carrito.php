<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Carrito</title>
</head>
<body>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "audifonos";
  
  $conexion= new mysqli($servername, $username, $password, $dbname);

  if ($conexion->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
  }
  if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    $precioF=$_GET["precioFinal"];
    $cantidadSel=$_GET["cantidadS"];
    $usuarioN=$_GET["usuario"];
    $sql="SELECT * FROM productos WHERE id='$idProducto'";
    $resultado=$conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $fila=$resultado->fetch_assoc();
        $nombreP=$fila["nombre"];
        $descripcionP=$fila["descripcion"];
        $precioSN=$fila["precio"];
        $imagenPS=$fila["imagen"];
        if($cantidadSel>$fila["cantidad"]) {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "No existen tantos productos en existencia",
                text: "' . $conexion->error . '"
        }).then(function () {
            window.location.href = "productos.php";
        });
          </script>';

        }
        else {
            if($cantidadSel>1) {
                $inserP=0;
                while($inserP<$cantidadSel) {
                    $sqlC = "INSERT INTO carrito (nombre, descripcion, precioSD, precioF, imagen, usuario) VALUES ('$nombreP', '$descripcionP', $precioSN, $precioF,'$imagenPS', '$usuarioN')";
                    $inserP++;
                    if($inserP==$cantidadSel) {
                        if ($conexion->query($sqlC) === TRUE) {
                            echo '<script>
                                        Swal.fire({
                                            icon: "success",
                                            title: "Producto agregado al carrito",
                                            showConfirmButton: false,
                                            timer: 2500
                                        }).then(function () {
                                            window.location.href = "productos.php";
                                        });
                                      </script>';
                        } else {
                            echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error al actualizar el producto",
                                text: "' . $conexion->error . '"
                            });
                          </script>';
                            
                        }
    
                    }
                    else {
                        $conexion->query($sqlC);
                    }
                    
                }
                
            
            }
            else {
                $sqlC = "INSERT INTO carrito (nombre, descripcion, precioSD, precioF, imagen, usuario) VALUES ('$nombreP', '$descripcionP', $precioSN, $precioF,'$imagenPS', '$usuarioN')";
                if ($conexion->query($sqlC) === TRUE) {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Producto agregado al carrito",
                                    showConfirmButton: false,
                                    timer: 2500
                                }).then(function () {
                                    window.location.href = "productos.php";
                                });
                              </script>';
                } else {
                    echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error al actualizar el producto",
                        text: "' . $conexion->error . '"
                    });
                  </script>';
                    
                }
            }

        }
        
        
       
    }
  }
  else {
    echo "Error";
  }



?>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('guardarC').addEventListener('click', function () {
            //solicitud AJAX para enviar los datos del formulario al servidor

            // En la respuesta exitosa del servidor
            let response = {
                status: 'success', 
                title: 'Producto actualizado correctamente', 
                text: ''
            };

            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: response.title,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = 'productos.php';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: response.title,
                    text: response.text
                });
            }
        });
    });
</script>



