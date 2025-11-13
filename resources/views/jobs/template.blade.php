<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Import Lowongan Kerja</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f5f5f5;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th {
            background: #4F46E5;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
        }
        td {
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 13px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .note {
            background: #FEF3C7;
            border-left: 4px solid #F59E0B;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .note h3 {
            color: #92400E;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .note ul {
            margin-left: 20px;
            color: #78350F;
            font-size: 13px;
        }
        .note li {
            margin-bottom: 5px;
        }
        .download-btn {
            display: inline-block;
            background: #10B981;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 10px;
        }
        .download-btn:hover {
            background: #059669;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Template Import Lowongan Kerja</h1>
        <p class="subtitle">Panduan format file untuk import data lowongan pekerjaan</p>

        <div class="note">
            <h3>⚠️ Catatan Penting:</h3>
            <ul>
                <li>File harus dalam format <strong>CSV, XLSX, atau XLS</strong></li>
                <li>Kolom header harus <strong>persis sama</strong> dengan contoh di bawah</li>
                <li>Semua kolom wajib diisi, kecuali <strong>salary</strong> (boleh kosong)</li>
                <li>Salary harus berupa angka (tanpa titik atau koma)</li>
            </ul>
        </div>

        <h2 style="margin-bottom: 15px; font-size: 18px; color: #333;">Contoh Format Data:</h2>
        
        <table>
            <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>location</th>
                    <th>company</th>
                    <th>salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Frontend Developer</td>
                    <td>Membuat tampilan website yang menarik menggunakan React dan Tailwind CSS</td>
                    <td>Jakarta Selatan</td>
                    <td>PT Tech Solutions</td>
                    <td>8000000</td>
                </tr>
                <tr>
                    <td>Backend Developer</td>
                    <td>Mengembangkan API dan database menggunakan Laravel dan MySQL</td>
                    <td>Bandung</td>
                    <td>CV Digital Indonesia</td>
                    <td>9000000</td>
                </tr>
                <tr>
                    <td>UI/UX Designer</td>
                    <td>Mendesain user interface dan user experience untuk aplikasi mobile</td>
                    <td>Surabaya</td>
                    <td>PT Creative Studio</td>
                    <td>7000000</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('jobs.template') }}" class="download-btn">⬇️ Download Template CSV</a>
    </div>
</body>
</html>
