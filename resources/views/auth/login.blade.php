<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('./plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./plugins/node-waves/waves.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./plugins/animate-css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">{{ env('APP_NAME') }}</a>
            <small>{{ env('APP_DESC') }}</small>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('login') }}" id="sign_in">
                    @csrf
                    <div class="msg">{{ env('DESC_LOGIN') }}</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Usuario / Correo" required autofocus value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Entrar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-9 align-right">
                            <a href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('./plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('./plugins/node-waves/waves.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ URL::asset('./js/admin.js') }}"></script>
    <script src="{{ URL::asset('./js/pages/examples/sign-in.js') }}"></script>

</body>

</html>
