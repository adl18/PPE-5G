
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


// Calcul de l'impact
// Impact Localisation
if($localisation == 1){
    $coeff_localisation = $localisation_low;
} elseif($localisation == 2){
    $coeff_localisation = $localisation_high;
} elseif($localisation == 3){
    $coeff_localisation = $localisation_entreprise;
}  

// Impact Densité
if($densite == 1){
    $coeff_densite = $densite_low;
} elseif($densite == 2){
    $coeff_densite = $densite_high;
}

$impact_localisation_densite = $coeff_localisation * $coeff_densite;

// Impact Surface
$impact_surface = $surface * $surface_coefficient;

// Impact Latence
$impact_latence = $latence_low + ($latence_high - $latence_low) * (($latence - 1) / (50 - 1));

// Impact Débit
$impact_debit = $debit_10gb + ($debit_100gb - $debit_10gb) * (($debit - 10) / (90));

// Impact Total
$impact_total = ($impact_localisation_densite + $impact_surface + $impact_latence) * $impact_debit;





//Nombre d'antenne = surface portée d'une macro cell

//bande de fréquence =débit et latence 


// Affichage du résultat
echo "L'impact en kg.equivalent CO2 de l'antenne 5G est de : " . $impact_total . " kg CO2e/an";
?>

<!-- Code pour le camembert -->
<canvas id="myChart" width="0.1" height="0.1"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Localisation et densité', 'Surface', 'Latence'],
        datasets: [{
            label: 'Impact en kg CO2e/an',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            data: [<?php echo $impact_localisation_densite ?>, <?php echo $impact_surface ?>, <?php echo $impact_latence ?>]
        }]
    },
    options: {}
});
</script>

</body>
</html>


