<?php

include('conexion.php');

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 
$hora = date('H:i');
// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
	$contactList[] = explode(",", $contact);
}
$hora = date('h') . " h : ";
$hora .= date('i') . " min : ";
$hora .= date('s') . " seg";
// insertar contactos
foreach ($contactList as $contactData) 
{
	$conexion->query("INSERT INTO students 
						(name_student,
						 ap_paternal,
						 ap_maternal,
						 email_student,
						 token_student,
						 status,
						 id_group,
						 enrollment)
						 VALUES

						 ('{$contactData[0]}',
						  '{$contactData[1]}', 
						  '{$contactData[2]}',
						  '{$contactData[3]}',
						  crc32('{$contactData[4]}{$_POST['group']}{$hora}'),
						  0,
						  '{$_POST['group']}',
						  {$contactData[4]})
						 "); 
}


?>