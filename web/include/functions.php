<?php 

function center() 
{
	include("config.php");
	include("bbcode.php");

		if (isset($_POST['soporte'])) 
			{ 
				soporte();
			} 

  		$db = mysql_connect($dbhost,$dbusername,$dbpass); 
  		mysql_select_db($dbname) or die($dberror);

		$id = $_GET['id'];

  		if ($id <> "") 
  		{
	  		$query = "SELECT * FROM noticias WHERE id = $id LIMIT = $limitepp";
	  		$usuario = $id;
	  		$caracteres = 80000;
	   	} 
	   	else 
	   	{
			$query = "SELECT * FROM noticias WHERE publicada = 1 ORDER BY id DESC LIMIT $limitepp"; 
			$caracteres = $textchars;	
		}

		$result = mysql_query($query);
		echo "<div align='center'><table class='noticias' cellSpacing='0' cellPadding='0' width='400' border='0'>";

  		while ($r = mysql_fetch_array($result)) 
  		{
			echo "<tr><td class='titunoti'>";
			if ($id <> "") 
			{	
	  			echo $r[titulo];
	  			$id = $r[id];
			}

		else 
			{ 
				echo "<a class='titunoti' href=index.php?id=$r[id]>$r[titulo]</a>"; 
			}

		echo "<td class='fecha' align='right'>$r[fecha]</td></tr>";
		
		if ($r[imagen] <> "") 
		{ 
?>
		<td class='notitext' colspan="2">
	        <div align="left">
	          <table border="0" cellpadding="0" cellspacing="0" align="left">
	            <tr>
	              <td><img class="picture_border" src="<? echo $image_folder; ?>/<? echo $r['imagen']; ?>" class="slika" alt="<? echo $r['titulo']; ?>" /></td>
	            </tr>
	          </table>
	        </div>
		<? 
	}

		else { echo "<td class='notitext' colspan='2'>";}
		echo bbcode(substr(stripslashes($r[contenido]), 0, $caracteres));
		
		if ($id == "") 
			{ 
				echo "..."; 
			}

			echo "</td></tr>";
			echo "<tr><td><span class='by'>Posteado por: ".$r[usuario]." </span></td></center>";
		if ($id == "") 
			{
	      		echo "<td align='right'><a class='link' href=index.php?id=$r[id]>Ver completo</a></td></tr>";
        	} 
		else 
        	{ 
	      		echo "<a href=index.php>Volver</a>"; 
	      		echo "<tr><td><span class='by'>Posteado por: ".$r[usuario]."</span></td></center>";
      		}

			echo "<tr><td colspan='2' height='30' valign='top'><img src='images/divisor.gif'></td></tr>";
		}

		echo "</table></div>";
}

function contacto() 
	{ 	
	include("config.php");

	if (!is_numeric($id) && $id != '')  // Evitamos el Blind Injection MySQL
		{ 
			//exit; 
		} // Evitamos el Blind Injection MySQL

		if (isset($_POST['contacto'])) 
			{
				require_once("smtp.gmail.com"); 
				$serv = new SMTP("localhost","Staff.Bender2@gmail.com","Bender.Staff2@Gmail.com");
	 			$subject = "Contacto Web";
				$body = "Nombre: ";
				$body.= $_POST['nombre'];
				$body.= "\r\n";
				$body.= "Email: ";
				$body.= $_POST['email'];
				$body.= "\r\n";
				$body.= "Pagina web: ";
				$body.= $_POST['weblink'];	
				$body.="\r\n";
				$body.= "Mensaje: ";
				$body.= $_POST['mensaje'];	
				$from = "Staff.Bender2@gmail.com";
				/*$header = $mail->make_header( $from, $mail, $subject); */
				$header = "From:" . $from. " \r\n";
				$header .= "Reply-To: ".$_POST['email']." \r\n";
				$header .= "Subject: ".$subject ." \r\n";
			      $header .= "Content-Type: text/plain; charset=\"iso-8859-1\" \r\n";
				$header .= "Content-Transfer-Encoding: 8bit \r\n";
				$header .= "MIME-Version: 1.0 \r\n";
				
	  			$error=$serv-> smtp_send($from, $mail, $header, $body); 
				if ($error == "0") 
	  	      		echo "Su peticion fue enviada, a la brevedad le responderan.";
				else
					echo $error;
	  	      	echo "<p><a href='?'>Volver</a></p>";
			} 
				else 
			{ 

			?>
				<p><div class="soporte">
						<form name="unos" method="post" action="?op=contacto">
		  					Nombre:<br/>
		    				<input name="nombre" class="soptext" type="text" id="nombre" size="40"><br/><br/>
		    				Email:<br/>
		   					<input name="email" class="soptext" type="text" id="email" size="40"><br/><br/>
		    				Pagina Web:<br/>
		   					<input name="weblink" class="soptext" type="text" id="weblink" size="40"><br/><br/>
		   					Mensaje:<br />
		  					<textarea rows="4" class="sopcont" name="mensaje" cols="30"></textarea><br/><br/>
		 					<input name="contacto" type="submit" value="Enviar"><br/>
		  	      		</form>
					</div>
	  	      	</p>
    		<? 
		}
	}

