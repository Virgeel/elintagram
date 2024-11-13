<!DOCTYPE html>
<html>
<head>
	<title>Register to Elintagram</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<form action="/register" method="post">
		@csrf
			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="submit" class="buttonlogin" value="Register">
				</form>

				<div style="padding-left: 70px;"">
					<div style="color:white">                        
						Already have an account ?
					</div>
					<a href="/login"> <b> Login Now </b> </a>
				</div>
			</div>

		</form>
			
	</div>
</body>
</html>

