{!! Form::open(array('url'=>'control/empresa','method'=>'GET', 'autocomplete'=>'off','role'=>'search'))!!}
<div class="">
  <label class="css-title-format" for="estado">Seleccione el tipo de estado: </label>
  <select class="css-select-format" name="estado" id="estado">
    <option value="3">Todos</option>
    <option value="2">Vigente</option>
    <option value="0">Vencido</option>
    <option value="1">Por vencer</option>
  </select>
  <div class="btn-group">
    <button class="btn btn-primary btn-sm" type="submit">Mostrar</button>
  </div>
</div>
{{Form::close()}}
