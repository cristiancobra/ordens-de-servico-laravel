<x-layout-edit>

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
				EDITAR INFORMAÇÕES DO CLIENTE
			</h3>
		</div>
	</div>

	<form name='customer-form' method='post' action='{{ route('customer.update', compact('customer')) }}'>
		@method('PUT')
		@csrf
		<div class='row mt-4'>

			<div class='col-1 form-label'>
				<label for='formName' class="form-label">
					Nome
				</label>
			</div>
			<div class='col-4'>
				<input id='formName' class='form-control' type='text' name='name' value='{{ $customer->name }}'>
			</div>

			<div class='row mt-4'>
				<div class='col-1 form-label'>
					<label for='formCpf' class="form-label">
						CPF
					</label>
				</div>
				<div class='col-2'>
					<p class="text-start">
						{{ $customer->formatCpf( $customer->cpf ) }}
					</p>
				</div>
			</div>

			<div class='row mt-4'>
				<div class='col-1'>
					<label for='formAddress' class="form-label">
						Endereço
					</label>
				</div>
				<div class='col-4'>
					<input id='formAddress' class='form-control' type='text' name='address' value='{{ $customer->address }}'>
				</div>
			</div>

			<div class='row mt-4'>
				<div class='col-1'>
					<label for='formAddressNumber' class="form-label">
						Número
					</label>
				</div>
				<div class='col-2'>
					<input id='formAddressNumber' class='form-control text-end' type='number' name='address_number' value='{{ $customer->address_number }}'>
				</div>
			</div>

		</div>

		<div class='row mt-5'>
			<div class='col text-end'>
				<button class="btn btn-primary" type='submit'>
					SALVAR
				</button>
			</div>
		</div>

	</form>

	</x-slot:form>

	<x-slot:scripts>
		<script>

		</script>
	<x-slot:scripts>

</x-layout-default>
