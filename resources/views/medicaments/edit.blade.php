@extends('layouts.app')

@section('title','Editar Medicamento')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('medicament.update',$medicament) }}"enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="nombre" autocomplete="off" value="{{ $medicament->name }}">
                                            <label class="control-label">Lote <strong style="color:red;">(*)</strong></label>
											<textarea type="text" class="form-control" name="batch" placeholder=" lote " autocomplete="off" value="">{{ $medicament->batch }}</textarea>
                                            <label class="control-label">Cantidad <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="amount" placeholder=" Cantidad " autocomplete="off" value="{{ $medicament->amount }}">
											<label class="control-label">Valor compra <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="purchase" placeholder=" Valor compra " autocomplete="off" value="{{ $medicament->purchase }}">
                                            <label class="control-label">Valor Venta <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="sale" placeholder=" Valor Venta " autocomplete="off" value="{{ $medicament->sale }}">
                                            <label class="control-label">Fecha expiracion <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="expiration_date" placeholder=" fecha expiracion " autocomplete="off" value="{{ $medicament->expiration_date }}"> 
                                            
                                            <label class="control-label">Img <strong style="color:red;"></strong></label> 
                                            <div> @if($medicament->image!=null)
                                                <p><img class="img-responsive img-thumbnail" src="{{ asset('uploads/medicaments/'.$medicament->image) }}" style="height: 70px; width: 70px;" alt=""></p>
                                              @elseif ($medicament->image==null)
                                              @endif</div>
                                                                                
                                            <div class="form-group">
											<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
											<input type="file" class="form-control-file" name="image" id="image" >
										</div>
									</div>
								</div>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('medicament.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection