@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">اضافة مدير جديد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات المدير الجديد
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-grade" action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <div class="form-group @error('name') has-error @enderror">
                                    <label class="control-label" for="name">اسم المدير</label>
                                    <input id="name" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="اكتب هنا ..">
                                    @error('name')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') has-error @enderror">
                                    <label class="control-label" for="email">البريد الالكتروني</label>
                                    <input id="email" type="text" name="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="اكتب هنا ..">
                                    @error('email')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('password') has-error @enderror">
                                    <label class="control-label" for="password">الرقم السري</label>
                                    <input id="password" type="password" name="password" class="form-control"
                                        value="{{ old('password') }}" placeholder="اكتب هنا ..">
                                    @error('password')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('password_confirmation') has-error @enderror">
                                    <label class="control-label" for="password_confirmation">تأكيد الرقم السري</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="form-control" value="{{ old('password_confirmation') }}"
                                        placeholder="اكتب هنا ..">
                                    @error('password_confirmation')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">إضافة</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection
