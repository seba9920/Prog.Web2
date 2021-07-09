<?php
/*Funcion de redireccionamiento de paginas*/

function redirect($pURL) 
{	
	if (strlen($pURL) > 0) 
	{ 
		if (headers_sent()) 
		{
			echo "<script>document.location.href='".$pURL."';</script>\n"; 
		}else 
		{
			header("Location: " . $pURL);
		}
 
		exit();
	}	
}
//redimencionar imagen

//	$tamanhos = array(0 => array('nombre'=>'big','ancho'=>'5000','alto'=>'10000'),
//					  1 => array('nombre'=>'small','ancho'=>'500','alto'=>'1000'),
//					  2 => array('nombre'=>'thumb','ancho'=>'50','alto'=>'70'));
				  
function redimensionar($ruta,$file_name,$uploadedfile,$posicion,$tamanhos){
	$filename = stripslashes($file_name);
 	$extension = getExtension($filename);
 	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
 		$errors=1;
 	}else{ 
		if($extension=="jpg" || $extension=="jpeg" ){ 
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($extension=="png"){ 
			$src = imagecreatefrompng($uploadedfile);
			imagealphablending($src, true);
			imagesavealpha($src, true);  
		}else{
			$src = imagecreatefromgif($uploadedfile);
		}

		list($width,$height)=getimagesize($uploadedfile);
		foreach($tamanhos as $tam){
			$newwidth = $tam['ancho'];
			$newheight=($height/$width)*$newwidth;
			
			if($newheight > $tam['alto']){
				$newheight = $tam['alto'];
				$newwidth=($width/$height)*$newheight;
				if($newwidth > $tam['ancho']){
					$nheight = $newheight;
					$nwidth = $newwidth;
					$newheight=($nheight/$nwidth)*$tam['ancho'];
				}
			}
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			if($extension == "png"){
				$gris = imagecolorallocate($tmp, 234, 234, 234);
				imagefill($tmp, 0, 0, $gris);
			}
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			
			$filename = $ruta.'img_'.$posicion.'_'.$tam['nombre'].'.'.$extension;
			//$filename = $ruta.$tam['nombre'].$file_name;
			if($extension == "png"){
				imagecolortransparent($tmp,$gris);
				imagepng($tmp,$filename,9);
			}elseif($extension == 'gif'){
				imagegif($tmp,$filename,100);
			}else{
				imagejpeg($tmp,$filename,100);
			}
			imagedestroy($tmp);
		}
		imagedestroy($src);
		
	}
}

function obtener_imagenes($ruta){
	$galeria = array();
	if(is_dir(DIR_BASE.$ruta)){
		$directorio=opendir(DIR_BASE.$ruta); 
		while ($archivo = readdir($directorio) ){
			if( $archivo != '.' and $archivo != '..' and stristr($archivo,'small') !== false){
				//img_1_small.png
				//$data = explode('_',$archivo);
				list($img,$pos,$resto) = explode('_',$archivo);
				$galeria[$pos] = URL_BASE.$ruta.$archivo;
			}
		}
		closedir($directorio); 
	}
    sort($galeria);
	return $galeria;
}

function cant_imagenes($dir){ 
	$i = 0;
	if(is_dir($dir)){
		$dh = opendir($dir);
		while (($file = readdir($dh)) !== false){
			if ($file!="." && $file!=".."){ 
				if(stristr($file,'small') !== false)
				$i++;
			}
		}
	}
	return $i;
}

//funcion para obtener la extension
function getExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}
 
 //Funcion para borrar imagenes
 function eliminar_archivos($dir)
{

	if(is_dir($dir)){
		$directorio=opendir($dir); 
		while ($archivo = readdir($directorio))
		{
			if($archivo != '.' and $archivo != '..')
			{
				@unlink($dir.$archivo);
			}
		}
		closedir($directorio); 
		@rmdir($dir);
	}
}


