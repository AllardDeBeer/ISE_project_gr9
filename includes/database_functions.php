<?php

$db;

     function db_open() {
          $server_name = "(local)\SQLEXPRESS";
          $connection_info = array( "Database"=>"DonkeyKong",  "UID"=>"", "PWD"=>"");
          $GLOBALS['$db'] = sqlsrv_connect($server_name, $connection_info);
          
          if($GLOBALS['$db'] === false) {
              die(print_r(sqlsrv_errors(), true));
          }
     }
     
     function db_close() {
          sqlsrv_close($GLOBALS['$db']);
     }
     
     function db_query($sql) {
          $stmt = sqlsrv_query($GLOBALS['$db'], $sql);

          if( $stmt === false) {
               die( print_r( sqlsrv_errors(), true) );
          } else {
               return $stmt;
          }
     }

     function db_insert($sql){
          $stmt = sqlsrv_query($GLOBALS['$db'], $sql);
     }

     function db_query_CursorKeyset($sql){
          $params = array();
          $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
          $stmt = sqlsrv_query($GLOBALS['$db'], $sql , $params, $options );

          return $stmt;
     }

     function db_fetchAssoc($stmt) {
          return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
     }

     function db_fetchNumeric($stmt) {
          return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
     }

     function db_numRows($stmt) {
          return sqlsrv_num_rows($stmt);
     }
     
     function db_hasRows ($stmt) {
          return sqlsrv_has_rows($stmt);
     }

?>