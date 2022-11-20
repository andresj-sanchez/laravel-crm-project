@props(['icon', 'li', 'is_active', 'link'])

@php

	if($is_active){
		$active = "before:content-[''] before:absolute before:right-0 before:top-[-50px] before:w-[50px] before:h-[50px] before:bg-transparent before:rounded-[50%] before:shadow-[35px_35px_0_10px_rgba(255,255,255,1)] before:pointer-events-none after:content-[''] after:absolute after:right-0 after:bottom-[-50px] after:w-[50px] after:h-[50px] after:bg-transparent after:rounded-[50%] after:shadow-[35px_-35px_0_10px_rgba(255,255,255,1)] after:pointer-events-none bg-white text-indigo rounded-tl-[30px] rounded-bl-[30px]";
	} else{
		$active = "text-white";
	}

@endphp

<li class="group relative w-full hover:bg-white rounded-tl-[30px] rounded-bl-[30px]">
	<a href="{{$link}}" class="relative w-full flex group-hover:text-indigo group-hover:before:content-[''] group-hover:before:absolute group-hover:before:right-0 group-hover:before:top-[-50px] group-hover:before:w-[50px] group-hover:before:h-[50px] group-hover:before:bg-transparent group-hover:before:rounded-[50%] group-hover:before:shadow-[35px_35px_0_10px_rgba(255,255,255,1)] group-hover:before:pointer-events-none group-hover:after:content-[''] group-hover:after:absolute group-hover:after:right-0 group-hover:after:bottom-[-50px] group-hover:after:w-[50px] group-hover:after:h-[50px] group-hover:after:bg-transparent group-hover:after:rounded-[50%] group-hover:after:shadow-[35px_-35px_0_10px_rgba(255,255,255,1)] group-hover:after:pointer-events-none {{$active}}">
		<span class="relative block min-w-[60px] h-[60px] leading-[70px] text-center"><i class="fa-solid {{$icon}} text-[1.75em]"></i></span>
		<span class="relative block py-0 px-2.5 h-[60px] leading-[60px] text-start whitespace-nowrap">{{$li}}</span>
	</a>
</li>