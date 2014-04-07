<!-- app/views/users/show.blade.php -->

<!DOCTYPE html> 
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
	<div class="jumbotron text-center">
		<p> {{$user}}<br>
			
	</div>

</div>
</body>
</html>