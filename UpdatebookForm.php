<?php
session_start();
include 'connect.php';
$bookName=$_GET['name'];
$sql = "SELECT * FROM books";
$result=$connect->query($sql);
$row=NULL;
while ($row = $result->fetch_assoc()) {
    if ($row['bname'] == $bookName) {
        break;
    }
}
?>
<!DOCTYPE   html>
<html>
<head>

    <meta charset = "UTF-8" />
    <link rel="stylesheet" type="text/css" href="formAddAndEditBook.css">
</head>
<body>


<div id="all">

    <fieldset>
        <legend><h1>Edit book</h1></legend>
        <form method="post" action="EditBook.php">

            <h5>Enter book name : <input id="in" type="text"
                                         value="<?php
                                         if(isset( $row['author']))
                                         {
                                             echo $bookName;
                                         }
                                         else
                                         {
                                             echo "";
                                         }
                                         ?>" name="newbname"
                >
            </h5>
            <h5>Enter book category : <input id="in" type="text" value="<?php
                if(isset($row['category']))
                {
                    echo $row['category'];
                }
                else
                {
                    echo "";
                }


                ?>" name="newcategory"></h5>
            <h5>Enter book author : <input id="in" type="tex" value="<?php
                if(isset( $row['author']))
                {
                    echo $row['author'];
                }
                else
                {
                    echo "";
                }

                ?>" name="newauthor">
            </h5>
            <h5>Enter ISBN : <input id="in" type="" value="<?php
                if(isset($row['isbn']))
                {
                    echo $row['isbn'];
                }
                else
                {
                    echo "";
                }

                ?>" name="newisbn"></h5>
            <h5 style="display: inline"">Enter publication year :</h5>
            <select  class="s1" name="newpyear"  style="width: 130px; font-size: large">
                <?php
                session_start();
                for($i=1900;$i<=2020;$i++)
                {
                    if($row['pyear']==$i)
                    {
                        echo '<option  selected="1" value="'.$i.'" >'.$i.'</option>';
                    }
                    else
                    {
                        echo '<option  value="'.$i.'">'.$i.'</option>';
                    }
                }
                ?>
            </select>
            <br>
            <input type="text" class="s1"  name="old" hidden value="<?php echo $bookName?>">
            <br>
            <input type="submit" id="but" value="Edit" name="submit">
        </form>
        <a href="admin.php"> <input id="but" type="button" value="main page" ></a>
    </fieldset>
    <p   <?php    if(!isset($_SESSION['book Edit'])){echo 'hidden';} ?>   >
        <?php echo

        $_SESSION['book Edit'];
        $_SESSION['book Edit']=NULL;
        ?>
</div>

</html>