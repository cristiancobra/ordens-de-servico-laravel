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
				EDITAR INFORMAÇÕES DA ORDEM
			</h3>
		</div>
	</div>

	<div class='row mt-4'>
		<div class='col'>
			<h4 class='form-title text-start'>
				Cliente
			</h4>
		</div>
	</div>

	<div class='row mt-2'>
		<div class='col-3'>
			<p class="text-start pt-2">
				{{ $order->customer->name }}
			</p>
		</div>
		<div class='col-1 form-label'>
			<label for='formCpf' class="form-label">
				CPF:
			</label>
		</div>
		<div class='col-2'>
			<p class="text-start pt-2">
				{{ $order->customer->formatCpf( $order->customer->cpf ) }}
			</p>
		</div>
		<div class='col-1'>
			<label for='formAddress' class="form-label">
				Endereço:
			</label>
		</div>
		<div class='col-3'>
			<p class="text-start pt-2">
				{{ $order->customer->address }}
			</p>
		</div>
		<div class='col-1'>
			<label for='formAddressNumber' class="form-label">
				Número:
			</label>
		</div>
		<div class='col-1'>
			<p class="text-start pt-2">
				{{ $order->customer->address_number }}
			</p>
		</div>

	</div>

	<div class='row mt-2'>
		<div class='col text-end'>
			<a class="btn btn-primary" href='{{ route('customer.edit', [ 'customer' => $order->customer ] ) }}'>
				EDITAR CLIENTE
			</a>
		</div>
	</div>

	<div class='row mt-5'>
		<div class='col'>
			<h4 class='form-title text-start'>
				Ordem de serviço
			</h4>
		</div>
	</div>

	<form name='customer-form' method='post' action='{{ route('order.update', compact('order')) }}'>
		@method('PUT')
		@csrf
		
		<div class='row mt-3'>	
			<div class='col-2'>
				<label for='formProduct' class="form-label">
					Produto
				</label>
			</div>
			<div class='col-5'>
				<select class="form-select" aria-label="select-product" name='product_id' id='formProduct'>
					<option  selected value='{{ $order->product_id }}'>
						{{ $order->product->description }}
					</option>

					@foreach( $products as $product)
						<option value='{{ $product->id }}'>
							{{ $product->description }}
						</option>
					@endforeach

				</select>
			</div>
			<div class='col-2'>
				<label for='formStartDate' class="form-label">
					Data de abertura
				</label>
			</div>
			<div class='col-3'>
				<input id='formStartDate' class='form-control text-end' type='date' name='start_date' value='{{ $order->convertDate( $order->start_date ) }}'>
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
