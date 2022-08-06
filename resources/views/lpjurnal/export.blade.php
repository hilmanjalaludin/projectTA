<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h4 style="text-align: center">{{ $title }}</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Perkiraan</th>
                <th>Nama Perkiraan</th>
                <th>Debet</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tampil as $d)
            <td>{{ $d->tanggal }}</td>
            <td>{{ $d->kd_perkiraan }}</td>
            <td>{{ $d->nama_trans }}</td>
            <td>{{ $d->debet }}</td>
            <td>{{ $d->kredit }}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>