<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="favicon.ico" type="image/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	@vite('resources/css/app.css')
	<link rel="icon" href="https://studyatgenuine.com/wp-content/uploads/2022/05/cropped-FAVICON-32x32.png" sizes="32x32">
	<title>Login</title>
</head>
<body>
	
	<section class="bg-rose min-h-screen flex items-center justify-center">
		<svg class="absolute bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#fff" fill-opacity="1" d="M0,256L34.3,256C68.6,256,137,256,206,234.7C274.3,213,343,171,411,176C480,181,549,235,617,256C685.7,277,754,267,823,245.3C891.4,224,960,192,1029,176C1097.1,160,1166,160,1234,165.3C1302.9,171,1371,181,1406,186.7L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

		<svg class="absolute top-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#fff" fill-opacity="1" d="M0,128L34.3,133.3C68.6,139,137,149,206,160C274.3,171,343,181,411,154.7C480,128,549,64,617,64C685.7,64,754,128,823,133.3C891.4,139,960,85,1029,90.7C1097.1,96,1166,160,1234,176C1302.9,192,1371,160,1406,144L1440,128L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
		{{-- login container --}}
		<div class="relative bg-gray-100 flex rounded-2xl shadow-lg max-w-3x1 p-5 items-center">
			{{-- form --}}
			<div class="md:w-1/2 px-8">
				<h2 class="font-bold text-2xl text-indigo">Login</h2>
				<p class="text-sm mt-4 text-indigo">If you already a member easily log in</p>

				<form method="POST" action="{{route('authenticate')}}" class="flex flex-col gap-4">
					@csrf
					<input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email" value="{{old('email')}}">

					@error('email')
					<p class="text-red-500 text-sx mt-1">{{$message}}</p>
					@enderror
					<div class="relative">
						<input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password" value="{{old('password')}}">
						<i class="fa-regular fa-eye absolute top-1/2 right-3 -translate-y-1/2"></i>
					</div>
					<button class="bg-indigo rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
				</form>
			</div>

			{{-- image --}}
			<div class="w-1/2 sm:block hidden">
				<img class="rounded-2xl" src="images/login.jpg" alt="">
			</div>
		</div>
		
	</section>

	
		
		
</body>
</html>