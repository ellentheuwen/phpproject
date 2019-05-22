<?php

function detectColors($image, $num, $level = 5)
{
    $level = (int) $level; // amount of colors
    $palette = array(); // array for palette
    $size = getimagesize($image); // the img
    if (!$size) {
        return false;
    }
    switch ($size['mime']) {
      case 'image/jpeg':
      /*
      returns an image identifier representing
      the image obtained from the given filmename
      */
        $img = imagecreatefromjpeg($image);
        break;
      case 'image/png':
        $img = imagecreatefrompng($image);
        break;
      case 'image/gif':
        $img = imagecreatefromgif($image);
        break;
      default:
        return false;
    }
    if (!$img) {
        return false;
    }

    // search in height & width the 5 most common colors
    for ($i = 0; $i < $size[0]; $i += $level) {
        for ($j = 0; $j < $size[1]; $j += $level) {
            $thisColor = imagecolorat($img, $i, $j);
            $rgb = imagecolorsforindex($img, $thisColor);
            $color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));
            $palette[$color] = isset($palette[$color]) ? ++$palette[$color] : 1;
        }
    }
    arsort($palette);

    return array_slice(array_keys($palette), 0, $num);
}
