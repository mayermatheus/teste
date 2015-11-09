<?php
/**
 * Created by PhpStorm.
 * User: mayer
 * Date: 07/11/15
 * Time: 13:42
 */

require '../vendor/autoload.php';

$filePath = fopen('/home/mayer/Downloads/Exercicio.txt', 'r');
$file = new \Processor\File();
$file->fileProcessor($filePath);