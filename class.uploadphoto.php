<?php
/*
ini_set('post_max_size','100M');
ini_set('upload_max_filesize','100M');
ini_set('max_execution_time','1000');
ini_set('max_input_time','1000');
//chmod("customimages", 0777);
*/
function redimensionar($imagenoriginal, $dirdestino, $nombrefinal, $anchofinal, $altofinal, $calidad) {
       
// recojo información de la imágen
$info_imagen = getimagesize($imagenoriginal);
$alto = $info_imagen[1];
$ancho = $info_imagen[0];
$tipo_imagen = $info_imagen[2];
       
// calculo las nuevas medidas en función de los límites
if($ancho > $anchofinal OR $alto > $altofinal){
    if(($alto - $altofinal) > ($ancho - $anchofinal)){
$anchofinal = round($ancho * $altofinal / $alto,0) ;       
    }else{
$altofinal = round($alto * $anchofinal / $ancho,0);   
    }
// si la imagen es más pequeña que los límites la dejo igual
}else{
    $altofinal = $alto;
    $anchofinal = $ancho;
}
 
// dependiendo del formato de imagen usaremos diferentes funciones
switch ($tipo_imagen) {

case 1: // si es gif
$imagen_nueva = imagecreate($anchofinal, $altofinal);
$imagen_vieja = imagecreatefromgif($imagenoriginal);
// cambio de tamaño y calidad
imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $anchofinal, $altofinal, $ancho, $alto);
if (!imagegif($imagen_nueva, $dirdestino . $nombrefinal, $calidad)) return false;
break;
   
case 2: // si es jpeg
$imagen_nueva = imagecreatetruecolor($anchofinal, $altofinal);
$imagen_vieja = imagecreatefromjpeg($imagenoriginal);
// cambio de tamaño y calidad
imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $anchofinal, $altofinal, $ancho, $alto);
if (!imagejpeg($imagen_nueva, $dirdestino . $nombrefinal, $calidad)) return false;
break;
   
case 3: // si es png
$imagen_nueva = imagecreatetruecolor($anchofinal, $altofinal);
$imagen_vieja = imagecreatefrompng($imagenoriginal);
// cambio de tamaño y calidad
imagecopyresampled($imagen_nueva, $imagen_vieja, 0, 0, 0, 0, $anchofinal, $altofinal, $ancho, $alto);
if (!imagepng($imagen_nueva, $dirdestino . $nombrefinal, $calidad)) return false;
break;

}
// Si todo ha ido bien devuelve true
return true;
}

function size($path, $formated = true, $retstring = null){
    if(!is_dir($path) || !is_readable($path)){
        if(is_file($path) || file_exists($path)){
            $size = filesize($path);
        } else {
            return false;
        }
    } else {
        $path_stack[] = $path;
        $size = 0;
        
        do {
            $path   = array_shift($path_stack);
            $handle = opendir($path);
            while(false !== ($file = readdir($handle))) {
                if($file != '.' && $file != '..' && is_readable($path . DIRECTORY_SEPARATOR . $file)) {
                    if(is_dir($path . DIRECTORY_SEPARATOR . $file)){ $path_stack[] = $path . DIRECTORY_SEPARATOR . $file; }
                    $size += filesize($path . DIRECTORY_SEPARATOR . $file);
                }
            }
            closedir($handle);
        } while (count($path_stack)> 0);
    }
    if($formated){
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        if($retstring == null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end($sizes);
        foreach($sizes as $sizestring){
            if($size <1024){ break; }
            if($sizestring != $lastsizestring){ $size /= 1024; }
        }
        if($sizestring == $sizes[0]){ $retstring = '%01d %s'; } // los Bytes normalmente no son fraccionales
        $size = sprintf($retstring, $size, $sizestring);
    }
    return $size;
}
?>
