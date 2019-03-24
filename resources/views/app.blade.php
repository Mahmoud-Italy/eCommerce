<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
</head>
<body>


<style>
tr td {border:1px solid #ddd;text-align: center;}
</style>
<br/>

@if(Session::has('success'))
<p style="color:green">{{Session::get('success')}}</p>
@elseif(Session::has('error'))
<p style="color:red">{{Session::get('error')}}</p>
@endif

<a href="{{ url('create') }}">Add New Category</a>
<br/><br/>
{!! Form::Open(['method'=>'GET']) !!}
<input type="text" name="search" placeholder="Search..." 
value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
{!! Form::Close() !!}
<br/><br/>
<table style="border:1px solid #ddd;width: 500px;max-height:300px">
	<thead>
		<tr>
			<th>#</th>
			<th>Category Name</th>
			<th>Category Content</th>
			<th>Date</th>
			<th>Actions</th>
	   </tr>
	</thead>
	<tbody>


		@foreach($data as $key => $row)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$row->name}}</td>
			<td>{{$row->content}}</td>
			<td>{{ explode(' ',$row->created_at)[0] }}</td>
			<td>
				{!! Form::Open(['url'=>'category/destroy/'.$row->id]) !!}
				<a href="{{ url('category/edit/'.$row->id) }}">edit</a>
				<button>Delete</button>
				{!! Form::Close() !!}
			</td>
		</tr>
		@endforeach

	</tbody>
</table>


</body>
</html>