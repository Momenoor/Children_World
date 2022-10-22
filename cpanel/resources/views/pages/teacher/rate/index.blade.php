@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">تقييم الطلاب</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    تقييم الطلاب
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
                                    <th class="text-right">الصف</th>
                                    <th class="text-right">الشهر</th>
                                    <th class="text-right">السنة</th>
                                    <th class="text-right">تاريخ التقييم</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rates as $rate)
                                    <tr class="odd">
                                        <td>{{ $rate->grade->name }}</td>
                                        <td>{{ $rate->date->translatedFormat('M') }}</a></td>
                                        <td>{{ $rate->date->format('Y') }} </td>
                                        <td>{{ optional($rate->created_at)->format('d-m-Y') }}</td>
                                        <td style="width: 260px">
                                            <form action="{{ route('teacher.rate.destroy', $rate) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                    <a class="btn btn-sm btn-social btn-primary"
                                                        href="{{ route('teacher.rate.show', $rate) }}">
                                                        <i class="fa fa-eye"></i> عرض
                                                    </a>
                                                </p>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
