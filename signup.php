<?php
session_start();


?>

<html>
<title>
    Sign Up
</title>
<head>
</head>
<body>
<h1>Sign up</h1>
<form method='POST' action="add.php">
    <link rel="stylesheet" type="text/css" href="mainAndStudentAndAdminPages.css">
    <input type='text' class="s1" name = 'username' onkeyup="isvalid_username('username')" id='username' placeholder="username" minlength="3">
    </br>
    <input type='email' class="s1" name='email' onkeyup="isvalid_email('email')"  id='email' placeholder="Email">

    </br><input type='password' onkeyup="isvalid_pass('password')" class="s1" name='password' id='password' placeholder="password"  minlength="8">
    </br>
    <button type="submit" class="but" onclick="disable('password','email','username')"   name="Sing In">Sign up</button>

</form>

<div id="errormsg" >
    <?php
    if(isset($_SESSION['errormsg'])) {

        echo $_SESSION['errormsg'];
        $_SESSION['errormsg']=NULL;
    }

    ?>
</div>
<br>
<div id="errormsg"></div>

<script type="text/javascript"  src="validation.js"></script>

</body>

</html>