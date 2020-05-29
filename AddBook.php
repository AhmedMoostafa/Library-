<html>
<head>
<style>
body{
background: url("this.jpg");
align-content: center;
background-repeat: no-repeat;
background-size: cover;
}
</style>
</head>
<body>

<h2 style="color:white">
<?php
include 'connect.php';
session_start();

$bookname=$_POST['bookname'];
$bookcategory=$_POST['category'];
$authorname=$_POST['author'];
$pyear=$_POST['pyear'];
$isbn=$_POST['isbn'];
$valid_category=false;
$sql="SELECT * FROM categories ";
$result=$connect->query($sql);
while($row=$result->fetch_assoc())
{
    if($row['categoryName']==$bookcategory)
    {
        $valid_category=true;
        break;
    }
}
if( $valid_category==true)
{
    $sql="insert into books (bname,author,pyear,isbn,category) values ('".$bookname."','".$authorname."','".$pyear."','".$isbn."','".$bookcategory."')";
    $result=$connect->query($sql);
    $_SESSION['book added']='New book added successfully';
    header("location: formAddNewBook.php");
}
else
{
    $_SESSION['book added']='error the category not found';
    header("location: formAddNewBook.php");
}


?>
</h2>
</body>
</html>
