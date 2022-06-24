@extends('layouts.admin.app')

@section('title', 'Counting History')
@section('subtitle', 'History Details')

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


            <div class="card-header">
                <h5 class="mb-0">Daily Energy Needs</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Calories</th>
                            <th scope="col">Carbohydrate</th>
                            <th scope="col">Protein</th>
                            <th scope="col">Fat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($EnergiPerhari,2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }}</td>
                            <td>{{ number_format($DecisionMatrix['protein']['AKG'],2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".") }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="card-header">
                <h5 class="mb-0">Daily Energy Needs : Maximum</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Calories</th>
                            <th scope="col">Carbohydrate</th>
                            <th scope="col">Protein</th>
                            <th scope="col">Fat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($EnergiPerhariMaksimal,2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrixMaksimal['karbohidrat']['AKG'],2,",",".")  }}</td>
                            <td>{{ number_format($DecisionMatrixMaksimal['protein']['AKG'],2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrixMaksimal['lemak']['AKG'],2,",",".") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="card-header">
                <h5 class="mb-0">Daily Energy Needs : Minimum</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Calories</th>
                            <th scope="col">Carbohydrate</th>
                            <th scope="col">Protein</th>
                            <th scope="col">Fat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($EnergiPerhariMinimal,2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrixMinimal['karbohidrat']['AKG'],2,",",".")  }}</td>
                            <td>{{ number_format($DecisionMatrixMinimal['protein']['AKG'],2,",",".") }}</td>
                            <td>{{ number_format($DecisionMatrixMinimal['lemak']['AKG'],2,",",".") }}</td>
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

                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th scope="col">Calories</th>
                            <th scope="col">Carbohydrate</th>
                            <th scope="col">Protein</th>
                            <th scope="col">Fat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $TotalGiziRekomendasi["kalori"] }}</td>
                            <td>{{ $TotalGiziRekomendasi["karbohidrat"] }}</td>
                            <td>{{ $TotalGiziRekomendasi["protein"] }}</td>
                            <td>{{ $TotalGiziRekomendasi["lemak"] }}</td>
                        </tr>
                    </tbody>
                </table>


                <div class="accordion" id="accordionExample">
                    <?php $i = 1; ?>
                    @foreach ($HasilRekomendasi as $key => $value)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_{{ $i }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                aria-controls="collapse{{ $i }}">
                                <span>
                                    <strong>{{ $WaktuMakan[$key] }} : </strong>
                                    {{ $value["nama_menu"] }}
                                    <span>
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                            aria-labelledby="heading_{{ $i }}" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Calories</th>
                                            <th scope="col">Carbohydrate</th>
                                            <th scope="col">Protein</th>
                                            <th scope="col">Fat</th>
                                            <th scope="col">Serving</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $value["kalori"] }}</td>
                                            <td>{{ $value["karbohidrat"] }}</td>
                                            <td>{{ $value["protein"] }}</td>
                                            <td>{{ $value["lemak"] }}</td>
                                            <td>{{ $value["sajian"] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>

                                <strong>Ingredients</strong><br>
                                <p>{{ $value["komposisi"] }}</p>
                                <strong>How to Cook</strong><br>
                                <p>{{ $value["cara_masak"] }}</p>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
