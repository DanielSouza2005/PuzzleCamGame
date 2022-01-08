<?php 

require_once("./security.php");

$con = mysqli_connect("localhost","root", "");

if(!$con)
    die("Database connection was failed");

mysqli_select_db($con, "puzzleCamGame") or die ("Failed to acess db :(");


if(isset($_GET["info"])){
    $info = json_decode($_GET["info"], true);
    if(addScore($info, $con)){
        echo "Score inserted!";
    }
    else{
        echo "Score insertion failed :/";
    }
}
else{
    $result = getAllScores($con);
    //print_r($result);
    echo json_encode($result);
    
}

function addScore($info, $con){
    $query = "INSERT INTO scores (Name, Time, Difficulty) VALUES ". 
        "('".$info["name"]."', ".$info["time"].",'".$info["difficulty"]."')";
    $rs = mysqli_query($con, $query);
    if(!$rs){
        return false;
    }
    return true;
}

function getAllScores($con){
    $easy = getScoresWithDifficulty("Easy", $con);
    $medium = getScoresWithDifficulty("Medium", $con);
    $hard = getScoresWithDifficulty("Hard", $con);
    $insane = getScoresWithDifficulty("Insane", $con);
    return array("Easy" => $easy, "Medium" => $medium, "Hard" => $hard, "Insane" => $insane);
}

function getScoresWithDifficulty($difficulty, $con){
    $query = "Select Name, Time FROM scores WHERE Difficulty Like '".$difficulty."' ORDER BY Time";

    $rs = mysqli_query($con, $query);
    
    $results = array();
    if(mysqli_num_rows($rs) > 0){
        while($row = mysqli_fetch_assoc($rs)){
            array_push($results, $row);
        }
    }

    return $results;
}

?>


