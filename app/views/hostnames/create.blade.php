<!-- app/views/hostnames/create.blade.php -->
 
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
		<li><a href="{{ URL::to('users') }}">Back to users</a></li>
		<li><a href="{{ URL::to('hostnames/'.$us_id) }}">Back to hostnames</a>
	</ul>
</nav>

<h1>Create a hostname</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'hostnames')) }}
	{{ Form::hidden('us_id', $us_id) }}
	

	<div class="form-group">
		{{ Form::label('hostname', 'hostname') }}
		{{ Form::text('hostname', Input::old('hostname'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('block', 'block') }}
		{{ Form::checkbox('block', Input::old('block')) }}
	</div>

	{{ Form::submit('Create the hostname!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>