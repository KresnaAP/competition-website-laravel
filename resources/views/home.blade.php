@extends('layouts.app')

@section('content')
    @include('layouts.headers.auth')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        First Member
                    </div>
                    <div class="card-body">
                        <img src="https://sdm.mercubuana.ac.id/wp-content/plugins/post-grid/assets/frontend/css/images/placeholder.png" alt="image">
                    </div>
                    <div class="card-footer text-muted">
                        Certificate
                    </div>
                  </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        Second Member
                    </div>
                    <div class="card-body">
                        <img src="https://sdm.mercubuana.ac.id/wp-content/plugins/post-grid/assets/frontend/css/images/placeholder.png" alt="image">
                    </div>
                    <div class="card-footer text-muted">
                        Certificate
                    </div>
                  </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        Third Member
                    </div>
                    <div class="card-body">
                        <img src="https://sdm.mercubuana.ac.id/wp-content/plugins/post-grid/assets/frontend/css/images/placeholder.png" alt="image">
                    </div>
                    <div class="card-footer text-muted">
                        Certificate
                    </div>
                  </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
