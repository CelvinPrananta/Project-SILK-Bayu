@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt=""
                                                src="{{ URL::to('/assets/images/' . $users->avatar) }}"
                                                alt="{{ $users->name }}"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $users->name }}</h3>
                                                <h6 class="text-muted"> {{ $users->department }}</h6>
                                                <small class="text-muted">{{ $users->position }}</small>
                                                <div class="staff-id">Employee ID : {{ $users->user_id }}</div>
                                                <div class="small doj text-muted">Date of Join : {{ $users->join_date }}
                                                </div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send
                                                        Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text">
                                                        @if (!empty($users->phone_number))
                                                            <a>{{ $users->phone_number }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text">
                                                        @if (!empty($users->email))
                                                            <a>{{ $users->email }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">
                                                        @if (!empty($users->birth_date))
                                                            <a>{{ $users->birth_date }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">
                                                        @if (!empty($users->address))
                                                            <a>{{ $users->address }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">
                                                        @if (!empty($users->gender))
                                                            <a>{{ $users->gender }}</a>
                                                        @else
                                                            <a>N/A</a>
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="{{ URL::to('/assets/images/' . $users->avatar) }}"
                                                                    alt="{{ $users->name }}">
                                                            </div>
                                                        </div>
                                                        <a>{{ $users->name }}</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon"
                                        href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab"
                                    class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#riwayat_pendidikan" data-toggle="tab" class="nav-link">Riwayat
                                    Pendidikan</a>
                            </li>
                            <li class="nav-item"><a href="#riwayat_golongan" data-toggle="tab" class="nav-link">Riwayat
                                    Golongan</a>
                            </li>
                            <li class="nav-item"><a href="#riwayat_jabatan" data-toggle="tab" class="nav-link">Riwayat
                                    Jabatan</a>
                            </li>
                            <li class="nav-item"><a href="#riwayat_diklat" data-toggle="tab" class="nav-link">Riwayat
                                    Diklat</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Passport No.</div>
                                            @if (!empty($users->passport_no))
                                                <div class="text">{{ $users->passport_no }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Passport Exp Date.</div>
                                            @if (!empty($users->passport_expiry_date))
                                                <div class="text">{{ $users->passport_expiry_date }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tel</div>
                                            @if (!empty($users->tel))
                                                <div class="text">{{ $users->tel }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nationality</div>
                                            @if (!empty($users->nationality))
                                                <div class="text">{{ $users->nationality }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            @if (!empty($users->religion))
                                                <div class="text">{{ $users->religion }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            @if (!empty($users->marital_status))
                                                <div class="text">{{ $users->marital_status }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Employment of spouse</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">No. of children</div>
                                            @if ($users->children != null)
                                                <div class="text">{{ $users->children }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#emergency_contact_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Primary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            @if (!empty($users->name_primary))
                                                <div class="text">{{ $users->name_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            @if (!empty($users->relationship_primary))
                                                <div class="text">{{ $users->relationship_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                    <hr>
                                    <h5 class="section-title">Secondary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            @if (!empty($users->name_secondary))
                                                <div class="text">{{ $users->name_secondary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            @if (!empty($users->relationship_secondary))
                                                <div class="text">{{ $users->relationship_secondary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            @if (!empty($users->phone_secondary) && !empty($users->phone_2_secondary))
                                                <div class="text">
                                                    {{ $users->phone_secondary }},{{ $users->phone_2_secondary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Bank information</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Bank name</div>
                                            <div class="text">ICICI Bank</div>
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            <div class="text">159843014641</div>
                                        </li>
                                        <li>
                                            <div class="title">IFSC Code</div>
                                            <div class="text">ICI24504</div>
                                        </li>
                                        <li>
                                            <div class="title">PAN No</div>
                                            <div class="text">TC000Y56</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#family_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relationship</th>
                                                    <th>Date of Birth</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Leo</td>
                                                    <td>Brother</td>
                                                    <td>Feb 16th, 2019</td>
                                                    <td>9876543210</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a aria-expanded="false" data-toggle="dropdown"
                                                                class="action-icon dropdown-toggle" href="#"><i
                                                                    class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                <a href="#" class="dropdown-item"><i
                                                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#education_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science (UG)</a>
                                                        <div>Bsc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">International College of Arts and
                                                            Science (PG)</a>
                                                        <div>Msc Computer Science</div>
                                                        <span class="time">2000 - 2003</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#experience_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Zen
                                                            Corporation</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">Web Designer at Dalt
                                                            Technology</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->

                <!-- Informasi Riwayat Pendidikan Tab -->
                <div id="riwayat_pendidikan" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Riwayat Pendidikan <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Tingkat Pendidikan</div>
                                            @if (!empty($users->passport_no))
                                                <div class="text">{{ $users->passport_no }}</div>
                                            @else
                                                <div class="text">Tingkat Pendidikan</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Pendidikan</div>
                                            @if (!empty($users->passport_expiry_date))
                                                <div class="text">{{ $users->passport_expiry_date }}</div>
                                            @else
                                                <div class="text">Pendidikan</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tahun Lulus</div>
                                            @if (!empty($users->tel))
                                                <div class="text">{{ $users->tel }}</div>
                                            @else
                                                <div class="text">Tahun Lulus</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nomor Ijazah</div>
                                            @if (!empty($users->nationality))
                                                <div class="text">{{ $users->nationality }}</div>
                                            @else
                                                <div class="text">Nomor Ijazah</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Gelar Depan</div>
                                            @if (!empty($users->religion))
                                                <div class="text">{{ $users->religion }}</div>
                                            @else
                                                <div class="text">Gelar Depan</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Gelar Belakang</div>
                                            @if (!empty($users->marital_status))
                                                <div class="text">{{ $users->marital_status }}</div>
                                            @else
                                                <div class="text">Gelar Belakang</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Jenis Pendidikan</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">Jenis Pendidikan</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Transkrip</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">Dokumen Transkrip</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Ijazah</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">Dokumen Ijazah</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Gelar</div>
                                            @if (!empty($users->employment_of_spouse))
                                                <div class="text">{{ $users->employment_of_spouse }}</div>
                                            @else
                                                <div class="text">Dokumen Gelar</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Informasi Riwayat Pendidikan Tab -->

                <!-- Informasi Riwayat Golongan Tab -->
                <div id="riwayat_golongan" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Riwayat Golongan <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#emergency_contact_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Golongan </div>
                                            @if (!empty($users->name_primary))
                                                <div class="text">{{ $users->name_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Jenis Kenaikan Pangkat (KP) </div>
                                            @if (!empty($users->relationship_primary))
                                                <div class="text">{{ $users->relationship_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Masa Kerja Golongan (Tahun) </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Masa Kerja Golongan (Bulan) </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">TMT Golongan </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nomor Pertimbangan Teknis BKN </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tanggal Pertimbangan Teknis BKN </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nomor SK </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tanggal SK </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen SK KP </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Pertimbangan Teknis KP </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Informasi Riwayat Golongan Tab -->

                <!-- Informasi Riwayat Jabatan Tab -->
                <div id="riwayat_jabatan" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Riwayat Jabatan <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#riwayat_jabatan"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Jenis Jabatan </div>
                                            @if (!empty($users->name_primary))
                                                <div class="text">{{ $users->name_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Satuan Kerja </div>
                                            @if (!empty($users->relationship_primary))
                                                <div class="text">{{ $users->relationship_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Satuan Kerja Induk </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Unit Organisasi </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nomor SK </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tanggal SK </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">TMT Jabatan </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">TMT Pelantikan </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen SK Jabatan </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Surat Pelantikan </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Informasi Riwayat Jabatan Tab -->

                <!-- Informasi Riwayat Diklat Tab -->
                <div id="riwayat_diklat" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Riwayat Diklat <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#riwayat_diklat"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Jenis Diklat </div>
                                            @if (!empty($users->name_primary))
                                                <div class="text">{{ $users->name_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nama Diklat </div>
                                            @if (!empty($users->relationship_primary))
                                                <div class="text">{{ $users->relationship_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Institusi Penyelenggara </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Nomor Sertifikat </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tanggal Mulai </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tanggal Selesai </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Tahun Diklat </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Durasi Jam </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                        <li>
                                            <div class="title">Dokumen Sertifikat Diklat </div>
                                            @if (!empty($users->phone_primary) && !empty($users->phone_2_primary))
                                                <div class="text">
                                                    {{ $users->phone_primary }},{{ $users->phone_2_primary }}</div>
                                            @else
                                                <div class="text">N/A</div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Informasi Riwayat Diklat Tab -->

            </div>
        </div>
        <!-- /Page Content -->

        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile/information/save') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ URL::to('/assets/images/' . $users->avatar) }}"
                                            alt="{{ $users->name }}">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="image" name="images">
                                            @if (!empty($users))
                                                <input type="hidden" name="hidden_image" id="e_image"
                                                    value="{{ $users->avatar }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $users->name }}">
                                                <input type="hidden" class="form-control" id="user_id" name="user_id"
                                                    value="{{ $users->user_id }}">
                                                <input type="hidden" class="form-control" id="email" name="email"
                                                    value="{{ $users->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    @if (!empty($users))
                                                        <input class="form-control datetimepicker" type="text"
                                                            id="birthDate" name="birthDate"
                                                            value="{{ $users->birth_date }}">
                                                    @else
                                                        <input class="form-control datetimepicker" type="text"
                                                            id="birthDate" name="birthDate">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    @if (!empty($users))
                                                        <option value="{{ $users->gender }}"
                                                            {{ $users->gender == $users->gender ? 'selected' : '' }}>
                                                            {{ $users->gender }} </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    @else
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $users->address }}">
                                        @else
                                            <input type="text" class="form-control" id="address" name="address">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="{{ $users->state }}">
                                        @else
                                            <input type="text" class="form-control" id="state" name="state">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="" name="country"
                                                value="{{ $users->country }}">
                                        @else
                                            <input type="text" class="form-control" id="" name="country">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pin Code</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="pin_code" name="pin_code"
                                                value="{{ $users->pin_code }}">
                                        @else
                                            <input type="text" class="form-control" id="pin_code" name="pin_code">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        @if (!empty($users))
                                            <input type="text" class="form-control" id="phoneNumber"
                                                name="phone_number" value="{{ $users->phone_number }}">
                                        @else
                                            <input type="text" class="form-control" id="phoneNumber"
                                                name="phone_number">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            @if (!empty($users))
                                                <option value="{{ $users->department }}"
                                                    {{ $users->department == $users->department ? 'selected' : '' }}>
                                                    {{ $users->department }} </option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Marketing</option>
                                            @else
                                                <option value="Web Development">Web Development</option>
                                                <option value="IT Management">IT Management</option>
                                                <option value="Marketing">Marketing</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <select class="select" id="designation" name="designation">
                                            @if (!empty($users))
                                                <option value="{{ $users->designation }}"
                                                    {{ $users->designation == $users->designation ? 'selected' : '' }}>
                                                    {{ $users->designation }} </option>
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                            @else
                                                <option value="Web Designer">Web Designer</option>
                                                <option value="Web Developer">Web Developer</option>
                                                <option value="Android Developer">Android Developer</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reports To <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to">
                                            @if (!empty($users))
                                                <option value="{{ $users->reports_to }}"
                                                    {{ $users->reports_to == $users->reports_to ? 'selected' : '' }}>
                                                    {{ $users->reports_to }} </option>
                                                @foreach ($user as $users)
                                                    <option value="{{ $users->name }}">{{ $users->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($user as $users)
                                                    <option value="{{ $users->name }}">{{ $users->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
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
        <!-- /Profile Modal -->

        <!-- Edit Riwayat Pendidikan Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Riwayat Pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ $users->user_id }}"
                                readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tingkat Pendidikan <span class="text-danger">*</span></label>
                                        <select class="select form-control @error('marital_status') is-invalid @enderror"
                                            name="marital_status">
                                            <option value="{{ $users->marital_status }}"
                                                {{ $users->marital_status == $users->marital_status ? 'selected' : '' }}>
                                                {{ $users->marital_status }} </option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="Diploma I">Diploma I</option>
                                            <option value="Diploma II">Diploma II</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan <span class="text-danger">*</span></label>
                                        <input class="form-control @error('passport_expiry_date') is-invalid @enderror"
                                            type="text" name="passport_expiry_date"
                                            value="{{ $users->passport_expiry_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Lulus <span class="text-danger">*</span></label>
                                        <input class="form-control @error('tel') is-invalid @enderror" type="text"
                                            name="tel" value="{{ $users->tel }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Ijazah <span class="text-danger">*</span></label>
                                        <input class="form-control @error('nationality') is-invalid @enderror"
                                            type="text" name="nationality" value="{{ $users->nationality }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gelar Depan <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control @error('religion') is-invalid @enderror"
                                                type="text" name="religion" value="{{ $users->religion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gelar Belakang <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control @error('religion') is-invalid @enderror"
                                                type="text" name="religion" value="{{ $users->religion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Pendidikan</label>
                                        <input class="form-control @error('employment_of_spouse') is-invalid @enderror"
                                            type="text" name="employment_of_spouse"
                                            value="{{ $users->employment_of_spouse }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumen Transkrip </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="file"
                                            name="children" value="{{ $users->children }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumen Ijazah </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="file"
                                            name="children" value="{{ $users->children }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumen Gelar </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="file"
                                            name="children" value="{{ $users->children }}">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Riwayat Pendidikan Modal -->

        <!-- Edit Riwayat Golongan Modal -->
        <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Riwayat Golongan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="validation" action="{{ route('user/profile/emergency/contact/save') }}"
                            method="POST">
                            @csrf
                            <input type="text" class="form-control" name="user_id" value="{{ $users->user_id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Golongan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jenis Kenaikan Pangkat (KP) <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Masa Kerja Golongan (Tahun) <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Masa Kerja Golongan (Bulan) <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TMT Golongan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Pertimbangan Teknis BKN <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Pertimbangan Teknis BKN <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor SK <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal SK <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dokumen SK KP <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="file" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="file" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dokumen Pertimbangan Teknis KP <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="file" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="file" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
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
        <!-- /Edit Riwayat Golongan Modal -->

        <!-- Edit Riwayat Jabatan Modal -->
        <div id="riwayat_jabatan" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Riwayat Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="validation" action="{{ route('user/profile/emergency/contact/save') }}"
                            method="POST">
                            @csrf
                            <input type="text" class="form-control" name="user_id" value="{{ $users->user_id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jenis Jabatan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Satuan Kerja <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Satuan Kerja Induk <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Unit Organisasi <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor SK <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal SK <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TMT Jabatan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TMT Pelantikan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dokumen SK Jabatan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="file" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="file" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dokumen Surat Pelantikan <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="file" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="file" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
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
        <!-- /Edit Riwayat Jabatan Modal -->

        <!-- Edit Riwayat Diklat Modal -->
        <div id="riwayat_diklat" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Riwayat Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="validation" action="{{ route('user/profile/emergency/contact/save') }}"
                            method="POST">
                            @csrf
                            <input type="text" class="form-control" name="user_id" value="{{ $users->user_id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jenis Diklat <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Diklat <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Institusi Penyelenggara <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Sertifikat <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Mulai <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Selesai <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tahun Diklat <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Durasi Jam <span class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="text" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="text" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dokumen Sertifikat Diklat <span
                                                        class="text-danger">*</span></label>
                                                @if (!empty($users->name_primary))
                                                    <input type="file" class="form-control" name="name_primary"
                                                        value="{{ $users->name_primary }}">
                                                @else
                                                    <input type="file" class="form-control" name="name_primary">
                                                @endif
                                                </li>
                                            </div>
                                        </div>
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
        <!-- /Edit Riwayat Diklat Modal -->

        <!-- Family Info Modal -->
        <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Family Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Member <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of birth <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of birth <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Family Info Modal -->

        <!-- Education Modal -->
        <div id="education_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Education Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Oxford University"
                                                        class="form-control floating">
                                                    <label class="focus-label">Institution</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Computer Science"
                                                        class="form-control floating">
                                                    <label class="focus-label">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="01/06/2002"
                                                            class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Starting Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="31/05/2006"
                                                            class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Complete Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="BE Computer Science"
                                                        class="form-control floating">
                                                    <label class="focus-label">Degree</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Grade A"
                                                        class="form-control floating">
                                                    <label class="focus-label">Grade</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Oxford University"
                                                        class="form-control floating">
                                                    <label class="focus-label">Institution</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Computer Science"
                                                        class="form-control floating">
                                                    <label class="focus-label">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="01/06/2002"
                                                            class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Starting Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <div class="cal-icon">
                                                        <input type="text" value="31/05/2006"
                                                            class="form-control floating datetimepicker">
                                                    </div>
                                                    <label class="focus-label">Complete Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="BE Computer Science"
                                                        class="form-control floating">
                                                    <label class="focus-label">Degree</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus focused">
                                                    <input type="text" value="Grade A"
                                                        class="form-control floating">
                                                    <label class="focus-label">Grade</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Education Modal -->

        <!-- Experience Modal -->
        <div id="experience_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Experience Informations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="Digital Devlopment Inc">
                                                    <label class="focus-label">Company Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="United States">
                                                    <label class="focus-label">Location</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="Web Developer">
                                                    <label class="focus-label">Job Position</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text"
                                                            class="form-control floating datetimepicker"
                                                            value="01/07/2007">
                                                    </div>
                                                    <label class="focus-label">Period From</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text"
                                                            class="form-control floating datetimepicker"
                                                            value="08/06/2018">
                                                    </div>
                                                    <label class="focus-label">Period To</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                                class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="Digital Devlopment Inc">
                                                    <label class="focus-label">Company Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="United States">
                                                    <label class="focus-label">Location</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <input type="text" class="form-control floating"
                                                        value="Web Developer">
                                                    <label class="focus-label">Job Position</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text"
                                                            class="form-control floating datetimepicker"
                                                            value="01/07/2007">
                                                    </div>
                                                    <label class="focus-label">Period From</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-focus">
                                                    <div class="cal-icon">
                                                        <input type="text"
                                                            class="form-control floating datetimepicker"
                                                            value="08/06/2018">
                                                    </div>
                                                    <label class="focus-label">Period To</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Experience Modal -->
        <!-- /Page Content -->
    </div>
@section('script')
    <script>
        $('#validation').validate({
            rules: {
                name_primary: 'required',
                relationship_primary: 'required',
                phone_primary: 'required',
                phone_2_primary: 'required',
                name_secondary: 'required',
                relationship_secondary: 'required',
                phone_secondary: 'required',
                phone_2_secondary: 'required',
            },
            messages: {
                name_primary: 'Please input name primary',
                relationship_primary: 'Please input relationship primary',
                phone_primary: 'Please input phone primary',
                phone_2_primary: 'Please input phone 2 primary',
                name_secondary: 'Please input name secondary',
                relationship_secondary: 'Please input relationship secondary',
                phone_secondaryr: 'Please input phone secondary',
                phone_2_secondary: 'Please input phone 2 secondary',
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>
@endsection
@endsection
