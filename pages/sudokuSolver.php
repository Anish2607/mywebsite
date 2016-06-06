<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Sudoku Solver</title>
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
                <li><a href="contact.php">Contact</a></li>       
                </ul>
            </nav>
            <hr>
        <p>
        </p>
         <?php
            $table=array(array("","","","","","","","",""),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),
                    array("","","","","","","","","",),);
            for($i=0;$i<9;$i++){
                for($j=0;$j<9;$j++){
                    $str ="r".$i."c".$j;
                    $table[$i][$j] = $_GET[$str]; 
                }
            }
        ?>

        <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table style="width: auto; margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td><input type="number" name="r0c0" max="9" min="0" value="<?php echo $table[0][0]; ?>">
                    <td><input type="number" name="r0c1" max="9" min="1" >
                    <td><input type="number" name="r0c2" max="9" min="1" >
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c3" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c4" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c5" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c6" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c7" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c8" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                <tr>
                    <td><input type="number" name="r1c0" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c1" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r1c3" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c4" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c5" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r1c6" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c7" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c8" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                
                <tr>
                    <td><input type="number" name="r1c0" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c1" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r1c3" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c4" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c5" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r1c6" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c7" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r1c8" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                
                
                
                <tr></tr>
                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                
                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>

                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                <tr></tr>
                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
                
                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>

                <tr>
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                    <td><input type="number" name="r0c2" max="9" min="1" style="height:30px; font-size: 20px; text-align:center;">
                </tr>
            </tbody>
        </table>
        <hr></hr>
        <input type="submit">
        </form>
        </div>

       
    </body>
</html>
