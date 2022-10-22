@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">اضافة واجب جديد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات الواجب
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-homework" action="{{ route('teacher.homework.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group @error('subject') has-error @enderror">
                                    <label class="control-label" for="name">الموضوع</label>
                                    <input id="subject" name="subject" class="form-control" value="{{ old('subject') }}"
                                        placeholder="اكتب هنا ..">
                                    @error('subject')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label" for="name">الايضاح</label>
                                    <textarea id="content" name="content" class="form-control" placeholder="اكتب هنا ..">{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('homework_file') has-error @enderror">
                                    <label class="control-label" for="name">ارفق ملف</label>
                                    <input id="file" name="homework_file" type="file" class="form-control"
                                        value="{{ old('homework_file') }}" placeholder="اكتب هنا ..">
                                    @error('homework_file')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">إضافة</button>

                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

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
