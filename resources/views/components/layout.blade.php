<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="favicon.ico" type="image/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	@vite('resources/css/app.css')
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Genuine Digital School CRM</title>

</head>
<body class="min-h-screen overflow-x-hidden">

	<div class="relative w-full">

		{{-- Sidebar --}}
		<div id="navigation" class="fixed w-[300px] h-full bg-indigo border-l-[10px] border-solid border-l-indigo transition-all duration-500 overflow-hidden">
			<ul class="absolute top-0 left-0 w-full">
				<li class="relative w-full mb-10 pointer-events-none">
					<a href="" class="relative w-full flex text-white justify-center">
						<img src="{{asset('images/genuine-digital-school-logo-dark-mode.png')}}" alt="genuine digital school logo" width="250">
					</a>
				</li>
				<x-sidebar-li icon="fa-table-columns" li="Dashboard" :link="route('admin.index')" :is_active="Route::currentRouteNamed( 'admin.index' ) ?  True : False" />
				<x-sidebar-li icon="fa-city" li="Compañias" :link="route('companies.index')" :is_active="Route::currentRouteNamed( 'companies.index' ) ?  True : False" />
				<x-sidebar-li icon="fa-users" li="Empleados" :link="route('employees.index')" :is_active="Route::currentRouteNamed( 'employees.index' ) ?  True : False" />
			</ul>
		</div>
		{{-- End Sidebar --}}

		{{-- main --}}
		<div id="main" class="absolute w-[calc(100%-300px)] left-[300px] min-h-screen bg-white transition-all duration-500">

			{{-- Topbar --}}
			<div id="topbar" class="w-full h-[60px] flex justify-between items-center py-0 px-2.5 bg-gray-200">
				<div id="toggle" class="relative w-[60px] h-[60px] flex justify-center items-center text-[2.5em] cursor-pointer">
					<i class="fa-solid fa-bars"></i>
				</div>
				<div class="user">
					<ul>
						<li>
							<form class="inline" method="POST" action="{{route('logout')}}">
								@csrf
								<button type="submit" class="text-white bg-rose rounded-xl p-2.5 hover:bg-[#AA0039] transition-all duration-300">
									<i class="fa-solid fa-right-from-bracket"></i> Logout
								</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
			{{-- End Topbar --}}

			
			{{$slot}}
		</div>
	</div>
	<script>
		let toggle = document.getElementById('toggle');
		let navigation = document.getElementById('navigation');
		let main = document.getElementById('main');

		toggle.onclick = function(){
			navigation.classList.toggle('w-[80px]');
			main.classList.toggle('w-[calc(100%-80px)]');
			main.classList.toggle('left-[80px]');
		}
	</script>
</body>
</html>