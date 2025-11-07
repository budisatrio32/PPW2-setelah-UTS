<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4F46E5;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .info-table {
            width: 100%;
            margin: 20px 0;
            background-color: white;
            border-radius: 5px;
            padding: 15px;
        }
        .info-row {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #4F46E5;
            display: inline-block;
            width: 150px;
        }
        .value {
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            color: #777;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #4F46E5;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Selamat Datang di {{ config('app.name') }}!</h1>
    </div>
    
    <div class="content">
        <h2>Halo, {{ $user->name }}!</h2>
        <p>Terima kasih telah mendaftar di aplikasi kami. Akun Anda telah berhasil dibuat.</p>
        
        <div class="info-table">
            <h3 style="margin-top: 0; color: #4F46E5;">Informasi Akun Anda:</h3>
            <div class="info-row">
                <span class="label">Nama:</span>
                <span class="value">{{ $user->name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">{{ $user->email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Tanggal Registrasi:</span>
                <span class="value">{{ $user->created_at->format('d F Y, H:i') }}</span>
            </div>
            @if($user->role)
            <div class="info-row">
                <span class="label">Role:</span>
                <span class="value">{{ ucfirst($user->role) }}</span>
            </div>
            @endif
        </div>
        
        <p>Anda sekarang dapat mengakses semua fitur yang tersedia di aplikasi kami.</p>
        
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}/login" class="button">Login Sekarang</a>
        </div>
        
        <p style="margin-top: 30px; color: #777; font-size: 14px;">
            <strong>Tips:</strong> Pastikan Anda menjaga keamanan akun Anda dengan tidak membagikan password kepada siapapun.
        </p>
    </div>
    
    <div class="footer">
        <p>Email ini dikirim otomatis oleh sistem. Mohon tidak membalas email ini.</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
