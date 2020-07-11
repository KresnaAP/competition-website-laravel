<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
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
	<h3>Add User</h3>

	<a href="/user" class="btn btn-primary">Back</a>
	
	<br/>
	<br/>

	<form action="/user/store" method="post">
		@csrf
		<div class="row">
    		<div class="col-md-4">
      			<div class="form-group">
				  	Name <input type="text" class="form-control form-control-alternative" required="required" name="name" placeholder="Name"> <br/>
      			</div>
    		</div>
		</div>
		<div class="row">
    		<div class="col-md-4">
      			<div class="form-group">
				  	Email <input type="email" class="form-control form-control-alternative" required="required" name="email" placeholder="Email"> <br/>
				</div>
    		</div>
		</div>
		<div class="row">
    		<div class="col-md-4">
      			<div class="form-group">
					Password <input type="password" class="form-control form-control-alternative" required="required" name="password" placeholder="Password"> <br/>
				</div>
    		</div>
		</div>
    	<button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
	</form>

</body>
</html>