<?php


define('_EMAIL_TO', 'pelsmaekersnico@gmail.com'); // your email address where reservation details will be received

define('_EMAIL_SUBJECT', 'Inschrijving ontbijt 10/09/2016'); // email message subject
define('_EMAIL_FROM', $_POST["email"]);

$fields = array(
    array('name' => 'name', 'title' => 'Name', 'valid' => array('require')),
	array('name' => 'email', 'title' => 'Email', 'valid' => array('require')),
	array('name' => 'adults', 'title' => 'Adults', 'valid' => array('require')),
	array('name' => 'children', 'title' => 'Children', 'valid' => array('require')),
	array('name' => 'special-requirements', 'title' => 'Special requirements'),
    array('name' => 'te-betalen', 'title' => 'De betaling met vermelding "Ontbijt Heffen - Naam inschrijving" op volgend rekening nummer BE63 6103 8280 2208. Het te betalen bedrag is')
);

$error_fields = array();
$email_content = array();
foreach ($fields AS $field){
	$value = isset($_POST[$field['name']])?$_POST[$field['name']]:'';
	$title = empty($field['title'])?$field['name']:$field['title'];
	$email_content[] = $title.': '.nl2br(stripslashes($value));
	$is_valid = true;
	$err_message = '';
	if (!empty($field['valid'])){
		foreach ($field['valid'] AS $valid) {
			switch ($valid) {
				case 'require':
					$is_valid = $is_valid && strlen($value) > 0;
					$err_message = 'Field required';
					break;
				case 'email':
					$is_valid = $is_valid && preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $value);
					$err_message = 'Email required';
					break;
				default:				
					break;
			}
		}
	}
	if (!$is_valid){
		if (!empty($field['err_message'])){
			$err_message = $field['err_message'];
		}
		$error_fields[] = array('name' => $field['name'], 'message' => $err_message);
	}
}

if (empty($error_fields)){
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    
    
	$headers .= "From: "._EMAIL_FROM."\r\n"; 
    $headers = "BCC: "._EMAIL_FROM."\r\n";
	$headers .= "Reply-To: "._EMAIL_FROM."\r\n"; 	
	
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	// Send email
	mail (_EMAIL_TO, _EMAIL_SUBJECT, implode('<hr>', $email_content), $headers);
	echo (json_encode(array('code' => 'success')));
}else{
	echo json_encode(array('code' => 'failed', 'fields' => $error_fields));
}