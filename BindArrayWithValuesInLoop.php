<?php
/**
* @param string $req : the query on which link the values
* @param array $array : associative array containing the values ​​to bind
* @param array $typeArray : associative array with the desired value for its corresponding key in $array
* */
function bindArrayValue($req, $array, $typeArray = false)
{
    if(is_object($req) && ($req instanceof PDOStatement))
    {
        foreach($array as $key => $value)
        {
            if($typeArray)
                $req->bindValue(":$key",$value,$typeArray[$key]);
            else
            {
                if(is_int($value))
                    $param = PDO::PARAM_INT;
                elseif(is_bool($value))
                    $param = PDO::PARAM_BOOL;
                elseif(is_null($value))
                    $param = PDO::PARAM_NULL;
                elseif(is_string($value))
                    $param = PDO::PARAM_STR;
                else
                    $param = FALSE;
                   
                if($param)
                    $req->bindValue(":$key",$value,$param);
            }
        }
    }
}
