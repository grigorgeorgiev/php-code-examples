<?php

$url = 'http://yousite.com/getRequest.php?var=testVar';

$contents = file_get_contents($url);

if($contents !== false){
  echo $contents;
}
