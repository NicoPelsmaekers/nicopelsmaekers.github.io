<?php

 $name = $_POST['name'];
    $email = $_POST['email'];
    $adults = $_POST['adults']
    $message = $_POST['message'];
    $from = "From: $email"; 
    $to = 'marielouise@ludymachinery.com'; 
    $subject = 'Bevestiging aanwezigheid receptie 10/09';

 $body = "Beste, \n Hierbij bevestig ik mijn aanwezigheid met $adults perso(o)n(en)\nMet vriendelijke groeten,\n$name";

if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Bevestigd!</p>';
    } else { 
        echo '<p>Er ging iets fout! Probeer opnieuw!</p>'; 
    }
}
?>