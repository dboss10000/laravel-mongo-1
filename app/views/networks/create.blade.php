<!-- app/views/networks/create.blade.php -->
 
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
		<li><a href="{{ URL::to('networks/'.$un_id) }}">Back</a>
		<li><a href="{{ URL::to('users') }}">Back to users</a></li>
	</ul>
</nav>
<h1>Create a network</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'networks')) }}

	
		{{ Form::hidden('un_id', $un_id) }}


	<div class="form-group">
		{{ Form::label('nid', 'nid') }}
		{{ Form::text('nid', Input::old('nid'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_name', 'n_name') }}
		{{ Form::text('n_name', Input::old('n_name'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_ip', 'n_ip') }}
		{{ Form::text('n_ip', Input::old('n_ip'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_status', 'n_status') }}
		{{ Form::checkbox('n_status', Input::old('n_status')) }}
	</div>

	{{ Form::submit('Create the network!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>