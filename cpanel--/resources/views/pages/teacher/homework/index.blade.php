@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">الواجبات
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    الواجبات
                    @isset($grade)
                        - للصف <b>{{ $grade->name }}</b>
                    @endisset
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-right">العنوان</th>
                                    <th class="text-right">الايضاح</th>
                                    <th class="text-right">المعلمة</th>
                                    <th class="text-right">الصف</th>
                                    <th class="text-right">التاريخ</th>
                                    <th class="text-right">ردود الطلاب</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homeworks as $homework)
                                    <tr class="odd">
                                        <td>{{ $homework->subject }}</td>
                                        <td>{{ $homework->content }}</td>
                                        <td>{{ $homework->teacher->user->name }}</td>
                                        <td>{{ $homework->grade->name }}</td>
                                        <td><i class="fa fa-calendar"></i> {{ $homework->created_at->format('d-m-Y') }}</td>
                                        <td><a href="{{ route('teacher.homework.answer', $homework) }}">عرض إجابات
                                                ({{ $homework->answers_count }})
                                                طالب قام بالحل</a>
                                        </td>
                                        <td style="width: 260px">
                                            <form action="{{ route('teacher.homework.destroy', $homework) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                    {{-- <a class="btn btn-sm btn-social btn-warning"
                                                        href="{{ route('teacher.homework.edit', $homework) }}">
                                                        <i class="fa fa-pencil-square-o"></i> تعديل
                                                    </a> --}}
                                                    <a class="btn btn-sm btn-social btn-primary"
                                                        href="{{ route('teacher.homework.show', $homework) }}">
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
                                        يتم عرض عدد ({{ $homeworks->count() }}) واجب من إجمالي ({{ $homeworks->total() }})
                                        واجبات
                                    </td>
                                    <td colspan="3" class=" text-left">
                                        {{ $homeworks->links() }}
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
