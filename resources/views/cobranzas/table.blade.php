<div class="table-responsive">
    <table class="table" id="cobranzas-table">
        <thead>
            <tr>
                <th>Fecha </th>
                <th>Monto</th>
                <th>CECO</th>

                <th>Origen</th>
                <th>Destino</th>
                <th>Beneficiario</th>
                <th>  Estado </th>

                <th >Detalle</th>
                <th>  Modificar Estado </th>

            </tr>
        </thead>
        <tbody>
            @foreach($cobranzas as $cobranza)
            <tr>
                <td>{!! $cobranza->operation_date !!}</td>
                <td>${!! $cobranza->ammount !!}</td>
                <td>{!! $cobranza->ceco ? $cobranza->ceco->title : 'Sin asignar' !!} </td>

                <td>{!! $cobranza->origin !!}</td>
                <td>{!! $cobranza->destination !!}</td>
                <td>{!! $cobranza->name !!}</td>

                <td>
                @if($cobranza->status == 'approved') 
                <div class="text-center" style="background: green; padding: 5px; color: white">     Aprobado </div>
                @endif
                @if($cobranza->status == 'rejected') 
                <div class="text-center"  style="background: red; padding: 5px; color: white">     Desaprobado </div>
                @endif
                 @if(!$cobranza->status) 
                    Pendiente
                @endif
                </td>
                <td>
                  <a href="{!! route('cobranzas.show', [$cobranza->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                  
                </td>

                <td style="display: flex">
                 <form method="post" action="{{route('switchCobranzaStatus', $cobranza->id)}}" style="display: flex">
                    @csrf
                        @if($cobranza->status == 'rejected') 
                            <button type="submit" name="status" class="btn btn-primary bg-purple text-white btn-sm" value="approved"> Aprobar </button> 

                        @elseif($cobranza->status == 'approved') 
                        <button type="submit" name="status" class="btn btn-primary bg-red text-white btn-sm" value="rejected"> Desaprobar </button> 

                        @else
                        <button type="submit" name="status" class="btn btn-primary bg-purple btn-sm text-white" value="approved"> Aprobar </button> 

                        <button type="submit" name="status" class="btn btn-primary btn-sm bg-red text-white" value="rejected"> Desaprobar </button> 

                        @endif


                    </form>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>