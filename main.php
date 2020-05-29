
                <link rel="stylesheet" type="text/css" href="mainAndStudentAndAdminPages.css">
                <button class="butajax" id="signup" onclick="LoadSignUp();">Sign Up</button>
                <button class="butajax" id="signin" onclick="LoadSignIn();">Sign In</button>
                <div  id="demo">
                </div>
                <script type="text/javascript">
                        function LoadSignIn() {
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("demo").innerHTML = this.responseText;
                                }
                            };

                            xhttp.open("GET", "login.php", true);
                            xhttp.send();
                        }

                        function LoadSignUp() {
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("demo").innerHTML = this.responseText;
                                }
                            };
                            xhttp.open("GET", "signup.php", true);
                            xhttp.send();
                        }
                </script>




