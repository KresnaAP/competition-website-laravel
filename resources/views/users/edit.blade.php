<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body>
    <h3>Edit User</h3>

    <a href="/user" class="btn btn-primary">Back</a>
    
    <br/>
    <br/>

    @foreach($user as $u)
    <form action="/user/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $u->id }}"> <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    Name <input type="text" class="form-control form-control-alternative" required="required" name="name" value="{{ $u->name }}"> <br/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    Email <input type="email" class="form-control form-control-alternative" required="required" name="email" value="{{ $u->email }}"> <br/>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
    </form>
    @endforeach

</body>
</html>