## Бібліотеки
### deg_rad ($deg)
Функція, що отримує градуси та повертає радіани.
### coord_angle($x1,$y1,$vect_angle,$bisectrix)
Повертає дві точки, які проводять бисектрису
(?)
### l($alfa)
При     `$font = 'Inter.ttf'; $size = 12;`
Формує відстань на яку необхідно винести число із розміром кута від вершини кута.

### l_text($alfa,$text)
При     `$font = 'Inter.ttf'; $size = 12;`
Формує відстань на яку необхідно винести заданий текст від вершини кута.

###  vectors_angle($x1,$y1,$x2,$y2,$x3,$y3)
Обраховує кут, який заданий трьома точками.

### bisectrix($a1,$a2)
Чисельно обраховує значення бісектриси між двома кутами. Значення кутів та бісектриси - за азимутом.

### azimuth($x1,$y1,$x2,$y2).
Визначає азимут кута, який задається двома точками.

### line_azimuth($alfa = 20, $l = 200,$x = 300, $y=300){
Повертає координати двох точок, з яких творюється лінія яка вказує у напрямку азимуту визначеного кута. За замовчуванням: кут 20 градусів, довжина 200 пікселів базова точка (300;300)

### delta_angle_position($azimuth,$vect_angle){
    Залишкова функція - перевірити та видалити. Зараз - повертає зміщення по x та y для відображення числа, що відповідає кількоті градусів в куті при заданому розміру кута в напрямку заданого азимуту.

### function delta_angle_position_text($azimuth,$vect_angle,$text){
    Залишкова функція - перевірити та видалити. Зараз - повертає зміщення по x та y для відображення заданого тексту при заданому розміру кута  в напрямку заданого азимуту.

### angle_azimuth_coord($x1,$y1,$x2,$y2,$x3,$y3){
    Перевірити. Ймовірно - точка розміщення тексту із кількості градусів. У куті, що задається точками, що передаються.

### angle_text_coord($x1,$y1,$x2,$y2,$x3,$y3,$text){
    Перевірити. Ймовірно - точка розміщення тексту у куті, що задаються точками, що передаються.

### angle_draw($draw,$x1,$y1,$x2,$y2,$x3,$y3){
    Малює кут. Приймає об'єкт для малювання та координати точок, повертає об'єкт для малювання

### angle_value($draw,$x1,$y1,$x2,$y2,$x3,$y3){
    Виводить текст із розміром кута та коло діаметром 1 в центрі тексту, що виводиться.

## lib_geometry
### vectors_angles($x1,$y1,$x2,$y2,$x3,$y3){
    Повертає масив градусів трикутника, який задається точками, що є параметрами функції.


### side_angle($x1,$y1,$x2,$y2){
    Обраховує кут прямої, що проходить через дані дві точки та віссю ox та віссю oy

### side_angle_top($x1,$y1,$x2,$y2){
    Обраховує кут прямої, що проходить через дані дві точки та віссю ox та віссю oy
    Перевірити на кналогічність із side_angle($x1,$y1,$x2,$y2)
    Єдина відмінність - жорстко задається вектор 0 та 1 для обрахунку градусів.
    
### draw_text_n($y1,$n,$k,$r,$text,$draw){
Функція, що використовувалася для відладки коду. Виводила число $k ,шо округлено до $r знаків.

### multi_angle()
Функція, що повертає масив координат згенерованих кутів

### angle($x1,$y1,$x2,$y2,$x3,$y3)
Перевірити - тупікова гілка розрахунків вивдення кутаі

## lib_triangle
Бібліотека для малювання трикутників

### 


### 


### 


### 