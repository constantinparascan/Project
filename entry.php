<?php
/***********************************************************************************************************************
 *                                                                                                                      
 * Project: Server GL                                                                                 
 * File: entry.php                                                                                       
 * Hash: 68007999620072d18d0094531d134d76                                         
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
 require_once 'appcon.php'; 
 require_once 'funcs.php'; 
 require_once 'medoo.php'; 
 require_once 'db.php'; 

 function getRealIpAddr() 
 { 
    $ip = 'unknown IP';
    if (!empty($_SERVER['SERVER_ADDR'])) 
    { 
        $ip=$_SERVER['SERVER_ADDR']; 
    } 
    /*
    elseif (!empty($_SERVER['REMOTE_ADDR'])) 
    { 
        $ip=$_SERVER['REMOTE_ADDR']; 
    } 
    else 
    { 
        $ip=$_SERVER['REMOTE_ADDR']; 
    } 
    */

    return $ip; 
} 



/* Used to send to the request device a specific command 
 *
 * - when device will process the page .. shall determine what is the command format and execute-it
 */
function SendToDevice($cmd, $args = "") 
{ 
    echo "\r\nCMD".str_pad($cmd.$args,63, "*")."\r\n"; 
} 

function CheckIfExist($imei) 
{ 
    global $database; 
    if(!$imei) 
        return; 

    $datas = $database->query('SELECT imei FROM devices Where IMEI = '.$imei.'')->fetchAll(); 

    if(sizeof($datas) == 0) 
        { 
            global $database; 
            $require = $database->insert ( "devices", [ "imei" => $imei, "probe" => "1", "obs" => "" ] ); 
        }
} 

function GetPendingUpdates($imei) 
{ 
    global $database; 
    
    $datas = $database->query('SELECT * FROM pending_update')->fetchAll(); 
    $pending_update = false; 

    foreach($datas as $data) 
        { 
            if($data['imei'] == $imei) 
                { 
                    $date_now = new DateTime(); 
                    if($data['pend'] == 1) 
                        { 
                            $mysqldate = $date_now->format('Y-m-d G:i:s'); 
                            $database->update('pending_update', [ "pend" => 2, "date" => $mysqldate ], [ "AND" => [ "id" => $data['id'], "imei" => $imei ] ] ); 


                            return $data['cmd']; 

                        } 

                    if($data['pend'] == 2) 
                        { 
                            $date = new DateTime($data['date']); 
                            $interval = $date_now->diff($date); 
                            $elapsed = $interval->format('%i'); 

                            if($elapsed >= 5) 
                                { 
                                    $database->update('pending_update', [ "pend" => 0, "date" => $mysqldate ], [ "AND" => [ "id" => $data['id'], "imei" => $imei ] ] ); 
                                } 

                        } 
                }
        } 

        return "AServer is alive"; 
} 

function log2($str, $err) 
{ 
    $contents = ''; 
    $contents .= date("F j, Y, g:i a") . PHP_EOL; 

    $contents .= 'Data: '.$str . PHP_EOL; 
    if($err) 
        $contents .= 'Error: '.$err . PHP_EOL ; 

    $contents .= PHP_EOL; 
    // $myfile = file_put_contents('log.txt', $contents, FILE_APPEND | LOCK_EX); 
} 

function CheckVar($var) 
{ 
    return isset($var) ? $var : ''; 
} 

function hcDecrypt($x, $dec)
{
    $dec = $x;

    return 0;
}

$in = array(); 
$in['imei'] = ''; 
$in['simsn'] = ''; 
$in['simnum'] = ''; 
$in['operator'] = ''; 
$in['v1'] = ''; 
$in['v2'] = ''; 
$in['v3'] = ''; 
$in['v4'] = ''; 
$in['type'] = ''; 
$in['error'] = ''; 
$in['reset'] = ''; 
$in['appver'] = ''; 
$in['loc_town'] = ''; 
$in['loc_place'] = ''; 
$in['loc_details'] = ''; 
$in['vtype'] = ''; 
$in['rssi'] = ''; 

