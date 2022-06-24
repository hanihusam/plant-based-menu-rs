@extends('layouts.admin.app')

@section('title', 'Food Menu Data')
@section('subtitle', 'Import Data')

@section('contents')


@if (session()->has('message'))
<div class="alert alert-dismissible fade show py-2 bg-success">
    <div class="d-flex align-items-center">
        <div class="fs-3 text-white">
            <ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated"
                aria-label="checkmark circle sharp"></ion-icon>
        </div>
        <div class="ms-3">
            <div class="text-white">{{ session('message') }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="row">
    <div class="col-xl-8 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Food Menu Data Import</h6>
                    <hr>

                    <form class="row g-3"  method="post" action="{{ route('import_excel') }}" enctype="multipart/form-data">
						{{ csrf_field() }}


                        <div class="col-12">
                            <label for="formFile" class="form-label">Food Menu Master Data Import (Excel)</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                            @error('file')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0">Menu list</h5>
            <form class="ms-auto position-relative">
                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                    <ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon>
                </div>
                {{-- <input class="form-control ps-5" type="text" placeholder="search"> --}}
            </form>
        </div>
        <div class="table-responsive mt-3">
            <table class="table align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>No.</th>
                        <th>Menu Name</th>
                        <th>Calories</th>
                        <th>Carbohydrates</th>
                        <th>Proteins</th>
                        <th>Fat</th>
                        <th>Serving</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1 ?>
                    @foreach($MenuMakanan as $Makanan)

                    <tr>
                        <td>{{ $i }} <?php $i++ ?></td>
                        <td>{{ $Makanan->nama_menu }}</td>
                        <td>{{ $Makanan->kalori }}</td>
                        <td>{{ $Makanan->karbohidrat }}</td>
                        <td>{{ $Makanan->protein }}</td>
                        <td>{{ $Makanan->lemak }}</td>
                        <td>{{ $Makanan->sajian }}</td>
                        {{-- <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="{{ route('dataMenu.detail', $Makanan->id) }}" class="text-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="Views"
                                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="Edit"
                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
{{--

<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form> --}}
