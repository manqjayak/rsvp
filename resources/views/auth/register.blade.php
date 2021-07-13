<!doctype html>
<html lang="en">
  <head>
  	<title>SIGN UP </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
					<img class="img d-flex align-items-center justify-content-center" src = "{{ asset('/images/logo.png') }}" />
		      	<h3 class="text-center mb-0">Welcome</h3>
		      	<p class="text-center">Sign up by fill every coloumn below</p>
		<form method="POST" action="{{ route('register') }}">
			@csrf
				<div class="form-group">
					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
					<input name='name' id='name'type="text" class="form-control" placeholder="Name" required>
				</div>
				<div class="form-group">
					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
					<input name='username' id='username'type="text" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-whatsapp"></span></div>
					<input name='WA' id='WA'type="number" class="form-control" placeholder="Whatsapp Number" required>
				</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input name='password' id='password'type="password" class="form-control" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input name='password_confirmation' id='password_confirmation'type="password" class="form-control" placeholder="Confirm Password" required>
	            </div>
	            <!-- <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div> -->
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3">Sign Up</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<p class="mb-0">Already have an account?</p>
		          <a href="{{ route('login') }}">Login</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('js/login/jquery.min.js')}}"></script>
	<script src="{{asset('js/login/popper.js')}}"></script>
	<script src="{{asset('js/login/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/login/main.js')}}"></script>


	</body>
</html>

