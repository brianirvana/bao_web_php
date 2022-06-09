<?php
include ("config.php");
$db = mysql_connect($dbhost,$dbusername,$dbpass); 
mysql_select_db($dbname) or die($dberror);

$nick = $_GET['nick'];

if ($nick == '') 
{
    exit; // Evitamos el Blind Injection MySQL
}

$result = mysql_query("SELECT ID,NAME,GUILD_INDEX,ELV,ELU,EXP,CLASS,RACE,GOLD,CITIZENS_KILLED,CRIMINALS_KILLED,USERS_KILLED,NPCS_KILLED,FACTION,LOGGED,BODY,HEAD,HELMET,SHIELD,WEAPON,PRIVILEGIES,BAN,UPTIME FROM sv_charfiles WHERE NAME = '$nick'", $db); 
    
    if ($row = mysql_fetch_array($result))
    {   
        $num_body = $row['BODY'];
        $num_head 	= $row['HEAD'];				    // Numero de cabeza
        $num_helmet = CheckLength($row['HELMET']);	// Numero de casco
        $num_shield = CheckLength($row['SHIELD']);	// Numero de escudo
        $num_weapon = CheckLength($row['WEAPON']);	// Numero de arma
        $clan		= $row['GUILD_INDEX'];			// Nombre
        $pk			= $row['CITIZENS_KILLED'];   	// 1=Criminal - 0=Ciudadano
        $privs		= $row['PRIVILEGIES'];	        // 7=Consejo - 6=Concilio - 5=Role - 4=Admin - 3=Dios - 2=Semi - 1=Consejero
        $nivel		= $row['ELV'];				    // Nivel y Experiencia
        $ELU        = $row['ELU'];                  // Exp para pasar de lvl
        $EXP        = $row['EXP'];                  // Experiencia hecha
        $cri		= $row['CRIMINALS_KILLED'];	    // Criminales matados
        $ciu		= $row['CITIZENS_KILLED'];	    // Ciudadanos matados
        $matados	= $row['USERS_KILLED'];		    // Usuarios matados
        $faccion	= $row['FACTION'];				// 0=Neutral 1=Army 2=Legion
        $online		= $row['LOGGED'];			    // 1=Online 2=Offline
        $clase 		= $row['CLASS'];
        $raza 		= $row['RACE'];
        $oro 		= $row['GOLD'];
        $ban 		= $row['BAN'];
        $npc 		= $row['NPCS_KILLED'];
        $uptime 	= $row['UPTIME'];
        
        if ($pk == 1) 
        {
        	$estatus = 'Criminal';
        } else 
        {
        	$estatus = 'Ciudadano'; 
        }
        switch ($faccion)
        {
        	case '0': // Neutral
        		$namefaccion = 'Neutral';
        		break;
        	case '1': // Armada Real	
        		$namefaccion = 'Armada Real';
        		break;	
        	case '2': // Legion Oscura
        		$namefaccion = 'Legion Oscura';
        		break;
        }
        if ($online == 1) {
        	$nameonline = 'Online';
        } else {
        	$nameonline = 'Offline'; 
        }
    }
$image = imagecreatefrompng("Grafs/image.png");
$body = imagecreatefrompng("Grafs/Body/$num_body.png");
$head = imagecreatefrompng("Grafs/Head/$num_head.png");
    if ($num_shield != 2) 
    {
        $shield = imagecreatefrompng("Grafs/Shield/$num_shield.png"); 
    }

    if ($num_helmet != 2) 
    {
        $helmet = imagecreatefrompng("Grafs/Helmet/$num_helmet.png"); 
    }
    
    if ($num_weapon != 2) 
    {
        $weapon = imagecreatefrompng("Grafs/Weapon/$num_weapon.png");
    }
