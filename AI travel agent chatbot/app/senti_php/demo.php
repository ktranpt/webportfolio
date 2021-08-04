<?php

$strings = $_GET['message'];

require_once __DIR__ . '/./autoload.php';
$sentiment = new \PHPInsight\Sentiment();

// calculations:
$scores = $sentiment->score($strings);
$class = $sentiment->categorise($strings);

// output:
echo $class;

?>
