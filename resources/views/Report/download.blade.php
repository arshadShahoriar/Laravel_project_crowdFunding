<html>
       
     
     <table>
    <thead> 
                     <th>ID</th>
                    <th>Campaigns ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Donate ID</th>

                <br>     
    </thead>
           @foreach($campaigns as $campaign)
                        <tbody>
                            <td>{{$campaign['id']}}</td>
                            <td>{{$campaign['cid']}}</td>
                            <td>{{$campaign['amount']}}</td>
                            <td>{{$campaign['date']}}</td>
                            <td>{{$campaign['uid']}}</td>
                            
                          <br>
                        </tbody>
                    @endforeach
  </table>
    
<!--  <a href={{ "/home/download"}}> download</a> -->

<form action="" method="post">
     {{csrf_field()}}
    <input type="submit" name="submit">
</form>

</html>