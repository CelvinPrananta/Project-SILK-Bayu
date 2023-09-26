@extends('layouts.master')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Manajemen Pengguna</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i
                                class="fa fa-plus"></i> Tambah Pengguna</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" id="user_name" name="user_name">
                        <label class="focus-label">User Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating" id="type_role">
                            <option selected disabled>-- Pilih Nama Role --</option>
                            @foreach ($role_name as $name)
                                <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Nama Role</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating" id="type_status">
                            <option selected disabled> -- Pilih --</option>
                            @foreach ($status_user as $status)
                                <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">Status</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <button type="sumit" class="btn btn-success btn-block btn_search"> Search </button>
                </div>
            </div>

            {{-- message --}}
            {!! Toastr::message() !!}

            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table" id="userDataList" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Role</th>
                                    <th>Posisi</th>
                                    <th>Divisi</th>
                                    <th>No. Telepon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Add User Modal -->
        <div id="add_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            id="" name="name" value="{{ old('name') }}"
                                            placeholder="Masukkan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Alamat Email </label>
                                    <input class="form-control" type="email" id="" name="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Peran </label>
                                    <select class="select" name="role_name" id="role_name">
                                        <option selected disabled> --Pilih --</option>
                                        @foreach ($role_name as $role)
                                            <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Posisi</label>
                                    <select class="select" name="position" id="position">
                                        <option selected disabled> --Pilih Posisi--</option>
                                        @foreach ($position as $positions)
                                            <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input class="form-control" type="tel" id="" name="phone"
                                            placeholder="Masukkan Nomor Telepon">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Divisi</label>
                                    <select class="select" name="department" id="department">
                                        <option selected disabled> --Pilih Divisi--</option>
                                        @foreach ($department as $departments)
                                            <option value="{{ $departments->department }}">{{ $departments->department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Status</label>
                                    <select class="select" name="status" id="status">
                                        <option selected disabled> --Pilih --</option>
                                        @foreach ($status_user as $status)
                                            <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Foto</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kata Sandi</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add User Modal -->

        <!-- Edit User Modal -->
        <div id="edit_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="e_id" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" name="name" id="e_name"
                                            value="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="email" id="e_email"
                                        value="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Role</label>
                                    <select class="select" name="role_name" id="e_role_name">
                                        @foreach ($role_name as $role)
                                            <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Posisi</label>
                                    <select class="select" name="position" id="e_position">
                                        @foreach ($position as $positions)
                                            <option value="{{ $positions->position }}">{{ $positions->position }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input class="form-control" type="text" id="e_phone_number" name="phone"
                                            placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Jabatan</label>
                                    <select class="select" name="department" id="e_department">
                                        @foreach ($department as $departments)
                                            <option value="{{ $departments->department }}">{{ $departments->department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Status</label>
                                    <select class="select" name="status" id="e_status">
                                        @foreach ($status_user as $status)
                                            <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Foto</label>
                                    <input class="form-control" type="file" id="image" name="images">
                                    <input type="hidden" name="hidden_image" id="e_image" value="">
                                </div>
                            </div>
                            <br>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->

        <!-- Unggah Dokumen Modal -->
        {{-- <div id="unggah_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Unggah Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('upload.pdf') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="e_id" value="">
                            <input type="file" name="pdf_file">
                            <br>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Unggah Dokumen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Edit Salary Modal -->

        <!-- Delete User Modal -->
        <div class="modal custom-modal fade" id="delete_user" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete User</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('user/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <input type="hidden" name="avatar" id="e_avatar" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit"
                                            class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete User Modal -->
    </div>
    <!-- /Page Wrapper -->
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            table = $('#userDataList').DataTable({

                lengthMenu: [
                    [10, 25, 50, 100, 150],
                    [10, 25, 50, 100, 150]
                ],
                buttons: [
                    'pageLength',
                ],
                "pageLength": 10,
                order: [
                    [5, 'desc']
                ],
                processing: true,
                serverSide: true,
                ordering: true,
                searching: true,
                ajax: {
                    url: "{{ route('get-users-data') }}",
                    data: function(data) {
                        // read valus for search
                        var user_name = $('#user_name').val();
                        var type_role = $('#type_role').val();
                        var type_status = $('#type_status').val();
                        data.user_name = user_name;
                        data.type_role = type_role;
                        data.type_status = type_status;
                    }
                },

                columns: [{
                        data: 'no',
                        name: 'no',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'join_date',
                        name: 'join_date',
                    },
                    {
                        data: 'role_name',
                        name: 'role_name',
                    },
                    {
                        data: 'position',
                        name: 'position',
                    },
                    {
                        data: 'department',
                        name: 'department',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ]
            });
            $('.btn_search').on('click', function() {
                table.draw();
            });
        });
    </script>

    {{-- update js --}}
    <script>
        $(document).on('click', '.userUpdate', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.user_id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_role_name').val(_this.find('.role_name').text()).change();
            $('#e_position').val(_this.find('.position').text()).change();
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_department').val(_this.find('.department').text());
            $('#e_status').val(_this.find('.status_s').text()).change();
            $('#e_image').val(_this.find('.avatar').data('avatar'));
        });
    </script>

    {{-- unggah js --}}
    <script>
        $(document).on('click', '.userUpload', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.user_id').text());
            $('#e_pdf').val(_this.find('.pdf').data('pdf'));
        });
    </script>

    {{-- delete js --}}
    <script>
        $(document).on('click', '.userDelete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').data('id'));
            $('#e_avatar').val(_this.find('.avatar').data('avatar'));
        });
    </script>
@endsection

@endsection