$PosX = 390;
$PosY = 75;
$HeadY = ReadField("Grafs/Body/$num_body.txt");
    if ($num_body != 0)
    {
    	DrawImage($body, 0, 0, $image, $PosX, $PosY, 1);
    	if (imagesy($head) != 16)
    	{
    		DrawImage($head, 0, $HeadY + 34, $image, $PosX, $PosY, 1);
    	}
    	else
    	{
    		DrawImage($head, 0, $HeadY, $image, $PosX, $PosY, 1);
    	}
    	if ($num_head != 0)
    	{
    		if ($num_helmet != 2) 
    		{
    		    DrawImage($helmet, 0, $HeadY, $image, $PosX, $PosY, 1);
    		}
    
    		if ($num_shield != 2) 
    		{ 
    		    DrawImage($shield, 0, 0, $image, $PosX, $PosY, 1);
    		}
    
    		if ($num_weapon != 2) 
    		{ 
    		    DrawImage($weapon, 0, 0, $image, $PosX, $PosY, 1); 
    		}
    	}
    }
if ($pk == 1)
{
	$color = imagecolorallocate($image, 255, 64, 0);
}
else
{
	$color = imagecolorallocate($image, 0, 128, 255);
}
switch ($privs)
{
	case "0":
		if ($pk == 1)
		{
			$color = imagecolorallocate($image, 255, 0, 0);
			$namerango = "Criminal";
		}
		else
		{
			$color = imagecolorallocate($image, 0, 128, 255);
			$namerango = "Ciudadano";
		}
		break;
	case "1": // Consejero
		$color = imagecolorallocate($image, 30, 150, 30);
		$namerango = "Consejero";
		break;
	case '2': // SemiDios
		$color = imagecolorallocate($image, 30, 255, 30);
		$namerango = "Semi Dios";
		break;
	case '3': // Dios
		$color = imagecolorallocate($image, 250, 250, 150);
		$namerango = "Dios";
		break;
	case "4": // Admin
		$color = imagecolorallocate($image, 255, 255, 255);
		$namerango = "Administrador";
		break;
	case "5": // RoleMaster
		$color = imagecolorallocate($image, 180, 180, 180);
		$namerango = "Role Master";
		break;
	case "6": // Concilio de las Sombras
		$color = imagecolorallocate($image, 255, 128, 0);
		$namerango = "Concilio de las Sombras";
		break;
	case "7": // Consejo de Angrod
		$color = imagecolorallocate($image, 0, 195, 255);
		$namerango = "Consejo de Angrod";
		break;
	case "8": // Consejo Mercenario
		$color = imagecolorallocate($image, 125, 195, 255);
		$namerango = "Consejo Mercenario";
		break;
}
DrawText(91, 65, $namerango, $color, $image);
DrawTextC(391, 106, $nick, $color, $image);

DrawText(59, 14, $nick.' '.$clan, $color, $image);
if ($privs == "0" || $privs == "6" || $privs == "7" || $privs == "8")
{
	if ($online == "1")
	{
		$color = imagecolorallocate($image, 0, 255, 0);
		DrawTextC(391, 140, "Conectado", $color, $image);
}	
	else
	{
		$color = imagecolorallocate($image, 255, 64, 0);
		DrawTextC(391, 140, "Desconectado", $color, $image);
	}
}
$color = imagecolorallocate($image, 180, 180, 180);
DrawText(73, 40, intval($nivel).' ('.round(((intval($EXP) * 100) / $ELU)).'%)', $color, $image);
DrawText(181, 145, $matados, $color, $image);

$color = imagecolorallocate($image, 255, 64, 0);
DrawText(198, 92, $cri, $color, $image);

$color = imagecolorallocate($image, 0, 128, 255);
DrawText(207, 119, $ciu, $color, $image);
switch ($faccion)
{
	case "0": // Neutral
		$namerango = "Neutral";
		$color = imagecolorallocate($image, 180, 180, 180);
		break;
	case "1": // Armada Real	
		$namerango = "Armada Real";
		$color = imagecolorallocate($image, 0, 128, 240);
		break;	
	case "2": // Legion Oscura
		$namerango = "Legion Oscura";
		$color = imagecolorallocate($image, 230, 75, 0);
		break;
}
DrawText(89, 172, $namerango, $color, $image);
$nameM = strtoupper($nick);
imagepng($image, "Pjs/$nameM.png");
if (file_exists("Pjs/$nameM.png")) 
    {
        imagedestroy($image);
    } else
    {
        echo "<br> No existe la imagen Pjs/$nameM.png cuando se intentó borrarla.";
    }
