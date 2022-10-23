@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">لوحة تحكم المدير</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            البيانات الشخصية
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            الخطة الأسبوعية <span class="pull-left"> يوم <b>{{ today()->translatedFormat('l') }}</b>
                                الموافق
                                <b>{{ now()->format('d-m-Y') }}</b>
                            </span>
                        </div>
                        <div class="panel-body">
                            @if ($scheduals->count() > 0)
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <td>اليوم</td>
                                        <td>مفاهيم لغوية</td>
                                        <td>مفاهيم حسابية</td>
                                        <td>التربية الاسلامية</td>
                                        <td>القرآن الكريم</td>
                                        <td>العلوم</td>
                                        <td>اللغة الانجليزية</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduals as $schedual)
                                            <tr>
                                                <td>{{ $schedual->date->translatedFormat('l - d-m-Y') }}</td>
                                                <td>{{ $schedual->subject1 }}</td>
                                                <td>{{ $schedual->subject2 }}</td>
                                                <td>{{ $schedual->subject3 }}</td>
                                                <td>{{ $schedual->subject4 }}</td>
                                                <td>{{ $schedual->subject5 }}</td>
                                                <td>{{ $schedual->subject6 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                لا يوجد برنامج تعليمي لليوم الحالي.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6"></div>
            </div>
        </div>
    </div>
@endsection
