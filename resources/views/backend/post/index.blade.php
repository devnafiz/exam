


<!DOCTYPE html>
<html>
<head>
	<title>tt</title>
</head>
<body>
       <table>
       	<thead>
       		<tr>
       			<th>Id </th>
       			<th>Title</th>
                            <th>Name</th>
                             <th>tags</th>
       		</tr>
       	</thead>
       	 <tbody>
       	 	@foreach($posts as $k=>$v)
       	 	<tr>
       	 		<td>{{$k+1}}</td>
       	 		
       	 		<td>{{$v->title}}</td>
                            <td>{{optional($v->user)->name}}</td>

                            <td>
                                   <ul>
                                   @foreach($v->tags as $tag)
                                     <li> {{$tag->name}}</li>

                                   @endforeach
                                </ul>

                            </td>
       	 		
       	 	</tr>
       	 	@endforeach
       	 </tbody>
       </table>
</body>
</html>

