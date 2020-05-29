<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<?php
include 'connect.php';

    $query = "SELECT * FROM books";

  $result = $connect->query($query) ;

        while ($row = $result->fetch_assoc()) {

            $print=$row['bname'];
            echo  "<a  class=\"pbook\"
                    style=\"text-decoration: none;color: bisque; font-size: 30px \"
                    href=UpdatebookForm.php?name=$print>"."$print"."</a>";
            echo '<hr>';

        }


?>
</body>
</html>