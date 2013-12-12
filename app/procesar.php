<?php
$a[]="pastoseco@uv.cl";
$a[]="torombolo@uv.cl";

$q=$_POST['valorCaja1'];
if (strlen($q) > 0){
  $hint="";
  for($i=0; $i<count($a); $i++){
        if(strcmp($q, $a[$i])==0){
          $resultado="Usuario registrado";
          $i = count($a)+1;
        }
        else{
          $resultado="Usuario No registrado";
        }
    }
  }
echo $resultado;
?>