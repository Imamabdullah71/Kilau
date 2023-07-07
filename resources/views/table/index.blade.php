@extends('layouts.app')
@section('content')

<div class="container">
    <main class="mx-auto m-4">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4>List Anak</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-info table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama</th>
                                    <th>Nama</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody id="DataAnak">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Form Tambah -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4>Tambah Anak</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" id="formulirTambahAnak" autocomplete="off">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Umur</label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="Masukkan Umur">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih</option>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Tingkat Sekolah</label>
                            <select name="school" id="school" class="form-control">
                                <option value="">Pilih</option>
                                <option value="sd">SD</option>
                                <option value="smp">SMP</option>
                                <option value="sma">SMA</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Kelas</label>
                            <select name="school_class" id="school_class" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id="tombolTambahAnak" type="button" class="btn btn-success btn-block">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Fungsi untuk mengubah opsi kelas berdasarkan tingkat sekolah yang dipilih
            function changeSchoolLevel() {
            var selectedSchool = document.getElementById("school").value;
            var schoolClass = document.getElementById("school_class");

            // Menghapus semua opsi kelas
            while (schoolClass.options.length > 0) {
                schoolClass.remove(0);
            }

            // Menambahkan opsi kelas berdasarkan tingkat sekolah yang dipilih
            if (selectedSchool === "sd") {
                for (var i = 1; i <= 6; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.text = i;
                schoolClass.appendChild(option);
                }
            } else if (selectedSchool === "smp" || selectedSchool === "sma") {
                for (var i = 1; i <= 3; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.text = i;
                schoolClass.appendChild(option);
                }
            }
            }

            // Menambahkan event listener untuk perubahan tingkat sekolah
            document.getElementById("school").addEventListener("change", changeSchoolLevel);
        </script>


    </main>
</div>
@endsection

@push('script')

<script>
    $(document).ready(function(){
        
        // 1. Firebase Credential Here
        var firebaseConfig = {
            apiKey: "{{ config('services.firebase.apiKey') }}",
            authDomain: "{{ config('services.firebase.authDomain') }}",
            databaseURL: "{{ config('services.firebase.databaseURL') }}",
            projectId: "{{ config('services.firebase.projectId') }}",
            storageBucket: "{{ config('services.firebase.storageBucket') }}",
            messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
            appId: "{{ config('services.firebase.appId') }}",
            measurementId: "{{ config('services.firebase.measurementId') }}"
        };
        // Initialize Firebase
        var app = initializeApp(firebaseConfig);
        var analytics = getAnalytics(app);

        // Variabel Global
        var lastanakID = 0;
        var db = firebase.firestore();
        
        // 2. Fungsi Tambah Anak
        $("#tombolTambahAnak").on('click', function() {

            // Deklarasi
            var dataTambahAnak = $('#formulirTambahAnak').serializeArray();
            var name = document.getElementById('name').value;
            var age = document.getElementById('age').value;
            var gender = document.getElementById('gender').value;
            var school = document.getElementById('school').value;
            var school_class = document.getElementById('school_class').value;

            var AnakId = lastanakID + 1

            // Validasi 
            if (name == '') {
                alert('Nama harus di isi');
                $('#name').focus();
                return false;
            } else if (age == '') {
                alert('Umur harus di isi');
                $('#age').focus();
                return false;
            } else if (gender == '') {
                alert('Jenis Kelamin harus di isi');
                $('#gender').focus();
                return false;
            } else if (school == '') {
                alert('Tingkat Sekolah harus di isi');
                $('#school').focus();
                return false;
            } else if (school_class == '') {
                alert('Kelas harus di isi');
                $('#school_class').focus();
                return false;
            }

            // Masuk ke Firestore
            var db = firebase.firestore();
            db.collection("anak").add({
                name: name,
                age: age,
                gender: gender,
                school: school,
                school_class: school_class
            });

            // Tetapkan AnakId ke variabel lastanakID
            lastanakID = AnakId;

        })

        // 3. Fungsi Edit Anak


        // 4. Fungsi Update Anak


        // 5. Fungsi Hapus Anak


        // 6. Fungsi Pesan


        // 7. Fungsi Bersihkan Input


    })
</script>

@endpush