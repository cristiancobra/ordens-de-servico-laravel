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
				EDITAR INFORMAÇÕES DO PRODUTO
			</h3>
		</div>
	</div>

	<form name='product-form' method='post' action='{{ route('product.update', compact('product')) }}'>
		@method('PUT')
		@csrf
		
		<div class='row mt-4'>
			<div class='col-1 form-label'>
				<label for='formSku' class="form-label">
					Código
				</label>
			</div>
			<div class='col-2'>
				<input id='formSku' class='form-control text-end' type='text' name='sku' value='{{ $product->sku }}'>
			</div>
		</div>

		<div class='row mt-4'>
			<div class='col-1'>
				<label for='formDescription' class="form-label">
					Descrição
				</label>
			</div>
			<div class='col'>
				<input id='formDescription' class='form-control' type='text' name='description' value='{{ $product->description }}'>
			</div>
		</div>

		<div class='row mt-4'>
			<div class='col-1'>
				<label for='formActive' class="form-label">
					Ativo
				</label>
			</div>
			<div class='col-1 me-auto'>
				@if( $product->active )
					<div class="form-check form-switch">
						<input class="form-check-input" name='active' type="checkbox" id="formActive" value=1 checked>
					</div>
				@else
					<div class="form-check form-switch">
						<input class="form-check-input" name='active' type="checkbox" id="formActive" value=1>
					</div>
				@endif
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
