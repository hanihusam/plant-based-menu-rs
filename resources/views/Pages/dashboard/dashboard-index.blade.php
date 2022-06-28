@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('subtitle', 'Input Data')

@section('contents')


{{-- Start Form --}}
<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Input Data</h6>
                    <hr>


                    <form class="row g-3" action="{{ route('dashboard.penghitungan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Weight</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="berat_badan">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Height</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tinggi_badan">
                                <span class="input-group-text">Cm</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Age</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="umur">
                                <span class="input-group-text">Years</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected="">Select Gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Physical Activity</label>
                            <select class="form-select" aria-label="Default select example" name="aktivitas_fisik">
                                <option selected="">Select Physical Activity</option>
                                <option value="Very Light">Very Light</option>
                                <option value="Light">Light</option>
                                <option value="Medium">Medium</option>
                                <option value="Heavy">Heavy</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Calculate</button>
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
