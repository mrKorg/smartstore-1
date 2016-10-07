@extends('layouts.index')

@section('content')

<!--breadcrumb start-->
<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>Password recovery</h1>
    </div>
</div>
<!--end breadcrumb-->

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="sky-form-login">
                <!--password recovery form start-->
                <form action="{{ url('/password/reset') }}" id="sky-form2" class="sky-form" role="form" method="post">

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <h3 class="text-left"><i class="fa fa-unlock"></i>Reset Password</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <fieldset>
                        <section>
                            <label class="label">E-mail</label>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                                @if ($errors->has('password'))
                                    <b class="tooltip active tooltip-bottom-right">{{ $errors->first('email') }}</b>
                                @else
                                    <b class="tooltip tooltip-bottom-right">Enter your email</b>
                                @endif
                            </label>
                        </section>

                        <section>
                            <div class="row">
                                <label class="label col col-4">Enter Password</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input id="password" type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password') }}</b>
                                        @else
                                            <b class="tooltip tooltip-bottom-right">Enter your password</b>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row">
                                <label class="label col col-4">Confirm Password</label>
                                <div class="col col-8">
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <b class="tooltip active tooltip-bottom-right">{{ $errors->first('password_confirmation') }}</b>
                                        @else
                                            <b class="tooltip tooltip-bottom-right">Confirm your password</b>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </section>

                    </fieldset>

                    <footer>
                        <button type="submit" name="submit" class="button">Reset</button>
                        <a href="{{ url('login') }}" class="button button-secondary modal-closer">Close</a>
                    </footer>

                    <div class="message">
                        <i class="fa fa-check"></i>
                        <p>Your request successfully sent!<br><a href="#" class="modal-closer">Close window</a></p>
                    </div>

                </form>

                <!--password-recovery form end-->
            </div>
        </div><!--col end-->
    </div>
</div>
<div class="space-60"></div>

@endsection