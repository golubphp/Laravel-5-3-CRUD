@extends('master')

@section('content')

<div class="row">
<div class="col-md-10 col-md-offset-1">
<br />
<h3 align="center">Student Data</h3>
<br />

<div align="right">
<a href="{{ url('create') }}" class="btn btn-primary">Add</a>
<br />
<br />
</div>

<table class="table table-bordered table-striped">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>

@foreach($students as $row)
<tr>

<td>{{$row['first_name']}}</td>
<td>{{$row['last_name']}}</td>
<td>
<a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Edit</a>
</td>

<td>
<form method="post" class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}">
{{csrf_field()}}
<input type="hidden" name="_method" value="DELETE" />
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>

</tr>
@endforeach

</table>

</div>
</div>


<div class="row">
<div class="col-md-10 col-md-offset-1">

@if(count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div>
@endif

</div>
</div>

@endsection



