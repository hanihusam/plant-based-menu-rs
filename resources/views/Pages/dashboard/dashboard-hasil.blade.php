@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('subtitle', 'Calculation Results')

@section('contents')
<div>
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                <div class="d-flex align-items-center">
                    {{-- <div class="tab-icon"><ion-icon name="home-sharp" class="me-1 md hydrated" role="img" aria-label="home sharp"></ion-icon>
                    </div> --}}
                    <div class="tab-title">Calculation Result</div>
                </div>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1 md hydrated" role="img" aria-label="person sharp"></ion-icon>
                    </div> --}}
                    <div class="tab-title">Calculation Process</div>
                </div>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade active show" id="primary-pills-home" role="tabpanel">
            {{-- ------------------------------------- Halaman Hasil Start ------------------------------------- --}}
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
                                        <th scope="col">Carbohydrates</th>
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
                                        <th scope="col">Carbohydrates</th>
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
                                        <th scope="col">Carbohydrates</th>
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
                                        <th scope="col">Carbohydrates</th>
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
                                                        <th scope="col">Carbohydrates</th>
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
            {{-- ------------------------------------- Halaman Hasil End ------------------------------------- --}}

        </div>
        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">

            {{-- ------------------------------------- Halaman Proses Start ------------------------------------- --}}
            <div class="card">
                <div class="card-body border-bottom">
                    <h5 class="card-title">Input Data</h5>
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
                            {{-- <tr>
                                <th scope="row">Berat Badan Ideal</th>
                                <td>:</td>
                                <td><strong>{{ $BBIdeal }} Kg</strong></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Calculating Ideal Weight</h5>
                    <p>Ideal Weight= (Height - 100 ) / 90% = <strong>{{ number_format($BBIdeal,1,",",".")  }} Kg</strong></p>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Calculating Basal Metabolic Rate </h5>
                    @if ($dataInput["jenis_kelamin"] == "Laki-laki")
                        <p>Basal Metabolic Rate {{ $dataInput["jenis_kelamin"] }} = 66 + (13,7 x Weight) + (5 x Height) – (6,8 x Age) = <strong>{{ number_format($AMB,2,",",".")  }}</strong></p>
                    @else
                        <p>Basal Metabolic Rate {{ $dataInput["jenis_kelamin"] }} = 655 + (9,6 x Weight) + (1,8 x Height) – (4,7 x Age) = <strong>{{ number_format($AMB,2,",",".")  }}</strong></p>
                    @endif

                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Calculating Daily Energy Needs</h5>
                    <p>Energy Demand = {{ number_format($AMB,2,",",".")  }} x Physical Activity Value = <strong>{{ number_format($EnergiPerhari,2,",",".") }} Calories</strong></p>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Calculating Energy Needs at Each Meal</h5>
                    <p class="card-text">To calculate the energy requirement per meal, a percentage is taken, breakfast is 25%, lunch is 30%, dinner is 25% and snacks is 10%.</p>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Energy required (kcal)</th>
                                <th scope="col">Breakfast (kcal)</th>
                                <th scope="col">Snack 1 (kcal)</th>
                                <th scope="col">Lunch (kcal)</th>
                                <th scope="col">Snack 2 (kcal)</th>
                                <th scope="col">Dinner (kcal)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ number_format($EnergiPerhari,2,",",".") }}</td>
                                <td>{{ number_format($EnergiPerWaktuMakan['Normal']['Makan Pagi'],2,",",".")  }}</td>
                                <td>{{ number_format($EnergiPerWaktuMakan['Normal']['Snack 1'],2,",",".")  }}</td>
                                <td>{{ number_format($EnergiPerWaktuMakan['Normal']['Makan Siang'],2,",",".")  }}</td>
                                <td>{{ number_format($EnergiPerWaktuMakan['Normal']['Snack 2'],2,",",".")  }}</td>
                                <td>{{ number_format($EnergiPerWaktuMakan['Normal']['Makan Malam'],2,",",".")  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Filtering Menu based on Energy Needs</h5>
                    <p class="card-text">In this stage there is a minimum energy value (-20%) and a maximum energy value (+20%) for each meal.</p>
                    <table class="table table-bordered mb-0">
                        <tbody>

                            @foreach ($WaktuMakan as $waktu => $time)

                                <tr>
                                    <td rowspan="2"><strong>{{ $time }}</strong> <br>({{ number_format($EnergiPerWaktuMakan['Normal'][$waktu],2,",",".") }} kcal)</td>
                                    <td>Min (kcal)</td>
                                    <td>{{ number_format($EnergiPerWaktuMakan['Minimal'][$waktu],2,",",".")  }}</td>
                                </tr>
                                <tr>
                                    <td>Max (kcal)</td>
                                    <td>{{ number_format($EnergiPerWaktuMakan['Maksimal'][$waktu],2,",",".")  }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Menu Combination according to Number of Meals</h5>
                    <p class="card-text">A menu combination is performed by looking at the filtering menu values ​​based on energy requirements.</p>
                    <h6 class="mt-3">Food Menu Combinations</h6>
                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">Breakfast</th>
                                <th scope="col">Snack 1</th>
                                <th scope="col">Lunch</th>
                                <th scope="col">Snack 2</th>
                                <th scope="col">Dinner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach ($DaftarMenuMakanan as $MenuM)
                                <tr>
                                    <td>R{{ $i }}</td>
                                    <td>{{ $MenuM["Makan Pagi"]["nama_menu"] }} <br> <i> Calories = {{ $MenuM["Makan Pagi"]["kalori"] }} kcal</i> </td>
                                    <td>{{ $MenuM["Snack 1"]["nama_menu"] }} <br> <i> Calories = {{ $MenuM["Snack 1"]["kalori"] }} kcal</i> </td>
                                    <td>{{ $MenuM["Makan Siang"]["nama_menu"] }} <br> <i> Calories = {{ $MenuM["Makan Siang"]["kalori"] }} kcal</i> </td>
                                    <td>{{ $MenuM["Snack 2"]["nama_menu"] }} <br> <i> Calories = {{ $MenuM["Snack 2"]["kalori"] }} kcal</i> </td>
                                    <td>{{ $MenuM["Makan Malam"]["nama_menu"] }} <br> <i> Calories = {{ $MenuM["Makan Malam"]["kalori"] }} kcal</i> </td>
                                </tr>
                                <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                </div>





                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 1: Build a decision matrix and determine the weight of the criteria.</h5>

                    <p class="card-text">The weight of each criterion is obtained from the calculation of carbohydrates, fat and protein needed in a day based on the number of calories per day by the user with the percentage of protein 15%, fat 25% and carbohydrates 60% which is then divided by the total amount carbohydrate, protein and fat needs.</p>
                    <h6 class="mb-3">Energy per day needed = {{ number_format($EnergiPerhari,2,",",".") }} Calories</h6>
                    <p>Carbohydrates	= (60% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 4 = <strong>{{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }}</strong></p>
                    <p>Protein	= (15% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 4 = <strong>{{ number_format($DecisionMatrix['protein']['AKG'],2,",",".")  }}</strong></p>
                    <p>Fat	= (25% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 9 = <strong>{{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".")  }}</strong></p>
                    <p>Total Value	= Carbohydrates + Protein + Fat = <strong>{{ number_format($DecisionMatrix['karbohidrat']['TotalNilai'],2,",",".")  }}</strong> </p>
                    <h6 class="mb-3">Calculation of weight for each criterion :</h6>
                    <p>Carbohydrates	= {{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['karbohidrat']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['karbohidrat']['Berat'],4,",",".")  }}</strong></p>
                    <p>Protein	= {{ number_format($DecisionMatrix['protein']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['protein']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['protein']['Berat'],4,",",".")  }}</strong></p>
                    <p>Fat	= {{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['lemak']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['lemak']['Berat'],4,",",".")  }}</strong></p>
                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Nutritionary Name</th>
                                <th scope="col">RDA Value Based on Calories</th>
                                <th scope="col">Total Value</th>
                                <th scope="col">Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DecisionMatrix as $matrix => $key)
                                <tr>
                                    <td>{{ $matrix }}</td>
                                    <td>{{ number_format($key["AKG"],2,",",".") }}</td>
                                    <td>{{ number_format($key["TotalNilai"],2,",",".") }}</td>
                                    <td>{{ number_format($key["Berat"],4,",",".") }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 2: Calculate normalized decision matrix</h5>

                    <h6 class="mt-3">Nutrient Content Value of Menu Combinations</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">Carbohydrates</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Fat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach ($Kombinasi as $isiK)
                                <tr>
                                    <td>R{{ $i }}</td>
                                    <td>{{ $isiK["karbohidrat"] }}</td>
                                    <td>{{ $isiK["protein"] }}</td>
                                    <td>{{ $isiK["lemak"] }}</td>
                                </tr>
                                <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>

                    <h6 class="mt-3">Normalized Decision Matrix Value</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">Carbohydrates</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Fat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $JumlahData; $j++)
                                <tr>
                                    <td>R{{ $j+1 }}</td>
                                    <td>{{ number_format($DecisionMatrixTernormalisasi["karbohidrat"][$j],4,",",".") }}</td>
                                    <td>{{ number_format($DecisionMatrixTernormalisasi["protein"][$j],4,",",".") }}</td>
                                    <td>{{ number_format($DecisionMatrixTernormalisasi["lemak"][$j],4,",",".") }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 3: Calculate the weight of the normalized decision matrix.</h5>
                    <p class="card-text">The normalized weight is calculated by the normalized decision matrix times the weight of each criterion.</p>

                    <h6 class="mt-3">Normalized Decision Matrix Weight Value</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">Carbohydrates</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Fat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $JumlahData; $j++)
                                <tr>
                                    <td>R{{ $j+1 }}</td>
                                    <td>{{ number_format($BeratDecisionMatrixTernormalisasi["karbohidrat"][$j],4,",",".") }}</td>
                                    <td>{{ number_format($BeratDecisionMatrixTernormalisasi["protein"][$j],4,",",".") }}</td>
                                    <td>{{ number_format($BeratDecisionMatrixTernormalisasi["lemak"][$j],4,",",".") }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>


                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 4: Determine the positive and negative ideal solutions.</h5>
                    <p class="card-text">The positive ideal alternative is the solution with the maximum profit on each criterion, while the negative ideal is the solution with the greatest cost on each criterion.  </p>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Criteria</th>
                                <th scope="col">Ideal Solution</th>
                                <th scope="col">A+</th>
                                <th scope="col">A-</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($SolusiIdealPositifNegatif as $Sol => $Solla)
                                <tr>
                                    <td>{{ $Sol }}</td>
                                    <td>
                                        {{  number_format($DecisionMatrixTernormalisasi[$Sol][0],4,",",".")  }}
                                        @for ($j = 1; $j < $JumlahData; $j++)
                                            - {{  number_format($DecisionMatrixTernormalisasi[$Sol][$j],4,",",".")  }}
                                        @endfor
                                    </td>
                                <td>{{ number_format($Solla["Plus"],4,",",".") }}</td>
                                <td>{{ number_format($Solla["Minus"],4,",",".") }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 5: Calculate the distance from the positive ideal solution and the negative ideal solution.</h5>

                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">A+</th>
                                <th scope="col">A-</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ number_format($JarakSolusiIdealPositifNegatif["Plus"][0],4,",",".") }}
                                    @for ($j = 1; $j < $JumlahData; $j++)
                                        - {{ number_format($JarakSolusiIdealPositifNegatif["Plus"][$j],4,",",".") }}
                                    @endfor
                                </td>
                                <td>
                                    {{ number_format($JarakSolusiIdealPositifNegatif["Minus"][0],4,",",".") }}
                                    @for ($j = 1; $j < $JumlahData; $j++)
                                        - {{ number_format($JarakSolusiIdealPositifNegatif["Minus"][$j],4,",",".") }}
                                    @endfor
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 6: Calculate the relative closeness to the positive ideal solution.</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}

                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">TOPSIS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $JumlahData; $j++)
                                <tr>
                                    <td>R{{ $j+1 }}</td>
                                    <td>{{ number_format($KedekatanRelatifSolusiIdeal[$j],4,",",".") }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Step 7 : Sort the alternatives that have a value close to 1.</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}

                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Combination</th>
                                <th scope="col">TOPSIS</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $JumlahData; $j++)
                                @if ($j == $UrutanAlternatif)
                                    <tr>
                                        <td><strong>R{{ $j+1 }}</strong></td>
                                        <td><strong>{{ number_format($KedekatanRelatifSolusiIdeal[$j],4,",",".") }}</strong></td>
                                        <td><strong>Biggest Value</strong></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>R{{ $j+1 }}</td>
                                        <td>{{ number_format($KedekatanRelatifSolusiIdeal[$j],4,",",".") }}</td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endfor
                        </tbody>
                    </table>

                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Combination Number</th>
                                <th scope="col">Breakfast</th>
                                <th scope="col">Snack 1</th>
                                <th scope="col">Lunch</th>
                                <th scope="col">Snack 2</th>
                                <th scope="col">Dinner</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach ($DaftarMenuMakanan as $MenuM)
                                @if ($i-1 == $UrutanAlternatif)
                                    <tr>
                                        <td><strong>R{{ $i }}</strong></td>
                                        <td><strong>{{ $MenuM["Makan Pagi"]["nama_menu"] }}</strong></td>
                                        <td><strong>{{ $MenuM["Snack 1"]["nama_menu"] }}</strong></td>
                                        <td><strong>{{ $MenuM["Makan Siang"]["nama_menu"] }}</strong></td>
                                        <td><strong>{{ $MenuM["Snack 2"]["nama_menu"] }}</strong></td>
                                        <td><strong>{{ $MenuM["Makan Malam"]["nama_menu"] }}</strong></td>
                                        <td><strong>Recommended Menu</strong></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>R{{ $i }}</td>
                                        <td>{{ $MenuM["Makan Pagi"]["nama_menu"] }}</td>
                                        <td>{{ $MenuM["Snack 1"]["nama_menu"] }}</td>
                                        <td>{{ $MenuM["Makan Siang"]["nama_menu"] }}</td>
                                        <td>{{ $MenuM["Snack 2"]["nama_menu"] }}</td>
                                        <td>{{ $MenuM["Makan Malam"]["nama_menu"] }}</td>
                                        <td></td>
                                    </tr>
                                @endif

                                <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{-- ------------------------------------- Halaman Proses End ------------------------------------- --}}

        </div>
    </div>
</div>





@endsection
