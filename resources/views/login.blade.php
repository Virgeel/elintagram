<!DOCTYPE html>
<html>
<head>
	<title>Login to Elintagram</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		
			
				<form action="/login" method="post">
                @csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					
                    <input type="submit" value="Login" class="buttonlogin">
                    <div style="padding-left: 70px;"">
                        <div style="color:white">                        
                            Doesn't have an account ?
                        </div>
                        <a href="/register"> <b> Register Now </b> </a>
                    </div>
                    
				</form>
			
	</div>
</body>
</html>

