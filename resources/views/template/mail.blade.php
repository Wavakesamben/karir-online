<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <p>Sesuai dengan informasi lowongan kerja di
        Rumah Sakit Wava Husada Kesamben posisi <strong>{{ $detail['posisi'] }}</strong>,
        Saya yang bertanda tangan dibawah ini:
    </p>
    <div>- <strong>Nama</strong> : {{ $detail['nama'] }}</div>
    <div>- <strong>no HP/Whatsapp</strong> : {{ $detail['no_hp'] }}</div>
    <div>- <strong>Email</strong> : {{ $detail['email'] }}</div>
    <div>- <strong>Tempat & Tgl lahir</strong> : {{ $detail['ttl'] }}</div>
    <div>- <strong>Alamat sesuai KTP</strong> : {{ $detail['alamat_ktp'] }}</div>
    <div>- <strong>Alamat domisili</strong> : {{ $detail['alamat_domisili'] }}</div>
    
    <p>
        besar harapan kami dalam bergabung dengan Rumah Sakit Wava Husada Kesamben
        Terima kasih atas perhatianya
    </p>

</body>

</html>
