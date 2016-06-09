<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Contact</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
    <div id="main">
            <h1 style="font-family: Chiller; font-size: 4.5em; -webkit-margin-after: 0.1em; -webkit-margin-before: 0.3em;
                padding: 0px;"><a href="../index.html">Anish Verma<a></h1>
            <hr  style=" margin: 5px 0 10px 0; ">
            <nav>
                <ul>
                <li><a href="../index.html">About</a></li> |
                <li><a href="courses.php">Courses</a></li> |
                <li><a href="academics.php">Academics</a></li> |
                <li><a href="">Contact</a></li>       
                </ul>
            </nav>
            <hr>
        <?php
            if(isset($_POST['submit']))
            {
                $name = $_POST["name"];
                $from_email = $_POST["email"];
                $message = $_POST["message"];
                $subject = $_POST["subject"];
                //echo $email."<br>";
                $to = "anish.chelseafc@gmail.com";
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= "From: $name  '$from_email' " . "\r\n";
                // $headers .= "From: <$email>" . "\r\n";
                //echo $headers;                
            }
            
        ?>
        <form method = "post" name="contactForm" action="">
            Name: <input type="text" name="name"> <br>
            Email: <input type="text" name="email"> <br>
            Subject: <input type="text" name="subject"> <br>
            Message: <textarea name="message" rows="5" cols="40"></textarea>
            <input type="submit"  name="submit" value="submit" />
        </form>
        <?php
            if(mail($to,$subject,$message,$headers))
            {
                echo "Email Sent";
            }
            else
            {
                echo "Error: Email not sent";
            }
        ?>
    </div>

       
    </body>
</html>
