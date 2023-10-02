<?php
/***********************************************************************************************************************
 *                                                                                                                      
 * Project: Server GL                                                                                 
 * File: appcon.php                                                                                     
 * Hash: 1583220d90e20c22ed0e1473e48bd131                                         
 * Version: Ver_2.5_stable-92-g2101b8f                                               
 * Build: 2                                                                                                     
 *                                                                                                                      
 * Author: Edouard Gora                                                                             
 * Email: office@deeadesign.com                                                             
 *                                                                                                                      
 * Copyright: Deea Design Hardware & Software SRL                         
 * License to: Amazing Toys SRL                                                             
 *                                                                                                                      
 * License agrement:                                                                                  
 * IMPORTANT!                                                                                                 
 * Aceste fisiere reprezinta proprietatea exclusiva a Deea Design Hardware & Software SRL.
 *                                                                                                                      
 * Este strict interzisa accesarea, modificarea, copierea, precum si orice interventie neautorizata asupra lor. Orice
 * access va fi logat si va atrage dupa sine raspunderea penala conform legislatiei in vigoare. Daca ati accesat din
 * gresala acest fisier, va rugam sa il stergeti imediat si sa ne semnalati incidentul la office@deeadesign.com
 *                                                                                                                      
 **********************************************************************************************************************/


ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();

echo '!!!';
echo $_SESSION['testing'];
echo '!!!';


$app = array();

$app['client_name'] = 'Amazing Toys';
$app['app_title'] = 'Server GL 2.7';
$app['app_copy_year'] = '2017';
$app['app_copy_url'] = 'http://www.deeadesign.com';
$app['app_copy_text'] = 'Deea Design Hardware & Software';

// mailAlert
$app['ma_interval'] = '1440'; // minute, evenimente care se vor raporta din acest moment inapoi in timp
//$app['ma_server_link'] = "http://86.123.141.215:35269/gsm"; // link-ul din mail pe care userul va da click
//$app['ma_server_link'] = "http://145.239.84.165:35269/gsm";
$app['ma_server_link'] = "http://192.168.0.109/:35269/gsm";

$app['ma_mail_host'] = 'smtp.gmail.com';
$app['ma_mail_auth'] = true;
$app['ma_mail_user'] = 'jungla.copiilor@gmail.com';
$app['ma_mail_pass'] = '11junglacopiilor22';
$app['ma_mail_secure'] = 'tls';
$app['ma_mail_port'] = 587;
$app['ma_mail_from_email'] = 'amazingtoys@mail.com';
$app['ma_mail_from_name'] = 'Server Amazing Toys';
$app['ma_mail_subject'] = 'Alerta Server Amazing Toys';

// Separate prin virgula si spatiu
// minea_vasile@yahoo.com, inova.shopping@gmail.com
//$app['ma_mail_dest'] = 'yo3hcv@gmail.com, edouard.gora@deeadesign.com'; // separate prin virgula si spatiu
$app['ma_mail_dest'] = 'minea_vasile@yahoo.com, inova.shopping@gmail.com';

$app['format_data_aparate'] = "l, d F Y";
$app['format_data_detalii'] = "l, d F Y, H:i";
$app['format_data_mai_multe'] = "l, d F Y, H:i:s";	// plus mailAlert
$app['format_data_export'] = "d.m.Y";

$app['secunde_tranzactii'] = 60; //Secunde intre 2 tranzactii pentru a vedea daca au venit de la persoane diferite sau nu 
$app['secunde_interferente'] = 1;
$app['culoare_mesaje_atentie_semnal_slab'] = "#fff9e5";
$app['culoare_mesaje_atentie_interferenta'] = "yellow";
$app['culoare_rand_gol_intre_tranzactii_de_la_persoane_diferite'] = "#acc8cc";

$app['frecventa_semnal_slab'] = 20; //la cate evenimente cu semnal slab consecutive sa apara mesajul de semnal foarte slab; =-1 pentru disable
$app['rssi_semnal_fslab'] = 14; // sub aceasta valoare, pentru $app['frecventa_semnal_slab'] consecutive se va da un mesaj 
$app['rssi_semnal_slab'] = 18;
$app['rssi_semnal_mediu'] = 23;
$app['rssi_semnal_bun'] = 26;
$app['rssi_semnal_fbun'] = 39;

$app['EventsPerPage'] = 50; // events per page
$app['EventPagesPerGroup'] = 15; // cate item-uri (+/-) in stanga si derapta paginii curente in bar


// http://php.net/manual/en/function.session-set-cookie-params.php

/*
$lifetime=60*30;
session_start();
setcookie(session_name(),session_id(),time()+$lifetime);
*/  
// 2 hours in seconds
$inactive = 30*20; // sec 


ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours

//session_write_close();

//session_start();

if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) 
{
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}

$_SESSION['testing'] = time(); // Update session




?>
