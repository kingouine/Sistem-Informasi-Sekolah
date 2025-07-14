<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Nilai Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Rata-Rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $i => $n)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $n->siswa->nama ?? '-' }}</td>
                <td>{{ $n->guru->nama ?? '-' }}</td>
                <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                <td>{{ number_format(($n->nilai_tugas + $n->nilai_uts + $n->nilai_uas) / 3, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
