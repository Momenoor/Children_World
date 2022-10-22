@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">عرض بيانات المعلمة </h1>
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
                            <div class="form-group">
                                <label class="control-label" for="name">اسم المعلمة</label>
                                <p id="name" name="name" class="form-control-static">{{ $teacher->user->name }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">الجوال</label>
                                <p id="name" name="name" class="form-control-static">{{ $teacher->phone }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="born_at">التخصص</label>
                                <p id="name" name="name" class="form-control-static">{{ $teacher->specialization }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="grade_id">الصف</label>
                                <p id="name" name="name" class="form-control-static"><a
                                        href="{{ route('admin.grade.show', $teacher->grade) }}">{{ $teacher->grade->name }} <i
                                            class="fa fa-external-link"></i></a> - عدد الطلاب بالصف
                                    ({{ $teacher->grade->students->count() }}) طلاب</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="users.email">البريد الالكتروني</label>
                                <p id="name" name="name" class="form-control-static">{{ $teacher->user->email }}</p>
                            </div>
                            <p>
                                <a href="{{ route('admin.teacher.index') }}" class="btn btn-primary">العودة</a>
                            </p>
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
