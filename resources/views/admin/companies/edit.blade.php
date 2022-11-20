<x-layout>
	<div class="bg-gray-200 border border-gray-2000 rounded p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-5 text-rose">Editar compañia</h2>
    </header>

    <form method="POST" action="{{route('companies.update', $company->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Nombre de la compañia</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Compañia..." name="name"
          value="{{$company->name}}" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">
          Email de contacto
        </label>
        <input placeholder="Email..." type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$company->email}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2">
          URL de su pagina web
        </label>
        <input placeholder="Website..." type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
          value="{{$company->website}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Logo de la compañia
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

				<img class="w-48 mr-6 mb-6"
          src="{{$company->logo ? asset('storage/' . $company->logo) : asset('/images/genuine-digital-school-logo.png')}}" alt="{{$company->name}}" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-indigo text-white rounded py-2 px-4 hover:bg-black">
          Actualizar compañia
        </button>

        <a href="{{route('companies.index')}}" class="text-black ml-4"> Regresar </a>
      </div>
    </form>
	</div>
	<x-modal />
</x-layout>