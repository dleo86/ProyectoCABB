<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
            include_once("../modelo/Objeto_Blog.php");
            include_once("../modelo/Manejo_Objetos.php");
            try{
                $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
                $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
              if ($_FILES['imagen']['error']){
                 switch ($_FILES['imagen']['error']){
                    case 1: //Error exceso de tamaño de archivo en php .ini
                        echo 'El tamanho del archivo excede el permitido';
                        break;
                    case 2: //Error tamaño de archivo indicado en el formulario
                        echo 'El tamanho del archivo excede los 2 mb';
                        break;
                    case 3: //Corrupcion de archivo
                        echo 'El envio de archivo se interrumpio';
                        break;
                    case 4: //No hay fichero
                        echo 'No se ha enviado ningun archivo';
                        break;
                }
              } else {
                 echo "Entrada subida correctamente <br>";
                 if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))){
                    $destino_de_ruta = "../imagenes/";
                    
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);
                    
                    echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imagenes";
                } else {
                    echo "El archivo no se ha podido copiar al directorio de imagenes";
                }
            }
            $Manejo_Objetos = new Manejo_Objetos($miconexion);
            
            $blog = new Objeto_Blog();
            
            $blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES));
            $blog->setSubtitulo(htmlentities(addslashes($_POST["campo_subtitulo"]), ENT_QUOTES));
            setlocale(LC_ALL,"es_RA");
            //echo strftime("%A %d de %B del %Y");
            $blog->setFecha(Date("d-m-Y H:i:s"));
          //  $blog->setFecha(strftime("%A %d de %B del %Y"));
            $blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES));
            
            $blog->setImagen($_FILES["imagen"]["name"]);
            
            $Manejo_Objetos->insertaContenido($blog);
           
            echo '<br /> Entrada de blog con exito <br />';
            
            } catch (Exception $e) {
                
                die("Error " . $e->getMessage());
            }
            
        ?>
    </body>
</html>
