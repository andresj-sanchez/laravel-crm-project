@props(['quantity', 'name', 'icon'])

	<div class="group relative bg-white p-8 shadow-[0_7px_25px_rgba(0,0,0,0.08)] rounded-[20px] flex justify-around cursor-pointer hover:bg-rose">
		<div>
			<div class="relative font-medium text-[2.5em] text-rose group-hover:text-white">{{$quantity}}</div>
			<div class="text-indigo text-[1.1em] mt-1.5 group-hover:text-white">{{$name}}</div>
		</div>
		<div class="text-[3.5em] text-indigo group-hover:text-white">
			<i class="fa-solid {{$icon}}"></i>
		</div>
	</div>