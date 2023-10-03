<html>

<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">
    <div class="container"
        style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <div class="header"
            style="text-align: center; background-color: #d2d8e7; padding: 10px; display: flex; position: relative;">
            <h1 style="color: #1F3C88; margin-left: 37%">Guru</h1>
            <h1 style="color : #ee6f57;">Link</h1>
        </div>
        <div class="content" style="padding: 20px;">
            <p>Halo,</p>
            <p>Status Transaksi Anda: <strong>{{ $data->status }}</strong></p>
            <p>Kami ingin mengucapkan terima kasih atas transaksi Anda sebesar Rp
                <strong>{{ $data->total_amount }}</strong>.</p>
            <p>Jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.
            </p>
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
