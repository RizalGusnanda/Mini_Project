<html>

<p>Hai {{ $data['customer_name'] }},</p>
<p>Terima kasih telah melakukan transaksi,Silahkan membayar sebesar Rp <strong>{{ $data['amount'] }}</strong>.</p>
<p>Referensi Transaksi: <strong>{{ $data['merchant_ref'] }}</strong></p>
<p>Timeout: <strong>{{ $data['expired_time'] }}</strong></p>
<p>Kode Pembayaran: <strong>{{ $response->pay_code }}</strong></p>
<p>Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut.</p>
<br />
<p>Terima kasih!!,</p>
<p>Guru Link Team</p>

</html>
