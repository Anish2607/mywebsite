<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Sudoku Solver</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../main.css">
        <style type ="text/css">
            input {display: block; padding: 0; margin: 0; border: 0; width: 100%; height:30px; font-size: 20px; text-align:center;}
            td {margin: 0; padding: 0; width: 10px;}
        </style>
    </head>
    <body>
    <?php include_once("../analyticstracking.php"); ?>
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
                    //$table[$i][$j] = 0;
                }
            }

            //echo $_GET["r0c8"];
            function isValid($row, $col){
               //check row
                global $table;
                for($c=0;$c<9;$c++){
                    if($c == $col)
                        continue;
                    if(($table[$row][$c] == $table[$row][$col]) && ($table[$row][$col]!=""))
                        return false;
                }
                //check column
                for($r=0;$r<9;$r++){
                    if($r == $row)
                        continue;
                    if(($table[$r][$col] == $table[$row][$col]) && ($table[$row][$col]!=""))
                        return false;
                }
                $startRow = floor($row/3) * 3;
                $startCol = floor($col/3) * 3;
               // echo $startRow;
               //               echo $startCol;
                for($r= $startRow; $r<$startRow+3;$r++){
                    for($c= $startCol; $c<$startCol+3;$c++){
                        if($r == $row  && $c == $col)
                        continue;
                        if(($table[$r][$c] == $table[$row][$col]) && ($table[$row][$col]!="")){             
                            // echo $table[$r][$c],"<br>";
                            // echo "r " , $r, "c", $c;
                            // echo $table[$row][$col],"<br>";
                            // echo "row " , $row, "col", $col;
                            return false;       
                        }
                    }
                }
                return true;
            }
            function Verify(){
                for($i = 0; $i<9 ;$i++){
                    for($j = 0; $j<9;$j++){
                        if(!isValid($i,$j)){
                            echo "INVALID SUDOKU PUZZLE";
                            return false;
                        }
                    }
                }
                return true;
            }
        //Verify();
        //isVrlid(2,6);
            // $ar = array("a","b","c");
            // $x=0;
            function solve($row, $col){
                // global $table, $x, $ar;
                // $x++;
                // if($x<3)
                //     solve();
                // echo $x,"<br>";
                global $table;
                if($row == 9)
                    return true;
                if($table[$row][$col]==0){
                    for($i=1;$i<=9;$i++){
                        $table[$row][$col] = $i;
                        if(isValid($row,$col)){
                            if($col==8){
                                if(solve($row+1,0)) 
                                    return true;
                            }
                            else{
                                if(solve($row,$col+1)) 
                                    return true;
                            }
                        }
                    }
                    $table[$row][$col] ="";
                    return false;
                }
                else{
                    if($col==8){
                        if(solve($row+1,0)) 
                            return true;
                    }
                    else{
                        if(solve($row,$col+1)) 
                            return true;
                    }
                    return false;
                }
            }

            if(Verify() &&  $_GET["solve"] == "Submit"){
                if(!solve(0,0))
                    echo "No Solution";
            }
        ?>
        <script>
            function reset() {
                window.open('sudokuSolver.php?r0c0&r0c1&r0c2&r0c3&r0c4&r0c5&r0c6&r0c7&r0c8&r1c0&r1c1&r1c2&r1c3&r1c4&r1c5&r1c6&r1c7&r1c8&r2c0&r2c1&r2c2&r2c3&r2c4&r2c5&r2c6&r2c7&r2c8&r3c0&r3c1&r3c2&r3c3&r3c4&r3c5&r3c6&r3c7&r3c8&r4c0&r4c1&r4c2&r4c3&r4c4&r4c5&r4c6&r4c7&r4c8&r5c0&r5c1&r5c2&r5c3&r5c4&r5c5&r5c6&r5c7&r5c8&r6c0&r6c1&r6c2&r6c3&r6c4&r6c5&r6c6&r6c7&r6c8&r7c0&r7c1&r7c2&r7c3&r7c4&r7c5&r7c6&r7c7&r7c8&r8c0&r8c1&r8c2&r8c3&r8c4&r8c5&r8c6&r8c7&r8c8&solve','_self')
            }
        </script>

        <form method="get" name="myform "action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <table style="width: auto; margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <!--<?php 
                        // for()
                        // echo '<td><input type="number" name="', str,'" max="9" min="0" value="',$table[0][0],'">';
                    ?>-->
                    <td><input type="number" name="r0c0" max="9" min="1" value="<?php echo $table[0][0]; ?>">
                    <td><input type="number" name="r0c1" max="9" min="1" value="<?php echo $table[0][1]; ?>">
                    <td><input type="number" name="r0c2" max="9" min="1" value="<?php echo $table[0][2]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c3" max="9" min="1" value="<?php echo $table[0][3]; ?>">
                    <td><input type="number" name="r0c4" max="9" min="1" value="<?php echo $table[0][4]; ?>">
                    <td><input type="number" name="r0c5" max="9" min="1" value="<?php echo $table[0][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r0c6" max="9" min="1" value="<?php echo $table[0][6]; ?>">
                    <td><input type="number" name="r0c7" max="9" min="1" value="<?php echo $table[0][7]; ?>">
                    <td><input type="number" name="r0c8" max="9" min="1" value="<?php echo $table[0][8]; ?>">
                </tr>
                <tr>
                    <td><input type="number" name="r1c0" max="9" min="1" value="<?php echo $table[1][0]; ?>">
                    <td><input type="number" name="r1c1" max="9" min="1" value="<?php echo $table[1][1]; ?>">
                    <td><input type="number" name="r1c2" max="9" min="1" value="<?php echo $table[1][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r1c3" max="9" min="1" value="<?php echo $table[1][3]; ?>">
                    <td><input type="number" name="r1c4" max="9" min="1" value="<?php echo $table[1][4]; ?>">
                    <td><input type="number" name="r1c5" max="9" min="1" value="<?php echo $table[1][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r1c6" max="9" min="1" value="<?php echo $table[1][6]; ?>">
                    <td><input type="number" name="r1c7" max="9" min="1" value="<?php echo $table[1][7]; ?>">
                    <td><input type="number" name="r1c8" max="9" min="1" value="<?php echo $table[1][8]; ?>">
                </tr>
                
                <tr>
                    <td><input type="number" name="r2c0" max="9" min="1" value="<?php echo $table[2][0]; ?>">
                    <td><input type="number" name="r2c1" max="9" min="1" value="<?php echo $table[2][1]; ?>">
                    <td><input type="number" name="r2c2" max="9" min="1" value="<?php echo $table[2][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r2c3" max="9" min="1" value="<?php echo $table[2][3]; ?>">
                    <td><input type="number" name="r2c4" max="9" min="1" value="<?php echo $table[2][4]; ?>">
                    <td><input type="number" name="r2c5" max="9" min="1" value="<?php echo $table[2][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r2c6" max="9" min="1" value="<?php echo $table[2][6]; ?>">
                    <td><input type="number" name="r2c7" max="9" min="1" value="<?php echo $table[2][7]; ?>">
                    <td><input type="number" name="r2c8" max="9" min="1" value="<?php echo $table[2][8]; ?>">
                </tr>
                <tr></tr>
                <tr>
                    <td><input type="number" name="r3c0" max="9" min="1" value="<?php echo $table[3][0]; ?>">
                    <td><input type="number" name="r3c1" max="9" min="1" value="<?php echo $table[3][1]; ?>">
                    <td><input type="number" name="r3c2" max="9" min="1" value="<?php echo $table[3][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r3c3" max="9" min="1" value="<?php echo $table[3][3]; ?>">
                    <td><input type="number" name="r3c4" max="9" min="1" value="<?php echo $table[3][4]; ?>">
                    <td><input type="number" name="r3c5" max="9" min="1" value="<?php echo $table[3][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r3c6" max="9" min="1" value="<?php echo $table[3][6]; ?>">
                    <td><input type="number" name="r3c7" max="9" min="1" value="<?php echo $table[3][7]; ?>">
                    <td><input type="number" name="r3c8" max="9" min="1" value="<?php echo $table[3][8]; ?>">
                </tr>
                
                <tr>
                    <td><input type="number" name="r4c0" max="9" min="1" value="<?php echo $table[4][0]; ?>">
                    <td><input type="number" name="r4c1" max="9" min="1" value="<?php echo $table[4][1]; ?>">
                    <td><input type="number" name="r4c2" max="9" min="1" value="<?php echo $table[4][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r4c3" max="9" min="1" value="<?php echo $table[4][3]; ?>">
                    <td><input type="number" name="r4c4" max="9" min="1" value="<?php echo $table[4][4]; ?>">
                    <td><input type="number" name="r4c5" max="9" min="1" value="<?php echo $table[4][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r4c6" max="9" min="1" value="<?php echo $table[4][6]; ?>">
                    <td><input type="number" name="r4c7" max="9" min="1" value="<?php echo $table[4][7]; ?>">
                    <td><input type="number" name="r4c8" max="9" min="1" value="<?php echo $table[4][8]; ?>">
                </tr>

                <tr>
                    <td><input type="number" name="r5c0" max="9" min="1" value="<?php echo $table[5][0]; ?>">
                    <td><input type="number" name="r5c1" max="9" min="1" value="<?php echo $table[5][1]; ?>">
                    <td><input type="number" name="r5c2" max="9" min="1" value="<?php echo $table[5][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r5c3" max="9" min="1" value="<?php echo $table[5][3]; ?>">
                    <td><input type="number" name="r5c4" max="9" min="1" value="<?php echo $table[5][4]; ?>">
                    <td><input type="number" name="r5c5" max="9" min="1" value="<?php echo $table[5][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r5c6" max="9" min="1" value="<?php echo $table[5][6]; ?>">
                    <td><input type="number" name="r5c7" max="9" min="1" value="<?php echo $table[5][7]; ?>">
                    <td><input type="number" name="r5c8" max="9" min="1" value="<?php echo $table[5][8]; ?>">
                </tr>
                <tr></tr>
                <tr>
                    <td><input type="number" name="r6c0" max="9" min="1" value="<?php echo $table[6][0]; ?>">
                    <td><input type="number" name="r6c1" max="9" min="1" value="<?php echo $table[6][1]; ?>">
                    <td><input type="number" name="r6c2" max="9" min="1" value="<?php echo $table[6][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r6c3" max="9" min="1" value="<?php echo $table[6][3]; ?>">
                    <td><input type="number" name="r6c4" max="9" min="1" value="<?php echo $table[6][4]; ?>">
                    <td><input type="number" name="r6c5" max="9" min="1" value="<?php echo $table[6][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r6c6" max="9" min="1" value="<?php echo $table[6][6]; ?>">
                    <td><input type="number" name="r6c7" max="9" min="1" value="<?php echo $table[6][7]; ?>">
                    <td><input type="number" name="r6c8" max="9" min="1" value="<?php echo $table[6][8]; ?>">
                </tr>
                
                <tr>
                    <td><input type="number" name="r7c0" max="9" min="1" value="<?php echo $table[7][0]; ?>">
                    <td><input type="number" name="r7c1" max="9" min="1" value="<?php echo $table[7][1]; ?>">
                    <td><input type="number" name="r7c2" max="9" min="1" value="<?php echo $table[7][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r7c3" max="9" min="1" value="<?php echo $table[7][3]; ?>">
                    <td><input type="number" name="r7c4" max="9" min="1" value="<?php echo $table[7][4]; ?>">
                    <td><input type="number" name="r7c5" max="9" min="1" value="<?php echo $table[7][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r7c6" max="9" min="1" value="<?php echo $table[7][6]; ?>">
                    <td><input type="number" name="r7c7" max="9" min="1" value="<?php echo $table[7][7]; ?>">
                    <td><input type="number" name="r7c8" max="9" min="1" value="<?php echo $table[7][8]; ?>">
                </tr>

                <tr>
                    <td><input type="number" name="r8c0" max="9" min="1" value="<?php echo $table[8][0]; ?>">
                    <td><input type="number" name="r8c1" max="9" min="1" value="<?php echo $table[8][1]; ?>">
                    <td><input type="number" name="r8c2" max="9" min="1" value="<?php echo $table[8][2]; ?>">
                    <td style="width:1%; height:100%"> |
                    <td><input type="number" name="r8c3" max="9" min="1" value="<?php echo $table[8][3]; ?>">
                    <td><input type="number" name="r8c4" max="9" min="1" value="<?php echo $table[8][4]; ?>">
                    <td><input type="number" name="r8c5" max="9" min="1" value="<?php echo $table[8][5]; ?>">
                    <td style="width:1%; height:100% "> |
                    <td><input type="number" name="r8c6" max="9" min="1" value="<?php echo $table[8][6]; ?>">
                    <td><input type="number" name="r8c7" max="9" min="1" value="<?php echo $table[8][7]; ?>">
                    <td><input type="number" name="r8c8" max="9" min="1" value="<?php echo $table[8][8]; ?>">
                </tr>
            </tbody>
        </table>
        <hr></hr>
        <input type="submit" name="solve">
        </form>
        <button onclick="reset()">RESET</button>
        </div>
        
    </body>
</html>
