<?php
    include_once("Objeto_Blog.php");
    
    class Manejo_Objetos{
        
        private $conexion;
        
        public function __construct($conexion) {
            
            $this->setConexion($conexion);
        }
        
        public function setConexion(PDO $conexion) {
            
            $this->conexion = $conexion; 
        }
        
        public function getContenidoPorEntrada(){
            $matriz = array();
            $contador = 0;
            
            $resultado = $this->conexion->query("SELECT * FROM contenido GROUP BY Fecha HAVING COUNT(Id) < 5 ORDER BY Fecha DESC ");
           
            while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){
                
                $blog1 = new Objeto_Blog();
                
                if($contador < 4){
                    $blog1->setId($registro["Id"]);
                
                    $blog1->setTitulo($registro["Titulo"]);
                
                    $blog1->setSubtitulo($registro["Subtitulo"]);
                
                    $blog1->setFecha($registro["Fecha"]);
                
                    $blog1->setComentario($registro["Comentario"]);
                
                    $blog1->setImagen($registro["Imagen"]);
                
                    $matriz[$contador] = $blog1;
                }
                $contador++;  
            }
            
            return $matriz;
        }
        
        public function getContenidoPorFecha($empezar_desde,  $tamanho_paginas) {
            
            $matriz = array();
            $contador = 0;
            
            $resultado = $this->conexion->query("SELECT * FROM contenido ORDER BY Fecha DESC LIMIT $empezar_desde, $tamanho_paginas");
            
            while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){
                
                $blog = new Objeto_Blog();
                
                
                $blog->setId($registro["Id"]);
                
                $blog->setTitulo($registro["Titulo"]);
                
                $blog->setSubtitulo($registro["Subtitulo"]);
                
                $blog->setFecha($registro["Fecha"]);
                
                $blog->setComentario($registro["Comentario"]);
                
                $blog->setImagen($registro["Imagen"]);
                
                $matriz[$contador] = $blog;
                
                $contador++;
                
            }
            
            return $matriz;
        }
        
        public function getContenidoBusqueda($date1,$date2) {
            $matriz = array();
            $contador = 0;
            
            $resultado = $this->conexion->query("SELECT * FROM contenido WHERE Fecha BETWEEN '$date1' AND '$date2' order by Fecha");
            
            while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){
                
                $blog = new Objeto_Blog();
                
                
                $blog->setId($registro["Id"]);
                
                $blog->setTitulo($registro["Titulo"]);
                
                $blog->setSubtitulo($registro["Subtitulo"]);
                
                $blog->setFecha($registro["Fecha"]);
                
                $blog->setComentario($registro["Comentario"]);
                
                $blog->setImagen($registro["Imagen"]);
                
                $matriz[$contador] = $blog;
                
                $contador++;
                
            }
            
            return $matriz;
        }
        public function insertaContenido(Objeto_Blog $blog) {
            //$blog->getFecha()
            $sql = "INSERT INTO contenido (Titulo, Subtitulo, Fecha, Comentario, Imagen) VALUES ('" . $blog->getTitulo() . "', '" . $blog->getSubtitulo() . "', now(), '" . $blog->getComentario() . "', '" . $blog->getImagen() . "')";
            
            $this->conexion->exec($sql);
        }
        
        public function EliminarEntrada($Id) {
            $sql = "DELETE FROM contenido WHERE Id = '". $Id ."'";
        }
    }
    if (isset($_POST['btnEliminar'])){      
            $Manejo_Objetos->EliminarEntrada($Id);
    }

?>
