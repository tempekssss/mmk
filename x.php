<?php
function malenk($aut, $csi, $jumlah, $wait){
    $x = 0; 
    while($x < $jumlah) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://apigw01.aws.ovo.id/game-engine/ext/v1/users/games/play-game");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("OS: Android","App-Version: 2.7.0","Accept-Encoding: gzip","Connection: keep-alive","Host: apigw01.aws.ovo.id","cs-session-id: $csi","Authorization: $aut"));
        $server_output = curl_exec ($ch);
$response = json_decode($server_output, true);
echo "[SUKSES] -->>";
echo $response["points_earned"]; 
        curl_close ($ch);
        sleep($wait);
        $x++;
        flush();
    }
}
print "AUTO REDEEM ANGPO OVO | @sandro.putraa\n\n";
echo "Authorization?\nInput : ";
$aut = trim(fgets(STDIN));
echo "cs-session-id?\nInput : ";
$csi = trim(fgets(STDIN));
echo "Jumlah Angpo\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda? 0-9999999999 (ex:0)\nInput : ";
$wait = trim(fgets(STDIN));
$execute = malenk($aut, $csi, $jumlah, $wait);
print $execute;
print "DONE\n";
?>
