<?php
	$HIDDEN_VAL = 0;

	function updateBoard($x, $y){
    	$conn = mysqli_connect("localhost", "infinitysasha", "", "my_infinitysasha");
    	$query = "INSERT INTO minesweeper VALUES('$x', '$y','-1', null)";
        $conn->query($query);
    }
    
    function readCell($x, $y){
    	$conn = mysqli_connect("localhost", "infinitysasha", "", "my_infinitysasha");
        
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
    	$query = "SELECT * FROM minesweeper WHERE x='$x' AND y='$y'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        
        if($result->num_rows < 1){
        	return null;
        }
        
        return $row["val"];
    }

	header('Content-type: image/svg+xml;charset=utf-8');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    $x = $_GET["x"];
    $y = $_GET["y"];
    $action = $_GET["action"];
    
    $val = null;
    
    if($action == "move"){
    	$val = readCell($x, $y);
    	if($val == 0){
        	updateBoard($x, $y);
        }
    	
        header("Location: https://github.com/OleksandrDemian/readme-minesweeper");
    }
?>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" width="50" height="50">
  <?php
  	if(readCell($x, $y) == $HIDDEN_VAL){
    	//hidden
    	echo '<circle cx="25" cy="25" r="20" stroke="yellow" stroke-width="4" fill="green" />';
    } else {
    	//shown
    	echo '<circle cx="25" cy="25" r="20" stroke="green" stroke-width="4" fill="yellow" />';
    }
  ?>
</svg>
