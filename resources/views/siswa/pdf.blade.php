<!DOCTYPE html>
<html>
<head>
    <title>Nilai Siswa</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h3 align="center">Laporan Nilai Siswa</h3>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->siswa->nama }}</td>
                <td>{{ $item->mapel->nama_mapel }}</td>
                <td>{{ $item->guru->nama }}</td>
                <td>{{ $item->nilai_tugas }}</td>
                <td>{{ $item->nilai_uts }}</td>
                <td>{{ $item->nilai_uas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
