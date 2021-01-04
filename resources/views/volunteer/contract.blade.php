<html>

	
        
       
            <form action="postcontract" method="post" class="form-horizontal form-material">
                {{csrf_field()}}
               
                    
                    <h4 class="text">Comments</h4> 
                    <input type="text" name="description" class="form-control" value ="">
                
                    
                    <input type="submit" name="submit" class="btn btn-danger" value="submit" class="form-control">
       </form>
       <span>@error('description'){{$message}}@enderror</span> <br>
</html>