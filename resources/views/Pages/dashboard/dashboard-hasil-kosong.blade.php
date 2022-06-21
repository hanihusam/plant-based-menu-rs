@extends('layouts.admin.app')

@section('title', 'Dasboard')
@section('subtitle', 'Hasil Penghitungan')

@section('contents')
<div class="row">
    {{-- ---------------------------------------------------- Kolomm Kiri ---------------------------------------------------- --}}
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <h5 class="mb-0">Data Pribadi</h5>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th scope="row">Berat Badan Saat Ini</th>
                            <td>:</td>
                            <td>{{ $dataInput["berat_badan"] }} Kg</td>
                        </tr>
                        <tr>
                            <th scope="row">Tinggi Badan</th>
                            <td>:</td>
                            <td>{{ $dataInput["tinggi_badan"] }} Cm</td>
                        </tr>
                        <tr>
                            <th scope="row">Umur</th>
                            <td>:</td>
                            <td>{{ $dataInput["umur"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            <td>:</td>
                            <td>{{ $dataInput["jenis_kelamin"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Aktivitas Fisik</th>
                            <td>:</td>
                            <td>{{ $dataInput["aktivitas_fisik"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Berat Badan Ideal</th>
                            <td>:</td>
                            <td><strong>{{ $BBIdeal }} Kg</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- ---------------------------------------------------- Kolomm Kanan ---------------------------------------------------- --}}
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card radius-10 w-100">

            <div class="card-header">
                <h5 class="mb-0">Rekomendasi Menu Makan</h5>
            </div>
            <div class="card-body">
                <div class="text-center mt-4">
                    <h5 class="card-title">Maaf Sistem Tidak Menemukan Rekomendasi Menu yang Tepat Untuk Anda.</h5>
                </div>

            </div>

        </div>
    </div>
</div>




@endsection
