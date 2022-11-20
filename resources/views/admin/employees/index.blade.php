<x-layout>
	<div class="m-10 p-6 bg-gray-200 rounded-lg">
		<div class="flex justify-between items-center pb-4">
			<h2 class="text-2xl font-extrabold leading-loose text-rose pl-3">Empleados</h2>
			@role('admin')
			<a href="{{route('employees.create')}}" class="flex py-3 px-4 rounded-lg gap-x-2.5 bg-green-600">
				<i class="fa-solid fa-circle-plus text-white"></i>
				<span class="text-sm text-white">Agregar empleados</span>
			</a>
			@endrole
		</div>
		<table class="w-full">
			<thead>
				<tr class="text-base text-indigo font-bold text-center">
					<td class="py-4 border-b border-gray-700">Nombre</td>
					<td class="py-4 border-b border-gray-700">Apellido</td>
					<td class="py-4 border-b border-gray-700">Email</td>
					<td class="py-4 border-b border-gray-700">Telefono</td>
					<td class="py-4 border-b border-gray-700">Opciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($employees as $employee)
				<tr class="even:bg-stone-300 text-sm text-blue text-center">
					<td class="py-4 text-base font-semibold">{{$employee->first_name}}</td>
					<td class="py-4 text-base font-semibold">{{$employee->last_name}}</td>
					<td class="py-4 text-base font-semibold">{{$employee->email}}</td>
					<td class="py-4 text-base font-semibold">{{$employee->phone_number}}</td>
					<td class="py-4 text-base font-semibold text-white">
						<div class="flex gap-4 items-center justify-center">
							<a href="{{route('employees.edit', $employee->id)}}" class="p-3 rounded-lg bg-green-600"><i class="fa-regular fa-pen-to-square"></i></a>
							@role('admin')
							<form method="POST" action="{{route('employees.destroy', $employee->id)}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="p-3 rounded-lg bg-red-400" onclick="return confirm('Estas seguro de querer eliminar este registro?');"><i class="fa-solid fa-trash"></i></button>
							</form>
							@endrole
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="mt-6 p-4 flex justify-center">
			{{$employees->links()}}
		</div>
	</div>
	<x-modal />
</x-layout>