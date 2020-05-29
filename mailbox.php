<html>
<head>
<style>
body{
    background-image: url("this.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
#all{
    
    font-size: x-large;
    font-family: "Lucida Console", Courier, monospace;
    color: azure;
}

</style>
</head>
<body>
<div id="all">
<?php
session_start();
include 'connect.php';
$current=$_SESSION['current'];
$_SESSION['mail']=false;
$sql="SELECT *FROM borrowed where userEmail= '$current'";
$result =$connect->query($sql);

if(!isset($_GET['name']))
{
    while($row = $result->fetch_assoc())
    {

        if($row['expires']<time())
        {
            $_SESSION['mail']=true;
            break;
        }
    }
}
else
{
    while($row = $result->fetch_assoc())
    {

        if($row['expires']<time())
        {
           echo'you must return book name : '.$row['bookname'].'</br>';
        }
    }
    $_GET['name']=NULL;
}
?>
</div>
</body>
</html>