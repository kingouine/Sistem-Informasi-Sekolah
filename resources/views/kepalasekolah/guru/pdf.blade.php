<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Guru</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h3 style="text-align:center;">Data Guru</h3>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $g)
            <tr>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->nip }}</td>
                <td>{{ $g->user->email ?? '-' }}</td>
                <td>{{ $g->no_telp }}</td>
                <td>{{ $g->alamat }}</td>
                <td>{{ $g->mapel->nama_mapel ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
