<?php

//  parametry:
//    1. server, localhost znaci stejny pocitac, na kterem bezi www server
//    2. db uzivatel;
//    3. heslo k db, stejne jako se prihlasujete na phpMyAdmin
//    4. vybrane db schema

$dbconn = new mysqli("localhost", "root", "", "simple_eshop");

if ($dbconn->connect_error) {
    die("Connection failed: " . $dbconn->connect_error);
  }

$dbconn->autocommit(FALSE);  // veskere zmeny se potvrzuji rucne, tj. $dbconn->commit();


// substituuje podle klicu $params ve formatu ?klic
// priklad: $sql = 'SELECT * FROM student WHERE id=?id AND jmeno LIKE "?jmeno" '
//          $params = ['id' => 5, 'jmeno' => 'Jiri "z" podebrad']
//

// funkce neni ve vysledku dokonala, uvazujte $params = ['id' => 'ahoj ?jmeno moje', 'jmeno' => 'moje jmeno']
// lepe pouzit Prepared Statements in MySQLi
// https://www.w3schools.com/php/php_mysql_prepared_statements.asp


function safe_sql_string($sql, $params, $db)
{
    foreach($params as $name => $value)
    {
        $escaped = $db->real_escape_string($value);
        $sql = str_replace('?'.$name, $escaped, $sql);
    }
    return $sql;
}