//funcion para generar las direcciones dinamicas de las publicaciones.
function obtener_seo_url($titulo,$id,$tabla){
	$seo_url = generar_url($titulo);
	$url = $seo_url;
	//verifico a que tabla corresponde el id
	$ide = ($tabla == 'proyectos')?$id:0;
	$ids = ($tabla == 'servicios')?$id:0;
	//tengo que verificar que la url en cuestion no este en uso por alguna de las publicaciones viejas.
	while(existe_seo_url('proyectos','id_proyecto', $url,$ide) == true AND existe_seo_url('servicios','id_servicio', $url,$ids) == true ){
		$cola = substr(md5(date('H:i:s d/m/Y')),0,5); //genero una cola para la url basada en el md5 de la fecha completa actual y de esta saco los primeros 5 caracteres.
		$url = $seo_url.'-'.$cola;
	}

	return $url;
}

//funcion para saber si una url existe
function existe_seo_url($tabla,$nombre_id ,$url, $id_omitido){

	$con = new Conn();
	$cons = new query($con);
	$sql = 'SELECT url_dinamica FROM '.$tabla.' WHERE url_dinamica = "'.$url.'" AND '.$nombre_id.' != '.$id_omitido;
	$cons->exec($sql);
	if($cons->numrows > 0){
		return true;
	}
	return false;

}

//funcion para generar las seo url
function generar_url($titulo){
//    	generar URL dinamica
		$data = strtolower($titulo);
		$data = str_replace(array('/',' ','&aacute;','&eacute;','&iacute;','&oacute;','&uacute;','&ntilde;'
											 ,'&ccedil;','&atilde;','&acirc;','&ecirc;','&otilde;','&ocirc;','&uuml;','&quot;'),   
								array('-','-','a','e','i','o','u','n'
											 ,'c','a','a','e','o','o','u',''),$data);
		$data =	ereg_replace('[^a-z0-9.-]','',$data);
		$data = preg_replace('#-{2,}#','-',$data);
		$data = trim($data,'-');
		return $data;
}

//funcion para cortar un texto pero no las palabras.

function cortar_palabras($texto, $limite, $break=' ', $pad='...'){
	if(strlen($texto) <= $limite)
		return $texto;
	$quiebre = strpos($texto, $break, $limite);
	if( $quiebre != false){
		if($quiebre < (strlen($texto) - 1)){
			$texto = substr($texto, 0, $quiebre).$pad;
		}
	}
	return $texto;
}

//Funcion para cortar textos
function cortar($string, $maximo = 80)
{
	$cantidad = strlen($string);


	if($cantidad > $maximo)
	{
		$maximo = $maximo - 3;
		$a = cut_html(substr($string, 0, $maximo));
		$a .= "...";
		return $a;
	}
	else
	{
		return $string;
	}
}

//Funcion para evitar que se cortan caracteres html
function cut_html($string)
{
    $a=$string;

    while ($a = strstr($a, '&'))
    {
        $b=strstr($a, ';');
        if (!$b)
        {
           
            $nb=strlen($a);
            return substr($string, 0, strlen($string)-$nb);
        }
        $a=substr($a,1,strlen($a)-1);
    }
    return $string;
}


function obtener_archivos($ruta){
	$file[0] = 'none';
	if(is_dir($ruta)){
		$directorio=opendir($ruta); 
		$i = 0;
		while ($archivo = readdir($directorio) ){
			if( $archivo != '.' and $archivo != '..'){
				$file[$i] =  $ruta.$archivo;
				$i++;
			}
		}
		closedir($directorio); 
	}
	return $file;
}





//funcion para rellenar numeros
function rellenar_izq($long_total,$valor='',$relleno=' '){
	$cadena ='';
	$long_actual = strlen($valor);
	$long_resto = $long_total - $long_actual;
	for( $i = 0 ;$i < $long_resto; $i++)
	{
		$cadena.=$relleno;
	}
	$cadena.= $valor;
	return $cadena;
}



function get_client_ip() {
	//$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
	   $ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

 
?>


<!-- Mostrar/Ocultar Password -->
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPass");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
}
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>