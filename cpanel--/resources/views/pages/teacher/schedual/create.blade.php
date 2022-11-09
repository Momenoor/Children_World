@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">اضافة الخطة الاسبوعية </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    {{ now()->format('d-m-Y') }}
                    <div class="pull-left ">
                        {{ now()->translatedFormat('l') }}
                    </div>
                </div>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-plan" action="{{ route('teacher.schedual.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label" for="date">التاريخ</label>
                                    <input type="date" value="{{ old('date') }}" id="date" name="date"
                                        class="form-control text-right" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">مفاهيم لغوية</label>
                                    <textarea class="form-control" rows="3" name="subject1">{{ old('subject1') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">مفاهيم حسابية</label>
                                    <textarea class="form-control" rows="3" name="subject2">{{ old('subject2') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">التربية الاسلامية</label>
                                    <textarea class="form-control" rows="3" name="subject3">{{ old('subject3') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">القرآن الكريم</label>
                                    <textarea class="form-control" rows="3" name="subject4">{{ old('subject4') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">العلوم</label>
                                    <textarea class="form-control" rows="3" name="subject5">{{ old('subject5') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">اللغة الانجليزية</label>
                                    <textarea class="form-control" rows="3" name="subject6">{{ old('subject6') }}</textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">إضافة</button>

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
