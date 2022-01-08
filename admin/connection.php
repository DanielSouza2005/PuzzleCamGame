<?PHP

$con = mysqli_connect("localhost","root", "");

if(mysqli_connect_errno()){
    echo "Error connecting to MySql: " + mysqli_connect_error();
}
else{
    mysqli_select_db($con, "puzzleCamGame");
}

?>