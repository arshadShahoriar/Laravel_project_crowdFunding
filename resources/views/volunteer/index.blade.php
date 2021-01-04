<html>

	<a href={{ "create_campaigns" }}> create_campaigns </a>
    <a href={{ "contract" }}> contract</a>
     <a href={{ "sharedCampaigns" }}> sharedCampaigns</a>   
     <a href={{ "logout" }}> logout</a>  
     <a href={{ "about" }}> about</a> 
       
     
     <table>
	<thead>	
					<th>Title</th>
                    <th>Target Fund</th>
                    <th>Raised Fund</th>
                    <th>ctype</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Published date</th>
                    <th>End Date</th>
                    <th>Status</th>
                     
  </thead>
  @foreach($campaigns as $campaign)
                        <tbody>
                        	<td>{{$campaign['title']}}</td>
                            <td>{{$campaign['target_fund']}}</td>
                            <td>{{$campaign['raised_fund']}}</td>
                            <td>{{$campaign['ctype']}}</td>
                            <td>{{$campaign['description']}}</td>
                            <td>{{$campaign['image']}}</td>
                            <td>{{$campaign['publisedDate']}}</td>
                            <td>{{$campaign['endDate']}}</td>
                            <td>{{$campaign['status']}}</td>
      						<td>
      							<a href={{"edit/".$campaign['id']}}> Edit </a>
      							<a href={{"bookmark/".$campaign['id']}}> Bookmark </a>
      							<a href={{"report/".$campaign['id']}}> Report </a>
      							<a href={{"delete/".$campaign['id']}}> Delete </a>
      							<a href={{ "donate/".$campaign['id']}}> Make Donation</a> 
      						</td>
                        </tbody>
                    @endforeach
</table>


</html>