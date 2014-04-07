<!-- app/views/hostnames/edit.blade.php -->
 
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
		<li><a href="{{ URL::to('hostnames/'.$hostname->us_id) }}">Back to Hostnames</a></li>
		<li><a href="{{ URL::to('hostnames/create/'.$hostname->us_id ) }}">Create New hostname</a>
	</ul>
</nav>

<h1>Edit {{ $hostname->us_id }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($hostname, array('route' => array('hostnames.update', $hostname->id), 'method' => 'PUT')) }}

	{{ Form::hidden('us_id', $hostname->us_id) }}

	<div class="form-group">
		{{ Form::label('hostname', 'hostname') }}
		{{ Form::text('hostname', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('block', 'block') }}
		{{ Form::checkbox('block', null) }}
	</div>

	{{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>