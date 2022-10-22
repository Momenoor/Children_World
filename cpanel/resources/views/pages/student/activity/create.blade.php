@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">اضافة نشاط جديد</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات النشاط
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-homework" action="{{ route('teacher.activity.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group @error('title') has-error @enderror">
                                    <label class="control-label" for="name">الموضوع</label>
                                    <input id="title" name="title" class="form-control" value="{{ old('title') }}"
                                        placeholder="اكتب هنا ..">
                                    @error('title')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group @error('end_date') has-error @enderror">
                                            <label class="control-label" for="name">تاريخ النهاية</label>
                                            <input id="end_date" name="end_date" type="date" class="form-control text-right" value="{{ old('end_date') }}"
                                                placeholder="اكتب هنا ..">
                                            @error('end_date')
                                                <p class="help-block text-danger" role="alert">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group @error('start_date') has-error @enderror">
                                            <label class="control-label" for="name">تاريخ البداية</label>
                                            <input id="start_date" name="start_date" type="date" class="form-control text-right" value="{{ old('start_date') }}"
                                                placeholder="اكتب هنا ..">
                                            @error('start_date')
                                                <p class="help-block text-danger" role="alert">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group @error('goal') has-error @enderror">
                                    <label class="control-label" for="name">الأهداف</label>
                                    <textarea id="goal" name="goal" rows="4" class="form-control" placeholder="اكتب هنا ..">{{ old('goal') }}</textarea>
                                    @error('goal')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label" for="name">التفاصيل</label>
                                    <textarea id="content"  rows="6" name="content" class="form-control" placeholder="اكتب هنا ..">{{ old('content') }}</textarea>
                                    @error('content')
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
