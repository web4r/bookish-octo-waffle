<?php
include 'db.php';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
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
        $city_id =  $key["city_id"];
        $province_id =  $key["province_id"];
        $province =  $key["province"];
        $type =  $key["type"];
        $city_name =  $key["city_name"];
        $postal_code =  $key["postal_code"];
        $query = mysqli_query($link,"insert into city (city_id,province_id,province,type,
        city_name,postal_code) values(
            '$city_id',
            '$province_id',
            '$province',
            '$type',
            '$city_name',
            '$postal_code'
        )");
    }
}