<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th class="text-right">اسم الطالب</th>
                        <th class="text-right">تاريخ التقديم</th>
                        <th class="text-right">الحل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($answers as $answer)
                        <tr class="odd">
                            <td>{{ $answer->student->user->name }}</td>
                            <td><i class="fa fa-calendar"></i> {{ $answer->created_at->format('d-m-Y') }}</td>
                            <td><a href="{{ asset("/storage/$answer->answer") }}" target="_blank"><img
                                        src="{{ asset("/storage/$answer->answer") }}"
                                        alt="homework{{ $answer->student->user->name }}" width="150px"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
