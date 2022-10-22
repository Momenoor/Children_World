@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الصفوف</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    اسماء الصفوف
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-right">اسم الصف</th>
                                    <th class="text-right">عدد الطلاب</th>
                                    <th class="text-right">عدد المعلمات</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr class="odd">
                                        <td>{{ $grade->name }}</td>
                                        <td>( {{ $grade->students_count }} ) <a href="{{ route('admin.grade.student', $grade) }}">
                                                عرض الطلاب</a></td>
                                        <td>( {{ $grade->teachers_count }} ) <a href="{{ route('admin.grade.teacher', $grade) }}">
                                                عرض المعلمين</a></td>
                                        <td style="width: 260px">
                                            <form action="{{ route('admin.grade.destroy', $grade) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteGradeBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                    <a class="btn btn-sm btn-social btn-warning"
                                                        href="{{ route('admin.grade.edit', $grade) }}">
                                                        <i class="fa fa-pencil-square-o"></i> تعديل
                                                    </a>
                                                    <a class="btn btn-sm btn-social btn-primary"
                                                        href="{{ route('admin.grade.show', $grade) }}">
                                                        <i class="fa fa-eye"></i> عرض
                                                    </a>
                                                </p>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        إجمالي عدد الصفوف ({{ $grades->count() }})
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.addEventListener('load', function() {
            $('.deleteGradeBtn').on('click', function(e) {
                var ok = confirm('هل أنت متأكد من حذف السجل؟');
                if (ok) {
                    $(this).parents('form').submit();
                }
            });
        });
    </script>
@endpush
