<?php

include 'db.php';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: a09b9b90ef28f6644fcb950e62c6253f "
  ),
));

$response = curl_exec($curl);



$err = curl_error($curl);

curl_close($curl);

$data  = json_decode($response,true);
foreach($data as $item){
    foreach($item["results"] as $key){
        $id =  $key["province_id"];
        $prov =  $key["province"];
        $query = mysqli_query($link,"insert into province (province_id,province) values('$id','$prov')");
    }
}
