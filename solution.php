
<!DOCTYPE html>
<html>
<head>
    <title>Camembert</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
</head>
<body>
<?php
// Variables
$localisation = $_GET['choix'];
$densite = $_GET['dense'];
$surface = $_GET['surface'];
$latence = $_GET['latence'];
$debit = $_GET['debit'];

// Coefficients
// LOCALISATION
$localisation_low = 0.3;
$localisation_entreprise = 0.7;
$localisation_high = 1.2;

// DENSITE DE LA ZONE
$densite_low = 0.5;
$densite_high = 1.5;

// SURFACE PAR METRE CARRE
$surface_coefficient = 0.1;

// LATENCE
$latence_low = 0.25;
$latence_high = 0.8;

// DEBIT
$debit_10gb = 0.05;
$debit_100gb = 0.2;

///////////////////CHOIX DE LA FREQUENCE//////////////////////

//si le debit est est superieur à 1 GB/s alors on choisit la fréquence de 3,5GHz
if (( $_GET['debit'])>=1){
    $frequence=3500; //MHz   
}

//Si le debit est inferieur à 1 GB/s alors on chosiit la fréquence de 700MHz
elseif((( $_GET['debit'])<1)){
    $frequence=700; //MHz
    }


echo"la frequence est : ". $frequence."\n";

////////ANTENNE 
    //Antenne macro-cell pour fréquence 700MHz
    if($frequence==700){
        $nbAntenne1=$surface/200000;
        $nbAntenne=ceil($nbAntenne1);
        $impact=$nbAntenne*4000*0.057;//aval
        $impactAmont=$nbAntenne*4000*0.15;//amont
        echo"l'emission de CO2 en amont pour ".$nbAntenne." antennes est de ".$impactAmont. "Kg.CO2.equivalent";
    }

    //Antenne macro-cell pour fréquence 3,5GHz
    elseif($frequence==3500){
        $nbAntenne1=$surface/30000;
        $nbAntenne=ceil($nbAntenne1);
        $impact=$nbAntenne*6500*0.057;
        $impactAmont=$nbAntenne*6500*0.15;
        echo"l'emission de CO2 en amont pour ".$nbAntenne." antennes est de ".$impactAmont. "Kg.CO2.equivalent";
    }

//echo "\n"."le nombre d'antenne est :".$nbAntenne."\n";



//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
////////////////////////CALCUL DE L'IMPACT ///////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////


// Impact Localisation
if($localisation == 1){ //zone rurale
    $coeff_localisation = $localisation_low;
} elseif($localisation == 2){//zone urbaine
    $coeff_localisation = $localisation_high;
}

// Impact Densité
if($densite == 1){
    $coeff_densite = $densite_low;
} elseif($densite == 2){
    $coeff_densite = $densite_high;
}

//impact de la densité et de la localisation
$impact_localisation_densite= $coeff_localisation+$coeff_densite;

// Impact Surface
//$impact_surface = $surface * $surface_coefficient;

// Impact Latence
$impact_latence = $latence_low + ($latence_high - $latence_low) * (($latence - 1) / (50 - 1));

// Impact Débit
$impact_debit = $debit_10gb + ($debit_100gb - $debit_10gb) * (($debit - 10) / (90));

// Impact Total
$impact_total1 = ($impact_latence+$impact_debit+$impact+$impact_localisation_densite);
$impact_total=ceil($impact_total1);


// Affichage du résultat
echo "L'impact en kg.equivalent CO2 de l'architecture 5G est de : " . $impact_total . " kg CO2e/an";

?>

