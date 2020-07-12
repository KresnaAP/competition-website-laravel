
@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="mx-2">
                                <a href="/user" class="btn btn-sm btn-default">Back</a>
                            </div>
                            <h3 class="col-4 mb-0">Edit User</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($user as $u)
                        <form action="/user/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $u->id }}"> <br/>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Name</label> 
                                        <input type="text" class="form-control form-control-alternative" required="required" name="name" value="{{ $u->name }}"> <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" class="form-control form-control-alternative" required="required" name="email" value="{{ $u->email }}"> <br/>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-success mb-4">{{ __('Save') }}</button>
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