@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Riwayat Diklat</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Informasi Riwayat</a></li>
                            <li class="breadcrumb-item active">Riwayat Diklat</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_expense"><i
                                class="fa fa-plus"></i> Tambah Riwayat Diklat</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="Diklat">Diklat</th>
                                    <th class="jenis_kenaikan_pangkat">Jenis Kenaikan Pangkat (KP)</th>
                                    <th class="jenis_kerja_Diklat_tahun">Masa Kerja Diklat (Tahun)</th>
                                    <th class="jenis_kerja_Diklat_bulan">Masa Kerja Diklat (Bulan)</th>
                                    <th class="tmt_Diklat">TMT Diklat</th>
                                    <th class="no_teknis_bkn">No Teknis BKN</th>
                                    <th class="tanggal_teknis_bkn">Tanggal Teknis BKN</th>
                                    <th class="no_sk">No SK</th>
                                    <th class="tanggal_sk">Tanggal SK</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td hidden class="id">{{ $item->id }}</td>
                                        <td class="item_name">{{ $item->item_name }}</td>
                                        <td class="purchase_from">{{ $item->purchase_from }}</td>
                                        <td class="purchase_date">{{ $item->purchase_date }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-xs"><img
                                                        src="{{ URL::to('/assets/images/' . $item->attachments) }}"
                                                        alt=""></a>
                                                <a href="profile.html">{{ $item->purchased_by }}</a>
                                        <td hidden class="purchased_by">{{ $item->purchased_by }}</td>
                                        </h2>
                                        </td>
                                        <td class="amount">{{ $item->amount }}</td>
                                        <td class="paid_by">{{ $item->paid_by }}</td>
                                        <td hidden class="status">{{ $item->status }}</td>
                                        <td hidden class="attachments">{{ $item->attachments }}</td>
                                        <td class="text-center">
                                            <div class="dropdown action-label">
                                                @if ($item->status == 'Pending')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> {{ $item->status }}
                                                    </a>
                                                @endif
                                                @if ($item->status == 'Approved')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-success"></i> {{ $item->status }}
                                                    </a>
                                                @endif
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-danger"></i> Pending</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item edit_expense" href="#" data-toggle="modal"
                                                        data-target="#edit_expense"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item delete_expense" href="#"
                                                        data-toggle="modal" data-target="#delete_expense"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Tambah Riwayat Modal -->
        <div id="add_expense" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Riwayat Diklat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('expenses/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diklat</label>
                                        <input class="form-control" type="text" name="Diklat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kenaikan Pangkat (KP)</label>
                                        <input class="form-control" type="text" name="jenis_kenaikan_pangkat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Masa Kerja Diklat (Tahun)</label>
                                        <input class="form-control" type="text" name="masa_kerja_Diklat_tahun">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Masa Kerja Diklat (Bulan)</label>
                                        <input class="form-control" type="text" name="masa_kerja_Diklat_bulan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TMT Diklat</label>
                                        <input class="form-control" type="text" name="tmt_Diklat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Pertimbangan Teknis BKN</label>
                                        <input class="form-control" type="text" name="no_teknis_bkn">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Pertimbangan Teknis BKN</label>
                                        <input class="form-control" type="text" name="tanggal_teknis_bkn">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor SK</label>
                                        <input class="form-control" type="text" name="no_sk">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal SK</label>
                                        <input class="form-control" type="text" name="tanggal_sk">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumen</label>
                                        <input class="form-control" type="file" name="dokumen">
                                    </div>
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
        <!-- /Add Expense Modal -->

        <!-- Edit Riwayat Diklat Modal -->
        <div id="edit_expense" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Riwayat Diklat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('expenses/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="e_id" value="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tingkat Diklat</label>
                                        <input class="form-control" type="text" name="tingkat_Diklat"
                                            id="e_tingkat_Diklat" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase From</label>
                                        <input class="form-control" type="text" name="purchase_from"
                                            id="e_purchase_from" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text"
                                                name="purchase_date" id="e_purchase_date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchased By</label>
                                        <select class="select" name="purchased_by" id="e_purchased_by">
                                            <option>Daniel Porter</option>
                                            <option>Roger Dixon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" type="text" name="amount" id="e_amount"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Paid By</label>
                                        <select class="select" name="paid_by" id="e_paid_by">
                                            <option>Cash</option>
                                            <option>Cheque</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="select" name="status" id="e_status">
                                            <option>Pending</option>
                                            <option>Approved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Attachments</label>
                                        <input class="form-control" type="file" id="attachments" name="attachments">
                                        <input type="hidden" name="hidden_attachments" id="e_attachments"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Expense Modal -->

        <!-- Delete Expense Modal -->
        <div class="modal custom-modal fade" id="delete_expense" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Expense</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('expenses/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <input type="hidden" name="attachments" class="d_attachments" value="">
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
        <!-- Delete Expense Modal -->

    </div>
    <!-- /Page Wrapper -->

@section('script')
    {{-- update js --}}
    <script>
        $(document).on('click', '.edit_expense', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_item_name').val(_this.find('.item_name').text());
            $('#e_purchase_from').val(_this.find('.purchase_from').text());
            $('#e_purchase_date').val(_this.find('.purchase_date').text());
            $('#e_amount').val(_this.find('.amount').text());
            $('#e_attachments').val(_this.find('.attachments').text());

            var purchased_by = (_this.find(".purchased_by").text());
            var _option = '<option selected value="' + purchased_by + '">' + _this.find('.purchased_by').text() +
                '</option>'
            $(_option).appendTo("#e_purchased_by");

            var paid_by = (_this.find(".paid_by").text());
            var _option = '<option selected value="' + paid_by + '">' + _this.find('.paid_by').text() + '</option>'
            $(_option).appendTo("#e_paid_by");

            var status = (_this.find(".status").text());
            var _option = '<option selected value="' + status + '">' + _this.find('.status').text() + '</option>'
            $(_option).appendTo("#e_status");
        });
    </script>
    {{-- delete model --}}
    <script>
        $(document).on('click', '.delete_expense', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.d_attachments').val(_this.find('.attachments').text());
        });
    </script>
@endsection
@endsection
