<?php
function deg_rad($deg){
    return $deg*pi()/180;
}
 

if (isset($_GET['t'])){$t = $_GET['t'];}else{$t='[]';}


// Довільний чотирикутник за існуючими координатами вершин.
// x1,y1,x2,y2,x3,y3,x4,y4
// Блок обрахунків - довжини та кути
// Блок виводу: довжина сторін.
// Блок виводу: кути
// Блок виводу: корегування розміщення чифр за умови розміру кутів.


// $q = new quadrangle(50,20,300,20,380,350,50,380);
// $q = new quadrangle(10,10,110,10,110,110,10,110);

// if (isset($_GET['s'])){$s = $_GET['s'];} else  {$s = -1;} //square
// if (isset($_GET['c'])){$c = $_GET['c'];} else  {$c = -1;} //circle
// if (isset($_GET['t'])){$t = $_GET['t'];} else  {$t = -1;} //triangle
// if (isset($_GET['r'])){$r = $_GET['r'];} else  {$r = -1;} //rectangle
// if (isset($_GET['p'])){$p = $_GET['p'];} else  {$p = -1;} //parallelogram
// if (isset($_GET['h'])){$h = $_GET['h'];} else  {$h = -1;} //hexagon
// if (isset($_GET['rh'])){$rh = $_GET['rh'];} else  {$rh = -1;} //rhombus

// $figures = [$s,$c,$t,$r,$p,$h,$rh];
$t = json_decode($t);
// print_r($t);
$tt = new types($t);


class types {
    public $draw;
    public $positive_numbers;
    function __construct($t){

        


        // $s = $figures[0];
        // $c = $figures[1];
        // $t = $figures[2];
        // $r = $figures[3];
        // $p = $figures[4];
        // $h = $figures[5];
        // $rh = $figures[6];


        $this->draw = new ImagickDraw ();
        header("Content-Type: image/png");
        $imagick = new Imagick(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $imagick->newImage(600,600, new ImagickPixel('white')); //max (x)+10, max(y)+10
        $imagick->setImageFormat("png");

        $this->draw->line(300,0,300,600);
        $this->draw->line(0,300,600,300);



        // $this->draw;
        // $this->coord;
        
        $this->draw->setStrokeColor(new ImagickPixel('rgba(0, 0, 0, 1)'));
        $this->draw->setStrokeWidth(2);



        $this->draw->setStrokeWidth(3);
        $this->draw->setTextAlignment(1);
        $font = 'Inter.ttf';
        $size = 32;
        $this->draw->setFontSize($size);
        $this->draw->setFont($font);


        $this->draw->setTextAlignment(\Imagick::ALIGN_CENTER);
        // $this->draw->annotation(150, 297,"A");
        // $this->draw->annotation(450, 297,"B");
        // $this->draw->annotation(150, 597,"C");
        // $this->draw->annotation(450, 597,"D");


        // $this->letters = ['A','B','C','D'];

        $positive_numbers= 4;
            // for($i=0;$i<count($figures);$i+=1){
            //     if ($figures[$i]>-1){
            //         $positive_numbers+=1;
            //     }
            // }
        $this->positive_numbers=$positive_numbers;
        $letters = ['A','B','C','D'];

        if ($positive_numbers <=3){
            $annotations_x = [100,310,520];
            for ($i=0;$i<$positive_numbers;$i+=1){
                $this->draw->annotation($annotations_x[$i],240, $letters[$i]);
            }
        }else{
            $annotations_x = [150,450,150,450];
            $annotations_y = [297,297,597,597];

            for ($i=0;$i<$positive_numbers;$i+=1){
                $this->draw->annotation($annotations_x[$i],$annotations_y[$i], $letters[$i]);
            }

            $this->draw->setStrokeWidth(2);

        // $this->square($s);

        }
        // $this->square(0);
        for($i=0;$i<count($t);$i+=1){
            if ($t[$i] =="s"){$this->square($i);}
            if ($t[$i] =="r"){$this->rectangle($i);}
            if ($t[$i] =="c"){$this->circle($i);}
            if ($t[$i] =="t"){$this->triangle($i);}
            if ($t[$i] =="p"){$this->paralelogram($i);}
            if ($t[$i] =="h"){$this->hexagon($i);}
            if ($t[$i] =="rh"){$this->rhombus($i);}
            if ($t[$i] =="pt"){$this->pentagon($i);}
        }

        // $this->draw->annotation(10,340, "s = {$s} c = {$c} t = {$t}");

        $imagick->drawImage($this->draw);
        echo $imagick->getImageBlob();

    }

    function square($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
        $d->line(10+$n*210,10,   210+$n*210,10);
        $d->line(210+$n*210,10,  210+$n*210,210);
        $d->line(210+$n*210,210, 10+$n*210,210);
        $d->line(10+$n*210,210,  10+$n*210,10);

        } else{
        $k = floor($n/2);
        $d->line(30+($n%2)*300,10+300*($k),   270+($n%2)*300,10+300*($k));
        $d->line(270+($n%2)*300,10+300*($k),  270+($n%2)*300,250+300*($k));
        $d->line(270+($n%2)*300,250+300*($k), 30+($n%2)*300,250+300*($k));
        $d->line(30+($n%2)*300,250+300*($k),  30+($n%2)*300,10+300*($k));
        }
    }

