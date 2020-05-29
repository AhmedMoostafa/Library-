<div id="all"> <?php
session_start();
include 'connect.php';
$cur=$_SESSION['current'];
$sql = "SELECT * FROM users";
$result=$connect->query($sql);
$row;
while ($row = $result->fetch_assoc()) {
    if ($row['email'] == $cur) {
        break;
    }
}
?> </div>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" type="text/css" href="editUserInfoForm.css">
</head>
<body>
    <div id="all">
    <form method="post" action="EditUserInfo.php">
        <ul>
        <h3>Email : <input id="s1" type="email" onkeyup="isvalid_email('s1')" value="<?php echo $row['email'] ?>" name="newemail"></h3>
        <h3>Username : <input id="s2" type="text" onkeyup="isvalid_username('s2')" value="<?php echo $row['uname']?>" name="newuname" minlength="3"></h3>
        <h3>New password : <input id="s3" onkeyup="isvalid_pass('s3')" type="password"  name="newpass" minlength="8" value="<?php echo $row['PASSWORD'] ?>"></h3>
        <h3>Re-enter new password : <input id="s4" onkeyup="isvalid_pass('s4')" type="password"  name="renewpass" minlength="3" value="<?php echo $row['PASSWORD'] ?>"></h3>

            <button type="submit" class="but" onclick="disable2('s3','s4','s1','s2')" type="button"  name="Sing In">Edit</button>
        <br>
        </ul>
    </form>
        <?php
        if($_SESSION['role']=="admin")
        {
           echo ' <a href="admin.php"> <input class="but" type="button" value="main page" ></a>';
        }
        else
        {
            echo ' <a href="student.php"> <input class="but" type="button" value="main page" ></a>';
        }
        ?>

</div>
    <div id="errormsg" style="color: red; font-size: 50px">
        <?php
        if(isset($_SESSION['answer']))
            echo $_SESSION['answer'];
        $_SESSION['answer']=NULL;
        ?>
    </div>
    <script type="text/javascript"  src="validation.js"></script>
</body>

</html>