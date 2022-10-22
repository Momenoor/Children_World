@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">عرض بيانات الطالب </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات الطالب
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <div class="form-group">
                                <label class="control-label" for="name">اسم الطالب</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->user->name }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">الجوال</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->phone }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="born_at">تاريخ الميلاد</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->born_at->format('d-m-Y') }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="born_at">العمر</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->age }} عام</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="grade_id">الصف</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->grade->name }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="users.email">البريد الالكتروني</label>
                                <p id="name" name="name" class="form-control-static">{{ $student->user->email }}</p>
                            </div>
                            <p>
                                <a href="{{ route('teacher.student.index') }}" class="btn btn-primary">العودة</a>
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
