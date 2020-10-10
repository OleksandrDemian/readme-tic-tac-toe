<?php
	include "common.php";
    
    $PLAYER_ONE = 1;
	$PLAYER_TWO = 2;
    
	function updateBoard($x, $y, $player){
    	$conn = getConnection();
        $query = "UPDATE ttt_board SET val='$player' WHERE x='$x' AND y='$y'";
        $conn->query($query);
    }
    
    function updateTurn($nextPlayer){
    	$conn = getConnection();
        $query = "UPDATE ttt_stat SET turn='$nextPlayer' WHERE id='0'";
        $conn->query($query);
    }
    
    function updateHasBoard($state){
    	$conn = getConnection();
        $query = "UPDATE ttt_stat SET hasBoard='$state' WHERE id='0'";
        $conn->query($query);
    }
    
    function generateBoard(){
    	for($y = 1; $y <= 3; $y++){
        	for($x = 1; $x <= 3; $x++){
            	$conn = getConnection();
                $query = "INSERT INTO ttt_board VALUES(null, '$x', '$y','0')";
                $conn->query($query);
            }
        }
        
        updateHasBoard(1);
        updateTurn($PLAYER_ONE);
    }
    
    function restartGame(){
    	for($y = 1; $y <= 3; $y++){
        	for($x = 1; $x <= 3; $x++){
            	$conn = getConnection();
                $query = "UPDATE ttt_board SET val='0' WHERE x='$x' AND y='$y'";
                $conn->query($query);
            }
        }
        
        updateHasBoard(1);
        updateTurn($PLAYER_ONE);
    }
    
    function readStat(){
    	$conn = getConnection();
        $query = "SELECT * FROM ttt_stat";
        
        $result = $conn->query($query);
        
        if($result->num_rows < 1){
        	return null;
        }
        
        return $result->fetch_assoc();
    }
    
    function readCell($x, $y){
    	$conn = getConnection();
        
    	$query = "SELECT * FROM ttt_board WHERE x='$x' AND y='$y'";
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
    
    $game = readStat();
    
    if($action == "move"){
        if($game["hasBoard"] == 0){
            generateBoard();
        }
    
    	$val = readCell($x, $y);
    	if($val == 0){
        	//empty cell
        	updateBoard($x, $y, $game["turn"]);
            
            if($game["turn"] == $PLAYER_ONE){
            	updateTurn($PLAYER_TWO);
            } else {
            	updateTurn($PLAYER_ONE);
            }
        }
    	
        header("Location: https://github.com/OleksandrDemian/readme-minesweeper");
    } else if($action == "restart"){
    	restartGame();
    	header("Location: https://github.com/OleksandrDemian/readme-minesweeper");
    }
?>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" role="img" width="50" height="50">
  <?php
  	$player = readCell($x, $y);
  	if($player == $PLAYER_ONE){
    	echo '<circle cx="25" cy="25" r="20" stroke="green" stroke-width="6" fill="transparent" />';
    } else if($player == $PLAYER_TWO){
        echo '<line x1="0" y1="0" x2="50" y2="50" stroke="green" stroke-width="6" />';
        echo '<line x1="50" y1="0" x2="0" y2="50" stroke="green" stroke-width="6" />';
    }
  ?>
</svg>
