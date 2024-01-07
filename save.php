<?php 
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];

  $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/tambahdataproduk?nama='.urlencode($nama).'&harga='.urlencode($harga).'';
  $customrequest = 'POST';

  $cUrl = curl_init();


  $options = array(
      CURLOPT_URL => $url,
      CURLOPT_CUSTOMREQUEST => $customrequest,
      );

  curl_setopt_array($cUrl, $options);

  $response = curl_exec($cUrl);
                    
  curl_close($cUrl);

  if ($response) {
    header('Location: index.php');
  } else {
    echo 'Failed';
  }
?>