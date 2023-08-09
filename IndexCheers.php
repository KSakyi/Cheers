<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['USERNAME'];
$password=md5($_POST['PASSWORD']);
$sql ="SELECT USERNAME,PASSWORD FROM admin WHERE USERNAME=:uname and PASSWORD=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "(Location:'Cheersdashboard.php')";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
   <head>
    <title>CHEERS INTERNATIONAL SCHOOL RESULT MANAGEMENT</title>
    <img src="CHEERS.jpg" alt="logo" style="width: 90px;height: 90px;">
  </head>
  <body>
    <h1 style="text-align: center;font-size: 250%;">CHEERS INTERNATIONAL SCHOOL RESULTS MANAGEMENT</h1>
    <form method="post" >
        <fieldset style="height: 500px; width: 400px;padding:30px;margin:auto;border-style:double;border-width:10px;text-align: center;">
          <label for="user_select" style="text-align:center; font-size:250%;"> USER SELECT:
           </label>
          <select name="user_select" id="user_select" style="width:350px;margin:10px;height: 40px;;">
           <option>SELECT::</option>
           <option>ADMIN</option>
           <option>STUDENT</option>
          </select><br><br><br>
         <label style="font-size:250%;" for="USERNAME"> USERNAME OR ID:</label>
         <input placeholder="USERNAME" name="USERNAME" id="USERNAME" type="text" style="width: 350px;height:40px;" require><br><br><br>
         <span><?php if(isset($username_error)) echo $username_error; ?></span>
         <div style="padding-bottom:90px; text-align: center;">
         <label style="padding-bottom:200%;font-size:250%;" for="PASSWORD">PASSWORD:</label>
            <input style="width:350px;height: 40px;" name="PASSWORD" id="PASSWORD" type="password" placeholder="PASSWORD">  <br><br><br>
            <span><?php if(isset($password_error)) echo $password_error; ?></span>
            <button style="height:50px;width:100px;align-self:auto;" type="submit" value="submit">LOGIN</button>
            <h4>Not a registered student? Rigister <a href="https://www.w3schools.com/html/html_links.asp">here</a></h4>
         </div>    
        </fieldset>
    </form>
    
   </body>
</html>