<?php

// Alamat Feed Atom blog sobat
$feed = 'https://www.nizarmedium.ga/feeds/posts/default?max-results=10000';

// Folder & filename untuk menyimpan hasil backup
$folder = "backup";
$filename = "nizarmedium";


$saveTo = $folder . "/" . $filename . "_" . date('Y-m-d_His') . ".xml"; // save to backup/deakymyid_2015-11-13_074412.xml

$fp = fopen($saveTo, 'w+');

if($fp === false){
    die('Could not open: ' . $saveTo);
}

$ch = curl_init($feed);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_exec($ch);

if(curl_errno($ch)){
    die(curl_error($ch));
}

$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if($statusCode == 200){
    echo 'Backup berhasil';
} else{
    echo "Error! Status Code: " . $statusCode;
}

?>
