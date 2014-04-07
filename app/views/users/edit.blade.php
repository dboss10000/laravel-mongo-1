<!-- app/views/users/edit.blade.php -->
 
<!DOCTYPE html>
<html>
<head>
	<title>Laravel-Mongodb</title>
	{{ HTML::style('public/css/bootstrap.min.css'); }}
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('users') }}">View All</a></li>
		<li><a href="{{ URL::to('users/create') }}">Create New</a>
		<li><a class="btn btn-small btn-warning" href="{{ URL::to('users/view') }}">View All Json</a>
	</ul>
</nav>

<h1>Edit {{ $user->uid }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('uid', 'uid') }}
		{{ Form::text('uid', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>