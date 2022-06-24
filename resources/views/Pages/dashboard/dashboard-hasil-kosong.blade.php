@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('subtitle', 'Calculation Results')

@section('contents')
<div class="row">
    {{-- ---------------------------------------------------- Kolomm Kiri ---------------------------------------------------- --}}
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <h5 class="mb-0">Personal Data</h5>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th scope="row">Current Weight</th>
                            <td>:</td>
                            <td>{{ $dataInput["berat_badan"] }} Kg</td>
                        </tr>
                        <tr>
                            <th scope="row">Height</th>
                            <td>:</td>
                            <td>{{ $dataInput["tinggi_badan"] }} Cm</td>
                        </tr>
                        <tr>
                            <th scope="row">Age</th>
                            <td>:</td>
                            <td>{{ $dataInput["umur"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>:</td>
                            <td>{{ $dataInput["jenis_kelamin"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Physical Activity</th>
                            <td>:</td>
                            <td>{{ $dataInput["aktivitas_fisik"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ideal Weight</th>
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
                <h5 class="mb-0">Food Menu Recommendations</h5>
            </div>
            <div class="card-body">
                <div class="text-center mt-4">
                    <h5 class="card-title">Sorry The System Could Not Find The Right Menu Recommendation For You.</h5>
                </div>

            </div>

        </div>
    </div>
</div>




@endsection
