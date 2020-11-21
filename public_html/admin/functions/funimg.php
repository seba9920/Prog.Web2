<?php
//redimencionar imagen
/* 
	$tamanhos = array(0 => array('nombre'=>'big','ancho'=>'5000','alto'=>'10000'),
					  1 => array('nombre'=>'small','ancho'=>'500','alto'=>'1000'),
					  2 => array('nombre'=>'thumb','ancho'=>'50','alto'=>'70'));
*/
				  
function redimensionar($ruta,$file_name,$uploadedfile,$id,$tamanhos){
	$filename = stripslashes($file_name);
 	$extension = getExtension($filename);
 	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
 		$errors=1;
 	}else{
		$size=filesize($uploadedfile);
        
		if ($size > 2*1024){
			$errors=2;
		}
		 
		if($extension=="jpg" || $extension=="jpeg" ){ 
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($extension=="png"){ 
			$src = imagecreatefrompng($uploadedfile);
			imagealphablending($src, true);
			imagesavealpha($src, true);  
		}else{
			$src = imagecreatefromgif($uploadedfile);
		}
// 		echo $scr;
         
		 // $size = getimagesize($uploadedfile); --> [ancho,alto]
		 // $width = $size[0];
		 // $height = $size[1];
		 
		list($width,$height)=getimagesize($uploadedfile);
		foreach($tamanhos as $tam){
			$newwidth = $tam['ancho'];
			$newheight=($height/$width)*$newwidth;
			
			if($newheight > $tam['alto']){
				$newheight = $tam['alto'];
				$newwidth=($width/$height)*$newheight;
				if($newwidth > $tam['ancho']){
					$height = $newheight;
					$width = $newwidth;
					$newheight=($height/$width)*$newwidth;
				}
			}
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			if($extension == "png"){
				$rojo = imagecolorallocate($tmp, 234, 234, 234);
				imagefill($tmp, 0, 0, $rojo);
			}
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			
			// img_0_small.png
			$filename = $ruta.'img_'.$id.'_'.$tam['nombre'].'.'.$extension;
			if($extension == "png"){
				$rojo = imagecolorallocate($tmp, 234, 234, 234);
				imagecolortransparent($tmp,$rojo);
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
?>