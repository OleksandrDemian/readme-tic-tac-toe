<?php
	include "common.php";
    
	header('Content-type: image/svg+xml;charset=utf-8');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    function readStat(){
    	$conn = getConnection();
        $query = "SELECT * FROM ttt_stat";
        
        $result = $conn->query($query);
        
        if($result->num_rows < 1){
        	return null;
        }
        
        return $result->fetch_assoc();
    }
    
    $action = $_GET["action"];
?>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" width="55" height="15">
  <?php
  	$stat = readStat();
  	if($action == "currentPlayer"){
    	$player = "--";
        if($stat["turn"] == 1){
        	$player = "O";
        } else {
        	$player = "X";
        }
        
    	echo '<text x="0" y="15" fill="black">Next: ' . $player . '</text>';
    }
  ?>
</svg>
