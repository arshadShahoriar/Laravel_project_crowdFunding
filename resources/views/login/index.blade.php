<html>

	
        
        <div class="center-login">
            <h1 class="text text-center">Login</h1>
            <form action="" method="post" class="form-horizontal form-material">
                {{csrf_field()}}
                <div class="form-group">
                    <h4 class="text">Username</h4> 
                    <input type="text" name="username" class="form-control" value ="">
                    <label style ="color:red"></label>
                </div>
                <div class="form-group">
                    <h4 class="text">Password</h4> 
                    <input type="password" name="password" class="form-control" value ="">
                    <label style ="color:red"></label>
                </div>
                <div class="form-group text-center">
                    
                    <input type="submit" name="login" class="btn btn-danger" value="Login" class="form-control">
                </div>
        </div>
		
	</body>
</html>