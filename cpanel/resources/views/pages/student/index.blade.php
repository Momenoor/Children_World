@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الطلاب</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    اسماء الطلاب
                    @isset($grade)
                        - صف <b>{{ $grade->name }}</b>
                    @endisset
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-right">اسم الطالب</th>
                                    <th class="text-right">الصف</th>
                                    <th class="text-right">تاريخ الميلاد</th>
                                    <th class="text-right">رقم الهاتف</th>
                                    <th class="text-right">التقييم</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="odd">
                                        <td>{{ $student->user->name }}</td>
                                        <td>{{ $student->grade->name }} </td>
                                        <td>{{ $student->born_at->format('d-m-Y') }} ({{ $student->age }} عام)</a></td>
                                        <td>{{ $student->phone }} </td>
                                        <td></td>
                                        <td style="width: 260px">
                                            <form action="{{ route('student.destroy', $student) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                    <a class="btn btn-sm btn-social btn-warning"
                                                        href="{{ route('student.edit', $student) }}">
                                                        <i class="fa fa-pencil-square-o"></i> تعديل
                                                    </a>
                                                    <a class="btn btn-sm btn-social btn-primary"
                                                        href="{{ route('student.show', $student) }}">
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
                                        يتم عرض عدد ({{ $students->count() }}) طالب من إجمالي ({{ $students->total() }})
                                        طلاب
                                    </td>
                                    <td colspan="2" class=" text-left">
                                        {{ $students->links() }}
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
            $('.deleteBtn').on('click', function(e) {
                var ok = confirm('هل أنت متأكد من حذف السجل؟');
                if (ok) {
                    $(this).parents('form').submit();
                }
            });
        });
    </script>
@endpush