function ReadField($path)
{
   //abrimos el archivo de texto y obtenemos el identificador
   //$file = fopen($path, "w");
   //obtenemos de una sola vez todo el contenido del fichero
   //OJO! Debido a filesize(), sólo funcionará con archivos de texto
   
   if (file_exists($path)) {
        $my_file = $path;
        $handle = fopen($my_file, 'r');
        $resource = '';
        if(filesize($my_file) > 0)
            {
                $data = fread($handle,filesize($my_file));
                $resource = fread($handle, filesize($my_file));
                return $resource;
                fclose($handle);
            }else
            {
                echo "<br> El archivo no tiene longitud $my_file";   
            }
   }else
   {
        echo "<br> No existe el archivo $my_file";   
   }
}
function DrawImage($temp, $x, $y, $image, $PosX, $PosY, $Center)
{
If ($Center == 1)
{
	$TileWidth = imagesx($temp) / 32;
	$TileHeight = imagesy($temp) / 32;
    If ($TileWidth <> 1)
	{
        $x = $x - IntVal(imagesx($temp) / 2) + 32 % 2;
    }
	If ($TileHeight <> 1)
	{
        $y = $y - IntVal(imagesy($temp)) + 32;
	}
}
$x = $x + $PosX;
$y = $y + $PosY;
imagecopy(
$image,			// Imagen la cual ponemos
$temp,			// Imagen que ponemos
$x,				// PosX
$y,				// PosY
0,
0,
imagesx($temp), // Ancho
imagesy($temp) 	// Alto
);
}
function CheckLength($temp)
{
	if ($temp == "")
	{
		return "2";
	}
	else
	{
		return $temp;
	}
}
function DrawTextC($x, $y, $text, $color, $image)
{
$fuente = 'TAHOMA.TTF';
$black = imagecolorallocate($image, 0, 0, 0);
ImageStringC($x + 1, $y, $text, $black, $image);
ImageStringC($x - 1, $y, $text, $black, $image);
ImageStringC($x, $y + 1, $text, $black, $image);
ImageStringC($x, $y - 1, $text, $black, $image);
ImageStringC($x, $y, $text, $color, $image);
}
function DrawText($x, $y, $text, $color, $image)
{
$fuente = 'TAHOMA.TTF';
$font_size=5;
$black = imagecolorallocate($image, 0, 0, 0);
$y = $y + 13;
imagettftext($image, 11, 0, $x + 1, $y, $black, $fuente, $text);
imagettftext($image, 11, 0, $x - 1, $y, $black, $fuente, $text);
imagettftext($image, 11, 0, $x, $y + 1, $black, $fuente, $text);
imagettftext($image, 11, 0, $x, $y - 1, $black, $fuente, $text);
imagettftext($image, 11, 0, $x, $y, $color, $fuente, $text);

/*ImageString($image, $font_size, $x + 1, $y, $text, $black);
ImageString($image, $font_size, $x - 1, $y, $text, $black);
ImageString($image, $font_size, $x, $y + 1, $text, $black);
ImageString($image, $font_size, $x, $y - 1, $text, $black);
ImageString($image, $font_size, $x, $y, $text, $color);*/
}
function ImageStringC($x, $y, $text, $color, $image)
{
	$fuente = 'TAHOMA.TTF';
	$bbox = imagettfbbox(11, 0, $fuente, $text);
	$x = $x - (($bbox[2] - $bbox[0]) / 2);
	//$x = $x - (ImageFontWidth($font_size) * strlen($text)) / 2;
	$y = $y + 13;
	//imagestring($image, $font_size, $x, $y, $text, $color);
	imagettftext($image, 11, 0, $x, $y, $color, $fuente, $text);
}
?>