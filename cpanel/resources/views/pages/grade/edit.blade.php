@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">تعديل بيانات الصف</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 ">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    معلومات الصف
                </div>
                <div class="panel-body ">

                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-grade" action="{{ route('grade.update', $grade) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group @error('name') has-error @enderror">
                                    <label class="control-label" for="name">اسم الصف</label>
                                    <input id="name" name="name" class="form-control"
                                        value="{{ old('name') ?? $grade->name }}" placeholder="اكتب هنا ..">
                                    @error('name')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <p>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">العودة</a>
                                    <button type="submit" class="btn btn-warning">تعديل</button>
                                </p>
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
