<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Create Category <a href="{{ url('/') }}">Back to Home</a></h2>



{!! Form::Open() !!}
<label>Category Name</label><br/>
<input type="text" name="name" required=""><br/>
<label>Category Content</label><br/>
<textarea rows="6" type="text" name="content" required=""></textarea><br/>
<button>Save</button><br/>
{!! Form::Close() !!}



</body>
</html>