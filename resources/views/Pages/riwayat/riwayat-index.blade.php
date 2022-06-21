@extends('layouts.admin.app')

@section('title', 'Riwayat Penghitungan')
@section('subtitle', 'Data Riwayat')

@section('contents')

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Data Penghitungan</h5>
        </div>
        <div class="table-responsive mt-3">
            <table class="table align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Waktu Penghitungan</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Aktivitas</th>
                        <th>Kebutuhan Energi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($DataDiri as $Data)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $Data->created_at }}</td>
                        <td>{{ $Data->berat_badan }}</td>
                        <td>{{ $Data->tinggi_badan }}</td>
                        <td>{{ $Data->umur }}</td>
                        <td>{{ $Data->jenis_kelamin }}</td>
                        <td>{{ $Data->aktivitas_fisik }}</td>
                        <td>{{ $Data->kebutuhan_energi }}</td>

                        <td>
                            <a href="{{ route('riwayat.detail', $Data->kombinasiMenu_id) }}" class="text-primary">Lihat Detail</i></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
