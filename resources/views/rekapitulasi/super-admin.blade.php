@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container px-4 mx-auto">
                                    {!! $chart->container() !!}
                                </div>
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    {!! $grafikAgama->container() !!}
                                </div>
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    {!! $grafikJenisKelamin->container() !!}
                                </div>
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    {!! $grafikPangkat->container() !!}
                                </div>

                            </div>

                            <script src="{{ $chart->cdn() }}"></script>
                            <script src="{{ $grafikAgama->cdn() }}"></script>
                            <script src="{{ $grafikJenisKelamin->cdn() }}"></script>
                            <script src="{{ $grafikPangkat->cdn() }}"></script>

                            {{ $chart->script() }}
                            {{ $grafikAgama->script() }}
                            {{ $grafikJenisKelamin->script() }}
                            {{ $grafikPangkat->script() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
    </div>
    </div>
    <!-- /Page Content -->
    </div>
@endsection
