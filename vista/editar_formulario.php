<?php
try{
    $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog','root','');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
        die();
    }/*
$blog = $miconexion->prepare("SELECT * FROM contenido");

$blog->execute();
$blog = $blog->fetchAll();
if(!$blog)
	$mensaje .= 'No hay entradas para mostrar! <br />';*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blog Píldoras</title>
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
 <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<style>

h2{
	text-align:center;
}

table{
	width:50%;
	margin:auto;
	background-color:#FF9;
	border:solid 2px #FF9900;
	padding:5px;
	
}

td{
	padding:5px 0;
}


</style>
</head>

<body>
<h2>Nueva entrada</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data" name="form1">
<table >
    <input type="hidden" name="Id" value="<?php echo $entrada['Id'];?>" >
<tr>
  <td>Título: 
    <label for="campo_titulo"></label></td>
  <td><input type="text" name="Titulo" id="campo_titulo" value="<?php echo $entrada['Titulo'];?>"></td>
</tr>
<tr>
    <td>Subtítulo: 
    <label for="campo_subtitulo"></label></td>
    <td><input type="text" name="Subtitulo" id="campo_subtitulo" value="<?php echo $entrada['Subtitulo'];?>"></td>
</tr>
<tr><td>Comentarios: 
    <label for="area_comentarios"></label></td>
   
    <td><textarea name="Comentario" id="area_comentarios" rows="10" cols="50" value=""><?php echo $entrada['Comentario'];?></textarea></td>
</tr>
  
    <tr>
    <td colspan="2" align="center">  
    <input type="submit" name="btn_enviar" id="btn_enviar" value="Actualizar"></td>
    </tr>
  <tr><td colspan="2" align="center"><a href="./Mostrar_Blog.php">Página de visualización del blog</a></td></tr>
  
  </table>
</form>
<p>&nbsp;</p>

</body>
</html>

