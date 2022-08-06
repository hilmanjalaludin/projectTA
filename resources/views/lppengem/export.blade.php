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
                <th>No Kembali</th>
                <th>Kode User</th>
                <th>NIK</th>
                <th>Kode Mobil</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Keterlambatan</th>
                <th>Denda Telat</th>
                <th>Denda Kondisi</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tampil as $d)
            <tr>
                <td>{{ $d->no_kembali }}</td>
                    <td>{{ $d->id_user }}</td>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->kd_mobil }}</td>
                    <td>{{ $d->tgl_sewa }}</td>
                    <td>{{ $d->tgl_kembali }}</td>
                    <td>{{ $d->terlambat }}</td>
                    <td>{{ $d->denda_telat }}</td>
                    <td>{{ $d->denda_kondisi }}</td>
                    <td>{{ $d->kondisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>