    function circle($n){
        $d = $this->draw;
        $d->setFillColor("#ffffff");

        if ($this->positive_numbers<=3){
            $d->circle(110+$n*210, 110, 210+$n*210, 110);
        } else{
            $k = floor($n/2);
            $d->circle(150+($n%2)*300, 130+300*($k), 270+($n%2)*300, 130+300*($k));
        }

    }
    function triangle($n){
        $d = $this->draw;

        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,210, 210+$n*210,210);
            $d->line(210+$n*210,210, 110+$n*210,10);
            $d->line(110+$n*210,10,10+$n*210,210);
        }else{
            $k = floor($n/2);
            $d->line(30+($n%2)*300,250+300*($k), 270+($n%2)*300,250+300*($k));
            $d->line(270+($n%2)*300,250+300*($k), 150+($n%2)*300,50+300*($k));
            $d->line(150+($n%2)*300,50+300*($k),30+($n%2)*300,250+300*($k));
        }

    }
    function rectangle($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(10+$n*210,40,   210+$n*210,40);
            $d->line(210+$n*210,40,  210+$n*210,180);
            $d->line(210+$n*210,180, 10+$n*210,180);
            $d->line(10+$n*210,180,  10+$n*210,40);
        }else{
            $k = floor($n/2);
            $d->line(30+($n%2)*300,60+300*($k),   270+($n%2)*300,60+300*($k));
            $d->line(270+($n%2)*300,60+300*($k),  270+($n%2)*300,220+300*($k));
            $d->line(270+($n%2)*300,220+300*($k), 30+($n%2)*300,220+300*($k));
            $d->line(30+($n%2)*300,220+300*($k),  30+($n%2)*300,60+300*($k));
        }

    }

    function paralelogram($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(60+$n*210,40,   210+$n*210,40);
            $d->line(210+$n*210,40,  160+$n*210,180);
            $d->line(160+$n*210,180, 10+$n*210,180);
            $d->line(10+$n*210,180,  60+$n*210,40);
        }else{
            $k = floor($n/2);
            $d->line(60+($n%2)*2*210,40+240*($k),   210+($n%2)*2*210,40+240*($k));
            $d->line(210+($n%2)*2*210,40+240*($k),  160+($n%2)*2*210,180+240*($k));
            $d->line(160+($n%2)*2*210,180+240*($k), 10+($n%2)*2*210,180+240*($k));
            $d->line(10+($n%2)*2*210,180+240*($k),  60+($n%2)*2*210,40+240*($k));
        }
    }
    function hexagon($n){
        $d = $this->draw;
        $dx = cos(deg_rad(30))*100;
        $dy = sin(deg_rad(30))*100;
        $k = floor($n/2);
        if ($this->positive_numbers<=3){
            $d->line(110+$n*210,10,110-$dx+$n*210,10+$dy);
            $d->line(110-$dx+$n*210,10+$dy,110-$dx+$n*210,10+$dy+100);
            $d->line(110-$dx+$n*210,10+$dy+100,110+$n*210,10+$dy*2+100);
            $d->line(110+$n*210,10+$dy*2+100,110+$dx+$n*210,10+$dy+100);            
            $d->line(110+$dx+$n*210,10+$dy+100,110+$dx+$n*210,10+$dy);              
            $d->line(110+$dx+$n*210,10+$dy,110+$n*210,10);                          
        }else{
            $d->line(150+($n%2)*300,30+300*($k),150-$dx+($n%2)*300,30+$dy+300*($k));
            $d->line(150-$dx+($n%2)*300,30+$dy+300*($k),150-$dx+($n%2)*300,30+$dy+100+300*($k));
            $d->line(150-$dx+($n%2)*300,30+$dy+100+300*($k),150+($n%2)*300,30+$dy*2+100+300*($k));
            $d->line(150+($n%2)*300,30+$dy*2+100+300*($k),150+$dx+($n%2)*300,30+$dy+100+300*($k));            
            $d->line(150+$dx+($n%2)*300,30+$dy+100+300*($k),150+$dx+($n%2)*300,30+$dy+300*($k));              
            $d->line(150+$dx+($n%2)*300,30+$dy+300*($k),150+($n%2)*300,30+300*($k));                          
            
            // $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            // $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            // $d->line(180+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,210+240*($k));
            // $d->line( 110+($n%2)*2*210,210+240*($k), 30+($n%2)*2*210,110+240*($k));
            // $d->line(30+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,10+240*($k));
        }
    }
    function rhombus($n){
        $d = $this->draw;
        if ($this->positive_numbers<=3){
            $d->line(110+$n*210,10,   180+$n*210,110);
            $d->line(180+$n*210,110,  110+$n*210,210);
            $d->line( 110+$n*210,210, 30+$n*210,110);
            $d->line(30+$n*210,110,  110+$n*210,10);
        }else{
            $k = floor($n/2);
            $d->line(110+($n%2)*2*210,10+240*($k),   180+($n%2)*2*210,110+240*($k));
            $d->line(180+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,210+240*($k));
            $d->line( 110+($n%2)*2*210,210+240*($k), 30+($n%2)*2*210,110+240*($k));
            $d->line(30+($n%2)*2*210,110+240*($k),  110+($n%2)*2*210,10+240*($k));
        }
    }
    function pentagon($n){
        $d = $this->draw;
            $s = 5;
            $scale = 30;
            $x_start = 150;
            $y_start = 250;
            $scaled_s = $s * $scale;


            
            $dy1 = cos(deg_rad(18))*$scaled_s;
            $dx1 = sin(deg_rad(18))*$scaled_s;
    
            $dy2 = sin(deg_rad(34))*$scaled_s;
            $dx2 = cos(deg_rad(34))*$scaled_s;

            $l = $n%2;
            $h = floor($n/2);


            $coords = [
                array("x"=>$x_start+$scaled_s/2+$dx1+($n%2)*300, "y"=>$y_start-$dy1+$h*300),
                array("x"=>$x_start+$scaled_s/2+($n%2)*300, "y"=>$y_start+$h*300),
                array("x"=>$x_start-$scaled_s/2+($n%2)*300, "y"=>$y_start+$h*300),
                array("x"=>$x_start-$scaled_s/2-$dx1+($n%2)*300, "y"=>$y_start-$dy1+$h*300),
                array("x"=>$x_start-$scaled_s/2-$dx1+$dx2+($n%2)*300, "y"=>$y_start-$dy1-$dy2+$h*300)
        ];
    
        for ($i=0;$i<5;$i+=1){
            $j = $i+1;
            if ($j==5) {$j = 0;}
            $d->line($coords[$i]['x'],$coords[$i]['y'],$coords[$j]['x'],$coords[$j]['y']);
        }
    
    

    
    
  
    }






}




?>