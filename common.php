<?php
	function getConnection(){
        $HOST = "--";
        $USERNAME = "--";
        $PASSWORD = "--";
        $DATABASE = "--";
    	
        return mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    }
?>
