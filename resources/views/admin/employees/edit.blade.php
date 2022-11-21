<x-layout>
	<div class="bg-gray-200 border border-gray-2000 rounded p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-5 text-rose">Editar empleado</h2>
    </header>

    <form method="POST" action="{{route('employees.update', $employee->id)}}" enctype="multipart/form-data">
      @csrf
			@method('PUT')
      <div class="mb-6">
        <label for="first_name" class="inline-block text-lg mb-2">Primer nombre</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Nombre..." name="first_name"
          value="{{$employee->first_name}}" />

        @error('first_name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="last_name" class="inline-block text-lg mb-2">Apellido</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Nombre..." name="last_name"
          value="{{$employee->last_name}}" />

        @error('last_name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Email de contacto
        </label>
        <input placeholder="Email..." type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$employee->email}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="phone_number" class="inline-block text-lg mb-2">
          Numero de telefono
        </label>
        <input placeholder="Numero de telefono..." type="text" class="border border-gray-200 rounded p-2 w-full" name="phone_number"
          value="{{$employee->phone_number}}" />

        @error('phone_number')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

			<div class="mb-6">
				<label for="phone_number" class="inline-block text-lg mb-2">
          Compañia para la que trabaja
        </label>
				<select name="company_id" class="border border-gray-200 rounded p-2 w-full">
					@foreach ($companies as $company)
					<option value="{{$company->id}}" {{$employee->company_id == $company->id ? 'selected' : ''}}>{{$company->name}}</option>
					@endforeach
					{{-- <option value="value2" selected>Value 2</option>
					<option value="value3">Value 3</option> --}}
				</select>
			</div>

      <div class="mb-6">
        <button type="submit" class="bg-indigo text-white rounded py-2 px-4 hover:bg-black">
          Actualizar empleado
        </button>

        <a href="{{route('employees.index')}}" class="text-black ml-4"> Regresar </a>
      </div>
    </form>
	</div>
</x-layout>