<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
</head>
<body>
	<h3>Add User</h3>

	<a href="/user">Back</a>
	
	<br/>
	<br/>

	<form action="/user/store" method="post">
		@csrf
		Name <input type="text" required="required" name="name" placeholder="Name"> <br/>
		Email <input type="email" required="required" name="email" placeholder="Email"> <br/>
		Password <input type="password" required="required" name="password" placeholder="Password"> <br/>
    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
	</form>

</body>
</html>