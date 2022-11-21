<x-layout>
	<div class="m-10 p-6 bg-gray-200 rounded-lg">
		<div class="flex justify-between items-center pb-4">
			<h2 class="text-2xl font-extrabold leading-loose text-rose pl-3">Compañias</h2>
			@role('admin')
			<a href="{{route('companies.create')}}" class="flex py-3 px-4 rounded-lg gap-x-2.5 bg-green-600">
				<i class="fa-solid fa-circle-plus text-white"></i>
				<span class="text-sm text-white">Agregar compañia</span>
			</a>
			@endrole
		</div>
		<table class="w-full">
			<thead>
				<tr class="text-base text-indigo font-bold text-center">
					<td class="py-4 border-b border-gray-700">Logo</td>
					<td class="py-4 border-b border-gray-700">Nombre</td>
					<td class="py-4 border-b border-gray-700">Email</td>
					<td class="py-4 border-b border-gray-700">Website</td>
					<td class="py-4 border-b border-gray-700">Opciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($companies as $company)
				<tr class="even:bg-stone-300 text-sm text-blue text-center">
					<td class="py-4 flex justify-center"><img src="{{$company->logo ? asset('storage/' . $company->logo) : 'http://placekitten.com/g/130/130'}}" width="130" alt="{{$company->name}}"></td>
					<td class="py-4 text-base font-semibold">{{$company->name}}</td>
					<td class="py-4 text-base font-semibold">{{$company->email}}</td>
					<td class="py-4 text-base font-semibold">{{$company->website}}</td>
					<td class="py-4 text-base font-semibold text-white">
						<div class="flex gap-4 items-center justify-center">
							<a href="{{route('companies.edit', $company->id)}}" class="p-3 rounded-lg bg-green-600"><i class="fa-regular fa-pen-to-square"></i></a>
							@role('admin')
							<form method="POST" action="{{route('companies.destroy', $company->id)}}">
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
			{{$companies->links()}}
		</div>
	</div>
</x-layout>