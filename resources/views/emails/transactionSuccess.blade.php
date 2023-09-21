<html>
    <p>Hai {{ $data['customer_name'] }},</p>
    <p>Terima kasih telah melakukan transaksi sebesar Rp {{ $data['amount'] }}.</p>
    <p>Referensi Transaksi: {{ $data['merchant_ref'] }}</p>
    <p>Timeout : {{ $data['expired_time'] }}</p>
    <p>Kode Pembayaran : {{ $response->pay_code }}</p>
    <br/>
    <br/>
    <p>Regards,</p>
    <p>Guru Link Team</p>
     
</html>
