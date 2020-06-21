@extends ('layouts.admin')
@section('contenido')

<div class="row">
  <div class="col-lg-4 col-md-6 ml-auto mr-auto">
    <div class="card card-login">
      <form class="form" method="post" action="{{url('/login')}}" enctype="multi/form-data">
        @csrf
        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
          @endif
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title">Inicio de Sesión</h4>          
          </div>
          <div class="card-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">mail</i>
                </span>
              </div>
              <input name="correo" type="email" class="form-control" placeholder="Correo...">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
              <input name="contrasenia" type="password" class="form-control" placeholder="Contraseña...">
            </div>
          </div>
          <div class="footer text-center">
            <input class="btn btn-primary btn-link btn-wd btn-lg" type="submit" value="Iniciar Sesión">
          </div>
      </form>
    </div>
  </div>
</div>      
@stop