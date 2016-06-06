<!DOCTYPE html>
<html lang="en">
    <head>

        <title>N-Queens</title>
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
            <h1> N_QUEENS PROBLEM</h1>
            SIZE: <input id="size" type="number" style= "align: center; width: 20%;  margin: 0 auto">
            <br>
            <button onclick="myFunc()">SOLVE!</button>
            <b><p id="errors" style="font-size: 20px; color: white"></p> </b>
           <script>
           function myFunc(){
                var tbl = document.getElementById("myTable");
                if(tbl) tbl.parentNode.removeChild(tbl);

                var size= document.getElementById("size").value;
                if(size>20){
                    console.log("wut");
                    document.getElementById("errors").innerHTML = "ERROR! SIZE TOO BIG! <br> TRY AGAIN WITH A SMALLER VALUE!";
                    return;
                }
                var x = document.createElement("TABLE");   //create table
                x.setAttribute("id", "myTable");
                x.setAttribute("style", "font-size: 50px; color: white;  width: auto; margin-left: auto; margin-right: auto;");
                document.body.appendChild(x); 
                for(var j=0;j<size;j++){
                    var y = document.createElement("TR");   //create row
                    y.setAttribute("id", "myTr"+j);
                    document.getElementById("myTable").appendChild(y);
                    for(var i=0;i<size;i++){
                        var z = document.createElement("TD");   //create columns/cells
                        var t = document.createTextNode("-");
                        z.setAttribute("style", "border: 2px solid #99ccff; text-align:center");
                        z.appendChild(t);
                        document.getElementById("myTr"+j).appendChild(z);
                    }
                }
        
                var q = new Array(size);
                var threats = new Array(size);
                for(var i=0;i<size;i++){
                    threats[i] = new Array(size);
                    for(var j=0;j<size;j++)
                        threats[i][j] = 0;
                }
                search(0);
                function search(row)
                {
                    if (row == size){
                        console.log(q);
                        displaySolution();
                        return true;
                    } // that function shows the layout
                    else
                    {
                        for (q[row] = 0; q[row] < size; q[row]++)
                        {
                            if (threats[row][q[row]] == 0)
                            {
                                changeThreats (row, q[row], 1);
                                if(search (row+1)){
                                    return true;
                                }else{
                                    changeThreats (row, q[row], -1);
                                }
                            }
                        }
                    }
                }

                function changeThreats (row, column, change)
                {
                    for (var j = row+1; j < size; j++)
                    {
                        threats[j][column] += change;
                        if (column+(j-row) < size) threats[j][column+(j-row)] += change;
                        if (column-(j-row) >= 0) threats[j][column-(j-row)] += change;
                    }
                }
                function displaySolution(){
                    for(var i=0;i<size;i++){
                        var cell = document.getElementById("myTable").rows[i].cells;
                        cell[q[i]].innerHTML = "Q";            
                    }
                }
            }
           </script>
       </div>
       
    </body>
</html>
