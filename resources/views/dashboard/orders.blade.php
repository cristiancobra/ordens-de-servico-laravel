<x-layout-dashboards>

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
				CONSULTA DE ORDENS
			</h3>
		</div>
	</div>

	<form name='customer-form' method='GET' action='{{ route('dashboard') }}'>
		<div class='row mt-3'>
			<div class='col-1'>
				<label class='form-label' for='formId' class="form-label">
					Código
				</label>
			</div>
			<div class='col-1'>
				<input id='formId' class='form-control' type='text' name='id' value='{{ old( 'id' ) }}'>
			</div>
			<div class='col-1'>
				<label class='form-label' for='formName' class="form-label">
					Nome
				</label>
			</div>
			<div class='col-3'>
				<input id='formName' class='form-control' type='text' name='name' value='{{ old( 'description' ) }}'>
			</div>
			<div class='col-1'>
				<label class='form-label p-1' for='formDateMin' class='form-label'>
					Data mín.
				</label>
			</div>
			<div class='col-2'>
				<input id='formDateMin' class='form-control text-end' type='date' name='date_min' value='{{ old( 'date_min' ) }}'>
			</div>
			<div class='col-1'>
				<label class='form-label p-1' for='formDateMax' class='form-label'>
					Data máx.
				</label>
			</div>
			<div class='col-2'>
				<input id='formDateMax' class='form-control text-end' type='date' name='date_max' value='{{ old( 'date_max' ) }}'>
			</div>

		</div>

		<div class='row mt-4'>
			<div class='offset-9 col-3 text-end'>
				<a href='{{ route('dashboard') }}'>
					<button class="btn btn-secondary">
						LIMPAR
					</button>
				</a>
				<button class="btn btn-primary" type='submit'>
					FILTRAR
				</button>
			</div>
		</div>

	</form>

	</x-slot:form>

	<x-slot:table>

		<!-- table header -->
		<div class="row list">
			<div class="col-1 table-header">
				Número
			</div>
			<div class="col-3 table-header">
				Cliente
			</div>
			<div class="col-4 table-header">
				Produto
			</div>
			<div class="col-2 table-header">
				Data de abertura
			</div>
			<div class="col-2 table-header">
				Ações
			</div>
		</div>



		<!-- table lines -->
		@foreach($orders as $order)
		<div class="row list position-relative">
			<div class="col-1 text-center">
				<a class='btn btn-outline-primary' href='{{ route( 'order.edit', [ 'order' => $order->id ] ) }}'>
					{{ $order->id }}
				</a>
			</div>
			<div id="user-name" class="col-3">
				<p class="text-start">
					{{ $order->customer->name }}
				</p>
			</div>
			<div class="col-4">
				<p class="text-center">
					{{ $order->product->description }}
				</p>
			</div>
			<div class="col-2">
				<p class="text-center">
					{{ $order->convertDateToBr( $order->start_date ) }}
				</p>
			</div>
			<div class="col-2">
				@if( $order->finished )
				<button type="button" id='{{ $order->id }}' class="btn btn-success w-100 pb-1" onClick='ajax( {{ $order->id }} )'>
					FINALIZADA
				</button>
				@else
				<button type="button" id='{{ $order->id }}' class="btn btn-secondary w-100 pb-1" onClick='ajax( {{ $order->id }} )'>
					AGUARDANDO
				</button>
				@endif
			</div>

		</div>
		@endforeach

	</x-slot>

	<x-slot:scripts>
		<script>
			
			function ajax( orderId ) {

				let url = 'http://localhost:8100/orders/finish/' + orderId;
				
				let xhr = new XMLHttpRequest();

				xhr.open( 'GET', url );
				xhr.setRequestHeader( 'Content-Type', 'application/json;charset=UTF-8' );

				xhr.onload = function() {
					var order = JSON.parse( xhr.responseText );
					
					changeButton( order );
				}

				xhr.send();

			}

			function changeButton( order ) {
				let button = document.getElementById( order.id );

				if( order.finished == 1 ) {
					button.className = 'btn btn-success w-100 pb-1';
					button.innerHTML = 'FINALIZADA';
				} else {
					button.className = 'btn btn-secondary w-100 pb-1';
					button.innerHTML = 'AGUARDANDO';
				}

			}

		</script>
	<x-slot:scripts>

</x-layout-default>
