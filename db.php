<?php
/***********************************************************************************************************************
 *                                                                                                                      
 * Project: Server GL                                                                                 
 * File: db.php                                                                                             
 * Hash: c996329f2da1828af22a977265303727                                         
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




$database = new medoo(array(
'database_type' => 'mysql',
'database_name' => 'gsm',
'server' => 'localhost',
'username' => 'kosty',
'password' => '12345678',
'charset' => 'utf8'

//'type' => 'sqlite',
//'database' => 'gsm.sql',
//'host' => 'localhost',
//'username' => 'kosty',
//'password' => '12345678',
//'charset' => 'utf8'

));

?>
