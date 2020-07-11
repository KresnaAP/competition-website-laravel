<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<h3>Edit User</h3>

	<a href="/user">Back</a>
	
	<br/>
	<br/>

  @foreach($user as $u)
    <form action="/user/update" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $u->id }}"> <br/>
      Name <input type="text" required="required" name="name" value="{{ $u->name }}"> <br/>
      Email <input type="email" required="required" name="email" value="{{ $u->email }}"> <br/>
      <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
    </form>
  @endforeach

</body>
</html>