@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">حل الواجب
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    حل الواجب
                    @isset($homework)
                        - <b>{{ $homework->subject }}</b>
                    @endisset
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row ">
                        <div class="col-lg-6 pull-right">
                            <form name="add-homework" action="{{ route('student.answer.store', $homework) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label" for="name">الموضوع</label>
                                    <p class="form-control-static"> {{ $homework->subject }} </p>
                                </div>
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label" for="name">الايضاح</label>
                                    <p class="form-control-static"> {{ $homework->content }} </p>
                                </div>
                                <div class="form-group @error('answer') has-error @enderror">
                                    <label class="control-label" for="name">ارفق ملف</label>
                                    <input id="file" name="answer" type="file" class="form-control"
                                        value="{{ old('answer') }}" placeholder="اكتب هنا ..">
                                    @error('answer')
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
                </div>
            </div>
        </div>
    </div>
@endsection
