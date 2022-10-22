@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المعلمات</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    اسماء المعلمات
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
                                    <th class="text-right">اسم المعلمة</th>
                                    <th class="text-right">الصف</th>
                                    <th class="text-right">التخصص</th>
                                    <th class="text-right">رقم الهاتف</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr class="odd">
                                        <td>{{ $teacher->user->name }}</td>
                                        <td>{{ $teacher->grade->name }} </td>
                                        <td>{{ $teacher->specialization }}</a></td>
                                        <td>{{ $teacher->phone }} </td>
                                        <td style="width: 260px">
                                            <form action="{{ route('teacher.destroy', $teacher) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                    <a class="btn btn-sm btn-social btn-warning"
                                                        href="{{ route('teacher.edit', $teacher) }}">
                                                        <i class="fa fa-pencil-square-o"></i> تعديل
                                                    </a>
                                                    <a class="btn btn-sm btn-social btn-primary"
                                                        href="{{ route('teacher.show', $teacher) }}">
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
                                        يتم عرض عدد ({{ $teachers->count() }}) معلمة من إجمالي ({{ $teachers->total() }})
                                        معلمات
                                    </td>
                                    <td colspan="2" class=" text-left">
                                        {{ $teachers->links() }}
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
