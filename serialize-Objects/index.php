<?php
include 'User.php';
$a=new User();
$a->setAge(20);
$a->setName('Gogo');

$b=serialize($a);
$c=unserialize($b);
echo $c->getName();
