<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<style>
	#modal
	{
		background-color: rgba(0,0,0,0.7);
		height: 100%;
		width: 100%;
		position: fixed;
		top: 0px;
		left: 0px;
		display: none;
	}
	#modal-form
	{
		background-color: white;
		width: 30%;
		height: auto;
		margin-left: 30%;
		margin-top: 100px;
		border-radius: 8px;
		padding: 10px;
		position: absolute;
	}
	#close-btn
	{
		background-color: red;
		color: white;
		width: 30px;
		height: 30px;
		position: absolute;
		top: -15px;
		right: -15px;
		text-align: center;
		border-radius: 8px;
		cursor: pointer;
	}
</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xl-12 text-center"><h2>CRUD Application In Laravel</h2></div>
	</div>
	<div class="row">
		<div class="col-xl-12"><button class="btn btn-success float-right" id="add">Data Add</button></div>
	</div>

	<!-- for show record -->
	<table class="table">
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Email</td>
			<td>Image</td>
		</tr>
		@foreach($data as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->name}}</td>
			<td>{{$item->email}}</td>
			<td><img src="{{asset('img/'.$item->pic)}}" style="width: 80px; height: 80px;"></td>
			<td><a href="{{'edit/'.$item->id}}">Edit</a></td>
		</tr>
		@endforeach
	</table>
</div>

<!-- model for insert start -->
<div id="modal">
	<div id="modal-form">
		<form method="post" action="signup" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Name : </label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email : </label>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password : </label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Image : </label>
				<input type="file" name="pic" class="form-control">
			</div>
			<input type="submit" name="" value="Signup" class="btn btn-info btn-block">
		</form>
	</div>
</div>
<!-- model for insert end -->


<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$("#add").click(function(e){
			e.preventDefault();
			$("#modal").show();
		});
	});
</script>
</body>
</html>