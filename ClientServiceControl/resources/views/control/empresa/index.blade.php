@extends ('layouts.admin')
@section('contenido')
<div class="row">
   <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Servicios </h3>
      @include('control.empresa.busqueda')
   </div>
</div>
   <table class="table table-dark">
      <!--caption>Servicios por Empresa</caption-->
      <thead class="thead-dark">
         <th scope="col">Nombre Empresa</th>
         <th scope="col">Numero Contrato</th>
         <th scope="col">Tipo de Servicio</th>
         <th scope="col">Fecha de Inicio del Servicio</th>
         <th scope="col">Fecha Finalizacion del Servicio </th>
         <th scope="col">Estado del Servicio</th>
      </thead>
      <tbody>
         @foreach ($empresas as $emp)
            @if ( $emp->estado==0)
               <tr class="table-danger">
            @elseif($emp->estado==1)
               <tr class="table-warning">
            @else
               <tr class="table-success">
            @endif
            
               <td class="css-cell-format">{{$emp->nombre_empresa}}</td>
               <td class="css-cell-format">{{$emp->id_contrato}}</td>
               <td class="css-cell-format">{{$emp->nombre_servicio}}</td>
               <td class="css-cell-format">{{$emp->fecha_contrato}}</td>
               <td class="css-cell-format">{{$emp->fecha_vencimiento}}</td>
               @if ( $emp->estado==0)
                  <td class="css-cell-format">Vencido</td>
               @elseif($emp->estado==1)
                  <td class="css-cell-format">Por vencer</td>
               @else
                  <td class="css-cell-format">Vigente</td>
               @endif
            </tr>
         @endforeach
      </tbody>   
   </table>

   

@endsection