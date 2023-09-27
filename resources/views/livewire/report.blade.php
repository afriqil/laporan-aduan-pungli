@extends('layouts.base-user')

@section('css')
    <style type="text/css">
        .header {
            padding: 38px 10%;
        }

        .header h1 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #151515;
            text-align: center;
        }

        .header h2 {
            font-size: 1rem;
            font-weight: 400;
            color: #9d9d9d;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="shadow-lg">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/small-logos/Yustisia Logo.png" class="mr-3" width="30" height="30" alt="" loading="lazy">
                Pusat Pengaduan Masyarakat
            </a>
        </nav>

        <div class="header p-10">
            <div class="text-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Lambang_Kabupaten_Gresik.png/954px-Lambang_Kabupaten_Gresik.png" alt="logo gresik" width="100">
            </div>
            <h1 class="mt-3">Lapor Aduan Pungli</h1>
            <h2 class="mt-3">E-Pungli adalah sistem laporan online pungutan liar (diluar ketentuan)
                yang dilakukan oleh aparat pemerintah desa dan masyarakat
                yang tidak sesuai dengan peraturan. E-Pungli ini di khususkan untuk masyarakat
                Desa Sumberrame, Kecamatan Wringinanom, Kabupaten Gresik.
            </h2>

            <form action="{{ route('add-report') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelapor</label>
                    <input type="text" name="name_pelapor" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" name="nik" class="form-control" id="nik">
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">No. HP/WA</label>
                    <input type="number" name="telp" class="form-control" id="telp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="men">Laki Laki</option>
                        <option value="women">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name-terlapor" class="form-label">Nama Terlapor</label>
                    <input type="text" name="name_terlapor" class="form-control" id="name-terlapor">
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu Kejadian</label>
                    <input type="date" name="waktu" class="form-control" id="waktu">
                </div>
                <div class="mb-3">
                    <label for="alamat-pelapor" class="form-label">Alamat Pelapor</label>
                    <textarea class="form-control" name="alamat_pelapor" id="alamat-pelapor" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ktp-terlapor" class="form-label">KTP Pelapor</label>
                    <input type="number" name="ktp_pelapor" class="form-control" id="ktp-terlapor">
                </div>
                <div class="mb-3">
                    <label for="kronologi" class="form-label">Kronologi</label>
                    <textarea class="form-control" name="kronologi" id="kronologi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="upload" class="form-label">Upload Foto/ Video Kejadian</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="upload">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="upload" id="upload" aria-describedby="upload">
                            <label class="custom-file-label" for="upload">Choose file</label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary w-100">
                    Ajukan
                </button>
            </form>
        </div>

        <p class="text-center m-0">Support by :</p>
        <div class="d-flex justify-content-center">
            <div class="d-flex bg-secondary p-3 rounded-lg">
                <img src="https://www.kemdikbud.go.id/main/files/large/83790f2b43f00be" alt="kemdikbud" width="80">
                <img src="https://www.kemdikbud.go.id/main/files/large/83790f2b43f00be" alt="kemdikbud" width="80">
                <img src="{{ asset('/img/yustisia.png') }}" alt="yustisia" width="80">
                <img src="{{ asset('/img/IMM.png') }}" alt="imm" width="80">
            </div>
        </div>

        <h5 class="text-center py-5">Jl. Raya Sumberame <br>
            Ke. Wringinanom Kab. Gresik Jawa Timur <br>
            Telpon 085850158191 <br>
            Email: sumberamedesa@gmail.com
        </h5>
    </div>
@endsection
