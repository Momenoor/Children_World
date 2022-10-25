@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">عرض بيانات الواجب</h1>
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
                            <div class="form-group">
                                <label class="control-label" for="name">عنوان الواجب</label>
                                <p id="name" name="name" class="form-control-static">{{ $homework->subject }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <div class="form-group">
                                <label class="control-label" for="name">ايضاح الواجب</label>
                                <p id="name" name="name" class="form-control-static">{{ $homework->content }}</p>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <div class="form-group">
                                <label class="control-label" for="name">الصف</label>
                                <p id="name" name="name" class="form-control-static">{{ $homework->grade->name }}
                                </p>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <div class="form-group">
                                <label class="control-label" for="name">المعلمة</label>
                                <p id="name" name="name" class="form-control-static">
                                    {{ $homework->teacher->user->name }}</p>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <div class="form-group">
                                <label class="control-label" for="name">الواجب</label>
                                <p class="form-control-static"><a href="{{ asset("/storage/$homework->file") }}"
                                        target="_blank"><img class="img-thumbnail"
                                            src="{{ asset("/storage/$homework->file") }}"
                                            alt="homework{{ $homework->subject }}" width="350px"></a></p>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                    <p>
                        <a href="{{ route('student.homework.index') }}" class="btn btn-primary">العودة</a>
                    </p>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection
