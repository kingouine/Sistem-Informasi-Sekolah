<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Kelas</title>
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
    <h3 style="text-align:center;">Data Kelas</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->guru->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
