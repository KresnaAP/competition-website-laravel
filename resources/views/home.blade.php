@extends('layouts.app')

@section('content')
    @include('layouts.headers.auth')

    <div class="container-fluid mt--7">
        <div class="card text-center">

            <div class="card-header">
                <h1>Certificate</h1>
            </div>
            <div class="card-body">
            @foreach($members as $member)
                <div class="row">
                    <div class="col">
                        <h2>{{ $member->name }}</h2>
                        <img src="https://sdm.mercubuana.ac.id/wp-content/plugins/post-grid/assets/frontend/css/images/placeholder.png" alt="image">
                    </div>
                </div>
                <hr class="my-5">
            @endforeach
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
