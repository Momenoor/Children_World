@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">التقييم الشهري للطلاب</h1>
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
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="date">الشهر</label>
                                <p id="month" name="month" class="form-control-static">{{$rates[0]->date->translatedFormat('M')}}</p>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" for="date">السنة</label>
                                <p id="year" name="year" class="form-control-static">{{$rates[0]->date->format('Y')}}</p>
                            </div>
                            <table class="table table-borderd table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-right">
                                            اسم الطالب
                                        </th>
                                        <th class="text-right">
                                            التقييم
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates as $rate)
                                        <tr>
                                            <td>{{ $rate->student->user->name }}</td>
                                            <td>
                                                {{$rate->rate}} %
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
