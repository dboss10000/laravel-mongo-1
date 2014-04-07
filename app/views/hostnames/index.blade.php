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
	</ul>
</nav>

<h1>All the hostnames</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>uid</td>
			<td>hostname</td>
			<td>Block</td>
		</tr>
	</thead>
	<tbody>
	@foreach($hostnames as $key => $value)
		<tr>
			<td>{{ $value->us_id }}</td>
			<td>{{ $value->hostname }}</td>
				<td>@if (empty($value->block))
					Off
					@else
					{{ $value->block }}
				@endif
				</td>
			<td>

				{{ Form::open(array('url' => 'hostnames/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<a class="btn btn-small btn-info" href="{{ URL::to('hostnames/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>