<?php
session_start();
include 'connect.php';
$newbname=$_POST['newbname'];
$newauthor=$_POST['newauthor'];
$newcategory=$_POST['newcategory'];
$newpyear=$_POST['newpyear'];
$newisbn=$_POST['newisbn'];
$old=$_POST['old'];
$valid_category=false;
$sql="SELECT * FROM categories ";
$result=$connect->query($sql);
while($row=$result->fetch_assoc())
{
    if($row['categoryName']==$newcategory)
    {
        $valid_category=true;
        break;
    }
}
if($valid_category)
{
    $sql=" UPDATE books
        SET bname ='$newbname' , author = '$newauthor', category= '$newcategory' ,pyear= '$newpyear' ,isbn= '$newisbn'
        WHERE bname='$old'";
    $result=$connect->query($sql);
    header("location:UpdatebookForm.php?name=$newbname");
}
else
{
    $_SESSION['book Edit']='error the category not found';
    header("location: UpdatebookForm.php?name=$newbname");
}


