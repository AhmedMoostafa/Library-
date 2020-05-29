var mail_stat=false,pass_stat=false,name_stat=false;
    function isvalid_pass(id) {
        var ps = document.getElementById(id).value;


        var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{0,16}$/;

        if (ps.length > 0) {
            if (regularExpression.test(ps)) {
                document.getElementById("errormsg").innerHTML = "password is valid";

                return true;
            } else {
                document.getElementById("errormsg").innerHTML = "password must contains numbers and special characters";
                return false;


            }
        } else {
            document.getElementById("errormsg").innerHTML = "";
            return false;


        }
    }
    function isvalid_email(id) {
        var email = document.getElementById(id).value;


        var regularExpression = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/;

        if (email.length > 0) {
            if (regularExpression.test(email)) {
                document.getElementById("errormsg").innerHTML = "Email is valid";

                return true;
            } else {
                document.getElementById("errormsg").innerHTML = "Email is not valid";
                return false;


            }
        } else {
            document.getElementById("errormsg").innerHTML = "";
            return false;


        }
    }
    function isvalid_username(id) {
        var name = document.getElementById(id).value.length;
        if(name>1)
        {
            document.getElementById("errormsg").innerHTML = "User Name is  valid";
            return true;
        }
        else
        {
            document.getElementById("errormsg").innerHTML = "User Name is not valid";
            return false;
        }

    }
    function disable(pass,mail,name) {
        const button = document.querySelector('button');
/*console.log(isvalid_pass(pass)+" "+isvalid_email(mail) +" "+isvalid_username(name));*/
            if (isvalid_pass(pass)&&isvalid_email(mail)&&isvalid_username(name))
            {
                button.disabled=false;
            }
            else
            {
                button.disabled=true;
                location.reload();

            }
      /*  button.disabled=false;*/
    }
function disable2(pass,repass,mail,name) {
    const button = document.querySelector('button');
    console.log(mail_stat+" "+pass_stat+" "+name_stat);
    if (isvalid_pass(pass)&&isvalid_email(mail)&&isvalid_username(name)&&isvalid_pass(repass))
    {
        button.disabled=false;
    }
    else
    {
        button.disabled=true;
        location.reload();
    }
}