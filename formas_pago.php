<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago</title>
    <link rel="shortcut icon" href="Media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/formass_pagos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function validar(){
            swal("¡Tarjeta encontrada!","Pago realizado con exito!","success");
            setTimeout(function() {
                window.location.href = "index.php";
            }, 2000);
        }
    </script>
</head>
<body style="background-color: beige;">
<header class="header">
            <nav class="navbar navbar-expand-lg fixed-top py-2" style="background-color: #005B41">
                <div class="containerN">
                    <a href="index.php" class="navbar-brand"><img src="Media/Img/logo_final.png" alt="LOGO" style="width: 70px;  height: 60px;"></a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                    
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                        <li class="nav-item" style="margin-right: 10px;"><a href="productos.php" class="nav-link text-uppercase font-weight-bold">Tienda</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Conocenos</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Acerca De</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="contactanos.php" class="nav-link text-uppercase font-weight-bold">Contactanos</a></li>
                            <!-- Menu Admin 
                            <li class="nav-item dropdown" style="margin-right: 10px;">
                                <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
                                <div class="dropdown-menu">    
                                    <a class="dropdown-item" href="altasProducto.php">Altas</a>
                                    <a class="dropdown-item" href="adminProductos.php">Cambios y Bajas</a>
                                </div>
                            </li>  -->
                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                            <li class="nav-item" style="margin-right: 5px; margin-left: 30px;"><a href="#" class="btn btn-outline-primary">Login</a></li>
                            <li class="nav-item" style="margin-right: 5px;"><a href="#" class="btn btn-outline-primary">Registrarse</a></li>
                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>
        </header>    
    <div class="container d-flex justify-content-center" id="formas" style="margin-top: 150px;">

            

        <div class="row g-3">

          <div class="col-md-6">  
            
            <span>Formas de Pago</span>
            <div class="card">

              <div class="accordion" id="accordionExample">
                
                <div class="card">
                  <div class="card-header p-0" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="d-flex align-items-center justify-content-between">

                          <span>Paypal</span>
                          <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                          
                        </div>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <input type="text" class="form-control" placeholder="Paypal email">
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header p-0">
                    <h2 class="mb-0">
                      <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="d-flex align-items-center justify-content-between">

                          <span>Tarjetas</span>
                          <div class="icons">
                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                            <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                            <img src="https://i.imgur.com/35tC99g.png" width="30">
                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                          </div>
                          
                        </div>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body payment-card-body">
                      
                      <span class="font-weight-normal card-text">Numero de Tarjeta</span>
                      <div class="input">

                        <i class="fa fa-credit-card"></i>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                        
                      </div> 

                      <div class="row mt-3 mb-3">

                        <div class="col-md-6">

                          <span class="font-weight-normal card-text">Fecha de caducidad</span>
                          <div class="input">

                            <i class="fa fa-calendar"></i>
                            <input type="text" class="form-control" placeholder="MM/YY">
                            
                          </div> 
                          
                        </div>


                        <div class="col-md-6">

                          <span class="font-weight-normal card-text">CVC/CVV</span>
                          <div class="input">

                            <i class="fa fa-lock"></i>
                            <input type="text" class="form-control" placeholder="000">
                            
                          </div> 
                          
                        </div>
                        

                      </div>

                      <span class="text-muted certificate-text"><i class="fa fa-lock"></i> 
                        Su transacción está asegurada con certificado ssl</span>
                     
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>

          </div>

          <div class="col-md-6">
              <span>Pedido  </span>

              <div class="card">

                <div class="d-flex justify-content-between p-3">

                  <div class="d-flex flex-column">

                    <span>Total de pedido<i class="fa fa-caret-down"></i></span>
                    <a href="#" class="billing">Ahorre 10% con tarjeta de credito</a>
                    
                  </div>

                  <div class="mt-1">
                    <sup class="super-price">$9.99</sup>
                  </div>
                  
                </div>

                <hr class="mt-0 line">

                <div class="p-3">

                <button class="btn btn-primary btn-block free-button" onclick="validar()" >Pagar pedido</button> 
                </div>



                
              </div>
          </div>
          
        </div>
        

      </div>
</body>
</html>
