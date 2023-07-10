@extends('layouts.template')

@section('isiKonten')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('dataAnak/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Nama</th>
                    <th class="col-md-1">Jenis Kelamin</th>
                    <th class="col-md-1">Agama</th>
                    <th class="col-md-1">Tempat Lahir</th>
                    <th class="col-md-1">Tanggal Lahir</th>
                    <th class="col-md-1">Anak Ke</th>
                    <th class="col-md-1">Dari Bersaudara</th>
                    <th class="col-md-1">Status CPB</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->tempatLahir }}</td>
                    <td>{{ $item->tanggalLahir }}</td>
                    <td>{{ $item->anakKe }}</td>
                    <td>{{ $item->dariBersaudara }}</td>
                    <td>{{ $item->statusCPB }}</td>
                    <td>
                        <a href='{{ url('dataAnak/'.$item->nama.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <a href='' class="btn btn-danger btn-sm">Del</a>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
<!-- AKHIR DATA -->
@endsection