<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Circulo de Ajedrez Bahía Blanca</title>
    <!-- font awesome  <link rel="stylesheet" href="./fontawesome-free-5.12.0-web/css/all.min.css"/> -->
    <link rel="shortcut icon" href="./img/logo.ico" class="logoico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" >   
   <!-- styles -->
    <link rel="stylesheet" href="css/styles.css"  />
    <link rel="stylesheet" href="css/actividades.css" />
    
    <script src="https://kit.fontawesome.com/9f5812d90f.js" crossorigin="anonymous"></script>
  </head>
  <body>
         <?php
            include ('modelo/Manejo_Objetos.php');
            
             try{
                $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
                $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                
                //-----------------------------------Paginación-----------------------------------
            $tamanho_paginas = 2;
            if(isset($_GET['pagina'])){
        
            if ($_GET['pagina']==1){
                 header("Location:index.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }
        
            } else {
                $pagina = 1;
            }
    
            $empezar_desde = ($pagina-1)*$tamanho_paginas;
            $sql_total = "SELECT * FROM contenido";
            $resultado = $miconexion->prepare($sql_total);
            $resultado->execute(array());
            $num_filas=$resultado->rowCount();
            $total_paginas = ceil($num_filas/$tamanho_paginas);
            ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0" nonce="dt1gsW1V"></script>
    <!-- header -->
    <header id="inicio"> <!-- id = inicio -->
      
      <!-- navbar  <nav id="nav">-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="nav">
        <div class="nav-center">
            <!-- nav header -->
            <div class="nav-header">
              <img src="./img/logo1.svg" alt="logo" class="logo">
              <button class="nav-toggle">
                <i class="fas fa-bars"></i>
              </button>
              <h4>C.A.B.B</h4>
            </div>
            <!-- links -->
            <div class="links-container">
              <ul class="links">
                <li>
                  <a href="#inicio" class="scroll-link"><i class="fa fa-home" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a href="./nosotros.html">Nosotros</a>
                </li>
                <li>
                  <a href="#actividades" class="scroll-link">Actividades</a>
                </li>
                <li>
                  <a href="./clases.html">Clases</a>
                </li>
                <li>
                  <a href="#contacto" class="scroll-link">Contacto</a>
                </li>
              </ul> 
            </div>
        </div>
      </nav>
      <!-- slider -->
  
      <div class="slider-container"> <!-- slider-container -->
        
        <div class="slide">
          <img src="./img/slider/portada1.jpg" class="slide-img"  alt="" />
          <div class= "slide-copy">
            <h2>Torneos por equipos</h2>
            <p style="color: white"><strong>Se realizan torneos por equipos dos veces al año, cada equipo debe estar conformado por cuatro integrantes. </strong></p>
          </div>
        </div>

        <div class="slide">
          <img src="./img/slider/portada2.jpg"  class="slide-img" alt="hongkong" />
          <div class= "slide-copy">
            <h2>Torneos online</h2>
            <p style="color: white"><strong>Los torneos online se realizan en el sitio web www.lichess.com con un tiempo de 5 minutos por partida.</strong></p>
          </div>
          
        </div>
        <div class="slide">
          <img src="./img/slider/portada3.jpg" class="slide-img"  alt="MountFuji" />
          <div class= "slide-copy">
            <h2>Torneos de categoría</h2>
            <p style="color: white"><strong>Los torneos más importantes se relizan una vez al año con sistema suizo de 1hs 30min cada partida.</strong></p>
          </div>
        </div>
        <div class="slide">
          <img src="./img/slider/portada4.jpg" class="slide-img" alt="" />
          <div class= "slide-copy">
            <h2>Torneos regionales</h2>
            <p style="color: white"><strong>Son torneos que se realizan los fines de semanas a finales de cada mes, compiten todas las ciudades de la zona.</strong></p>
          </div>
        </div>
          <!-- Dots -->
          <div class="carousel-dots">
            <div class="carousel-dot" id="dot1"></div>
            <div class="carousel-dot" id="dot2"></div>
            <div class="carousel-dot" id="dot3"></div>
            <div class="carousel-dot" id="dot4"></div>
        </div>
      </div>
    

    <div class="btn-container">
        <button type="button" class="prevBtn">
          <i class="fas fa-angle-left"  style="font-size:48px;"></i>
        </button>
        <button type="button" class="nextBtn">
          <i class="fas fa-angle-right"  style="font-size:48px;"></i>
        </button>
    </div>
  
    </header>
    <!-- actividades -->
  <div class="container-fluid"> <!--
  <section id="actividades" class="section">-->
    <div class="title" id="actividades">
        <h1>ACTIVIDADES</h1>
    </div>
    <div class="row align-items-start">
      <div class="col-lg-2 col-md-3"> 
          <div class="row" id="card">
            <div class="col-sm">
              <h3>Sponsor Oficial de C.A.B.B</h3>
              <img src="./img/noticias/sponsor.jpg" alt="logo-circulo" class="img-sponsor">
            </div>
          </div>
          <div class="row" id="card">
            <div class="col-sm">
              <h3>Entradas recientes</h3>
               <?php
                $Manejo_Objetos = new Manejo_Objetos($miconexion);
                $entrada_blog = $Manejo_Objetos->getContenidoPorEntrada();
                $cantidad = 1;
                $num = 1;
                foreach ($entrada_blog as $valor1){
                        $cantidad++;
                        if($cantidad > 3) $num = 2;
                        echo "<a href='?pagina=" . $num . "#actividades' >" . $valor1->getTitulo() . "</a>";
                        echo "<br><br>";
                }
                if(isset($_POST[$valor1->getTitulo()])){
                    echo 'hola mundo';
                }
             ?> 
            </div>
          </div>
          <div class="row" id="card">
            <div class="col-sm">
              <h3>Seguinos en facebook</h3>     
              <div class="fb-page" 
                data-href="https://www.facebook.com/C%C3%ADrculo-de-Ajedrez-Bah%C3%ADa-Blanca-1266348696796504/"
                data-width="220" 
                data-hide-cover="false"
                data-show-facepile="false">
              </div> 
            </div> 
          </div>
      </div>

      <div class="col-lg-8 col-md-6">
          <?php
                
                $tabla_blog = $Manejo_Objetos->getContenidoPorFecha($empezar_desde, $tamanho_paginas);
                if(!empty($_POST['btnBuscar'])){
                    $date1 = $_POST['date1'];
                    $date2 = $_POST['date2'];
                    $tabla_blog = $Manejo_Objetos->getContenidoBusqueda($date1,$date2); 
                    
                }
                if(empty($tabla_blog)){
                    echo 'No hay entrada de blog aun<br>';
                }else{
                      foreach ($tabla_blog as $valor){    
                           echo '<div class="card-center">';
                           echo "<h2>" . $valor->getTitulo() . "</h2>";   
                           echo "<p>" . utf8_encode( date('d-m-Y H:i:00', strtotime($valor->getFecha())))  . ", <strong>" . $valor->getSubtitulo() . "</strong></p>";
                           if($valor->getImagen() != ""){
                               echo "<div class='fakeimg'><img src='imagenes/";
                               echo $valor->getImagen() . "' width='200px' height= '200px' class='img-noti'/></div>";
                           }
                           echo '<div>' . html_entity_decode($valor->getComentario()) . '</div>';
                           echo '</div>';
                        }
                 }
                 
//--------------------------Paginación-------------------------------------------------------//
                //agrego el link a la pagina anterior 
                //si no tengo la variable q viaja por GET, debo mostrar el listado de la pagina 1, y el Anterior no debe ser link
                if (empty($_GET['pagina'])) {
                    $PaginaAnterior = '';
                
                } else if ($_GET['pagina'] == 1) {
                 //si tengo la variable q viaja por GET, y es la primer pagina, debo mostrar el listado de la pagina 1, y el Anterior tampoco debe ser link
                 $PaginaAnterior = '';
                
                } else if ($_GET['pagina'] <= $total_paginas) {
                    //si tengo la variable GET y es alguna pagina intermedia, agrego 1 para la proxima page
                    $PaginaAnterior = '?pagina=' . ($_GET['pagina'] - 1);
                }   
                echo '<div class="pagination">';
                if (!empty($PaginaAnterior)) {
                    //echo '<a href="?pagina=' . $PaginaAnterior . '#actividades">&laquo;</a>';
                    echo '<a href="' . $PaginaAnterior . '#actividades">&laquo;</a>';
                }
                $pagina = (!isset($_GET['pagina']))? 1 : $_GET['pagina']; 
                
                for($i=$pagina;$i<=min($pagina + 2,$total_paginas);$i++){
                    echo "<a href='?pagina=" . $i . "#actividades'>" . $i . "</a> ";
                }
                //agrego el link a la pagina siguiente 
                //si no tengo la variable q viaja por GET, debo mostrar el listado de la pagina 1, y el Siguiente apunta a la page 2
                if (empty($_GET['pagina'])) {
                    $PaginaSiguiente = '?pagina=2';
                } else if ($_GET['pagina'] < $total_paginas) {
                    //si tengo la variable GET y es alguna pagina intermedia, agrego 1 para la proxima page
                    $PaginaSiguiente = '?pagina=' . ($_GET['pagina'] + 1);
                    } else if ($_GET['pagina'] == $total_paginas) {
                        //si la variable GET tiene el valor de la ultima pagina, no le doy valor al Siguiente
                        $PaginaSiguiente = '';
                      }
                if (!empty($PaginaSiguiente)) {
                     echo "<a href='" . $PaginaSiguiente . "#actividades'>&raquo;</a>";
                }
          
                echo '</div>';
                
            } catch (Exception $e) {
                    die("Error " . $e.getMessage());
            }
        ?>
          
      </div>    

      <div class="col-lg-2 col-md-3">
          <div class="row" id="card">
            <div class="col-sm">
              <h3>Encontranos en chess24.com</h3>
              <img src="./img/logo.jpg" alt="logo-circulo" class="img-chess">
              <img src="./img/chess24.jpg" alt="chess24.com"  class="img-chess">
              <p>¡Vení a desafiarnos en <a href="https://chess24.com/es" target="_blank">chess24.com</a>!</p>
            </div>
          </div>
          <div class="row" id="card">
            <div class="col-sm">
              <h3>Buscar actividades por fecha</h3>
              <form method="post" action="#actividades">	
                <label>Desde: </label>
                <input type="date"  placeholder="Start" name="date1" />
                <label> Hasta: </label>
                <input type="date" placeholder="End" name="date2" /><br>    
                <input type="submit" name="btnBuscar" class="btn btn-primary bt-sm" value="Buscar" /> <!--Antes class=btnBuscar-->
              </form>  
            </div>
          </div><!--
          <div class="cardlittle">
            <h3>Nuestras redes</h3>
            <a href="https://twitter.com/home" target="_blank"><i class='fab fa-twitter' style='font-size:36px;color: #35add1;'></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class='fab fa-facebook' style='font-size:36px;color: #081480;'></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class='fab fa-youtube' style='font-size:36px;color:red;'></i></a> 
          </div>-->
      </div>

    </div> <!-- Fin row -->
    <!--
    </section>-->
  
        <!-- Contacto -->
    <section id="contacto" class="section">
          <div class="title">
            <h1>CONTACTO</h1>
          </div>
          <div class="row align-items-start">
            <div class="col-lg-1 col-md-2">
              <div class="row">
              </div>
              <div class="row" >
              </div> 
            </div>
            <div class="col-lg-8 col-md-6 "> <br>             
              <div class="row" id="fila">
                <div class="col-75">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3112.565552522241!2d-62.26992127116392!3d-38.727782370813!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42b40eeca9d5911e!2sC%C3%ADrculo%20de%20Ajedrez!5e0!3m2!1ses!2sar!4v1596286027605!5m2!1ses!2sar" width="500" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                  </iframe>
                </div> 
                <div class="col-25" id=columna>
                    <br>
                    <h3><strong>C.A.B.B</strong></h3><br>
                    <label><strong>Dirección:</strong> Thompson 486</label><br><br>
                    <label><strong>Teléfono:</strong> 0291 454-3304</label><br><br>
                    <label><strong>Email:</strong> circulodeajedrez@gmail.com</label><br><br>
                </div>
              </div>
              <hr>
              <div class="row" id="fila">
                <div class="col-lg-8 col-md-6"> 
                    <form action="./modelo/contact.php" method="POST">
                      <h3>Envianos tu consulta</h3><br>
                      <div class="form-group row" id="consulta"> 
                        <label for="fname" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre.." required>
                        </div>
                      </div>
                      <div class="form-group row" id="consulta">
                        <label for="lname" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" id="email" name="email" placeholder="Tu email.." required>
                        </div>
                      </div>
                      <div class="form-group row" id="consulta">
                        <label for="subject" class="col-sm-2 col-form-label">Consulta</label>
                        <div class="col-sm-8">
                          <textarea  name="consulta" placeholder="Escribe la consulta.." style="height:200px"></textarea>
                        </div>
                      </div>
                      <div class="form-group row" id="consulta">
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-3">
              <div class="row" id="card">
                <div class="col-sm">
                  <h3>Encontranos en chess.com</h3>
                  <img src="./img/logo.jpg" alt="logo-circulo" class="img-chess">
                  <img src="./img/chess.png" alt="chess.com"  class="img-chess">
                  <p>¡Vení a desafiarnos en <a href="https://www.chess.com" target="_blank">chess.com</a>!</p>
                </div>
              </div>
              <div class="row" id="card">
                <div class="col-sm">
                  <h3>Nuestras redes</h3>
                  <a href="https://twitter.com/home" target="_blank"><i class='fab fa-twitter' style='font-size:36px;color: #35add1;'></i></a>
                  <a href="https://www.facebook.com/" target="_blank"><i class='fab fa-facebook' style='font-size:36px;color: #081480;'></i></a>
                  <a href="https://www.youtube.com/" target="_blank"><i class='fab fa-youtube' style='font-size:36px;color:red;'></i></a>
                </div>
              </div> 
            </div>
          </div>
        </section>
      </div>
      <!-- footer -->
      <footer class="site-footer" style="background-color: #000000;" id="pie">
        <div class="footer-inner" style="background-color: #000000;">
          <div class="row align-items-start" style="background-color: #000000;">
            <p class="parrafo">
              Leandro Di Dio - <span class="date"> </span> Copyright &copy;<br>
              Cel: 291-4378724
            </p>
          </div>
        </div>
      </footer>
        <!-- back to top button -->
      <a href="#inicio" class="scroll-link top-link">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
      </a>
        <!-- javascript -->
        <script src="js/app.js"></script>
        <script src="js/slider.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    </body>
    
</html>
