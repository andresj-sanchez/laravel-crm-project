<x-layout>
	<div class="relative w-full p-5 grid-cols-2 grid gap-8">
	<x-dashboard-card quantity="{{$companies_qty}}" name="Compañias" icon="fa-building" />
	<x-dashboard-card quantity="{{$employees_qty}}" name="Empleados" icon="fa-user-tie" />
</div>
	<h1 class="text-6xl p-6 font-bold text-indigo">Welcome {{auth()->user()->name}}!</h1>
</x-layout>