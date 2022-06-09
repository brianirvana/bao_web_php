<? 
require("verificauser.php"); // incluir motor de autentificación.
	$nivel_acceso=2; // definir nivel de acceso para esta página.
		if ($nivel_acceso < $_SESSION['usuario_nivel']){
			header ("Location: $redir?error_login=5");
			exit;
		$tipo = $_GET['tipo'];
    } 
?>
	<?
	    include("../include/config_admin.php"); 
	?>
	
	<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    	<title>Bender AO, Sistema de Soporte</title>
    	">
    	<style type="text/css">
    
        	body {font-family: Arial; font-size: 70%; }
        	a { color: #5B85B4; font-weight: normal; }
        	a:hover { color: #6998CC;}
        	#header { background: #5E85B5; padding: 3px; color: #FFF; }
        	#menu {float: right; width: 280px; padding: 5px; text-align: right; margin: 0 0 5px 0; }
        	#menu a { color: #D7E1EC; }
        	.logo { font-size: 130%; letter-spacing: -1.2px; }
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
        	
    	</style>
    </head>

    <body>
    	<div id="header">
        		<div id="menu">
        			<a href="soporte.php?tipo=<?php echo $_GET['tipo']; ?>>Soporte</a> | <a href="form.php">Menu Admin</a> | 
        			<a href="logout.php">Logout</a>
            		</div>
            		<span class="logo">Sistema de soporte de Bender AO - <font color="#17d717">Acceso autorizado a: <? echo $_SESSION['usuario_login']; ?></font></span>
            		<br>
        	    </div>
        	
        	    <div id="content">
                	<h5>Lista de Soportes</h5>
        			<h5><a href="soporte.php">Sin Responder</a> | <a href="soporte.php?tipo=Rta">Respondidos</a>  | <a href="soporte.php?tipo=Del">Borrados</a> | <a href="soporte.php?tipo=TODOS">Todos</a></h5>
                	<br />
         	<?
         	
        	$tipo = $_GET['tipo'];
        	$op = $_GET['op'];
 
        	switch ($op) {  
        		case "bsoporte": { 
          				$id = $_REQUEST['id'];
            				$db = mysql_connect($dbhost,$dbusername,$dbpass); 
            				mysql_select_db($dbname) or die($dberror);
        					$consulta = mysql_query("SELECT respondida FROM soporte WHERE id='$id'") or die("No se pudo realizar la consulta a la Base de datos");
        					if (mysql_result($consulta, 0, "respondida") == "Borrado")
        					{
        						mysql_query("DELETE FROM soporte WHERE id='$id'");
        					}
        					else
        					{
        						mysql_query("UPDATE soporte SET respondida='Borrado' WHERE id='$id'") or die(mysql_error());
        					}
            				echo "<h5>Soporte Borrado</h5><p><a href=\"soporte.php?tipo=$tipo\">Volver</a></p>";
            				mysql_close($db);
        				}break;
        
         		case "rsoporte": {
        
         		if (isset($_POST['respsop'])) {
        			$usuario = $_SESSION['usuario_login'];
        			
        			require_once("mail.bender-online.com.ar"); 
        			$serv = new SMTP("localhost","Staff.Bender2@gmail.com","Bender.Staff2@Gmail.com");
         			$subject = "Respuesta de Soporte por: " . $usuario;
        			$mail = $_POST['to'];
        			$body = "Respuesta: ";
        			$body.= $_POST['contenido'];
        			$body.= "\r\n";
        			$from = "soporte.bender@gmail.com";
        			$header = $mail->make_header( $from, $mail, $subject); 
        			$header = "From:" . $from. " \r\n";
        			$header .= "Reply-To: ".$mail." \r\n";
        			$header .= "Subject: ".$subject ." \r\n";
        		    	$header .= "Content-Type: text/plain; charset=\"iso-8859-1\" \r\n";
        			$header .= "Content-Transfer-Encoding: 8bit \r\n";
        			$header .= "MIME-Version: 1.0 \r\n";
        			$error=$serv-> smtp_send($from, $mail, $header, $body); 
        			
        			$mail = $_POST['to'];
        			$titulo = "Respuesta de Soporte por: " . $usuario;
        			$body = "Respuesta: ";
        			$body.= $_POST['contenido'];
        			$body.= "\r\n";
        			$mensaje = wordwrap($body);
        			$nombre = "BenderAO Staff";
        			$de = "Staff.Bender2@Gmail.com";
        
        			echo '<font color=green size=1><b><br>Se le ha enviado el mail a la direccion: "'.$mail.'"<br><br>';
        			$headers = "MIME-Version: 1.0\r\n"; 
        			$headers .= "From: $nombre <$de>\r\n";
        			//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        			mail($mail, $titulo, $mensaje, $headers);
        			$id = $_REQUEST['id'];
            		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
            		mysql_select_db($dbname) or die($dberror);
        
        			mysql_query("UPDATE soporte SET respondida='Por $usuario', respuesta='$mensaje' WHERE id='$id'") or die(mysql_error());
          	      	echo "Soporte Enviado<br></b></font><p><a href=\"soporte.php?tipo=$tipo\">Volver</a></p>";
        		} else {
          				$id = $_REQUEST['id'];
            			$db = mysql_connect($dbhost,$dbusername,$dbpass); 
        				mysql_select_db($dbname) or die($dberror);
        				$query = "SELECT * FROM soporte WHERE id='$id'"; 
        				$result = mysql_query($query);
        				
        				while ($r = mysql_fetch_array($result)) {
           				?>
        				    <div class="box">
        			    	<h5>Respuesta para Soporte</h5>
        				<?
        				
        				$tipo = $_GET['tipo'];
          				echo '<form name="ressop" method="post" action="soporte.php?tipo='.$tipo.'&op=rsoporte&id='.$id.'">';
        				?>
            				<p>
              				Contenido:<br />
              				<textarea name="contenido" cols="60" rows="25"> 
         
        
---------------------------------------------------------- 
De: <? echo $r['nombre'] ?> 
Para: <? echo $r['user'] ?> 
---------------------------------------------------------- 
Pedido: 
        <? echo $r['pedido'] ?>
        
        </textarea><br /><br />
              				<br /><br />
        				<input type="hidden" name="to" value="<? echo $r['email']; ?>">
            				<input type="submit" name="respsop" value="Enviar">
            				</p>
              				
        	    			</form></div> 
        				<? }
            				mysql_close($db);
        			}
        		}break;
        		}
        $op = $_GET['op'];
        $tipo = $_GET['tipo'];
        
        if ($op != 'rsoporte'){
          		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
        		mysql_select_db($dbname) or die($dberror);
        		
        		switch ($tipo)
        		{
        			case "TODOS":
        			{
        				$data = "WHERE respondida <>'Borrado'";
        				break;
        			}
        			case "Rta":
        			{
        				$data = "WHERE respuesta<>'' And respondida <>'Borrado'";
        				break;
        			}
        			case "Del":
        			{
        				$data = "WHERE respondida='Borrado'";
        				break;
        			}
        			default:
        			{
        				$data = "WHERE respuesta='' And respondida <>'Borrado'";
        				break;
        			}
        		}
        		$query = "SELECT * FROM soporte $data ORDER BY id DESC"; 
        		$result = mysql_query($query);
        		while ($r = mysql_fetch_array($result)) {
        			if ($r['respondida']=='')
        			{
        				echo "<div class='table'><p><b>Respondido: <font color=red>Sin Responder</font></b></p>";
        			}
        			else
        			{
        				echo "<div class='table'><p><b>Respondido: <font color=green>$r[respondida]</font></b></p>";
        			}
        			echo "<p><b>Fecha:</b> $r[fecha]</p>";
        			echo "<p><b>Sector del staff:</b> $r[sector]</p>";
        			echo "<p><b>Para:</b> $r[user]</p>";
        			echo "<p><b>Email:</b> $r[email]</p>";
        			echo "<p><b>Mensaje enviado:</b> $r[pedido]</a></p>";
        			echo "<p>IP: $r[IP]</p>";
        			if ($r['respuesta'] != '') { echo "<p>Respuesta: $r[respuesta]</p>"; }
        		 ?>
        		<p>Enviado por: <b><?php echo $r['nombre']; ?></b> | <a href="soporte.php?tipo=<?php echo $_GET[$tipo]; ?>&op=rsoporte&amp;id=<?php echo $r['id']; ?>">Responder</a> | <a href="soporte.php?tipo=<?php echo $_GET['tipo']; ?>&op=bsoporte&amp;id=<?php echo $r['id']; ?>">Borrar Soporte</a></p>
        		</div>
        		<? }} ?>
        </div>	
    </body>
</html>