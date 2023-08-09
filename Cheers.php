<?php
session_start();
$serverName = "localhost";
$userName = "root";
$Password = "";
$dbname = "cheerssrms";

$con = mysqli_connect($serverName, $userName, $Password, $dbname);


if (isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])){
    function validate($data){

        $data = trim($data);
        $data = striplashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $USERNAME = validate($_POST['USERNAME']);
    $PASSWORD = validate($_POST['PASSWORD']);

    if (empty($USERNAME)){
        header("Location: Cheersdashboard.php? User Name is required");
        exit();
    }else if (empty($PASSWORD)){
        header("Location: Cheersdashboard.php? User Name is required");
        exit();
        else{
            echo "Valid input";
        }
    }

}else {
    header("Location: Cheersdashboard.php");
    exit();
}

/*

if (mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
else {
    $stmt = $con->prepare("select * from admin WHERE USERNAME = ?")
    $stmt->bind_param("s",)
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];

    $sql="SELECT USERNAME,PASSWORD FROM admin WHERE USERNAME='$USERNAME'";
    $RESULT = $con->query($sql);
}

if (password_verify($PASSWORD, $row['PASSWORD'])) {
    $_SESSION['USERNAME'] = $USERNAME;
    header("Location: Cheersdashboard.php"); 
    exit();
} else {
    echo "Invalid password";
}
*/
?>
