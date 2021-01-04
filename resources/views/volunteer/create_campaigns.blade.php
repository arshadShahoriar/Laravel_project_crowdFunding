<html>

	<h1 style="green"> create Public/emergency campaigns </h1>


		<fieldset>
			<legend>Create campaigns</legend>
			<form  action="create_campaigns" method="post" enctype="multipart/form-data">

				 {{csrf_field()}}
			<table>
				<tr>
					<td>Target_fund</td>
					<td><input type="number" name="target_fund"></td>
					  <span style="color: red">@error('target_fund'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>Raised_fund</td>
					<td><input type="number" name="raised_fund"></td>
					<span style="color: red">@error('raised_fund'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>ctype</td>
					<td><input type="text" name="ctype"></td>
					<span style="color: red">@error('ctype'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>description</td>
					<td><input type="text" name="description"></td>
					<span style="color: red">@error('description'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>Publish date</td>
					<td><input type="date" name="Publish_date"></td>
					<span style="color: red">@error('Publish_date'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>endDate</td>
					<td><input type="date" name="endDate"></td>
					<span style="color: red">@error('endDate'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>status</td>
					<td><input type="number" name="status"></td>
					<span style="color: red">@error('status'){{$message}}@enderror</span> <br>
				</tr>
				<tr>
					<td>Title </td>
					<td><input type="text" name="title"></td>
					<span style="color: red">@error('title'){{$message}}@enderror</span> <br>
				</tr>

				<tr>
					<td>Image </td>
					<td>  <input type="file" name="image" ></td>
					<span style="color: red">@error('image'){{$message}}@enderror</span> <br>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</fieldset>
	</form>
      
</html>