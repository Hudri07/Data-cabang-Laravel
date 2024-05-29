<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%; /* Sesuaikan lebar container */
        }

        table {
            width: 100%;
        }

        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Kode Cabang</th>
                            <th>Nama Cabang</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Kode Pos</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($dataCabangs as $dataCabang)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $dataCabang->kode_cabang }}</td>
                            <td>{{ $dataCabang->nama_cabang }}</td>
                            <td>{{ $dataCabang->alamat }}</td>
                            <td>{{ $dataCabang->kota }}</td>
                            <td>{{ $dataCabang->provinsi }}</td>
                            <td>{{ $dataCabang->kode_pos }}</td>
                            <td>{{ $dataCabang->nomer_telepon }}</td>
                            <td>{{ $dataCabang->email }}</td>
                            <td>{{ strip_tags($dataCabang->deskripsi) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
