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
				CADASTRAR PRODUTO
			</h3>
		</div>
	</div>

	<form name='customer-form' method='post' action='{{ route('product.store') }}'>
		@csrf
		<div class='row mt-3'>
			<div class='col-1'>
				<label class='form-label' for='formSku' class="form-label">
					Código
				</label>
			</div>
			<div class='col-2'>
				<input id='formSku' class='form-control' type='text' name='sku' value='{{ old( 'sku' ) }}'>
			</div>
			<div class='col-1'>
				<label class='form-label' for='formDescription' class="form-label">
					Descrição
				</label>
			</div>
			<div class='col-6'>
				<input id='formDescription' class='form-control' type='text' name='description' value='{{ old( 'description' ) }}'>
			</div>
			<div class='col-1'>
				<label class='form-label' for='formStatus' class='form-label'>
					Ativo
				</label>
			</div>
			<div class='col-1 ms-auto'>
				<div class="form-check form-switch">
					<input class="form-check-input" name='active' type="checkbox" id="formActive" value=1 checked>
				</div>
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
			LISTA DE PRODUTOS
		</div>

		<!-- table header -->
		<div class="row list">
			<div class="col-2 table-header">
				Código
			</div>
			<div class="col-8 table-header">
				Descrição
			</div>
			<div class="col-2 table-header">
				Ativo
			</div>
		</div>



		<!-- table lines -->
		@foreach($products as $product)
		<div class="row list position-relative">
			<a class='stretched-link' href='{{ route( 'product.edit', [ 'product' => $product->id ] ) }}'>
			</a>
			<div id="user-name" class="col-2">
				<p class="text-center">
					{{ $product->sku }}
				</p>
			</div>
			<div class="col-8">
				<p class="text-start">
					{{ $product->description }}
				<p>
			</div>
			<div class="col-2 text-center">
				@if( $product->active )
				<button type="button" class="btn btn-success w-100">
					ATIVO
				</button>
				@else
				<button type="button" class="btn btn-secondary w-100">
					DESATIVADO
				</button>
				@endif
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
