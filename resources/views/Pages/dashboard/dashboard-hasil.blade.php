@extends('layouts.admin.app')

@section('title', 'Dasboard')
@section('subtitle', 'Hasil Penghitungan')

@section('contents')
<div>
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                <div class="d-flex align-items-center">
                    {{-- <div class="tab-icon"><ion-icon name="home-sharp" class="me-1 md hydrated" role="img" aria-label="home sharp"></ion-icon>
                    </div> --}}
                    <div class="tab-title">Hasil Penghitungan</div>
                </div>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1 md hydrated" role="img" aria-label="person sharp"></ion-icon>
                    </div> --}}
                    <div class="tab-title">Proses Penghitungan</div>
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


                        <div class="card-header">
                            <h5 class="mb-0">Kebutuhan Energi Perhari</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Kalori</th>
                                        <th scope="col">Karbohidrat</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Lemak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ number_format($EnergiPerhari,2,",",".") }}</td>
                                        <td>{{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }}</td>
                                        <td>{{ number_format($DecisionMatrix['protein']['AKG'],2,",",".") }}</td>
                                        <td>{{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".") }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row">Makan Pagi</th>
                                        <td>{{ $EnergiPerWaktuMakan['Normal']['Makan Pagi'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Snack 1</th>
                                        <td>{{ $EnergiPerWaktuMakan['Normal']['Snack 1'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Makan Siang</th>
                                        <td>{{ $EnergiPerWaktuMakan['Normal']['Makan Siang'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Snack 2</th>
                                        <td>{{ $EnergiPerWaktuMakan['Normal']['Snack 2'] }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Makan Malam</th>
                                        <td>{{ $EnergiPerWaktuMakan['Normal']['Makan Malam'] }}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="card-header">
                            <h5 class="mb-0">Kebutuhan Energi Perhari : Maksimal</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Kalori</th>
                                        <th scope="col">Karbohidrat</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Lemak</th>
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
                            <h5 class="mb-0">Kebutuhan Energi Perhari : Minimal</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Kalori</th>
                                        <th scope="col">Karbohidrat</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Lemak</th>
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
                            <h5 class="mb-0">Rekomendasi Menu Makan</h5>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Kalori</th>
                                        <th scope="col">Karbohidrat</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Lemak</th>
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
                                                <strong>{{ $key }} : </strong>
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
                                                        <th scope="col">Kalori</th>
                                                        <th scope="col">Karbohidrat</th>
                                                        <th scope="col">Protein</th>
                                                        <th scope="col">Lemak</th>
                                                        <th scope="col">Sajian</th>
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

                                            <strong>Bahan</strong><br>
                                            <p>{{ $value["komposisi"] }}</p>
                                            <strong>Cara Masak</strong><br>
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
                            {{-- <tr>
                                <th scope="row">Berat Badan Ideal</th>
                                <td>:</td>
                                <td><strong>{{ $BBIdeal }} Kg</strong></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Menghitung Berat Badan Ideal</h5>
                    <p>Berat Badan Ideal= (Tinggi Badan - 100 ) / 90% = <strong>{{ number_format($BBIdeal,1,",",".")  }} Kg</strong></p>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Menghitung Angka Metabolisme Basal (AMB) </h5>
                    @if ($dataInput["jenis_kelamin"] == "Laki-laki")
                        <p>AMB {{ $dataInput["jenis_kelamin"] }} = 66 + (13,7 x Berat Badan) + (5 x Tinggi Badan) – (6,8 x Umur) = <strong>{{ number_format($AMB,2,",",".")  }}</strong></p>
                    @else
                        <p>AMB {{ $dataInput["jenis_kelamin"] }} = 655 + (9,6 x Berat Badan) + (1,8 x Tinggi Badan) – (4,7 x Umur) = <strong>{{ number_format($AMB,2,",",".")  }}</strong></p>
                    @endif

                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Menghitung Kebutuhan Energi per Hari</h5>
                    <p>Kebutuhan Energi = {{ number_format($AMB,2,",",".")  }} x Nilai Aktivitas Fisik = <strong>{{ number_format($EnergiPerhari,2,",",".") }} Kalori</strong></p>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Menghitung Kebutuhan Energi per Waktu Makan</h5>
                    <p class="card-text">Untuk menghitung kebutuhan energi per waktu makan diambil presentase, makan pagi 25%, makan siang 30%, makan malam 25% dan snack 10%.</p>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Energi yang dibutuhkan (kkal)</th>
                                <th scope="col">Makan Pagi (kkal)</th>
                                <th scope="col">Snack 1 (kkal)</th>
                                <th scope="col">Makan Siang (kkal)</th>
                                <th scope="col">Snack 2 (kkal)</th>
                                <th scope="col">Makan Malam (kkal)</th>
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
                    <h5 class="card-title">Filtering Menu berdasarkan Kebutuhan Energi </h5>
                    <p class="card-text">Dalam tahap ini terdapat nilai minimum energi (-20%) dan nilai maksimum energi (+20%) setiap waktu makan.</p>
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <?php $WaktuMakan = array_keys($EnergiPerWaktuMakan["Normal"]) ?>

                            @foreach ($WaktuMakan as $waktu)

                                <tr>
                                    <td rowspan="2"><strong>{{ $waktu }}</strong> <br>({{ number_format($EnergiPerWaktuMakan['Normal'][$waktu],2,",",".") }} kkal)</td>
                                    <td>Min (kkal)</td>
                                    <td>{{ number_format($EnergiPerWaktuMakan['Minimal'][$waktu],2,",",".")  }}</td>
                                </tr>
                                <tr>
                                    <td>Max (kkal)</td>
                                    <td>{{ number_format($EnergiPerWaktuMakan['Maksimal'][$waktu],2,",",".")  }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-body border-bottom">
                    <h5 class="card-title">Kombinasi Menu sesuai Jumlah Waktu Makan</h5>
                    <p class="card-text">Dilakukan kombinasi menu dengan melihat nilai filtering menu berdasarkan kebutuhan energi.</p>
                    <h6 class="mt-3">Kombinasi Menu Makanan</h6>
                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Makan Pagi</th>
                                <th scope="col">Snack 1</th>
                                <th scope="col">Makan Siang</th>
                                <th scope="col">Snack 2</th>
                                <th scope="col">Makan Malam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach ($DaftarMenuMakanan as $MenuM)
                                <tr>
                                    <td>R{{ $i }}</td>
                                    <td>{{ $MenuM["Makan Pagi"]["nama_menu"] }} <br> <i>Kalori = {{ $MenuM["Makan Pagi"]["kalori"] }} kkal</i> </td>
                                    <td>{{ $MenuM["Snack 1"]["nama_menu"] }} <br> <i> Kalori = {{ $MenuM["Snack 1"]["kalori"] }} kkal</i> </td>
                                    <td>{{ $MenuM["Makan Siang"]["nama_menu"] }} <br> <i> Kalori = {{ $MenuM["Makan Siang"]["kalori"] }} kkal</i> </td>
                                    <td>{{ $MenuM["Snack 2"]["nama_menu"] }} <br> <i> Kalori = {{ $MenuM["Snack 2"]["kalori"] }} kkal</i> </td>
                                    <td>{{ $MenuM["Makan Malam"]["nama_menu"] }} <br> <i> Kalori = {{ $MenuM["Makan Malam"]["kalori"] }} kkal</i> </td>
                                </tr>
                                <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                </div>





                <div class="card-body border-bottom">
                    <h5 class="card-title">Langkah 1 : Membangun decision matrix dan menentukan berat dari kriteria.</h5>

                    <p class="card-text">Berat setiap kriteria didapatkan dari perhitungan karbohidrat, lemak dan protein yang dibutuhkan dalam sehari berdasarkan jumlah kalori per hari pengguna dengan presentase protein 15%, lemak 25% dan karbohidrat 60% yang kemudian dibagi dengan jumlah total kebutuhan karbohidrat, protein dan lemak.</p>
                    <h6 class="mb-3">Energi per hari yang dibutuhkan = {{ number_format($EnergiPerhari,2,",",".") }} Kalori</h6>
                    <p>Karbohidrat	= (60% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 4 = <strong>{{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }}</strong></p>
                    <p>Protein	= (15% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 4 = <strong>{{ number_format($DecisionMatrix['protein']['AKG'],2,",",".")  }}</strong></p>
                    <p>Lemak	= (25% x {{ number_format($EnergiPerhari,2,",",".") }} ) / 9 = <strong>{{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".")  }}</strong></p>
                    <p>Total Nilai	= Karbohidrat + Protein + Lemak = <strong>{{ number_format($DecisionMatrix['karbohidrat']['TotalNilai'],2,",",".")  }}</strong> </p>
                    <h6 class="mb-3">Perhitungan berat setiap kriteria :</h6>
                    <p>Karbohidrat	= {{ number_format($DecisionMatrix['karbohidrat']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['karbohidrat']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['karbohidrat']['Berat'],4,",",".")  }}</strong></p>
                    <p>Protein	= {{ number_format($DecisionMatrix['protein']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['protein']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['protein']['Berat'],4,",",".")  }}</strong></p>
                    <p>Lemak	= {{ number_format($DecisionMatrix['lemak']['AKG'],2,",",".")  }} / {{ number_format($DecisionMatrix['lemak']['TotalNilai'],2,",",".")  }} = <strong>{{ number_format($DecisionMatrix['lemak']['Berat'],4,",",".")  }}</strong></p>
                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Nama Kandungan Gizi</th>
                                <th scope="col">Nilai AKG Berdasarkan Kalori</th>
                                <th scope="col">Total Nilai</th>
                                <th scope="col">Berat</th>
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
                    <h5 class="card-title">Langkah 2 : Hitung decision matrix ternormalisasi</h5>

                    <h6 class="mt-3">Nilai Kandungan Gizi pada Kombinasi Menu</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Karbohidrat</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Lemak</th>
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

                    <h6 class="mt-3">Nilai Decision Matrix Ternormalisasi</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Karbohidrat</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Lemak</th>
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
                    <h5 class="card-title">Langkah 3 : Hitung berat decision matrix ternormalisasi.</h5>
                    <p class="card-text">Berat ternormalisasi  dihitung dengan decision matrix ternormalisasi dikalikan berat setiap kriteria.</p>

                    <h6 class="mt-3">Nilai Berat Decision Matrix Ternormalisasi</h6>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Karbohidrat</th>
                                <th scope="col">Protein</th>
                                <th scope="col">Lemak</th>
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
                    <h5 class="card-title">Langkah 4 : Tentukan solusi ideal positif dan negatif.</h5>
                    <p class="card-text">Alternatif ideal positif yaitu solusi dengan keuntungan maksimal pada setiap kriteria, sedangkan ideal negatif merupakan solusi dengan biaya terbesar pada setiap kriteria.  </p>
                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Solusi Ideal</th>
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
                    <h5 class="card-title">Langkah 5 : Hitung jarak dari solusi ideal positif dan solusi ideal negatif.</h5>

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
                    <h5 class="card-title">Langkah 6 : Hitung kedekatan relatif dengan solusi ideal positif.</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}

                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Nilai TOPSIS</th>
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
                    <h5 class="card-title">Langkah 7 : Urutkan alternatif yang memiliki nilai mendekati 1.</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                        content.</p> --}}

                    <table class="table table-bordered mb-4 ">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Nilai TOPSIS</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 0; $j < $JumlahData; $j++)
                                @if ($j == $UrutanAlternatif)
                                    <tr>
                                        <td><strong>R{{ $j+1 }}</strong></td>
                                        <td><strong>{{ number_format($KedekatanRelatifSolusiIdeal[$j],4,",",".") }}</strong></td>
                                        <td><strong>Nilai Terbesar</strong></td>
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
                                <th scope="col">Nomor Kombinasi</th>
                                <th scope="col">Makan Pagi</th>
                                <th scope="col">Snack 1</th>
                                <th scope="col">Makan Siang</th>
                                <th scope="col">Snack 2</th>
                                <th scope="col">Makan Malam</th>
                                <th scope="col">Keterangan</th>
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
                                        <td><strong>Menu Yang Direkomendasikan</strong></td>
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
