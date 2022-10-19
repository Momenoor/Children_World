@extends('layouts.auth')

@section('content')
    <div class="login-panel panel panel-default text-center">
        <img src="{{asset('media/login-logo.jpg')}}" width='220px'>

        <div class="panel-heading">
            <h3 class="panel-title">تسجيل الدخول</h3>
        </div>
        <div class="panel-body">
            <form action="{{ route('login') }}" method="post" name="login">
                @CSRF
                <fieldset>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="اسم المستخدم"
                            name="email" value="{{ old('email') }}" type="text" required autocomplete autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="كلمة المرور" name="password" type="password"
                            autocomplete="current-password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox">
                        <label>
                            تذكرني <input name="remember" type="checkbox" value="Remember Me">
                        </label>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <input name="login" type="submit" value="دخول" class="btn btn-lg btn-success btn-block">
                </fieldset>
            </form>
        </div>
    </div>
@endsection
