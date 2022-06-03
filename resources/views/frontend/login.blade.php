<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<!-- google font -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="{{asset("frontend/css/signup.css")}}" />
		<link
			rel="stylesheet"
			href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
		/>
	</head>

	<body>
		<div class="root">
			<section class="sign">
				<div class="container">
					<div class="forms">
						<div class="form login">
							<span class="title">Login</span>
                            <p style="text-align: center; color:red;">{{session("msg")}}</p>
							<form action="{{route("login")}}" method="POST">
                                @csrf
								<div class="input-field">
									<input type="email" placeholder="Enter your email" name="email" required />
									<i class="uil uil-envelope"></i>
								</div>
                                @error('email')
										<span class="text-danger">{{ $message }}</span>
								@enderror

								<div class="input-field">
									<input
										type="password"
										class="password"
                                        name="password"
										placeholder="Enter your password"
										required
									/>
									<i class="uil uil-lock icon"></i>
									<i class="uil uil-eye-slash showHidePw"></i>
								</div>
                                @error('password')
										<span class="text-danger">{{ $message }}</span>
								@enderror

								<div class="checkbox-text">
									<div class="checkbox-content">
										<input type="checkbox" id="logCheck" name="remember_me"/>
										<label for="logCheck" class="text">Remember me</label>
									</div>

									<a href="#" class="text">Forgot password?</a>
								</div>

								<div class="input-field button">
									<input type="submit" value="Login Now" />
								</div>
							</form>

							<div class="login-signup">
								<span class="text"
									>Not a member?
									<a href="{{route("view.signup")}}" class="text signup-link">Signup now</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>
