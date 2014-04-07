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
		<li><a href="{{ URL::to('networks/create/'.$id) }}">Create New network</a>
	</ul>
</nav>

<h1>All the networks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>uid</td>
			<td>NID</td>
			<td>Nname</td>
			<td>NIP</td>
			<td>Nstatus</td>
		</tr>
	</thead>
	<tbody>
	@foreach($networks as $key => $value)
		<tr>
			<td>{{ $value->un_id }}</td>
			<td>{{ $value->nid }}</td>
			<td>{{ $value->n_name }}</td>
			<td>{{ $value->n_ip }}</td>
			<td>@if (empty($value->n_status))
					Not Active
					@else
					Active
				@endif</td>
			
			<td>

				{{ Form::open(array('url' => 'networks/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<a class="btn btn-small btn-info" href="{{ URL::to('networks/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>