@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">النشاطات</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px">
                    النشاطات
                    <span class="pull-left"><a href="{{ route('teacher.activity.create') }}" class="btn btn-primary btn-sm"><i
                                class="fa fa-plus"></i> إضافة نشاط
                            جديد</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="timeline">
                        @foreach ($timelines as $timeline)
                            <li class="{{ $loop->index % 2 ? 'timeline-inverted' : '' }}">
                                <div class="timeline-badge info"><i class="fa fa-check"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <div>
                                            <h4 class="timeline-title">{{ $timeline->title }}</h4>
                                            <form class="pull-left" action="{{ route('teacher.activity.destroy', $timeline) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
                                                </p>
                                            </form>
                                        </div>
                                        <p>
                                            <small class=""><i class="fa fa-calendar-o"></i> <span
                                                    class="text-success">{{ $timeline->start_date->format('d-m-Y') }}</span>
                                                - <i class="fa fa-calendar-o"></i> <span
                                                    class="text-warning">{{ $timeline->end_date->format('d-m-Y') }}</span>
                                            </small>

                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $timeline->content }}.</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-right">اسم المستخدم</th>
                                    <th class="text-right">البريد الالكتروني</th>
                                    <th class="text-right">الدور</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr class="odd">
                                        <td>{{ $activity->title }}</td>
                                        <td>{{ $activity->goal }} </td>
                                        <td>{{ $activity->content }} </td>
                                        <td><i class="fa fa-calendar-o"></i> <span
                                                class="text-success">{{ $activity->start_date->format('d-m-Y') }}</span>
                                            - <i class="fa fa-calendar-o"></i> <span
                                                class="text-warning">{{ $activity->end_date->format('d-m-Y') }}</span></td>
                                        <td>
                                            <form action="{{ route('teacher.activity.destroy', $activity) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <p>
                                                    <button class="btn btn-sm btn-social btn-danger deleteBtn"
                                                        type="button">
                                                        <i class="fa fa-times"></i> حذف
                                                    </button>
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
