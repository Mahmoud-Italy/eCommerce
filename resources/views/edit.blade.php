<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Update Category <a href="{{ url('/') }}">Back to Home</a></h2>




{!! Form::Open() !!}
<label>Category Name</label><br/>
<input type="text" name="name" value="{{$row->name}}" required=""><br/>
<label>Category Content</label><br/>
<textarea rows="6" type="text" name="content" required="">{{$row->content}}</textarea><br/>
<button>Update</button><br/>
{!! Form::Close() !!}



</body>
</html>