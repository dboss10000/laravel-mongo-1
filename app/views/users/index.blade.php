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

<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>UID</td>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->uid }}</td>
			<td>

				{{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<a class="btn btn-small btn-warning" href="{{ URL::to('users/'. $value->id) }}">View Json</a>
				
				<a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('networks/' . $value->id) }}">Networks</a>
				<a class="btn btn-small btn-info" href="{{ URL::to('hostnames/' . $value->id) }}">Hostnames</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>