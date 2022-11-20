@if (session()->has('message'))
<script>
	Swal.fire({
		icon: 'success',
		title: '{{session('message')}}',
		showConfirmButton: false,
		timer: 2000
	})
</script>
@endif