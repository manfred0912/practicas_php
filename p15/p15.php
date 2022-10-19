<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./p15.php">
        <label>Primer numero</label>
        <input type="text" name="no1"><br><br>
        <label>Segundo numero</label>
        <input type="text" name="no2">

        <hr>
  		<input type="radio" name="op1" value="S" checked>Suma<br>
  		<input type="radio" name="op2" value="R">Resta<br>
  		<input type="radio" name="op3" value="M">Multiplicación<br>
        <input type="radio" name="op4" value="D">División<br>
	    <hr>
    </form>

    
    <input type="submit" value="Procesar">
    <?php
        $n1 = $_POST["no1"];
        $n2 = $_POST["no2"];
        if(isset($_POST["op1"])){
            $o1 = $_POST["op1"];
        }
        if(isset($_POST["op2"])){
            $o2 = $_POST["op2"];
        }
        if(isset($_POST["op3"])){
           $o3 = $_POST["op3"];
        }
        if(isset($_POST["op4"])){
            $o3 = $_POST["op4"];
        }
        
        if(isset($o1)){
            echo "La suma de $n1 y $n2 es: ".($n1 + $n2);
        }
        if(isset($o2)){
            echo "La resta de $n1 y $n2 es: ".($n1 - $n2);
        }
        if(isset($o3)){
            echo "La multiplicación de $n1 y $n2 es: ".($n1 * $n2);
        }
        if(isset($o4)){
            echo "La division de $n1 y $n2 es: ".($n1 / $n2);
        }
    ?>
</body>
</html>