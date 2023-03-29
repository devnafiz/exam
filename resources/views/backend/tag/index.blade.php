


<!DOCTYPE html>
<html>
<head>
	<title>tt</title>
</head>
<body>
       <table border="1">
       	<thead>
       		<tr>
       			<th>Id </th>
       			
                            <th>Name</th>
                             <th>post</th>
       		</tr>
       	</thead>
       	 <tbody>
       	 	@foreach($tags as $k=>$v)
       	 	<tr>
       	 		<td>{{$k+1}}</td>
       	 		
       	 		<td>{{$v->name}}</td>

              <td>
                <br/>
                 @foreach($v->posts as $post)
                   <li>{{$post->title}}</li>

                 @endforeach

              </td>
                           
       	 		
       	 	</tr>
       	 	@endforeach
       	 </tbody>
       </table>
</body>
</html>

