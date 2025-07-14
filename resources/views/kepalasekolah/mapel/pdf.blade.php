<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Mata Pelajaran</title>
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
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h3 style="text-align:center;">Data Mata Pelajaran</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $index => $m)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $m->nama_mapel }}</td>
                <td>{{ $m->jurusan->nama_jurusan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
