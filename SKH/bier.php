<?php

 $name = $_POST['name'];
    $email = $_POST['email'];
    $adults = $_POST['flessen']
    $message = $_POST['message'];
    $payment= $_POST['payment'];
    $from = "From: $email"; 
    $to = 'skheffen75jaar@telenet.be'; 
    $subject = 'Bevestiging aanwezigheid receptie 10/09';

 $body = "Beste, \n Hierbij plaats ik mijn bestelling van $flessen. Prijs $payment. \nBetalen bij afhalen.\nMet vriendelijke groeten,\n$name";

if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Bevestigd!</p>';
    } else { 
        echo '<p>Er ging iets fout! Probeer opnieuw!</p>'; 
    }
}
?>