<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</body>


<table class="table table-striped w-50">
    <thead>
      <tr>
        <th>Team Name</th>
        <th>Description</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
     @foreach($data as $alldata)
       <tr>
       	<td>
	 {{$alldata->team_name}}
	  </td>
	  <td>
	 {{$alldata->team_description}}
	 </td>
	   <td>
	 {{$alldata->team_creator}}
	 </td>
	  </tr>
	  
@endforeach
    </tbody>
  </table>
{{$data->links()}}
</html>


