<?php

   // $errores='';
   // extract ($_REQUEST);
    try{
	$miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
        die();
    }
    function limpiarDatos($datos){
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
    }
    function id_numeros($id){
		return (int)limpiarDatos($id);
    }
    function obtener_entrada_id($miconexion,$id_entrada){
        $resultado = $miconexion->query("SELECT * FROM contenido WHERE Id = $id_entrada LIMIT 1");
	$resultado = $resultado->fetchall();
	return ($resultado) ? $resultado : false;
    }
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
	$id = $_POST['Id'];
	$titulo = $_POST['Titulo'];
        $subtitulo = $_POST['Subtitulo'];
        $comentario = $_POST['Comentario'];
        $imagen = $_POST['Imagen'];

	$statement = $miconexion->prepare(
	    "UPDATE contenido SET
            Titulo = :titulo,
            Subtitulo = :subtitulo,
            Comentario = :comentario
	    WHERE Id =:id");

	$statement->execute(array(
	    ':id'=>$id,
	    ':titulo'=> $titulo,
            ':subtitulo'=> $subtitulo,
            ':comentario'=> $comentario));
        header('Location: ../vista/Mostrar_Blog.php');
    }else{
	    $id_entrada = id_numeros($_GET['Id']);
	    if(empty($id_entrada)){
	    	header('Location: ../vista/Mostrar_Blog.php');
	    }
	    $entrada = obtener_entrada_id($miconexion,$id_entrada);	
	    if(!$entrada){
	   	header('Location: ../vista/Mostrar_Blog.php');
	    }
	    $entrada =$entrada[0];
    }
    require '../vista/editar_formulario.php';
    

