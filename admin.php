<?php
include 'connect.php';
session_start();
if(!isset( $_SESSION['current']))
{
    header('location: login.php');
}

?>
<html>
    <head>
        <title>MainPageAdmin</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
    <body>

    <div class="head">
       <div class="parent">
           <img class="avatar" src="user-profile-computer-icons-girl-customer-avatar-thumbnail.jpg">
       </div>

        <div class="all">
            <form method="post"  action="admin.php" style="padding: 0px; margin: 0px;border: 0px">
                <input type="text" name="search2" id="s1" placeholder=" Search for book" class="search_par" style="padding: 10px">
                <input id="but1" type="submit" value="Search" name="submit" style="float: right">
            </form>
        </div>
        <div id="box">

        <span style="position: relative ;top: 30%;left: 30%; color: crimson; font-size: larger"> Admin</span>

        </div>

    </div>


<br/>

    <div class="books">
     <?php
    if(isset($_GET['category']))
    {
        $sql= "SELECT bname FROM books WHERE category='".  $_GET['category']."' ";
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
                        echo '<li class="cat"><a href="admin.php?category='.$cat.' " style="text-decoration: none; color: white;">'.$row['categoryName'].'</a></li>';
                    }

                    ?>

            </ul>
        </h3>
        <hr>
        <button type="button" id="but" ><a style="text-decoration: none "href="formAddNewBook.php" >Add new book</a></button><br/>
        <button type="button" id="but"><a style="text-decoration: none " href="printAllBooks.php">Update book details</a></button><br/>
        <button type="button" id="but"><a  style="text-decoration: none "href="editUserInfoForm.php">edit your information</a> </button><br/>
        <button type="button" id="but"><a style="text-decoration: none " href="addOrDeleteCategory.php?operation=add">Add New Category</a> </button><br/>
        <button type="button" id="but"><a style="text-decoration: none " href="addOrDeleteCategory.php?operation=delet">Delet Category</a> </button><br/>
        <button type="button" id="but"><a style="text-decoration: none " href="logout.php">logout</a></button>
    </div>


    </body>
</html>
