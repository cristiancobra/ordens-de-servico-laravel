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
				CADASTRAR ORDEM DE SERVIÇO
			</h3>
		</div>
	</div>

	<form name='customer-form' method='post' action='{{ route('order.store') }}'>
		@csrf
		<div class='row mt-3'>
			<div class='col-2'>
				<label for='formName' class="form-label">
					Nome do cliente
				</label>
			</div>
			<div class='col-5'>
				<input id='formName' class='form-control' type='text' name='name' value='{{ old( 'name' ) }}'>
			</div>
			<div class='col-2'>
				<label for='formCpf' class="form-label">
					CPF do cliente
				</label>
			</div>
			<div class='col-3'>
				<input id='formCpf' class='form-control text-end' type='text' name='cpf' value='{{ old( 'cpf' ) }}'>
			</div>
		</div>

		<div class='row mt-3'>	
			<div class='col-2'>
				<label for='formProduct' class="form-label">
					Produto
				</label>
			</div>
			<div class='col-5'>
				<select class="form-select" aria-label="select-product" name='product_id' id='formProduct'>
					<option value='' selected>
						Selecione um produto
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
				<input id='formStartDate' class='form-control text-end' type='date' name='start_date' value='{{ old( 'start_date' ) }}'>
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
			ORDENS DE SERVIÇO ABERTAS
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
				Produto
			</div>
			<div class="col-2 table-header">
				Data de abertura
			</div>
		</div>



		<!-- table lines -->
		@foreach($orders as $order)
		<div class="row list position-relative">
			<a class='stretched-link' href='{{ route( 'order.edit', [ 'order' => $order->id ] ) }}'>
			</a>
			<div id="user-name" class="col-3">
				<p class="text-start">
					{{ $order->customer->name }}
				</p>
			</div>
			<div class="col-3">
				<p class="text-center">
					{{ $order->customer->formatCpf( $order->customer->cpf ) }}
				<p>
			</div>
			<div class="col-4">
				<p class="text-center">
					{{ $order->product->description }}
				<p>
			</div>
			<div class="col-2">
				<p class="text-center">
					{{ $order->convertDateToBr( $order->start_date ) }}
				<p>
			</div>
		</div>
		@endforeach

	</x-slot>

	<x-slot:scripts>
		<script>

		</script>
	<x-slot:scripts>

</x-layout-default>