if(isset($_GET['x'])) 
{ 
    $x = $_GET['x']; 
    $dec = ''; 

    if(($res = hcDecrypt($x, $dec))) 
    { 
    
        log2($x, $res); 
    } 
    else 
    { 

        $dec = $x;  // <<<<< CoPa change !!!

        log2($dec, NULL); 
        $dec = explode(';', $dec); 

        // http://192.168.0.109/entry.php?x=862462030094212;1111111111111111111;0726734731;RDS;100;200;300;400;B;0;0;No_approver;No_town;No_Place;No_details;no_vtype;1

        //
        // >> ok http://192.168.0.109/entry.php?x=862462030094212;1111111111111111111;0726734731;RDS;100;200;300;400;B;0;0;No_approver;No_town;No_Place;No_details;no_vtype;1
        //
        //   event $dec[8] ==> B = blocat
        //

        print_r($dec);
        print(".... count = ".count($dec));

        if(count($dec) == 17) 
        { 
            $in['imei'] = CheckVar($dec[0]); 
            $in['simsn'] = CheckVar($dec[1]); 
            $in['simnum'] = CheckVar($dec[2]); 
            $in['operator'] = CheckVar($dec[3]);     /* ORANGE/RDS/VODAFONE */

            $in['v1'] = CheckVar($dec[4]);      /* cummulated bills of this type */
            $in['v2'] = CheckVar($dec[5]);      /* cummulated bills of this type */
            $in['v3'] = CheckVar($dec[6]);      /* cummulated bills of this type */
            $in['v4'] = CheckVar($dec[7]);      /* cummulated bills of this type */

            $in['type'] = CheckVar($dec[8]);    /* 
                                                   1 = bill of type 1 validated
                                                   2 = bill of type 2 validated
                                                   3 = bill of type 3 validated
                                                   4 = bill of type 4 validated
                                                   S = Start dupa o pana de curent
                                                   B = blocat
                                                   P = ping
                                                   O = usa aparatului deschisa
                                                   C = usa aparatului inchisa
                                                   E = error
                                                 */ 

            $in['error'] = CheckVar($dec[9]);   /* type of errors .... 0 ... 20 --> see "GetEventInfo" from "funcs.php" */
            $in['reset'] = CheckVar($dec[10]); 
            $in['appver'] = CheckVar($dec[11]);       /* versiunea aplicatiei de pe placa ex 2.3 ... */

            $in['loc_town'] = CheckVar($dec[12]);     /* oras ... IAS           */
            $in['loc_place'] = CheckVar($dec[13]);    /* locatie  Carrefour ERA */
            $in['loc_details'] = CheckVar($dec[14]);  /* ??? Case               */
            $in['vtype'] = CheckVar($dec[15]);        /* tipul de aparat NV10 - NV9 */
            $in['rssi'] = CheckVar($dec[16]);         /* semnal ... 21,0 */
        } 
        else 
            if(count($dec) == 3) 
            { 
                $in['imei'] = CheckVar($dec[0]); 
                $in['type'] = CheckVar($dec[1]); 
                $in['rssi'] = CheckVar($dec[2]); 
            } 
    } 
} 

if($in['type'] == "A") 
{ 
    $database->update('pending_update', ["pend" => 0],[ "AND" => [ "imei" => $in['imei'], "pend" => 2 ] ] ); 
    SendToDevice(GetPendingUpdates($in['imei'])); 
} 
else 
{ 
    SendToDevice(GetPendingUpdates($in['imei'])); 
    //CheckIfExist($in['imei']); 
    $database->insert('log', array( "id" => "" ,"imei" => "".$in['imei']."" ,"simsn" => "".$in['simsn']."" ,"simnum" => "".$in['simnum']."" ,"operator" => "".$in['operator']."" ,"rssi" => "".$in['rssi']."" ,"ip" => "".getRealIpAddr()."" ,"type" => "".$in['type']."" ,"error" => "".$in['error']."" ,"bill1" => "".$in['v1']."" ,"bill2" => "".$in['v2']."" ,"bill3" => "".$in['v3']."" ,"bill4" => "".$in['v4']."" ,"appver" => "".$in['appver']."" ,"reset" => "".$in['reset']."" ,"loc_town" => "".$in['loc_town']."" ,"loc_place" => "".$in['loc_place']."" ,"loc_details" => "".$in['loc_details']."" ,"vtype" => "".$in['vtype']."" )); 
} 

?>