<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Başvurusu</title>
</head>
<body>
    <h1>Yeni Form Başvurusu</h1>
    <p><strong>Ad Soyad:</strong> {{ $data['name'] }}</p>
    <p><strong>E-posta:</strong> {{ $data['email'] }}</p>
    <p><strong>Telefon:</strong> {{ $data['phone'] }}</p>
    <p><strong>Mesaj:</strong> {{ $data['message'] }}</p>
    <p><strong>Ticari Bilgiler:</strong> {{ $data['commercial_info'] }}</p>
    <p><strong>Ortaklık Yapısı:</strong> {{ $data['partnership_structure'] }}</p>
    <p><strong>Adres Bilgileri:</strong> {{ $data['institution_address'] }}</p>
    <p><strong>MEB Uygunluğu:</strong> {{ $data['meb_compliance'] }}</p>
    <p><strong>m2 Bilgisi:</strong> {{ $data['area'] }}</p>
</body>
</html>
