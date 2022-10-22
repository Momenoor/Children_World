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
                            <form name="add-plan" action="{{ route('teacher.rate.store') }}" method="post">
                                @csrf

                                <div class="form-group  @error('date') has-error @enderror">
                                    <label class="control-label " for="date">التاريخ</label>
                                    <input type="date" format="m-Y" value="{{ old('date') }}" id="date"
                                        name="date" class="form-control text-right" />
                                    @error('date')
                                        <p class="help-block text-danger" role="alert">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" for="date">الشهر</label>
                                    <p id="month" name="month" class="form-control-static"></p>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" for="date">لسنة</label>
                                    <p id="year" name="year" class="form-control-static"></p>
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
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->user->name }}</td>
                                                <td dir="ltr">
                                                    <div
                                                        class="form-group input-group @error('rate.' . $student->id) has-error @enderror">
                                                        <span class="input-group-addon">%
                                                        </span>
                                                        <input type="number" class="form-control text-right"
                                                            name="rate[{{ $student->id }}]"
                                                            value="{{ old('rate.' . $student->id) }}" />
                                                    </div>
                                                    @error('rate.' . $student->id)
                                                        <p class="help-block text-right text-danger" role="alert">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" name="submit" class="btn btn-success">إضافة</button>

                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

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
@push('scripts')
    <script>
        window.addEventListener('load', function() {
            const month = ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر",
                "أكتوبر",
                "نوفمبر", "ديسمبر"
            ];

            $('#date').on('change', function() {
                const d = new Date($(this).val());
                $('#month').html(month[d.getMonth()]);
                $('#year').html(d.getFullYear());
            });
        });
    </script>
@endpush
