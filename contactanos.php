<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Sound Studio</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilos/Contactanos.css">
</head>
<body id="main-container">
    <header class="Cabecera-Header">
        <div class="Container-Cabecera Nav-Container">
            <img src="images/logo.jpeg" alt="LOGO" style="width: 150px;  height: 150px;">
            <nav class="Cabecera-Nav Cabecera-Contenido">
                <ul>
                     <li><a href="#">Inicio</a></li>
                    <li><a href="#">Categorias</a></li>
                    <li><a href="#">Conocenos</a></li>
                    <li><a href="#">Acerca De</a></li>
                </ul>
            </nav>
            <nav class="Cabecera-Nav Cabecera-Sesion">
                <ul>
                    <li><a href="#">Registrate</a></li>
                    <li><a href="#">Inciar Sesion</a></li>
                </ul>
            </nav>
            <a href="#"><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i></a>
        </div>
    </header>
    <div class="Container-Form">
        <br><br>
        <h1>CONTACTANOS</h1>
        
        <div class="Container-Form">
            <div id="formulario">
                <h2>¿Ocurrió algún problema? Háznoslo saber</h2>
                <form action="correo.php" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                
                    <input type="submit" value="Enviar" id="submit-button">
                </form>
            </div>
        </div>
        
    
        <div id="redes-sociales">
            <h2>Estamos en las siguientes redes sociales:</h2>
            <a href="https://twitter.com/AudifonosUAA" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/twitter.png" alt="Twitter Logo" width="30" height="30">
            </a>
            <a href="https://www.facebook.com/profile.php?id=61553795859447" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/facebook.png" alt="Facebook Logo" width="35" height="35">
            </a>
            <a href="https://www.instagram.com/TU_USUARIO_DE_INSTAGRAM" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/instagram.jpeg" alt="Instagram Logo" width="35" height="35">
            </a>
        </div>
        <br> <br>
    </div>
    
 
   
    <br><br>
    <div id="Contenedor-Contacto">
        <h2>¿Por qué somos mejor que otras empresas?</h2>
        <br>
        <p>
            Revolt Studio es una empresa innovadora que ha irrumpido en el mundo de la tecnología auditiva con una propuesta única y emocionante. Aunque recién está comenzando su trayectoria, ya ha dejado una marca distintiva gracias a su compromiso con la calidad, el diseño vanguardista y la última tecnología en audio.
            
            Lo que distingue a Revolt Studio de otras empresas es su enfoque centrado en la experiencia del usuario. Cada par de audífonos ha sido cuidadosamente diseñado para ofrecer un sonido excepcional y una comodidad sin igual. Además, la empresa se enorgullece de utilizar materiales de alta calidad que garantizan durabilidad y resistencia.
            
            La tecnología de punta incorporada en los audífonos de Revolt Studio ofrece una experiencia de audio inigualable. Desde la cancelación de ruido hasta la conectividad Bluetooth de última generación, estos audífonos no solo cumplen con las expectativas, sino que las superan.
            Revolt Studio está destinada a convertirse en un referente en el mercado de audífonos, ofreciendo una combinación única de calidad, estilo y rendimiento que la distingue de la competencia. Con audífonos diseñados para elevar la experiencia auditiva, Revolt Studio está lista para conquistar el corazón de los amantes de la música y audiófilos exigentes.
        </p> 
    </div>
    <br><br><br><br>
    <h2>También nos pueden encontrar en la siguiente ubicación:</h2>
    <br>
    <div id="ubicacion">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7403.06308333198!2d-102.32193823628147!3d21.914108023178432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429eee23dfea56d%3A0xc2edcc935471e5fa!2sUniversidad%20Aut%C3%B3noma%20de%20Aguascalientes%2C%2020100%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1701019181041!5m2!1ses-419!2smx" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p><b>Universidad Autónoma de Aguascalientes<br>
            Avenida Universidad 940 <br> 449 910 7400<br>
            Abierto ⋅ Cierra a las 9 p.m.</b> </p>
    </div>
    <br><br>
    
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>