@extends('layouts.app')

@section('title', 'Data Pelajar')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Data Pelajar</h3>
				<p class="text-subtitle text-muted">Halaman untuk manajemen data pelajar seperti melihat, mengubah dan
					menghapus.
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data Pelajar
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="iconly-boldProfile"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Laki-laki</h6>
						<h6 class="font-extrabold mb-0">{{ $genderCounts['male'] }}</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon red">
							<i class="iconly-boldProfile"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Perempuan</h6>
						<h6 class="font-extrabold mb-0">{{ $genderCounts['female'] }}</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Statistik Pelajar Per Jurusan</h5>
				<div class="accordion pt-3" id="studentPerSchoolClassAccordion">
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
								aria-expanded="true" aria-controls="collapseOne">
								Klik atau sentuh untuk menutup atau membuka statistik pelajar per jurusan
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show"
							data-bs-parent="#studentPerSchoolClassAccordion">
							<div class="accordion-body">
								<div class="row">
									@foreach ($studentWithMajors as $studentWithMajor)
									<div class="col-6 col-lg-4 col-md-4">
										<div class="card border">
											<div class="card-body px-3 py-4-4">
												<div class="row">
													<div class="col-md-4">
														<div class="stats-icon green">
															<i class="iconly-boldProfile"></i>
														</div>
													</div>
													<div class="col-md-8">
														<h6 class="text-muted font-semibold">{{ $studentWithMajor->name }}</h6>
														<h6 class="font-extrabold mb-0">{{ $studentWithMajor->students_count }}</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="col card">
					<div class="d-flex justify-content-end pb-3">
						<div class="btn-group gap gap-2">
							<form action="{{ route('students.export') }}">
								<button type="submit" class="btn btn-success icon icon-left">
									<i class="bi bi-filetype-xlsx"></i>
								</button>
							</form>

							<button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
								data-bs-target="#createModal">
								<i class="bi bi-plus-circle"></i> Tambah Data Pelajar
							</button>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>NIS/NISN/NIM</th>
									<th>Nama Lengkap</th>
									<th>Kelas</th>
									<th>Jurusan</th>
									<th>TA</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@pushOnce('modal')
@include('students.modal.create')
@include('students.modal.show')
@include('students.modal.edit')
@endPushOnce

@pushOnce('scripts')
@include('students.script')
@endPushOnce
