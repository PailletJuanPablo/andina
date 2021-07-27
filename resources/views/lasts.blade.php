<div class="box box-solid box-primary">
        <div class="box-header">
          <h3 class="box-title">Últimos Vouchers Registrados </h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th> Identificador</th>
                <th>Fecha y hora</th>
                <th>Monto </th>
                <th>Destinatario</th>
                <th>Referente</th>

                <th> </th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($cobranzas as $cobranza)
                  <tr>
                  <td>{{$cobranza->id}}</td>
                  <td>{{$cobranza->formatted()}}</td>
                  <td> $ {{$cobranza->ammount}}</td>
                  <td>{{$cobranza->name}}</td>
                  <td>{{$cobranza->referent}}</td>

                  <td>
                        <a href="{!! route('cobranzas.show', [$cobranza->id]) !!}" >Ver detalles</a>
                  </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
        <a href="{{route('cobranzas.index')}}" class="btn bg-purple btn-block">Ver todos</a>
        </div>
        <!-- /.box-footer -->
      </div>
