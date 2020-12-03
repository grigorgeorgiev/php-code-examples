<?php

        $sqlDist = 'SELECT Customers.CustomerEmail FROM ProformaDistributors 
                        JOIN Customers ON Customers.CustomerID = ProformaDistributors.SCCustomerID';
        $queryDist = mysql_query($sqlDist);
        $distlist = array();
        while($resDist = mysql_fetch_array($queryDist)){
                $distList[] = $resDist['CustomerEmail'];
        }

        $andSql = '';
        foreach($distList AS $distEmail){
                $andSql .= ' AND OrderCustomerEmail != "'.$distEmail.'" ';
        }

        $sql = 'SELECT DATE(FROM_UNIXTIME(OrderTimestamp)) AS OrderDate, COUNT(OrderTimestamp) AS CountRow, 
                SUM(OrderCustomerCurrencyTotal) AS OrderAmount 
                FROM Orders 
                WHERE OrderTimestamp BETWEEN UNIX_TIMESTAMP("'.$dateBefore30Days.'") 
                AND UNIX_TIMESTAMP("'.$dateToday1.'") 
                AND TransactionStatus=2 
                AND OrderCustomerEmail !="help@swansonvitamins.bg" 
                '.$andSql.'
                GROUP BY OrderDate 
                ORDER BY OrderDate DESC';

        $query = mysql_query($sql);
