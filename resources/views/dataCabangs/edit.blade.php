<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Add Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="background: lightgray;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        @if ($errorMessage = Session::get('error'))
                        <div class="alert alert-danger">
                            {{$errorMessage}}
                        </div>
                        @endif
                        <form action="{{ route('dataCabangs.update', $dataCabangs->kode_cabang) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <a href="{{route ('dataCabangs.index')}}"><i class="bi bi-arrow-left-circle-fill">KEMBALI</a></i>
                            </div>
                            <div class="form-group">
                                <label for="nama_cabang">Nama Cabang</label>
                                <input type="text" name="nama_cabang" class="form-control" value="{{ old('nama_cabang', $dataCabangs->nama_cabang) }}" placeholder="Masukkan Nama Cabang" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $dataCabangs->alamat) }}" placeholder="Masukkan Alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" class="form-control" value="{{ old('kota', $dataCabangs->kota) }}" placeholder="Masukkan Kota" required>
                            </div>

                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select name="provinsi" id="nama_provinsi" class="form-control">
                                    @foreach($dataProvinsi as $item)
                                    <option value="{{old('nama_provinsi', $item->nama_provinsi)}}">{{ old('nama_provinsi', $item->nama_provinsi)}}</option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" value="{{ old('kode_pos', $dataCabangs->kode_pos) }}" placeholder="Masukkan Kode Pos" required>
                            </div>

                            <div class="form-group">
                                <label for="nomer_telepon">Nomer Telepon</label>
                                <input type="text" name="nomer_telepon" class="form-control" value="{{ old('nomer_telepon', $dataCabangs->nomer_telepon) }}" placeholder="Masukkan Nomer Telepon" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $dataCabangs->email) }}" placeholder="Masukkan Email" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi" id="summernote" required>{{ old('deskripsi', $dataCabangs->deskripsi) }}</textarea>
                            </div>

                            <div>
                                <br>
                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>