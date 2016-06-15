<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Contact</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
    <?php
    if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('America/New_York');
    }
//     echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
    ?>
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
        
        <!--<?php
        // function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
        //      $file = $path.$filename;
        //      $file_size = filesize($file);
        //      $handle = fopen($file, "r");
        //      $content = fread($handle, $filee_size);
        //      fclose($handle);
        //      $content = chunk_split(base64_encode($content));
        //      $uid = md5(uniqid(time()));
        //      $header = "From: ".$from_name." <".$from_mail.">\r\n";
        //      $header .= "Reply-To: ".$replyto."\r\n";
        //      $header .= "MIME-Version: 1.0\r\n";
        //      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        //      $header .= "This is a multi-part message in MIME format.\r\n";
        //      $header .= "--".$uid."\r\n";
        //      $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        //      $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        //      $header .= $message."\r\n\r\n";
        //      $header .= "--".$uid."\r\n";
        //      $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
        //      $header .= "Content-Transfer-Encoding: base64\r\n";
        //      $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
        //      $header .= $content."\r\n\r\n";
        //      $header .= "--".$uid."--";
        //      if (mail($mailto, $subject, "", $header)) {
        //      echo "mail send ... OK"; // or use booleans here
        //      } else {
        //      echo "mail send ... ERROR!";
        //      }
        // }
        ?>
        
        <?php
        // if(isset($_POST['Submit']))
        // {
        //     $target_dir = "uploads/";
        //     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //     $uploadOk = 1;
        //     $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
        //     if ($_FILES["fileToUpload"]["size"] > 500000) {
        //         echo "Sorry, your file is too large.";
        //         $uploadOk = 0;
        //     }
        //     if ($uploadOk == 0) {
        //         echo "Sorry, your file was not uploaded.";
        //     } else {
        //         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //             echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //         } else {
        //             echo "Sorry, there was an error uploading your file.";
        //         }
        //     }
        // }
        ?>
        -->
        <?php
            $nameErr = $emailErr = $messageErr = "";
            $to = $name = $from_email = $subject = $message = $headers ="";
            $error = false;
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            
            if(isset($_POST['Submit']))
            {
                $to = "anish.chelseafc@gmail.com";
                
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                    $error = true;
                } else {
                    $name = test_input($_POST["name"]);
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                      $nameErr = "Only letters and white space allowed"; 
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $error = true;
                } else {
                    $from_email = test_input($_POST["email"]);
                    if (!filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid email format"; 
                    }
                }

                if (empty($_POST["subject"])) {
                    $subject = "";
                } else {
                    $subject = test_input($_POST["subject"]);
                }

                if (empty($_POST["message"])) {
                    $messageErr = "Message is required";
                    $error = true;
                } else {
                    $message = test_input($_POST["message"]);
                }
                if(!$error){
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: $name  '$from_email' " . "\r\n";
      //              $filename = basename($_FILES["fileToUpload"]["name"]);
      //              mail_attachment($filename, $target_dir, $to, $from_email, $name, $to, $subject, $message);
                    if(mail($to,$subject,$message,$headers)){
                        $_POST['name'] ="";
                        $_POST['email'] ="";
                        $_POST['subject'] ="";
                        $_POST['message'] ="";
                        echo "Email Sent";
                      }
                    else
                        echo "Error: Email not sent";
                }
            }
        ?>
        <form method = "post" name="contactForm" action="" style="width:600px; margin-left: 200px;" align="left" enctype="multipart/form-data">
            Name: &nbsp; &nbsp;  <input type="text" name="name" value = "<?php if (!empty($_POST["name"])) echo $_POST['name']; ?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            Email: &nbsp; &nbsp;  <input type="text" name="email" value = "<?php if (!empty($_POST["email"])) echo $_POST['email']; ?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            Subject: &nbsp;  <input type="text" name="subject" value = "<?php if (!empty($_POST["subject"])) echo $_POST['subject']; ?>"> <br>
            <br><br>
            Message: <textarea name="message" rows="5" cols="40" value = "<?php if (!empty($_POST["message"])) echo $_POST['message']; ?>"></textarea>
            <span class="error">* <?php echo $messageErr;?></span>
            <br><br>
            <p style="padding-left: 100px"><input type="submit"  name="Submit" value="Submit"/></p>
    </div>

       
    </body>
</html>
