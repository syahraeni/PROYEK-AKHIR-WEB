<?php
// `placeorder.php`
require_once('koneksi.php');

// Mendapatkan data dari request
$request = json_decode(file_get_contents('php://input'), true);

// Lakukan validasi data yang diterima
$order_id = $request['order_id'];
$gross_amount = $request['gross_amount'];

// Logika untuk mendapatkan token transaksi Midtrans
// (Contoh kode di sini, pastikan untuk menggantinya dengan logika yang benar)
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $gross_amount,
);

// Request ke Midtrans API
// (Ganti dengan kode permintaan token transaksi yang benar dari Midtrans)
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($transaction_details),
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode("YOUR_SERVER_KEY")
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // Mengembalikan token transaksi ke JavaScript
  echo $response;
}
?>
