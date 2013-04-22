<?
  include"config.php";

   // connect to the server
   mysql_connect( $db_host, $db_user, $db_pass )
      or die( "Error! Could not connect to database: " . mysql_error() );
   
   // select the database
   mysql_select_db( $db )
      or die( "Error! Could not select the database: " . mysql_error() );
?>
