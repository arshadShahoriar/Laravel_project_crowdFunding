<!DOCTYPE html>
<html>
<head>
    <title>Donation page</title>
    <link rel="stylesheet" type="text/css" href="/abc/css/style.css">
</head>
<body>
    
<h1 style="green"> Donation Page</h1>


        <fieldset>
            <legend>Donate </legend>
            <form  action="donate" method="post" >
                 {{csrf_field()}}
            <table>
                <tr>
                    <td>Campaigns ID</td>
                    <td><input type="number" name="cid" value="{{$id}}" readonly="true"></td>
                </tr>

                <tr>
                    <td>Amount</td>
                    <td><input type="number" name="amount"></td>
                </tr>
                
                    <td></td>
                    <td><input type="submit" name="submit" value="Donate"></td>
                </tr>
            </table>
        </fieldset>
    </form>


   
    <span style="color: red">@error('amount'){{$message}}@enderror</span> <br>
    


</body> 
</html>
