<?php
require_once("recommend.php");
require_once("destination_data.php");
$re = new Recommend();
$ratinglist=$re->getRecommendations($destination, "Hobart");
arsort($ratinglist);
//echo "<pre>";
//print_r($ratinglist);
//echo "</pre>";
$i=1;
foreach($ratinglist as $key=>$value)
{
if($i<4)
{
echo $key. ", ";
}
$i++;
}
?>