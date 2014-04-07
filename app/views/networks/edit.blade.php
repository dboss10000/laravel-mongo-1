<!-- app/views/networks/edit.blade.php -->
 
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
		<li><a href="{{ URL::to('networks/'.$network->un_id) }}">Back</a>
		<li><a href="{{ URL::to('users') }}">Back to users</a></li>
		<li><a href="{{ URL::to('networks/create/'.$network->un_id) }}">Create New network</a>
	</ul>
</nav>

<h1>Edit {{ $network->un_id }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($network, array('route' => array('networks.update', $network->id), 'method' => 'PUT')) }}
{{ Form::hidden('un_id', $network->un_id) }}
	

		<div class="form-group">
		{{ Form::label('nid', 'nid') }}
		{{ Form::text('nid', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('n_name', 'n_name') }}
		{{ Form::text('n_name', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_ip', 'n_ip') }}
		{{ Form::text('n_ip',null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('n_status', 'n_status') }}
		{{ Form::checkbox('n_status',null) }}
	</div>

	{{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>