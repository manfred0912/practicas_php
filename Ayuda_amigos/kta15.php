<!DOCTYPE html>
<html>
<body>
   
  
     <h2>Calculadora P1</h2>    

        <form action="./Practica15.php" method="POST">

        <label>Número 1:</label>
        <input type="number" name="num1">

        <br><br>

        <label>Número 2:</label>
        <input type="number" name="num2">

        <br><br>

      <h2>Operacion<h2>
      <input type="radio" name="op" value="1">
      <label>Suma</label><br>
         
      <input type="radio" name="op" value="2">
      <label>Resta</label><br>
           
      <input type="radio" name="op" value="3">
      <label>Multiplicacion</label><br>
           
      <input type="radio" name="op" value="4">
      <label>Division</label><br>
           
      <br><br>

      <input type="submit" value="Calcular">

  </form>

  <?php

$op =$_POST["op"];
$num1 =$_POST["num1"];
$num2 =$_POST["num2"];

switch ($op) {
  case '1':
    echo "Suma: ".($num1+$num2);
    break; 

    case '2':
      if($num1 < $num2){
      echo "Resta: ".($num2-$num1);
    } 
    else {
      echo "Resta: ".($num1-$num2);
    }
      break;

      case '3': 
        echo "Multiplicacion: ".($num1*$num2);
        break;

      case '4':
        echo "Division: ".($num1/$num2);
        break;
}

?>

</body>
</html>