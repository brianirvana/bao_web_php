<? require("verificauser.php"); // incluir motor de autentificación.
    $nivel_acceso=1; // definir nivel de acceso para esta página.
    if ($nivel_acceso < $_SESSION['usuario_nivel'])
    {
        header ("Location: $redir?error_login=5");
        exit;
    } 
?>

<? 
    include("../include/config.php"); 
?>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Bender AO - Menu de Administracion</title>
	">
	<style type="text/css">
	<!--
	body {font-family: Arial; font-size: 70%; }
	a { color: #5B85B4; font-weight: normal; }
	a:hover { color: #6998CC;}
	#he { background: #5E85B5; padding: 3px; color: #FFF; }
	#menu {float: right; width: 280px; padding: 5px; text-align: right; margin: 0 0 5px 0; }
	#menu a { color: #D7E1EC; }
	.logo { font-size: 170%; letter-spacing: -1.2px; }
	#hmenu {margin: 0 0 5px 0; padding: 5px; color: #808080; background: #7899BD; }
	#hmenu a {margin-left: 5px; margin-right: 5px; color: #FFF; text-decoration: none; font-weight: bold;}
	#hmenu a:hover {text-decoration: underline;}
	#left {float: left; width: 18%; padding: 0;}
	#left h7 {display: block; background: #5E85B5; color: #FFF; font-weight: bold; padding: 3px 0 3px 5px; } 
	#left ul {list-style: none; margin: 0; padding: 0;}
	#left li {margin: 1px; padding: 2px;}
	#left a {display: block; width: 94%; margin: 1px; padding: 2px; border-bottom: solid 1px #eee; text-decoration: none;}
	#content {margin-left: 19%; padding: 3px; background: #D7E1EC;}
	#content h5 {margin: 0; padding: 5px; font-size: 150%; color: #FFF; }
	#content p {margin: 5px; color: #5B85B4;}
	#content .table {margin: 5px 5px 15px 5px; padding: 0px; background: #FFF; }
	#content .table h3 {display: block; margin: 0; padding: 1px; color: #ffffff; background: #B5C7DB;}
	#content .table h3 a { color: #FFF; text-decoration: none; font-weight: bold; }
	-->
	</style>
	<script src="bbcode.js"></script>
</head>

<body onload="init('contenido')">
	<div id="he">
		<div id="menu">
			<a href="form.php">Inicio</a> | <a href="logout.php">Salir</a> 
		</div>
		<span class="logo">NOTICIAS - Usuario: <?echo $_SESSION['usuario_login'];?></span>
	</div>
	<div id="hmenu">
		<a href="noticias.php">Archivo</a>
		<a href="?page=nuevo">Nueva Noticia</a>
		<a href="?page=imagen">Imagenes</a>
	</div>
	<div id="left">
		<ul>
			<?php
    		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
    		mysql_select_db($dbname) or die($dberror);
    		$query = "SELECT * FROM noticias WHERE publicada = 3 ORDER BY id DESC"; 
    		$result = mysql_query($query);
	   		while ($r = mysql_fetch_array($result)) {
      			echo "<li><a title=\"ID: [$r[id]]\" href=\"noticias.php?page=editar&amp;id=$r[id]\">$r[titulo]</a></li>";
        	}
  			mysql_close($db); ?>
        </ul>
        <h7>Noticias no publicadas:</h7>
		<ul>
			<?php
    		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
    		mysql_select_db($dbname) or die($dberror);
    		$query = "SELECT * FROM noticias WHERE publicada = 4 ORDER BY id DESC"; 
    		$result = mysql_query($query);
	   		while ($r = mysql_fetch_array($result)) {
      			echo "<li><a title=\"ID: [$r[id]]\" href=\"noticias.php?page=editar&amp;id=$r[id]\">$r[titulo]</a></li>";
        	}
  			mysql_close($db); ?>
        </ul>
        
        
    </div>
	<div id="content">
    <?php
    
    if(isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = "page";
    //$page = $_GET['page'];
    
    switch ($page) {
                 
        //*****************
	    //** NOTICIA NUEVA **
		//*****************
	    case "nuevo":  ?>
        	<div class="box">
	    	<h5>Nueva Noticia</h5>
  				<form name="post-noti" method="post" action="noticias.php?page=accion&op=nuevo"> 
    				<p>
      				Titulo:<br/><input type="text" name="titulo" size="67"/><br/><br/>
      				Contenido:<br/>
      				<textarea name="contenido" id="contenido" cols="60" rows="20"></textarea><br/><br/>
      				<? echo $position ?>:<br/>
      				<br/><br/>
      				Adjuntar Imagen:
      				<select name="imagen" class="text">
	    				<option value="">Sin Imagen</option>
					<?
						$upload_dir = "../". $image_folder ."/";	
						$rep=opendir($upload_dir);
						while ($file = readdir($rep)) {
							if($file != '..' && $file !='.' && $file !=''){
								if (!is_dir($file)){
    		    					$nombre=substr($file, 0, -4);
									echo "<option value='$file'>$nombre</option>";
        						}
							}
						}
					closedir($rep);
					clearstatcache();
					?>
					</select> <br/><br/>
    				    				
    				<br/><br/>
    				<input type="submit" name="submit" value="Enviar">
    				</p>
      				
    			</form></div> 
  				<?
         break;
          
  		
        //******************			
  		//** EDITAR NOTICIA **
		//******************
  		case "editar": ?>
          	<h5>Editar Noticia</h5>
			<?php
				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
  				mysql_select_db($dbname) or die($dberror);
				$id = $_REQUEST['id'];
  				$query = mysql_query("SELECT * FROM noticias WHERE id='$id'");
  				$r = mysql_fetch_array($query);
			?>
  
			<form name="post-noti" method="post" action="noticias.php?page=accion&op=editar&amp;id=<?php echo $id; ?>"> 
    		<p>
      		Titulo:<br/><input type="text" name="titulo" value="<?php echo $r[titulo]; ?>" size="67"/><br/><br/>
      		Contenido:<br/>
      		<? $contenido = str_replace("<br/>", "", $r[contenido]); ?>
      		<textarea name="contenido" cols="60" rows="20"><?php echo stripslashes($contenido); ?></textarea><br/><br/>
	 	<? if ($r[publicada] == 4) { ?>
	      		<br/><input type="checkbox" value="OFF" name="public" checked> No publicada<br/><br/>
    		<? } else { ?>
    			<br/><input type="checkbox" value="OFF" name="public"> No Publicada<br/><br/>
    		<? }
    		
    		echo $attach_image ?>:
      			<select name="imagen" class="text">
	    			<option value="">Sin Imagen</option>
					<?
						$upload_dir = "../". $image_folder ."/";	
						$rep=opendir($upload_dir);
						while ($file = readdir($rep)) {
							if($file != '..' && $file !='.' && $file !=''){
								if (!is_dir($file)){
    		    					$nombre=substr($file, 0, -4);
									echo "<option value='$file'>$nombre</option>";
        						}
							}
						}
					closedir($rep);
					clearstatcache();
					?>
					</select> <br/>
			<br/>
    		<input type="submit" name="submit" value="Editar"> <a href="noticias.php?page=accion&op=borrar&amp;id=<?php echo $id; ?>">Borrar Noticia</a></p>
  			</form>
  			<?
		break;
          
          //************************************
          //** ACCIONES **
		  //************************************
          case "accion":  ?>
        	<br/>
				<?php
					include("../include/config.php");
					$action = $_REQUEST['action'];
  					$id = $_REQUEST['id'];
  					$imagen = $_REQUEST['imagen'];
					$titulo = $_POST['titulo'];
  					$contenido = $_POST['contenido'];
  					$contenido = nl2br($contenido);
  					$fecha = date($tekst_datum);
  					$publica = $_POST['public'];
  					  					
  					if ($publica == "OFF") {
	  					$publicada = 4;
  					} else {
  						$publicada = 1;
  					}
                                $op = $_GET['op'];
  				if ($op  == "nuevo") {
    				if ($_POST['submit']) {
      					if ($titulo == "")  { echo "<h5>". $admin_error ."</h5><p>". $title_error ."</p><p><a href=\"noticias.php?page=nuevo\">". $back ."</a></p>"; }
      					else if ($contenido == "")  { echo "<h5>. $admin_error .</h5><p>". $text_error ."</p><p><a href=\"noticias.php?page=nuevo\">". $back ."</a></p>"; }
      				else { 
        				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
        				mysql_select_db($dbname) or die($dberror);
					$usuario = $_SESSION['usuario_login'];
        				mysql_query("INSERT INTO noticias(titulo,contenido,fecha,publicada,imagen,usuario) VALUES('$titulo','$contenido','$fecha', '$publicada', '$imagen', '$usuario')"); 
        				echo "<h5>Noticia publicada</h5><p><a href=\"noticias.php\">Volver</a></p>";
        				mysql_close($db);
      					}
    				}
  				}
  				else if ($op == "editar") {
    				if ($_POST['submit']) {
    					$db = mysql_connect($dbhost,$dbusername,$dbpass); 
      					mysql_select_db($dbname) or die($dberror);
      					mysql_query("UPDATE noticias SET titulo='$titulo' WHERE id='$id'");
      					mysql_query("UPDATE noticias SET contenido='$contenido' WHERE id='$id'");
      					mysql_query("UPDATE noticias SET publicada='$publicada' WHERE id='$id'");
      					mysql_query("UPDATE noticias SET imagen='$imagen' WHERE id='$id'");
      					echo "<h5>Noticia publicada</h5><p><a href=\"noticias.php\">Volver</a></p>";
      					mysql_close($db);
    				}	
  				}
  				else if ($op == "borrar") { 
    				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
    				mysql_select_db($dbname) or die($dberror);
    				mysql_query("DELETE FROM noticias WHERE id='$id'");
    				echo "<h5>Noticia Borrada.</h5><p><a href=\"noticias.php\">Volver</a></p>";
    				mysql_close($db);
  				}
    				else { 
	  				echo "<p><a href=\"noticias.php\">Volver</a></p>"; 
	  			}
            break;
        
            
            
        //************
	    //** IMAGENES **
		//************
            
         case "imagen":  ?>
           	<h5>Imagenes</h5>
            <form enctype="multipart/form-data" action="?page=subirimagen" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="5200000"> 
 			Subir Imagen: <input name="userfile" type="file">
			<input type="submit" value="Enviar"
			</form>
            <?
            
            $upload_dir = "../". $image_folder ."/";
            $handle=opendir($upload_dir);
			$filelist = "";
			while ($file = readdir($handle)) {
   				if(!is_dir($file) && !is_link($file)) {
      				$filelist .= "<a href='$upload_dir$file'>".$file."</a>";
      			if ($DELETABLE)
        			$filelist .= " <a href='?borrar=$upload_dir$file' title='delete'>Borrar</a>";
				    $filelist .="<br/>";
   				}
			}
            echo "<br/><h5>Imagenes Guardadas:</h5><p>";
			echo $filelist;
			echo "</p>";
             break;  
             
        //******************
	    //** SUBIR IMAGEN **
		//******************
            
         case "subirimagen":  
			if (@is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
			//			copy($_FILES["userfile"]["tmp_name"], "../img/" . $_FILES["userfile"]["name"]);
			$original = imagecreatefromjpeg($_FILES["userfile"]["tmp_name"]);
			$thumb = imagecreatetruecolor(60,60);
			$ancho = imagesx($original);
			$alto = imagesy($original);
			imagecopyresampled($thumb,$original,0,0,0,0,60,60,$ancho,$alto); 
			imagejpeg($thumb,"../img/" . $_FILES["userfile"]["name"],90); 
			echo "<h5>Imagen Subida</h5><p><a href='noticias.php'>Volver</a></p>";
			}         
            break;  
                 
          //************************************
          //** DEFAULT: **    
          //************************************
          default:	?>
          <h5>Archivos</h5>
          <?php
    		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
    		mysql_select_db($dbname) or die($dberror);
    		$query = "SELECT * FROM noticias WHERE publicada <> 4 ORDER BY id DESC"; 
    		$result = mysql_query($query);
	   
    		while ($r = mysql_fetch_array($result)) {
      			echo "<div class='table'><h3><a title=\"Emm??\" href=\"noticias.php?page=editar&id=$r[id]\">$r[titulo]</a></h3>";
        		echo "<p>". $r['usuario'] .": ";
        		     	echo " | ";
	        		echo strlen(stripslashes($r['contenido']));;
        			echo " caracteres";
        			echo " | $r[fecha]<br/></div>";
    			} mysql_close($db);} ?>
	</div>	
</body>
</html>
