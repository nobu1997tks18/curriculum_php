<?php
function getRectangularArea($height, $width, $vertical){
  $area = $height * $width * $vertical;
  return $area;
};

$area = getRectangularArea(8,10,5);
echo $area;
