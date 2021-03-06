@extends('layouts.app')

@section('content')
    @include('layouts.headers.auth')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="mx-2">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">Back</a>
                            </div>
                            <h3 class="col-4 mb-0">Edit User</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($user as $u)
                            <form method="post" action="{{ route('user.update') }}" class="mb-5" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="pl-lg-4">
                                    <input type="hidden" name="id" value="{{ $u->id }}"><br/>
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $u->name) }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $u->email) }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    @foreach ($u->members as $key => $member)
                                        <div class="form-group{{ $errors->has('member-'.$key) ? ' has-danger' : '' }}">
                                            <input type="hidden" name="memberid-{{ $key }}" value="{{ $member->id }}">
                                            <label class="form-control-label" for="input-member-{{ $key }}">{{ __('Team Member ').($key + 1) }}</label>
                                            <input type="text" name="member-{{ $key }}" id="input-member-{{ $key }}" class="form-control form-control-alternative{{ $errors->has('member-'.$key) ? ' is-invalid' : '' }}" placeholder="{{ __('Team Member ').($key + 1) }}" value="{{ old('name', $member->name) }}" required>
                                            @if ($errors->has('member-'.$key))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('member'-$key) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label small" for="input-certificate-{{ $key }}">Certificate for {{ $member->name }}</label>
                                            @if ($member->certificate)
                                                <div>
                                                    <embed src="{{ asset('storage').$member->certificate }}" width="100%">
                                                </div>
                                            @endif
                                            <input type="file" name="certificate-{{ $key }}" id="input-certificate-{{ $key }}" class="form-control-file" accept="application/pdf">
                                        </div>
                                    @endforeach

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                            <form method="post" action="{{ route('user.password') }}" class="mb-5" autocomplete="off">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                                @if (session('password_status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('password_status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="pl-lg-4">
                                    <input type="hidden" name="id" value="{{ $u->id }}"><br/>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
