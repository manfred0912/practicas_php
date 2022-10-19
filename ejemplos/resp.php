<html>
  <body>
    <?php
      $n =$_POST["nomb"];
      $a =$_POST["ap"];
      $g =$_POST["genero"];

      if(isset($_POST["opc1"])){
        $o1 = $_POST["opc1"];
      }
      if(isset($_POST["opc2"])){
        $o2 = $_POST["opc2"];
      }
      if(isset($_POST["opc3"])){
        $o3 = $_POST["opc3"];
      }
      echo "Bienvenido estimado <b>".$n." ".$a."</b><br> su género seleccionado fue <b><i>".$g."</b></i><br>";

      if( isset( $o3 ) ){
        echo "Usted es ".$o3."<br>";
      }
      else if( isset($o2) ){
        echo "Usted es ".$o2."<br>";
      }
      else if( isset($o1) ){
        echo "Usted es ".$o1."<br>";
      }
         

    ?>

  </body>
</html>