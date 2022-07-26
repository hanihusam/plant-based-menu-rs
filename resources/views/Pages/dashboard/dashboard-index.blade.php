@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('subtitle', 'Input Data')

@section('contents')


{{-- Start Form --}}
{{-- <div class="row">
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
</div> --}}
{{-- End Form --}}





{{-- Start Form --}}
<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h5 class="mb-0 text-uppercase">Input Data</h5>
                    <hr>


                    <form class="row g-3" action="{{ route('dashboard.penghitungan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label"> <h6>Weight</h6> </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="berat_badan">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label"> <h6>Height</h6> </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tinggi_badan">
                                <span class="input-group-text">Cm</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label"> <h6>Age</h6> </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="umur">
                                <span class="input-group-text">Years</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label"> <h6>Gender</h6> </label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                <option selected="">Select Gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label"> <h6>Physical Activity</h6> </label>
                            {{-- <select class="form-select" aria-label="Default select example" name="aktivitas_fisik">
                                <option selected="">Select Physical Activity</option>
                                <option value="Very Light">Very Light</option>
                                <option value="Light">Light</option>
                                <option value="Medium">Medium</option>
                                <option value="Heavy">Heavy</option>
                            </select> --}}
                            <div class="list-group">

                                <a class="list-group-item list-group-item-action">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktivitas_fisik" id="VeryLight" value="Very Light" required>
                                        <label class="form-check-label" for="VeryLight">
                                            <h6 class="mb-1">Very Light</h6>
                                            <p class="mb-1">Sitting for long periods of time, watching TV, driving, playing video games, playing the computer or 100% of the time standing or sitting.</p>
                                        </label>
                                    </div>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktivitas_fisik" id="Light" value="Light" required>
                                        <label class="form-check-label" for="Light">
                                            <h6 class="mb-1">Light</h6>
                                            <p class="mb-1">Slow walking, slow cycling, light housework (dusting, light sweeping, washing dishes), bowling, light gardening, very easy resistance training using machine tools, stretching exercises, gentle yoga, playing billiards fishing, archery, golf, riding horses, 75% of the time sitting or standing and 25% of the time for certain activities.</p>
                                        </label>
                                    </div>
                                </a>

                                <a class="list-group-item list-group-item-action">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktivitas_fisik" id="Medium" value="Medium" required>
                                        <label class="form-check-label" for="Medium">
                                            <h6 class="mb-1">Medium</h6>
                                            <p class="mb-1">Brisk walking, faster cycling, ball sports such as volleyball, softball, or tennis, water aerobics, standard yoga, gardening, ballroom dancing, endurance training with 10–12 reps per set, lawn mowing, car washing, 60% sitting time or standing and 40% for certain activities.</p>
                                        </label>
                                    </div>
                                </a>

                                <a class="list-group-item list-group-item-action">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktivitas_fisik" id="Heavy" value="Heavy" required>
                                        <label class="form-check-label" for="Heavy">
                                            <h6 class="mb-1">Heavy</h6>
                                            <p class="mb-1">Running, jogging, brisk walking, cycling faster than 10 miles/hour, dancing (aerobic or faster than ballroom), hiking, running ball sports such as soccer or basketball, stair climbing, endurance training with more than 10–12 repetitions per set, 40% for sitting or standing and 60% for certain activities.</p>
                                        </label>
                                    </div>
                                </a>

                            </div>
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
