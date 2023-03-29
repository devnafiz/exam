


<!DOCTYPE html>
<html>
<head>
	<title>tt</title>
</head>
<body>
       <table>
       	<thead>
       		<tr>
       			<th>name</th>
       			<th>country</th>
       		</tr>
       	</thead>
       	 <tbody>
       	 	@foreach($users as $k)
       	 	<tr>
       	 		<td>{{$k->name}}</td>
       	 		@foreach($k->posts as $post)
       	 		<td>{{$post->title}}</td>
       	 		@endforeach
       	 	</tr>
       	 	@endforeach
       	 </tbody>
       </table>
</body>
</html>

