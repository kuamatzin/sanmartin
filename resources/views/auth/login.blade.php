@extends('app2')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default">
                <div class="card-header">
                    <h3>SIAA Login</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/images/tlaxcala_nuevo.png" alt="" class="mx-auto d-block">
                        </div>
                        <div class="col-md-6">
                            <img src="/images/siaa.png" alt="" height="126px" class="">
                        </div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <form class="form-horizontal mx-auto" role="form" method="POST" action="/login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="control-label">E-Mail</label>
                            <div>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Entrar
                                </button>

                                <a href="/password/email">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
