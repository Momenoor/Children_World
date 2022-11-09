@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">تعديل بيانات المعلمة </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات المعلمة
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-grade" action="{{ route('admin.teacher.update', $teacher) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group @error('users.name') has-error @enderror">
                                    <label class="control-label" for="name">اسم المعلمة</label>
                                    <input id="name" name="users[name]" class="form-control"
                                        value="{{ old('users.name') ?? $teacher->user->name }}" placeholder="اكتب هنا ..">
                                    @error('users.name')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('teachers.phone') has-error @enderror">
                                    <label class="control-label" for="phone">الجوال</label>
                                    <input id="phone" type="tel" name="teachers[phone]" class="form-control"
                                        value="{{ old('teachers.phone') ?? $teacher->phone }}" placeholder="اكتب هنا ..">
                                    @error('teachers.phone')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('teachers.specialization') has-error @enderror">
                                    <label class="control-label" for="specialization">التخصص</label>
                                    <input id="specialization" type="text" name="teachers[specialization]"
                                        class="form-control text-right"
                                        value="{{ old('teachers.specialization') ?? $teacher->specialization }}"
                                        placeholder="اكتب هنا ..">
                                    @error('teachers.specialization')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('teachers.grade_id') has-error @enderror">
                                    <label class="control-label" for="grade_id">الصف</label>
                                    <select id="grade_id" name="teachers[grade_id]" class="form-control select2">
                                        <option value="" disabled selected hidden>اختر الصف ..</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"
                                                @if ((old('teachers.grade_id') ?? $teacher->grade_id) == $grade->id) selected @endif>{{ $grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('teachers.grade_id')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('users.email') has-error @enderror">
                                    <label class="control-label" for="users.email">رقم الهوية </label>
                                    <input id="email" type="text" name="users[email]" class="form-control"
                                        value="{{ old('users.email') ?? $teacher->user->email }}"
                                        placeholder="اكتب هنا ..">
                                    @error('users.email')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                {{-- <div class="form-group @error('users.password') has-error @enderror">
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
                                    <input id="password_confirmation" type="password" name="users[password_confirmation]"
                                        class="form-control" value="{{ old('users.password_confirmation') }}"
                                        placeholder="اكتب هنا ..">
                                    @error('users.password_confirmation')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div> --}}
                                <p>
                                    <a href="{{ route('admin.student.index') }}" class="btn btn-primary">العودة</a>
                                    <button type="submit" class="btn btn-warning">تعديل</button>
                                </p>
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
