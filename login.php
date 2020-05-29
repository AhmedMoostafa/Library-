<?php
session_start();
if(isset($_SESSION['current']))
{
    if($_SESSION['role']=='student')
    {
        header('location: student.php');
    }
    else
    {
        header('location: admin.php');
    }

}
$dis=NULL;

?>



    <link rel="stylesheet" type="text/css" href="mainAndStudentAndAdminPages.css">



<form method="post" action="isexist.php">

    <h1>Sign In</h1>
    <input type="email" class="s1" id="username" name="email" placeholder="Email"
      value="
    <?php
    if(isset($_COOKIE['email']))
    {
        echo $_COOKIE['email'];
    }
    ?>" >
    <br>
    <input type="password"    class="s1" id="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass'];?>" minlength="3"><br>

    <button type="submit" class="but" id="butt"  name="Sing In">Sign In</button>


    <div   class="remmber"> <input type="checkbox" class="box" name="remChkBox" id="aa"> <label for="remChkBox">Remmber me</label></div>
    <div class="Link"><a  href="signup.php" class="Link2">Sign up now</a></div>

</form>
<div class="errormsg" <?php
if(isset( $_SESSION['notexist']))
{
     if($_SESSION['notexist'])
     {
      $_SESSION['notexist']=NULL;
     }
}
else
{
    echo 'hidden';
}
?>
>
    Wrong email or password. Please try again!
</div>

