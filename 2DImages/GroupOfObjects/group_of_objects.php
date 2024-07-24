<?php

header("Content-type: image/png");
if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}
$t = json_decode($_GET['t']);

// $back = imagecreatefrompng ("images/canvas.png");
$back = imagecreatefromjpeg ("../../images/canvas300.jpg");

$apple     = imagecreatefrompng("../../images/apple.png");
$banana     = imagecreatefrompng("../../images/banana.png");
$orange     = imagecreatefrompng("../../images/orange.png");
$tomato     = imagecreatefrompng("../../images/tomato.png");

$black = imagecolorallocate($back, 0, 0, 0);
// imageline($back,300,0,300,600,$black );
// imageline($back,0,300,600,300,$black );
$font_file = '../../Inter.ttf';

// imagefttext($back, 24, 0, 150, 297, $black, $font_file, 'A');
// imagefttext($back, 24, 0, 450, 297, $black, $font_file, 'B');
// imagefttext($back, 24, 0, 150, 597, $black, $font_file, 'C');
// imagefttext($back, 24, 0, 450, 597, $black, $font_file, 'D');

$x_start = 10;
$y_start = 25;
$objects = [$apple,$banana,$orange,$tomato];
$values = [6,12,0,3];
$col = 4;

    $value = $t[0];
    $object = $objects[$t[1]];
    for ($k=0;$k<$value;$k+=1){
        $j = $k%$col;
        $i = intdiv($k,$col);
        imagecopyresampled($back , $object,$x_start+70*$j, $y_start+90*$i, 0, 0, 70, 70, 64, 64);
}







// for ($i=0;$i<3;$i+=1){
//     for ($j=0;$j<4;$j+=1){
//         imagecopyresampled($back , $apple, 100+64*$j, 100+64*$i, 0, 0, 64, 64, 64, 64);
//     }
// }

// for ($i=0;$i<3;$i+=1){
//     for ($j=0;$j<4;$j+=1){
//         imagecopyresampled($back , $banana, 800+30*$j, 100+30*$i, 0, 0, 25, 25, 64, 64);
//     }
// }
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);
// imagecopyresampled($back , $apple, 100, 100, 0, 0, 50, 50, 64, 64);

// $orange = imagecolorallocate($im, 220, 210, 60);
// $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
// imagestring($im, 3, $px, 9, $string, $orange);
imagepng($back);
imagedestroy($back);

?>