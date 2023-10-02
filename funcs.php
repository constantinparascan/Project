<?php
/***********************************************************************************************************************
 *                                                                                                                      
 * Project: Server GL                                                                                 
 * File: funcs.php                                                                                       
 * Hash: 0674608ef7d0b7934f927e6f2e8febea                                         
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
 function print_r2($val)
 { 
    echo '<pre>'; 
    print_r($val); 
    echo '</pre>'; 
} 

function Adauga_Diacritice($text, $safe = false) 
{ 
    if($safe) 
        { 
            $text=str_replace("\a_u","a",$text); 
            $text=str_replace("\A_u","A",$text); 
            $text=str_replace("\a_^","a",$text); 
            $text=str_replace("\A_^","A",$text); 
            $text=str_replace("\i","i",$text); 
            $text=str_replace("\I","I",$text); 
            $text=str_replace("\s","s",$text); 
            $text=str_replace("\S","S",$text); 
            $text=str_replace("\t","t",$text); 
            $text=str_replace("\T","T",$text); 
        } 
        else 
            { 
                $text=str_replace("\a_u","&#259;",$text); 
                $text=str_replace("\A_u","&#258;",$text); 
                $text=str_replace("\a_^","&#226;",$text); 
                $text=str_replace("\A_^","&#194;",$text); 
                $text=str_replace("\i","&#238;",$text); 
                $text=str_replace("\I","&#206;",$text); 
                $text=str_replace("\s","&#351;",$text); 
                $text=str_replace("\S","&#350;",$text); 
                $text=str_replace("\t","&#355;",$text); 
                $text=str_replace("\T","&#354;",$text); 
            } return $text; 

} 

function IsMobile() 
{ 
    $useragent=$_SERVER['HTTP_USER_AGENT']; 

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) 
        return true; 

    return false; 
} 

function RODate($date, $format, $week_short, $month_short, $safe = false) 
{ 
    $date_new = new DateTime($date); 
    $date_string = $date_new->format($format); 
    $roMonths = array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'); 
    $roMonthsShort = array('Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'); 
    $enMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'); 
    $roWeek = array(Adauga_Diacritice('Duminic\a_u',$safe), 'Luni', Adauga_Diacritice("Mar\ti",$safe), 'Miercuri', 'Joi', 'Vineri', Adauga_Diacritice('S\a_^mb\a_ut\a_u',$safe)); 
    $roWeekShort = array('Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin' , Adauga_Diacritice('S\a_^m',$safe)); 
    $enWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'); 
    $date_string = str_replace($enMonths, $month_short? $roMonthsShort:$roMonths, $date_string); 
    $date_string = str_replace($enWeek, $week_short? $roWeekShort:$roWeek , $date_string); 

    return $date_string; 

} 

function GetEventInfo($type, $error, $safe = false) 
{ 
    $bg_color = "FFFFFF"; 
    $font_color = "0000EE"; 
    $error_color = "ff0000"; 
    $warning = "ffcccc"; 
    $detalii = ''; 

    switch($type) 
    { 
        default: 
            $nume = "Necunoscut"; 
            $detalii = Adauga_Diacritice("Evenimentul nu a putut fi determinat", $safe); 
            break; 

        case "E": 
            $bg_color = "ffcccc"; 

            switch($error) 
                { 
                    default: 
                        
                        $nume = Adauga_Diacritice("Eroare necunoscut\a_u", $safe); 
                        $detalii = Adauga_Diacritice("Eroarea nu a putut fi determinata", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 0: 
                        $nume = Adauga_Diacritice("\In a\steptare", $safe); 
                        $detalii = Adauga_Diacritice("Apratul este \in a\steptare sau a fost ap\a_usat butonul pentru jetoane.", $safe); 
                        break; 

                    case 1: 
                        $nume = Adauga_Diacritice("Bancnot\a_u returnat\a_u", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota a fost returnat\a_u deorece validarea a esuat", $safe); 
                        break; 

                    case 2: 
                        $nume = Adauga_Diacritice("Bancnot\a_u invalid\a_u (verificare)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota nu a fost validat\a_u cu succesc", $safe); 
                        break; 

                    case 3: 
                        $nume = Adauga_Diacritice("Bancnot\a_u invalid\a_u (transport)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota nu a fost transportat\a_u cu succesc c\a_utre caseta de bani", $safe); 
                        break; 

                    case 4: 
                        $nume = Adauga_Diacritice("Bancnot\a_u inactiv\a_u (COM)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota a fost re\tinut\a_u", $safe); 
                        break; 


                    case 5: 
                        $nume = Adauga_Diacritice("Bancnot\a_u inactiv\a_u (DIP)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota a fost re\tinut\a_u", $safe); 
                        break; 

                    case 6: 
                        $nume = Adauga_Diacritice("Bancnot\a_u blocat\a_u (exterior)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota este blocata \in exteriorul apratului", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 7: 
                        $nume = Adauga_Diacritice("Bancnot\a_u blocat\a_u (stacker)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota este blocata in caseta de bani", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 8: 
                        $nume = Adauga_Diacritice("Bancnot\a_u for\tat\a_u \inapoi", $safe); 
                        $detalii = Adauga_Diacritice("Utilizatorul a for\tat bancnota \inapoi \in validator", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 9: 
                        $nume = Adauga_Diacritice("Bancnot\a_u fals\a_u", $safe); 
                        $detalii = Adauga_Diacritice("Validatorul a identificat o posibil\a_u frad\a_u (Bill Tamper)", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 10: 
                        $nume = "Stacker OK"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este func\tional\a_u", $safe); 
                        break; 

                    case 11: 
                        $nume = "Stacker decuplat"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este decuplat\a_u", $safe); 
                        break; 


                    case 12: 
                        $nume = "Stacker cuplat"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este cuplat\a_u", $safe); 
                        break; 

                    case 13: 
                        $nume = "Stacker defect"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este defect\a_u", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 14: 
                        $nume = "Stacker full"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este plin\a_u", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 15: 
                        $nume = "Stacker blocat"; 
                        $detalii = Adauga_Diacritice("Caset\a_u de bani este blocat\a_u", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 16: 
                        $nume = Adauga_Diacritice("Bancnot\a_u blocat\a_u (interior)", $safe); 
                        $detalii = Adauga_Diacritice("Bancnota este blocata \in interiorul apratului apratului", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 17: 
                        $nume = Adauga_Diacritice("Fraud\a_u optic\a_u", $safe); 
                        $detalii = Adauga_Diacritice("A fost \incercat\a_u o manevr\a_u de fraud\a_u optic\a_u", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 18: 
                        $nume = Adauga_Diacritice("Fraud\a_u string", $safe); 
                        $detalii = Adauga_Diacritice("A fost \incercat\a_u o manevr\a_u de fraud\a_u de string", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 19: 
                        $nume = "Anti-string defect"; 
                        $detalii = Adauga_Diacritice("Mecanismul de anti-string este defect", $safe); 
                        $bg_color = $error_color; 
                        $font_color = "FFFFFF"; 
                        break; 

                    case 20: 
                        $nume = Adauga_Diacritice("Detec\tie barcode", $safe); 
                        $detalii = Adauga_Diacritice("Detec\tia de coduri de bare a fost activat\a_u", $safe); 
                        break; 

                } 

            break; 

        case "S": 
            $nume = "Start"; 
            $detalii = Adauga_Diacritice("Aparatul a fost pornit sau a fost resetat din cauza unei pene de curent", $safe); 
            $bg_color = "3399FF"; 
            $font_color= "FFFFFF"; 
            break; 

        case "B": 
            $detalii = Adauga_Diacritice("Aparatul este blocat de o bancnot\a_u", $safe); 
            $nume = "Blocat"; 
            $bg_color = "ff0000"; 
            $font_color = "FFFFFF"; 
            break; 

        case "P": 
            $nume = "Ping"; 
            $detalii = Adauga_Diacritice("Mesaj transmis regulat, o dat\a_u la 10 minute, pentru a ar\a_uta dac\a_u aparatul este func\tional.", $safe); 
            $bg_color = "FFFFFF"; 
            break; 

        case "O": 
            $nume = Adauga_Diacritice("U\s\a_u Deschis\a_u", $safe); 
            $detalii = Adauga_Diacritice("U\sa aparatului a fost deschis\a_u", $safe); 
            $bg_color = "ff0000"; 
            $font_color = "FFFFFF"; 
            break; 


        case "C": 
            $nume = Adauga_Diacritice("U\s\a_u \Inchis\a_u", $safe); 
            $detalii = Adauga_Diacritice("U\sa aparatului a fost \inchis\a_u", $safe); 
            $bg_color = "ff0000"; 
            $font_color = "FFFFFF"; 
            break; 

        case "1": 
            $nume = Adauga_Diacritice("Tranzac\tie #1", $safe); 
            $detalii = Adauga_Diacritice("O bancnot\a_u tip #1 a ajuns \in caseta de bani", $safe); 
            $bg_color = "B3E6B3"; 
            break; 

        case "2": 
            $nume = Adauga_Diacritice("Tranzac\tie #2", $safe); 
            $detalii = Adauga_Diacritice("O bancnot\a_u tip #2 a ajuns \in caseta de bani", $safe); 
            $bg_color = "B3E6B3"; 
            break; 

        case "3": 
            $nume = Adauga_Diacritice("Tranzac\tie #3", $safe); 
            $detalii = Adauga_Diacritice("O bancnot\a_u tip #3 a ajuns \in caseta de bani", $safe); 
            $bg_color = "B3E6B3"; 
            break; 

        case "4": 
            $nume = Adauga_Diacritice("Tranzac\tie #4", $safe); 
            $detalii = Adauga_Diacritice("O bancnot\a_u tip #4 a ajuns \in caseta de bani", $safe); 
            $bg_color = "B3E6B3"; 
            break; 
    } 

    $bg_color = '#'.$bg_color; 
    $font_color = '#'.$font_color; 

    return compact('nume', 'bg_color', 'font_color', 'detalii'); 

} 

function Insert_Db($imei, $cmd, $pend) 
{ 
    global $database;

    $date_now = new DateTime(); 

    $mysqldate = $date_now->format('Y-m-d G:i:s'); 
    $require = $database->insert ( "pending_update", [ "imei" => $imei, "cmd" => $cmd, "pend" => $pend, "date" => $mysqldate ] ); 
} 

function getUserIP() 
{ 
    $client = @$_SERVER['HTTP_CLIENT_IP']; 
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR']; 
    $remote = $_SERVER['REMOTE_ADDR']; 

    if(filter_var($client, FILTER_VALIDATE_IP)) 
        { 
            $ip = $client; 
        } 
        elseif(filter_var($forward, FILTER_VALIDATE_IP)) 
            { 
                $ip = $forward; 
            } 
            else 
                { 
                    $ip = $remote; 
                } 

return $ip; 
}

function UpdateBuildVersion($file_name, $read_hash, $build_num, $build_date) 
{
    $lines = file($file_name); 
    $cnt = 0; 
    $file = ''; 

    foreach ($lines as $line) 
        { 
            if($cnt++ < 3) continue; 

            $file .= $line; 
        } 

    $computed_hash = md5($file); 

    if($read_hash != $computed_hash) 
        { 
            $lines[1] = '$'."read_hash = '".$computed_hash."'; // [1]\r\n"; 
            $lines[2] = '$'."build_num = ".++$build_num."; // [2]\r\n"; 
            $lines[3] = '$'."build_date = '".date("d/m/Y")."'; // [3]\r\n"; 
            file_put_contents($file_name, implode('', $lines)); 
        } 
} 

function getPostVar($var) 
{ 
    $var = isset($_POST[$var]) ? $_POST[$var] : ""; 
    $var = stripslashes($var); 
    return $var; 
} 

function getGetVar($var) 
{ 
    $var = isset($_GET[$var]) ? $_GET[$var] : ""; 
    $var = stripslashes($var); 
    return $var; 
} 

function getDB() 
{ 
    $db = new medoo(array( 'database_type' => 'mysql', 'database_name' => 'gsm', 'server' => 'localhost', 'username' => 'gsm', 'password' => 'gsmPassword', 'charset' => 'utf8' )); 

    return $db; 
}

function CheckDevice($imei, $simsn) 
{
    $db = getDB(); 
    $q = "select * from (select * from ( select * from `devices` order by `reg_date` desc) tmp  group by `imei`, `simsn`) tmp2 where `imei`='".$imei."' and `simsn` = '".$simsn."'"; $data = $db->query($q)->fetchAll(); 

    return $data != null? $data[0] : null; 
} 


?>