function noticiasbase()
{
	include("config.php");
	$db = mysql_connect($dbhost,$dbusername,$dbpass); 
	mysql_select_db($dbname) or die($dberror);
	$id = $_GET['id'];
	if ($id <> "") {
		$query = "SELECT * FROM noticias WHERE id = $id";
		$usuario = $id;
		$caracteres = 80000;
	} else {
		$query = "SELECT * FROM noticias WHERE publicada = 1 ORDER BY id DESC LIMIT 			$limitepp"; 
		$caracteres = $textchars;	
	}
	$result = mysql_query($query);
	while ($r = mysql_fetch_array($result)) {
		echo "$r[id]-$r[titulo]-$r[fecha]@";
	}
}
function soporte() 
	{
		if (!is_numeric($id) && $id != '') 
		{ 
		    exit; 
		} // Evitamos el Blind Injection MySQL
	
		if (isset($_POST['soporte']) AND strlen($_POST['email']) > 11 AND strlen($_POST['pedido']) > 10) 
		{
		    
			$nombre = $_POST['nombre'];
			$email= $_POST['email'];
			$pedido = $_POST['pedido'];
			$destined= $_POST['user'];
	        $sector = $_POST['sector'];
			$ip = $_SERVER['REMOTE_ADDR'];
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha = date("d-m-Y H:i:s");
			
			include("config_host2_sv.php");
			$db = mysql_connect($dbhost,$$dbuser,$dbpass);
        	mysql_select_db(dbname) or die($dberror);
        	
        	mysql_query("INSERT INTO sv_supports (NAME,SOS,EMAIL,QUESTION,DESTINED,SECTOR,IP,DATE_TIME) VALUES ('$nombre','1','$email','$pedido','$destined','$sector','$ip','$fecha')"); 
        	
  			echo "¡Soporte Enviado! Por favor aguarde a que su consulta sea revisada, y recibirá una respuesta por e-mail.";
			echo "<p><a href='?op=Soporte'>Volver</a></p>";
			
        	mysql_close($db);
		} 

		else if (isset($_POST['soporte'])) 
		{
			echo "<h2>Hubo un error al completar los formularios.</h2>";
			echo "<p>Puede que hayas dejado algun campo incompleto o sea demasiado corto. Recuerda colocar todos tus datos reales, para que podamos contactarte.</p>";
			echo "<p><br /><a href=?op=Soporte>Volver</a></p>";
    	} 
    	else 
    	{ 
		    include("config_host2_sv.php");
		    $db = mysql_connect($dbhost,$dbusername,$dbpass);  
		    mysql_select_db($dbname) or die($dberror);

			?>
			<div class="soporte">
				<b>Recuerde siempre colocar un e-mail verdadero a donde podamos responderle.</b><br />

				<form align="left" name="form-soporte" id="soporte" method="post" action="?op=Soporte">
	                                Nombre:<br />
	   				<input name="nombre" type="text" class="soptext" id="nombre"><br /><br />
					E-Mail:<br />

					<input name="email" type="text" class="soptext" id="email"><br /><br />
	                Miembro al que te diriges:<br />

					<select size="1" name="user">
					<option value="Cualquiera" selected>Cualquiera</option>

					<?php
						while ($r = mysql_fetch_array($result)) 
						{
							echo '<option value="'.$r['usuario'].'">'.$r['usuario'].'</option>';
						}
					?>

	    			</select><br /><br />
	                    Sector del Staff:<br />
	                    <select size="1" name="sector">
	                    <option value="Game Masters" selected>Game Masters</option>
							<option value="Rolemasters">Rolemasters</option>
							<option value="Consejo de Banderbill">Consejo de Angrod</option>
							<option value="Concilio de las Sombras">Concilio de las Sombras</option>
							<option value="Soporte técnico">Soporte tecnico</option>
	    			</select><br /><br />
	  				Pedido:

	  					<textarea name="pedido" class="sopcont"></textarea><br /><br />
	  					<input name="soporte" type="submit" value="Enviar"> <input type="reset" value="Resetear"><br />
	  	    	</form>
			</div> <? 
		}
} 

?>