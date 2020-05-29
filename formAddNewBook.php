<html>
    <head>
        <link rel="stylesheet" type="text/css" href="formAddAndEditBook.css">
    </head>
    <body>
        <div id="all">

                <fieldset>
                    <legend><h1>Add New book</h1></legend>
                    <form action="AddBook.php" method="POST">

                        <h5>Enter book name : <input id="in" type="text" name="bookname"></h5>
                        <h5>Enter book category : <input id="in" type="text" name="category"></h5>
                        <h5>Enter book author : <input id="in" type="tex" name="author"></h5> 
                       <!--  <input id="in" type="" name="pyear"></h5>-->
                     <h5>Enter ISBN : <input id="in" type="" name="isbn"></h5>
                    <h5 style="display: inline"">Enter publication year :</h5>
                    <select id="in"  name="pyear"  id="in" style="width: 130px; font-size: large">
                        <?php
                        session_start();
                        for($i=1900;$i<=2020;$i++)
                        {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                <br>
                        <input id="but" type="submit" value="ADD">
                    </form>
                   <a href="admin.php"> <input id="but" type="button" value="main page" ></a>
                </fieldset>

            <p   <?php    if(!isset(  $_SESSION['book added'])){echo 'hidden';} ?>   >
                <?php echo

                $_SESSION['book added'];
                $_SESSION['book added']=NULL;
                ?>

            </p>
        </div>
    </body>
</html>