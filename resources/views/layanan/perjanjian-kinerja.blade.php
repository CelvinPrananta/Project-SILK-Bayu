@extends('layouts.master')
@section('content')
@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://kit.fontawesome.com/abea6a9d41.js" crossorigin="anonymous"></script>
    <!-- checkbox style -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/checkbox-style.css') }}">
@endsection
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Perjanjian Kinerja</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Perjanjian Kinerja</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#daftar_layanan_Kinerja"><i
                            class="fa fa-plus"></i> Tambah Perjanjian Kinerja</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Cetak Dokumen Perjanjian PDF -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <select id="pilihDokumenPerjanjianKinerja" class="form-control">
                    <option selected disabled> --Pilih Dokumen Perjanjian Kinerja --</option>
                    @foreach ($data_kinerja_pdf as $kinerja)
                        <option value="{{ $kinerja->id }}">Dokumen Kinerja - {{ $kinerja->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-md-3">
                <button id="cetakDokumenPerjanjianKinerja" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i>
                    Dokumen
                    Perjanjian Kinerja</button>
            </div>
        </div><br>

        <!-- Search Filter -->
        <form action="" method="GET" id="search-form">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="name">
                        <label class="focus-label">Nama Pegawai</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="jenis_cuti">
                        <label class="focus-label">NIP</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="submit" class="btn btn-success btn-block btn_search">Cari</button>
                </div>
            </div>
        </form>
        <!-- Search Filter -->

        {{-- message --}}
        {!! Toastr::message() !!}

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th class="text-right no-sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_perjanjian_kinerja as $sqlkinerja => $result_perjanjian_kinerja)
                                <tr>
                                    <td>{{ ++$sqlkinerja }}</td>
                                    <td hidden class="id">{{ $result_perjanjian_kinerja->id }}</td>
                                    <td class="name">{{ $result_perjanjian_kinerja->name }}</td>
                                    <td class="nip">{{ $result_perjanjian_kinerja->nip }}</td>
                                    <td class="jabatan">{{ $result_perjanjian_kinerja->jabatan }}</td>
                                    <td hidden class="bentuk_perjanjian">
                                        {{ $result_perjanjian_kinerja->bentuk_perjanjian }}</td>

                                    {{-- Edit Layanan KGB --}}
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit_Kinerja" href="#" data-toggle="modal"
                                                    data-target="#edit_Kinerja"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a class="dropdown-item delete_kinerja" href="#"
                                                    data-toggle="modal" data-target="#delete_kinerja"><i
                                                        class="fa fa-trash-o m-r-5"></i>Delete</a>
                                                <a href="{{ route('layanan-perjanjian-kinerja-admin', ['id' => $result_perjanjian_kinerja->id]) }}"
                                                    target="_blank" class="dropdown-item cetak-kinerja">
                                                    <i class="fa fa-print m-r-5"></i>Cetak
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Tambah Layanan Cuti Modal -->
    <div id="daftar_layanan_Kinerja" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Perjanjian Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('layanan/perjanjian-kinerja/tambah-data') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bentuk_perjanjian">Bentuk Perjanjian</label>
                                    <textarea class="form-control" id="bentuk_perjanjian" name="bentuk_perjanjian" rows="10"
                                        placeholder="Tulis bentuk perjanjian di sini... CONTOH:
                1. Melaksanakan tugas sesuai dengan SPK dan RKK
                2. Berperan serta dalam meningkatkan mutu pelayanan dan keselamatan pasien
                3. Berperan serta dalam mewujudkan visi misi rumah sakit."></textarea>
                                </div>
                            </div>
                        </div>
                        @foreach($data_profilpegawai as $profil_pegawai)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="name" value="{{ $profil_pegawai->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nip" value="{{ $profil_pegawai->nip }}">
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($data_posisijabatan as $posisi_jabatan)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ $posisi_jabatan->jabatan }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /Tambah Layanan Cuti Modal -->

    <!-- Edit Layanan Cuti Modal -->
    <div id="edit_Kinerja" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Perjanjian Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('layanan/perjanjian-kinerja/edit-data') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="e_id">
                        <div class="form-group">
                            <label>Bentuk Perjanjian</label>
                            <textarea type="text" class="form-control" name="bentuk_perjanjian" id="e_bentuk_perjanjian" rows="10"
                                value=""></textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Layanan Cuti Modal -->

    <!-- Delete Perjanjian Modal -->
    <div class="modal custom-modal fade" id="delete_kinerja" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Perjanjian Kinerja</h3>
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('layanan/perjanjian-kinerja/hapus-data') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="e_id" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit"
                                        class="btn btn-primary continue-btn submit-btn">Hapus</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Perjanjian Modal -->
</div>
<!-- /Page Wrapper -->

@section('script')
    <script>
        $('#name').on('change', function() {
            $('#user_id').val($(this).find(':selected').data('user_id'));
            $('#nip').val($(this).find(':selected').data('nip'));
            $('#jabatan').val($(this).find(':selected').data('jabatan'));
        });
    </script>

    <script>
        $(document).on('click', '.edit_Kinerja', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_bentuk_perjanjian').val(_this.find('.bentuk_perjanjian').text());
        });
    </script>

    <script>
        $(document).on("click", ".delete_kinerja", function() {
            var _this = $(this).parents("tr");
            $(".e_id").val(_this.find(".id").text());
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#pilihDokumenPerjanjianKinerja').select2();
            $('#cetakDokumenPerjanjianKinerja').on('click', function() {
                const selectedKinerjaId = $('#pilihDokumenPerjanjianKinerja').val();
                if (selectedKinerjaId) {
                    const url = "{{ route('layanan-perjanjian-kinerja-admin', ['id' => ':id']) }}".replace(
                        ':id', selectedKinerjaId);
                    window.open(url, '_blank');
                }
            });
        });
    </script>
@endsection
@endsection
