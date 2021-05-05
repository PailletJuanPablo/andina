@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dar de alta nuevo viaje
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'storeCustom']) !!}


                    <div class="form-group col-sm-6">
                        <label for="period"> Empresa </label>

                        <select class="form-control" name="company_id" id="company_id">

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"> {{ $company->title }}</option>

                            @endforeach

                        </select>

                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('nro_movil', 'Número de móvil:') !!}
                        {!! Form::text('nro_movil', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('operation_date', 'Fecha de operación:') !!}
                        <input required type="datetime-local" class="form-control" id="operation_date"
                            name="operation_date">
                    </div>

                    <!-- Origin Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('origin', 'Origen:') !!}
                        {!! Form::text('origin', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <!-- Destination Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('destination', 'Destino:') !!}
                        {!! Form::text('destination', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>


                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'Beneficiario:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <!-- Destination Dni Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('destination_dni', 'Dni:') !!}
                        {!! Form::text('destination_dni', null, ['class' => 'form-control']) !!}
                    </div>



                    <!-- Ammount Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('ammount', 'Monto:') !!}
                        {!! Form::number('ammount', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- User Id Field
    <div class="form-group col-sm-6">
        {--!!! Form::label('user_id', 'User Id:') !!}
        {--!! Form::number('user_id', null, ['class' => 'form-control']) !! }
    </div>
    -->
<input type="hidden" name="sign" id="sign">
                    <div class="form-group col-sm-12">

                        <p> Si es necesario adjuntar imagen, pegarla directamente en el recuadro de abajo, o subirla
                            haciendo click en el icono </p>
                        <textarea id="comments" name="comments" class="editor"></textarea>
                    </div>




                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('cobranzas.index') !!}" class="btn btn-default">Cancelar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <script src="/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {

                toolbar: {
                    items: [
                        'imageUpload',
                    ]
                },
                language: 'es',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: '/save_image',

                    // Enable the XMLHttpRequest.withCredentials property.
                    withCredentials: false,

                    // Headers sent along with the XMLHttpRequest to the upload server.

                }

            })
            .then(editor => {
                window.editor = editor;

                editor.model.document.on( 'change:data', () => {
 
                    var parser = new DOMParser();
var doc = parser.parseFromString(editor.getData(), "text/html");
var image = doc.querySelector('img');
if(image && image.src && image.src.length > 3) {
    document.querySelector('#sign').value = image.src
}
} );









            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                    );
                console.warn('Build id: ajnrpni8c8y5-nohdljl880ze');
                console.error(error);
            });

    </script>

@endsection
