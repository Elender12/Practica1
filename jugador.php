<?php
session_start();
if(isset($_POST['money'])){
    
    $money = $_POST['money'];
    $_SESSION['money']=$money;
}


if(isset($_POST['eleccion'])){
    $mres = array(
                array(
                    "piedra"=>0,
                    "papel"=>1,
                    "tijeras"=>-1,
                    "lagarto"=>-1,
                    "spock"=>1
                    ),
                array(
                    "piedra"=>-1,
                    "papel"=>0,
                    "tijeras"=>1,
                    "lagarto"=>1,
                    "spock"=>-1
                    ),
                array(    
                    "piedra"=>1,
                    "papel"=>-1,
                    "tijeras"=>0,
                    "lagarto"=>-1,
                    "spock"=>1
                    ),
                array(    
                    "piedra"=>1,
                    "papel"=>-1,
                    "tijeras"=>1,
                    "lagarto"=>0,
                    "spock"=>-1
                    ),
                array(    
                    "piedra"=>-1,
                    "papel"=>1,
                    "tijeras"=>-1,
                    "lagarto"=>1,
                    "spock"=>0
                    ),
                );
    $alea = rand(0,4);
    $op = array("piedra","papel","tijeras","lagarto","spock");
    $jugada = $_POST['eleccion'];
    
    echo $op[$alea]."<br/>";

    if($mres[$alea][$jugada]==1){
        echo "<h1>FELICIDADES!!!!!</h1> <br/>Su ".$jugada." gana a ".$op[$alea]."<br/>";
        $_SESSION['money'] =$_SESSION['money']+1;
        echo "Capital disponible: ".$_SESSION['money'];
        echo "<br/>";
        echo "<br/>";
    }elseif ($mres[$alea][$jugada]==-1) {
        echo "<h1>PERDEDOOOOORRRR!!!!</h1> <br/>Su ".$jugada." pierde a ".$op[$alea]."<br/>";
        $_SESSION['money'] =$_SESSION['money']-1;
        echo "Capital disponible: ".$_SESSION['money'];
        echo "<br/>";
        echo "<br/>";
    }else {
        echo "<h1>NI GANAS NI PIERDES!!!</h1> <br/>Su ".$jugada." empata ".$op[$alea]."<br/>";
        echo "Capital disponible: ".$_SESSION['money'];
        echo "<br/>";
        echo "<br/>";
    }

    
}

    if( !isset($_SESSION['tu']) && !isset($_SESSION['machine'])){
        $tu= array();
        $makina=array();
        $_SESSION['tu'] = $tu;
        $_SESSION['machine'] = $makina;
    }
    array_unshift($_SESSION['tu'],$jugada);
    array_unshift($_SESSION['machine'],$op[$alea]);


    
    for ($i=0; $i < 5; $i++) { 
        echo "TU".$_SESSION['tu'][$i]."<br/>";
        echo "MaKina".$_SESSION['machine'][$i]."<br/>";
        echo "<br/>";
    }
    

    

include_once ("jugar.php");

?>