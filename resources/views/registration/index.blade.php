<!DOCTYPE html>
<html>
<head>
    <title>Registration page</title>
    <link rel="stylesheet" type="text/css" href="/abc/css/style.css">
</head>
<body>
    
<h1 style="green"> Registration Page</h1>


        <fieldset>
            <legend>Registration by volenteer </legend>
            <form  action="Registration" method="post" >
                 {{csrf_field()}}
            <table>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username"></td>
                </tr>

                <tr>
                    <td>name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>contactno</td>
                    <td><input type="text" name="contactno"></td>
                </tr>
                <tr>
                    <td>gender</td>
                   <td> <input type="radio" id="male" name="gender" value="male">Male </td>
                  <td>  <input type="radio" id="female" name="gender" value="female">Female </td>
                </tr>
                <tr>
                    <td>address</td>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td><input type="number" name="status"></td>
                </tr>
                <tr>
                    <td>type</td>
                    <td><input type="number" name="type" value="3" readonly="true"></td>
                </tr>
                

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </fieldset>
    </form>


    <a href="/login">Already sign up then login</a> |
    <br>
<span style="color: red">@error('username'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('email'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('password'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('type'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('status'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('name'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('contactno'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('gender'){{$message}}@enderror</span> <br>
    <span style="color: red">@error('address'){{$message}}@enderror</span> <br>
        


</body> 
</html>
