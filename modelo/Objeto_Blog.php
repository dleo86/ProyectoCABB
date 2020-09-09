<?php
    class Objeto_Blog{
        
        //Propiedades del Objeto_Blog
        private $id;
        private $Titulo;
        private $Subtitulo;
        private $Fecha;
        private $Comentario;
        private $Imagen;
        
        //Metodos de acceso getters y setters
        public function getId() {
            
            return $this->id;
        }
        
         public function setId($id) {
            
            $this->id = $id;
        }
        
        public function getTitulo() {
            
            return $this->Titulo;
        }
        
        public function setTitulo($Titulo) {
            
            $this->Titulo = $Titulo;
        }
        
        public function getSubtitulo() {
            
            return $this->Subtitulo;
        }
        
        public function setSubtitulo($Subtitulo) {
            
            $this->Subtitulo = $Subtitulo;
        }
        
        public function getFecha() {
            
            return $this->Fecha;
        }
        
         public function setFecha($Fecha) {
            
            $this->Fecha = $Fecha;
        }
        
        public function getComentario() {
            
            return $this->Comentario;
        }
        
         public function setComentario($Comentario) {
            
            $this->Comentario = $Comentario;
        }
        
         public function getImagen() {
            
            return $this->Imagen;
        }
        
         public function setImagen($Imagen) {
            
            $this->Imagen = $Imagen;
        }
    }
?>