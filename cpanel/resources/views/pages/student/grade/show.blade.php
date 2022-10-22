@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">عرض بيانات الصف</h1>
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
                            <div class="form-group">
                                <label class="control-label" for="name">اسم الصف</label>
                                <p id="name" name="name" class="form-control-static">{{ $grade->name }}</p>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-right">أسماء الطلاب</th>
                                            <th class="text-right">تاريخ الميلاد </th>
                                            <th class="text-right">التقييم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grade->students as $student)
                                            <tr class="odd">
                                                <td>{{ $student->user->name }}</td>
                                                <td>{{ $student->born_at->format('d-m-Y') }}</td>
                                                <td> .</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                إجمالي عدد الطلاب ({{ $grade->students->count() }})
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-right">أسماء المعلمات</th>
                                            <th class="text-right">تاريخ الميلاد </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grade->teachers as $teacher)
                                            <tr class="odd">
                                                <td>{{ $teacher->user->name }}</td>
                                                <td>{{ $teacher->specialization }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                إجمالي عدد المعلمات ({{ $grade->teachers->count() }})
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a href="{{ route('grade.index') }}" class="btn btn-primary">العودة</a>
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
