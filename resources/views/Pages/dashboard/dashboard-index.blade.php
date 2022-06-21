@extends('layouts.admin.app')

@section('title', 'Dasboard')
@section('subtitle', 'Dasboard')

@section('contents')


{{-- Start Form --}}
<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Masukkan Data</h6>
                    <hr>


                    <form class="row g-3" action="{{ route('dashboard.penghitungan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Berat Badan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="berat_badan">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tinggi_badan">
                                <span class="input-group-text">Cm</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Umur</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="umur">
                                <span class="input-group-text">Tahun</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected="">Pilih Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Aktivitas Fisik</label>
                            <select class="form-select" aria-label="Default select example" name="aktivitas_fisik">
                                <option selected="">Pilih Aktivitas Fisik</option>
                                <option value="Sangat Ringan">Sangat Ringan</option>
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Hitung</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
{{-- End Form --}}






@endsection
