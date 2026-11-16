<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Siswa - Anyelir</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        h3, p { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body onload="window.print()">

    <h3>LAPORAN DATA SISWA</h3>
    <p>Portal Akademik - Anyelir Dirgahayu</p>
    <hr style="margin: 15px 0;">

    <table>
        <thead>
            <tr>
                <th width="40">No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_siswa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>