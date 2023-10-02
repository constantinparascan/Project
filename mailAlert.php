#!/usr/bin/php
<?php
/***********************************************************************************************************************
 *                                                                                                                      
 * Project: Server GL                                                                                 
 * File: mailAlert.php                                                                               
 * Hash: 6be40e34e69193769d39eac0c07ee54c                                         
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
 require '/root/PHPMailer/PHPMailerAutoload.php'; require_once 'appcon.php'; require_once 'funcs.php'; require_once 'medoo.php'; require_once 'db.php'; $mail = new PHPMailer; $mail->SMTPDebug = 3; $mail->isSMTP(); $mail->Host = $app['ma_mail_host']; $mail->SMTPAuth = $app['ma_mail_auth']; $mail->Username = $app['ma_mail_user']; $mail->Password = $app['ma_mail_pass']; $mail->SMTPSecure = $app['ma_mail_secure']; $mail->Port = $app['ma_mail_port']; $mail->setFrom($app['ma_mail_from_email'], $app['ma_mail_from_name']); $dest_list = explode(', ', $app['ma_mail_dest']); foreach($dest_list as $dest) $mail->addAddress($dest); $events = $database->query( "SELECT * FROM `log` WHERE 
		(`date` BETWEEN timestamp(date_sub(now(), interval ".$app['ma_interval']." minute)) AND curtime()) AND (`type` = 'O' OR `type` = 'C' OR `type` = 'S' OR `type` = 'B'  OR (`type` = 'E' AND (`error` = '6' OR `error` = '7' OR `error` = '8' OR `error` = '9' OR `error` = '13' OR `error` = '14' OR `error` = '15' OR `error` = '16' OR `error` = '17' OR `error` = '18' OR `error` = '19' OR `error` = '20')))	AND email = '0' AND imei NOT IN (SELECT imei FROM devices WHERE probe = 1)
	" )->fetchAll(); $TotalEvenimente = count($events); $content = 'Exista '. $TotalEvenimente .' evenimente'; if($TotalEvenimente) $content .= PHP_EOL .PHP_EOL; foreach($events as $ev) { $evInfo = GetEventInfo($ev["type"],$ev["error"], true); $content .= 'ID: '.$ev["id"] .PHP_EOL; $content .= $ev["loc_town"] .', '. $ev["loc_place"] .' ('. $ev["loc_details"].')'.PHP_EOL; $content .= RODate($ev["date"], $app['format_data_mai_multe'], false, false, true) .PHP_EOL; $content .= $evInfo["detalii"] .PHP_EOL; $content .= PHP_EOL; } if($TotalEvenimente) { $content .= "Acesta este un mesaj automat, nu raspundeti, emailul nu va ajunge nicaieri.".PHP_EOL; $content .= "Pentru mai multe detalii va rugam sa folositi adresa:".PHP_EOL; $content .= $app['ma_server_link'].PHP_EOL; } $mail->isHTML(false); $mail->Subject = $app['ma_mail_subject']; $mail->Body = str_replace(PHP_EOL,"\r\n",$content); if($TotalEvenimente) { echo $content .PHP_EOL; if(!$mail->send()) { echo 'Message could not be sent.'; echo 'Mailer Error: ' . $mail->ErrorInfo .PHP_EOL; } else { echo 'Message has been sent' .PHP_EOL; foreach($events as $ev) { $database->update("log", [ "email" => "1", ], [ "id" => $ev["id"] ]); } } } ?>