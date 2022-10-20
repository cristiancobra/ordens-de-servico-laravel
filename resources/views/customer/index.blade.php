<x-layout-default>

	<x-slot:errors>

		@if ( $errors->any() )
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>
							{{ $error }}
						</li>
					@endforeach
				</ul>
			</div>
		@endif

	<x-slot:errors>
	
	<x-slot:form>

	<div class='row'>
		<div class='col'>
			<h3 class='form-title'>
				CADASTRAR CLIENTE
			</h3>
		</div>
	</div>

	<form name='customer-form' method='post' action='{{ route('customer.store') }}'>
		@csrf
		<div class='row mt-3'>
			<div class='col-1'>
				<label for='formName' class="form-label">
					Nome
				</label>
			</div>
			<div class='col-2'>
				<input id='formName' class='form-control' type='text' name='name' value='{{ old( 'name' ) }}'>
			</div>
			<div class='col-1'>
				<label for='formCpf' class="form-label">
					CPF
				</label>
			</div>
			<div class='col-2'>
				<input id='formCpf' class='form-control text-end' type='text' name='cpf' value='{{ old( 'cpf' ) }}'
				onkeyup="formatCpf('formCpf')">
			</div>
			<div class='col-1'>
				<label for='formAddress' class="form-label">
					Endereço
				</label>
			</div>
			<div class='col-3'>
				<input id='formAddress' class='form-control' type='text' name='address' value='{{ old( 'address' ) }}'>
			</div>
			<div class='col-1'>
				<label for='formAddressNumber' class="form-label">
					Número
				</label>
			</div>
			<div class='col-1'>
				<input id='formAddressNumber' class='form-control text-end' type='number' name='address_number' value='{{ old( 'address_number' ) }}'>
			</div>
		</div>

		<div class='row mt-4'>
			<div class='offset-10 col-2 text-end'>
				<button class="btn btn-primary" type='submit'>
					CADASTRAR
				</button>
			</div>
		</div>

	</form>

	</x-slot:form>

	<x-slot:table>

		<div class="table-title">
			LISTA DE CLIENTES
		</div>

		<!-- table header -->
		<div class="row list">
			<div class="col-3 table-header">
				Nome
			</div>
			<div class="col-3 table-header">
				CPF
			</div>
			<div class="col-4 table-header">
				Endereço
			</div>
			<div class="col-2 table-header">
				Número
			</div>
		</div>



		<!-- table lines -->
		@foreach($customers as $customer)
		<div class="row list position-relative">
			<a class='stretched-link' href='{{ route( 'customer.edit', [ 'customer' => $customer->id ] ) }}'>
			</a>
			<div id="user-name" class="col-3">
				<p class="text-start">
					{{ $customer->name }}
				</p>
			</div>
			<div class="col-3">
				<p class="text-center">
					{{ $customer->formatCpf( $customer->cpf ) }}
				<p>
			</div>
			<div class="col-4">
				<p class="text-start">
					{{ $customer->address }}
				<p>
			</div>
			<div class="col-2">
				<p class="text-center">
					{{ $customer->address_number }}
				<p>
			</div>
		</div>
		@endforeach

	</x-slot>

	<x-slot:scripts>
		<script>

			// function formatCpf(formCpf) {
			// 	var cpf = document.getElementById(formCpf);
			// 	var value = cpf.value;

			// 	if (!value) return value;

			// 	value = value + '';
			// 	value = parseInt(value.replace(/[\D]+/g, ''));
			// 	value = value + '';
			// 	value = value.replace(/([0-9]{3})$/g, "$1.");
			
			// 	if (value.length >= 6) {
			// 		value = value.replace(/([0-9]{3}),([0-9]{3})$/g, "$1.$2.");
			// 		// value = value.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
			// 		// value = value.replace(/(\d{ 3 })(\d{ 3 })(\d{ 3 })(\d{ 2 })/, "$1.$2.$3-$4");
			// 	}

			// 	if (value.length >= 9) {
			// 		value = value.replace(/([0-9]{3}),([0-9]{3}),([0-9]{3})$/g, "$1.$2.$3-");
			// 	}
			
			// 	cpf.value = value;
				
			// 	if (value == 'NaN') cpf.value = '';
			// };

		</script>
	<x-slot:scripts>

</x-layout-default>
