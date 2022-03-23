@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            Home
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
            Registrar Garantía
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">{{$user->name}}

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <h1>Activación de Garantía</h1>
                    <p class="text-muted">Garantía de por vida</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="Tu nombre" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope fa-fw"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                                <label for="departamento">Departamento</label>
                                              <select name="departamento" class="form-control" id="departamento" >
                                               <option>Selecciona un departamento</option>
                                        <?php  for($i=0;$i<=count($departamentos)-1;$i++){  if($departamentos[$i]->id !=$i){ ?>

                                              <option value="<?= $departamentos[$i]->id  ?>" ><?= $departamentos[$i]->departamento ?></option>
                                              <?php   }} ?>
                                              </select>                     
                    </div>

                     <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                              <select name="ciudad" class="form-control" id="ciudad" >
                                               <option> Ciudad </option>
                                               <option value="">Selecciona:</option>
                                              </select>                     
                        </div>

                    

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <button class="btn btn-block btn-primary">
                        {{ trans('global.register') }}
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("/Adminpanel-Email-Username/public/departamentos/"+event.target.value+"",function(response,state) {
$("#departamento").empty();
$("#departamento").append("<option value=''>Selecciona un departamento</option>");
for(i=0; i<response.length; i++) {
$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].departamento+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>
@parent

@endsection