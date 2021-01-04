<html>

	<h1 style="green"> create Public/emergency campaigns </h1>


		<fieldset>
			<legend>Edit Campaigns</legend>
			<form  action="edit" method="post" enctype="multipart/form-data">

				 {{csrf_field()}}
			<table>
				<tr>
					<td>ID</td>
					<td><input type="number" name="id" value="{{$campaigns['id']}}" readonly="true"></td>
				</tr>

				<tr>
					<td>Target_fund</td>
					<td><input type="number" name="target_fund" value="{{$campaigns['target_fund']}}"></td>
				</tr>
				<tr>
					<td>Raised_fund</td>
					<td><input type="number" name="raised_fund" value="{{$campaigns['raised_fund']}}"></td>
				</tr>
				<tr>
					<td>ctype</td>
					<td><input type="text" name="ctype" value="{{$campaigns['ctype']}}"></td>
				</tr>
				<tr>
					<td>description</td>
					<td><input type="text" name="description" value="{{$campaigns['description']}}"></td>
				</tr>
				<tr>
					<td>Publish date</td>
					<td><input type="date" name="Publish_date" value="{{$campaigns['publisedDate']}}"></td>
				</tr>
				<tr>
					<td>endDate</td>
					<td><input type="date" name="endDate" value="{{$campaigns['endDate']}}"></td>
				</tr>
				<tr>
					<td>status</td>
					<td><input type="number" name="status" value="{{$campaigns['status']}}"></td>
				</tr>
				<tr>
					<td>Title </td>
					<td><input type="text" name="title" value="{{$campaigns['title']}}"></td>
				</tr>

				<tr>
					<td>Image </td>
					<td>  <input type="file" name="image" value="{{$campaigns['image']}}"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</fieldset>
	</form>

	<span style="color: red">@error('target_fund'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('raised_fund'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('ctype'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('description'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('Publish_date'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('endDate'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('status'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('title'){{$message}}@enderror</span> <br>
	<span style="color: red">@error('image'){{$message}}@enderror</span> <br>
      
</html>