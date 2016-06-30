<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Home Page for Anish Verma</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        
    </head>
    <body>
        <?php 
         if( ! ini_get('date.timezone') )
        {
            date_default_timezone_set('America/New_York');
        }
        include_once("analyticstracking.php"); 
        ?>
        <div id="main">
            <h1 style="font-family: Chiller; font-size: 4.5em; -webkit-margin-after: 0.1em; -webkit-margin-before: 0.3em;
                padding: 0px;"><a href="">Anish Verma<a></h1>
            <hr  style=" margin: 5px 0 10px 0; ">
            <script>
                var a = new Date().getTimezoneOffset();
                document.cookie = "timezone="+a;
                //document.write(a);
                var h = new Date().getHours();
                function getCookie(cname) {
                    var name = cname + "=";
                    var ca = document.cookie.split(';');
                    for(var i = 0; i <ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0)==' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length,c.length);
                        }
                    }
                    return "";
                }
            </script>
            <nav>
                <ul>
                <li><a href="">About</a></li> |
                <li><a href="pages/courses.php">Courses</a></li> |
                <li><a href="pages/academics.php">Academics</a></li> |
                <li><a href="pages/contact.php">Contact</a></li>
                </ul>
            </nav>
            <hr>
            <?php
                //echo getenv("HTTP_USER_AGENT");
                //date_default_timezone_set('GMT');
                // $overtime="";
                // if (isset($_COOKIE['timezone'])) $overtime = $_COOKIE['timezone'];

                // $d = date("H",time() - 60*$overtime);

                // if($d>=5 && $d <12)
                //     echo "<h2>Good Morning!</h2>";
                // else if($d>=12 && $d <16)
                //     echo "<h2>Good Afternoon!</h2>";
                // else if($d>=16 && $d<22)
                //     echo "<h2>Good Evening!</h2>";
                // else 
                //     echo "<h2>You're up late. Sleep soon!</h2>";
                // echo "The time is " . date("h:i:sa e")."<br>";
                // echo "The local time is " . date("h:i:sa e",time() - 60*$overtime)."<br>";  
            ?>
            <p id="hello"></p>
            <script>
                var str;
                if(h>=5 && h <12)
                    str = "<h2>Good Morning ";
                else if(h>=12 && h <16)
                    str = "<h2>Good Afternoon ";
                else if(h >=16 && h <22)
                    str = "<h2>Good Evening ";
                else 
                    str ="<h2>You're up late. Sleep soon ";


                var username = getCookie("username");
                if(username == ""){
                    document.getElementById("hello").innerHTML = "You seem to be a new user. What is your name? <br>";
                    document.getElementById("hello").innerHTML += '<textarea id="name" rows="1" cols="20" placeholder="Enter Your Name Here"></textarea> <br>';
                    document.getElementById("hello").innerHTML += '<button onclick="sayHello()">Submit</button>';
                }
                else{
                    document.getElementById("hello").innerHTML = str+username+" !</h2>";  
                }
                function sayHello(){
                    uname = document.getElementById("name");
                    document.getElementById("hello").innerHTML = str+uname.value+" !</h2>";  
                    document.cookie = "username="+uname.value+"; expires=Sat, 31 Dec 2016 12:00:00 UTC";
                }
            </script>
            <footer>
                <a href="images/resume.jpg" target="_blank"> <img src="images/res_pic.png" width="90"></a>
            </footer>
        </div>
       <!--<div >
        <H1>Anish Verma</H1>
        <h4>Computer Science</h4>
        <h4>University of Southern California, 2019</h4>

        <p>
            <IMG WIDTH=560 HEIGHT=3
             SRC="/graphics/USCBar2.gif"
             ALT="==================================================">
        </p>
            
        <p>
            You can e-mail me at:
            <A HREF="mailto:anishver@usc.edu"><I>anishver@usc.edu</I></A>
        </p>
        <p id="para">
            This is a paragraph    
        </p>
        
        <button type="button" id="but"> Hello</button>
        <p>
            <A HREF="classes/cs103.html"><I>CS 103</I></A>
            <A HREF="classes/cs104.html"><I>CS 104</I></A>
        </p>
        <div>
        -->

        <!--<script type="text/javascript">
        $('#but').click(function(){
            console.log("Hello");
            var userChoice = prompt("Whats Your Name?");
            $('#para').html("Welcome to my web page "+userChoice);
        });    
        </script>    -->
    </body>
</html>
