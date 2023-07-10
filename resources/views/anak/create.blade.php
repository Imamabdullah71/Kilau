<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <main class="container">
        @include('komponen.pesan')
            <!-- START FORM -->
        <form action='{{ url('dataAnak') }}' method='post'>
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-control">
                        <option value="{{ Session::get('gender') }}">Pilih</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                </div>
                <!-- Islam, Kristen Protestan, Kristen Katolik, Hindu, Buddha, dan Khonghucu. -->
                <div class="mb-3 row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                    <select name="agama" id="agama" class="form-control">
                        <option value="{{ Session::get('agama') }}">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ Session::get('tempatLahir') }}" class="form-control" name='tempatLahir' id="tempatLahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" value="{{ Session::get('tanggalLahir') }}" class="form-control" name='tanggalLahir' id="tanggalLahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="anakKe" class="col-sm-2 col-form-label">Anak Ke</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ Session::get('anakKe') }}" class="form-control" name='anakKe' id="anakKe">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="dariBersaudara" class="col-sm-2 col-form-label">Dari .. Bersudara</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ Session::get('dariBersaudara') }}" class="form-control" name='dariBersaudara' id="dariBersaudara">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="statusCPB" class="col-sm-2 col-form-label">Status CPB</label>
                    <div class="col-sm-10">
                    <select name="statusCPB" id="statusCPB" class="form-control">
                        <option value="{{ Session::get('statusCPB') }}">Pilih</option>
                        <option value="CPB">CPB</option>
                        <option value="NPB">NPB</option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>
        <!-- AKHIR FORM -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

