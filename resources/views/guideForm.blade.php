@extends('app')
@section('content')
    <div>
        <h3 class="text-center">Nueva guía</h3>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <h5 class="mt-5">Información de origen</h5>
            <div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="originname" placeholder="Nombre" value="oscar mx">
                    </div>
                    <div class="col-sm">
                        <label for="">Compañia</label>
                        <input type="text" class="form-control" name="origincompany" placeholder="Compañia" value="oskys factory">
                    </div>
                    <div class="col-sm">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="originemail" placeholder="Email" value="osgosf8@gmail.com">
                    </div>
                    <div class="col-sm">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" name="originphone" placeholder="Telefono" value="8116300800">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Código postal</label>
                        <input type="text" class="form-control" name="originpostalCode" placeholder="Código postal" value="66236">
                    </div>
                    <div class="col-sm">
                        <label for="">Estado</label>
                        <select class="form-select" name="originstate" aria-label="Default select example">
                            <option selected>Seleccione una opción...</option>
                            @foreach($states['data'] as $state)
                                <option value="{{ $state['code_2_digits'] }}" @if($state['code_2_digits'] === 'NL') selected='selected' @endif>{{ $state['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="origincity" placeholder="Ciudad" value="Monterrey">
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Calle</label>
                        <input type="text" class="form-control" name="originstreet" placeholder="Calle" value="av vasconcelos">
                    </div>
                    <div class="col-sm">
                        <label for="">Número</label>
                        <input type="text" class="form-control" name="originnumber" placeholder="Número" value="1400">
                    </div>
                    <div class="col-sm">
                        <label for="">Colonia</label>
                        <input type="text" class="form-control" name="origindistrict" placeholder="Colonia" value="mirasierra">
                    </div>

                </div>

                <div class="row mb-5">
                    <div class="col-sm-6">
                        <label for="reference" class="form-label">Referencia</label>
                        <textarea class="form-control" id="reference" name="originreference" rows="3"></textarea>
                    </div>
                </div>
                <hr class="dropdown-divider">
            </div>
            <h5>Información de destino</h5>
            <div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="destinationname" placeholder="Nombre" value="oscar">
                    </div>
                    <div class="col-sm">
                        <label for="">Compañia</label>
                        <input type="text" class="form-control" name="destinationcompany" placeholder="Compañia" value="empresa">
                    </div>
                    <div class="col-sm">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="destinationemail" placeholder="Email" value="osgosf8@gmail.com">
                    </div>
                    <div class="col-sm">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" name="destinationphone" placeholder="Telefono" value="8116300800">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Código postal</label>
                        <input type="text" class="form-control" name="destinationpostalCode" placeholder="Código postal" value="66240">
                    </div>
                    <div class="col-sm">
                        <label for="">Estado</label>
                        <select class="form-select" name="destinationstate" aria-label="Default select example">
                            <option selected>Seleccione una opción...</option>
                            @foreach($states['data'] as $state)
                                <option value="{{ $state['code_2_digits'] }}" @if($state['code_2_digits'] === 'NL') selected='selected' @endif>{{ $state['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="destinationcity" placeholder="Ciudad" value="monterrey">
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Calle</label>
                        <input type="text" class="form-control" name="destinationstreet" placeholder="Calle" value="av vasconcelos">
                    </div>
                    <div class="col-sm">
                        <label for="">Número</label>
                        <input type="text" class="form-control" name="destinationnumber" placeholder="Número" value="1400">
                    </div>
                    <div class="col-sm">
                        <label for="">Colonia</label>
                        <input type="text" class="form-control" name="destinationdistrict" placeholder="Colonia" value="palo blanco">
                    </div>

                </div>

                <div class="row mb-5">
                    <div class="col-sm-6">
                        <label for="reference" class="form-label">Referencia</label>
                        <textarea class="form-control" id="reference" name="destinationreference" rows="3"></textarea>
                    </div>
                </div>
                <hr class="dropdown-divider">

            </div>
            <h5>Paquete</h5>
            <div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Contenido</label>
                        <input type="text" class="form-control" name="content" placeholder="Contenido" value="camisetas rojas">
                    </div>
                    <div class="col-sm">
                        <label for="">Cantidad</label>
                        <input type="text" class="form-control" name="amount" placeholder="Cantidad" value="2">
                    </div>
                    <div class="col-sm">
                        <label for="">Tipo</label>
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option>Seleccione una opción...</option>
                            <option value="box" selected>Caja</option>
                            <option value="envelope">Sobre</option>
                            <option value="pallet">Tarima</option>
                        </select>
                    </div>
                </div>
                <p>Dimensiones</p>
                <div class="col-sm-6">
                    <label for="">Unidad de medida</label>
                    <select class="form-select" name="lengthUnit" aria-label="Default select example">
                        <option >Seleccione una opción...</option>
                        <option value="CM" selected>Centimetros</option>
                        <option value="IN">Pulgadas</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Largo</label>
                        <input type="text" class="form-control" name="lenght" placeholder="Largo" value="2">
                    </div>
                    <div class="col-sm">
                        <label for="">Ancho</label>
                        <input type="text" class="form-control" name="width" placeholder="Ancho" value="5">
                    </div>
                    <div class="col-sm">
                        <label for="">Alto</label>
                        <input type="text" class="form-control" name="height" placeholder="Alto" value="5">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Unidad de medida</label>
                        <select class="form-select" name="weightUnit" aria-label="Default select example">
                            <option >Seleccione una opción...</option>
                            <option value="KG" selected>Kilogramos</option>
                            <option value="LB">Libras</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="">Peso</label>
                        <input type="text" class="form-control" name="weight" placeholder="Peso" value="63">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-sm">
                        <label for="">Valor de aseguramiento</label>
                        <input type="text" class="form-control" name="insurance" placeholder="Valor de aseguramiento" value="0">
                    </div>
                    <div class="col-sm">
                        <label for="">Valor declarado</label>
                        <input type="text" class="form-control" name="declaredValue" placeholder="Valor declarado" value="400">
                    </div>
                </div>
            </div>
            <hr class="dropdown-divider">
            <div>
                <h5>Información de envío</h5>
                <div class="row mb-3">
                    <div class="col-sm">
                        <label for="">Empresa transportadora</label>
                        <select class="form-select" name="carrier" aria-label="Default select example">
                            <option selected>Seleccione una opción...</option>
                            @foreach($carriers['data'] as $carrier)
                                <option value="{{ $carrier['name'] }}" @if($carrier['name'] === 'fedex') selected="selected"@endif>{{ $carrier['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="">Formato de impresión</label>
                        <select class="form-select" name="print" aria-label="Default select example">
                            <option selected>Seleccione una opción...</option>
                            @foreach($printFormats['data'] as $printFormat )
                                <option value="{{ $printFormat['print_format'].','.$printFormat['print_size'] }}" @if($printFormat['print_format'] === 'PDF' && $printFormat['print_size'] === 'STOCK_4X6' && $printFormat['name'] === 'fedex') selected="selected"@endif>{{ $printFormat['print_format'].','.$printFormat['print_size'].' ('.$printFormat['name'].')' }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="comments" class="form-label">Comentarios</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3" >comentarios de el envío</textarea>
                    </div>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-3 btn-lg">Guardar</button>
            </div>
        </form>
    </div>
@endsection
