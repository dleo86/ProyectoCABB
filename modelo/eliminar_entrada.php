<?php

        $errores='';
	extract ($_REQUEST);
	try{
		$miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
                $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM contenido WHERE Id = '$_REQUEST[Id]'";
	$resultado = $miconexion->query($sql);

	if($resultado == true){
		header('Location: ../vista/Mostrar_Blog.php');
		$errores .='Entrada eliminada correctamente';
	}