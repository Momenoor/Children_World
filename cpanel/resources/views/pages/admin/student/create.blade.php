@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">اضافة طالب جديد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            @if ($grades->count() > 0)
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        معلومات الطالب الجديد
                    </div>
                    <div class="panel-body ">
                        <div class="row ">
                            <div class="col-lg-6 pull-right">
                                <form name="add-grade" action="{{ route('admin.student.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group @error('users.name') has-error @enderror">
                                        <label class="control-label" for="name">اسم الطالب</label>
                                        <input id="name" name="users[name]" class="form-control"
                                            value="{{ old('users.name') }}" placeholder="اكتب هنا ..">
                                        @error('users.name')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('students.phone') has-error @enderror">
                                        <label class="control-label" for="phone">الجوال</label>
                                        <input id="phone" type="tel" name="students[phone]" class="form-control"
                                            value="{{ old('students.phone') }}" placeholder="اكتب هنا ..">
                                        @error('students.phone')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('students.born_at') has-error @enderror">
                                        <label class="control-label" for="born_at">تاريخ الميلاد</label>
                                        <input id="born_at" type="date" name="students[born_at]"
                                            class="form-control text-right" value="{{ old('students.born_at') }}"
                                            placeholder="اكتب هنا ..">
                                        @error('students.born_at')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('students.grade_id') has-error @enderror">
                                        <label class="control-label" for="grade_id">الصف</label>
                                        <select id="grade_id" name="students[grade_id]" class="form-control select2">
                                            <option value="" disabled selected hidden>اختر الصف ..</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    @if (old('students.grade_id') == $grade->id) selected @endif>{{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('students.grade_id')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('users.email') has-error @enderror">
                                        <label class="control-label" for="users.email">البريد الالكتروني</label>
                                        <input id="email" type="text" name="users[email]" class="form-control"
                                            value="{{ old('users.email') }}" placeholder="اكتب هنا ..">
                                        @error('users.email')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('users.password') has-error @enderror">
                                        <label class="control-label" for="password">الرقم السري</label>
                                        <input id="password" type="password" name="users[password]" class="form-control"
                                            value="{{ old('users.password') }}" placeholder="اكتب هنا ..">
                                        @error('users.password')
                                            <p class="help-block text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('users.password_confirmation') has-error @enderror">
                                        <label class="control-label" for="password_confirmation">تأكيد الرقم السري</label>
                                        <input id="password_confirmation" type="password"
                                            name="users[password_confirmation]" class="form-control"
                                            value="{{ old('users.password_confirmation') }}" placeholder="اكتب هنا ..">
                                        @error('users.password_confirmation')
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
            @else
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        لا يمكن إضافة طالب جديد
                    </div>
                    <div class="panel-body ">
                        <div class="row ">
                            <div class="col-lg-6 pull-right">
                                لا يمكن إضافة طالب جديد يجب أن يتم إضافة الصفوف أولا، قم ب<a
                                    href="{{ route('admin.grade.create') }}"><b>إضافة صف</b></a> واحد على الأقل.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection
