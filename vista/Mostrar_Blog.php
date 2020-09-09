<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
    </head>
    <body>
        <?php
            include ('../modelo/Manejo_Objetos.php');

            try{
                $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
                $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                
                //-----------------------------------Paginación-----------------------------------
            $tamanho_paginas = 5;
            if(isset($_GET['pagina'])){
        
            if ($_GET['pagina']==1){
                 header("Location:Mostrar_Blog.php");
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
    
    //----------------------------------------------------------------------------------     
                $Manejo_Objetos = new Manejo_Objetos($miconexion);
                
                $tabla_blog = $Manejo_Objetos->getContenidoPorFecha($empezar_desde, $tamanho_paginas);
                $entrada_blog = $Manejo_Objetos->getContenidoPorEntrada();
                
                if(!empty($_POST['btnBuscar'])){
                    $date1 = $_POST['date1'];
                    $date2 = $_POST['date2'];
                    $tabla_blog = $Manejo_Objetos->getContenidoBusqueda($date1,$date2);
                   
                    if(empty($tabla_blog)){
                        echo 'NO HAY ENTRADAS PARA MOSTRAR';
                    }
                }
                ?>
               <form method="post">	
                    <label>Desde: </label>
                    <input type="date"  placeholder="Start" name="date1" />
                    <label> Hasta: </label>
                    <input type="date" placeholder="End" name="date2" />          
                    <input type="submit" name="btnBuscar" value="Buscar" />
                </form><?php
                if(empty($tabla_blog)){
                    echo 'No hay entrada de blog aun<br>';
                }else{
                    $cantidad = 1;
                    foreach ($entrada_blog as $valor1){
                            $cantidad++;
                            //echo '<a>' . $valor1->getTitulo() . '</a>';
                            //echo '<hr><hr>';
                    }
                    
                    foreach ($tabla_blog as $valor){    
                            echo "<h2>" . $valor->getTitulo() . "</h2>";   
                            echo "<h4>" . utf8_encode( date('d-m-Y H:i:00', strtotime($valor->getFecha())))  . "</h4> <h3>" . $valor->getSubtitulo() . "</h3>";
                            if($valor->getImagen() != ""){
                                echo "<img src='../imagenes/";
                                echo $valor->getImagen() . "' width='300px' height= '200px'/>";
                            }
                            echo '<div style="width= 400px">' . html_entity_decode($valor->getComentario()) . '</div>';
                            ?>
                            <input type="hidden" name="Id" value="<?php echo $Id = $valor->getId(); ?>">
                            <?php
                            echo "<a href='../modelo/editar_entrada.php?Id=".$Id."'>Editar </a>";
                            echo "<a href='../modelo/eliminar_entrada.php?Id=".$Id."'> Eliminar</a>";
                            echo '<hr />';   
                    }
                 }
                 
//--------------------------Paginación-------------------------------------------------------
                    for($i=1;$i<=$tamanho_paginas;$i++){
                        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
                    }
            
                
                } catch (Exception $e) {
                    die("Error " . $e.getMessage());
                }
        ?>
        <br>
        <a href="Formulario.php"> Volver a la pagina de insercion</a><br>
        <script>
        function Confirmar(Mensaje){
                        
            return(confirm(Mensaje))?true:false;          
        }
    </script>
    </body>
</html>
