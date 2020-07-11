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
	<div class="border border-primary rounded bg-primary">
		<h3 class="text-center mt-4">Add User</h3>

		<a href="/user" class="btn btn-default">Back</a>
		
		<br/>
		<br/>

		<form action="/user/store" method="post">
			@csrf
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="form-group">
						<label class="text-light">Name</label> 
						<input type="text" class="form-control form-control-alternative" required="required" name="name" placeholder="Name"> <br/>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="form-group">
						<label class="text-light">Email</label> 
						<input type="email" class="form-control form-control-alternative" required="required" name="email" placeholder="Email"> <br/>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="form-group">
						<label class="text-light">Password</label> 
						<input type="password" class="form-control form-control-alternative" required="required" name="password" placeholder="Password"> <br/>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<button type="submit" class="btn btn-success mb-4">{{ __('Save') }}</button>
			</div>
		</form>
	</div>
</body>
</html>