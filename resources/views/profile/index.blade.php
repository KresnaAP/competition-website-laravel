@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello,') . ' '. auth()->user()->name,
        'description' => __('Welcome to your profile page. Here you can see the details of your team members'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Team information') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="form-control-label">{{ __('Team Name') }}</label>
                        <div  class="form-control form-control-alternative">
                            {{ auth()->user()->name }}
                        </div>

                        @foreach(auth()->user()->members as $key => $member)
                            <label class="form-control-label mt-4">{{ __('Team Member ').($key + 1) }}</label>
                            <div  class="form-control form-control-alternative">
                                {{ $member->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
