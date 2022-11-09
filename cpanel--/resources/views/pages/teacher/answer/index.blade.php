@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">حلول الواجبات
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    حلول الواجبات
                    @isset($homework)
                        - <b> {{ $homework->subject }} </b>
                    @endisset
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('pages.answer.table', ['answers' => $answers])
                    <p>
                        <a href="{{ route('teacher.homework.index') }}" class="btn btn-primary">العودة</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
