<?php

private function getRoute() {
   if (empty($_GET['route']))
   {
      $route = 'index';
   }
   else
   {
      $route = $_GET['route'];            
      $rt=explode('/', $route);
      $route=$rt[(count($rt)-1)];

      if($rt[(count($rt)-2)]=="product"){         
       $sql = "SELECT * FROM product WHERE url like '$route'";
       $result = mysql_query($sql)  or die(mysql_error());

       if($row = mysql_fetch_object($result))
       {
         $_REQUEST['id']=$row->id;
         $route="product";
       }

      }
    }

   return $route;
}
