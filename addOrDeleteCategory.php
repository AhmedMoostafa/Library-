<?php
session_start();
include 'connect.php';
if($_GET['operation']=='add')
{
    if(isset($_POST['category']))
    {
        $_SESSION['catMsg']="";
        $flag=false;
        $sql="SELECT *FROM categories ";
        $result=$connect->query($sql);
        while($row = $result->fetch_assoc())
        {
            if($row['categoryName']==$_POST['category']){
                $flag=true;
                $_SESSION['catMsg']="this category is already exist";
            }
        }
        if($flag==false) {
            $sql = "INSERT INTO categories(categoryName) VALUES ( '" . $_POST['category'] . "') ";
            $result = $connect->query($sql);
            header('location: admin.php');
        }

    }

}
else
{
    if(isset($_POST['category']))
    {
        $flag=false;
        $sql="SELECT *FROM categories ";
        $result=$connect->query($sql);
        while($row = $result->fetch_assoc())
        {
            if($row['categoryName']==$_POST['category']){
                $flag=true;

            }
        }
        if($flag==true) {
            $delet = $_POST['category'];
            $sql = "DELETE FROM `categories` WHERE categoryName='" . $_POST['category'] . "' ";
            $result = $connect->query($sql);
            header('location: admin.php');
        }
        else{
            $_SESSION['catMsg']="there is no category with this name";
        }
    }
}

?>
<html>
<title>
    <?php echo $_GET['operation']." " ?> category

</title>
<head>
    <link href="addOrDeleteCategory.css" rel="stylesheet" type="text/css">
</head>
<body >
<p class="head"><?php echo $_GET['operation'].' Category'?></p>

<form method="post" action="">

    <input type="text" placeholder="category Name" name="category" class="operation">
    <input type="submit" value="<?php echo $_GET['operation']." " ?>"class="but" >
</form>
<p style="color: red; font-size: 40px">
    <?php
    if(isset($_SESSION['catMsg'])) {
        echo $_SESSION['catMsg'];
        $_SESSION['catMsg']="";

    }


    ?>
</p>
</body>
</html>
