<!DOCTYPE html>
<?php
$time = $data['expired_time'];

$expired_time_formatted = date('Y-m-d H:i:s', $time);
?>
<html>

<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">
    <div class="container"
        style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <div class="header" style="text-align: center; background-color: #d2d8e7; padding: 10px; display: flex; position: relative;">
            <h1 style="color: #1F3C88; margin-left: 37%">Guru</h1>
            <h1 style="color : #ee6f57;">Link</h1>
        </div>
        <div class="content" style="padding: 20px;">
            <p>Hai {{ $data['customer_name'] }},</p>
            <p>Terima kasih telah melakukan pemesanan pengajar, mohon melakukan pembayaran sebesar Rp <strong>{{ $data['amount'] }}</strong>.</p>
            <p>Referensi Transaksi: <strong>{{ $data['merchant_ref'] }}</strong></p>
            <p>Timeout: <strong>{{ $expired_time_formatted }} </strong></p>
            <p>Kode Pembayaran: <strong>{{ $response->pay_code }}</strong></p>
            <p>Silahkan klik button dibawah ini untuk melakukan pembayaran dengan klik tombol dibawah ini.
            </p>
            <div style="background-color: blue; width: 210px; height: 40px; margin: 15px auto 0; border-radius: 5%; text-align: center; line-height: 40px;">
                <a style="color: #fff; text-decoration: none;" href="http://127.0.0.1:8000/riwayatPembayaran">
                    Check Status Pemesanan
                </a>
            </div>
            <br />
            <p>Terima kasih lagi,</p>
            <p>Guru Link Team</p>
        </div>
        <div class="footer" style="text-align: center; padding: 10px; background-color: #d2d8e7; color: #fff;">
            <p style="color: black">Hubungi Kami | Privasi | Syarat & Ketentuan</p>
        </div>
    </div>
</body>

</html>
