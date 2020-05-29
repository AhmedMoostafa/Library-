<?php
include 'connect.php';
include 'mailbox.php';
if(!isset( $_SESSION['current']))
{
    header('location: login.php');
}
?>

<html>
    <head>
        <title>MainPageStudent</title>
        <link rel="stylesheet" type="text/css" href="student.css">
    </head>
    <body>
    <div class="head">
        <div class="parent">
            <img class="avatar" src="user-profile-computer-icons-girl-customer-avatar-thumbnail.jpg">
        </div>

        <div class="all">
            <form method="post"  action="student.php" style="padding: 0px; margin: 0px;border: 0px">
                <input type="text" name="search2" id="s1" placeholder=" Search for book" class="search_par" style="padding: 10px">
                <input id="but1" type="submit" value="Search" name="submit" style="float: right">
            </form>
        </div>
        <button id="box">
            <?php
            if($_SESSION['mail']==false)
            {
                echo '  <a style="  text-decoration: none ; color: crimson" href="mailbox.php?name=print">mail Box</a>';
            }
            else
            {
                echo '  <a style="  text-decoration: none ; color: crimson" href="mailbox.php?name=print">you have a new message</a>';
            }
            ?>
        </button>

    </div>


    <div class="books">
        <?php
        if(isset($_GET['category']))
        {
            $sql= "SELECT * FROM books WHERE category='".  $_GET['category']."' ";
            $result=$connect->query($sql);

            while($row = $result->fetch_assoc())
            {

                $print=$row["bname"];
                $Book_ID=$row['ID'];
                echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID >"."$print"."</a>";
                echo '<hr>';

            }

        }

        if(isset($_POST['search2']))
        {
            $sql="SELECT *FROM books ";
            $result=$connect->query($sql);
            $category=$_POST['search2'];

            while($row = $result->fetch_assoc())
            {
                $print=$row["bname"];
                $Book_ID=$row['ID'];
                if($row['category']== $category)
                {
                    echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID>"."$print"."</a>";
                    echo '<hr>';
                }
                else if($row['bname']== $category)
                {

                    echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID>"."$print"."</a>";
                    echo '<hr>';

                }
                else if( $row['author']==$category)
                {
                    echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID>"."$print"."</a>";
                    echo '<hr>';
                }
                else if( $row['isbn']==$category)
                {
                    echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID>"."$print"."</a>";
                    echo '<hr>';
                }
                else if( $row['pyear']==$category)
                {
                    echo  "<a  class=\"pbook\" style=\"text-decoration: none;color: bisque; font-size: 30px \" href=bookDescription.php?ID=$Book_ID>"."$print"."</a>";
                    echo '<hr>';
                }

            }

        }
        $_POST['search2']=NULL;
        $_GET['category']=NULL;
        ?>
    </div>
    <div class="category">
        <span style="font-size: 30px ;color: coral">Categories</span>
        <?php
        $sql= "SELECT * FROM categories ";
        $result=$connect->query($sql);

        ?>
        <h3>
            <ul>
                <?php
                while($row = $result->fetch_assoc())
                {
                    $cat=$row['categoryName'];
                    echo '<li class="cat"><a href="student.php?category='.$cat.' " style="text-decoration: none; color: white;">'.$row['categoryName'].'</a></li>';
                }

                ?>

            </ul>
        </h3>
        <hr>
        <button id="but" type="button"><a  style="text-decoration: none "href="editUserInfoForm.php">edit your information</a> </button>

        <button id="but" type="button"><a  style="text-decoration: none " href="logout.php">Logout</a></button>
    </div>





    </body>
</html>