@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">المستخدمين</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    اسماء المستخدمين
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
                                    <th class="text-right">اسم المستخدم</th>
                                    <th class="text-right">البريد الالكتروني</th>
                                    <th class="text-right">الدور</th>
                                    <th class="text-right">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="odd">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->role_name }} </td>
                                        <td style="width: 260px">
                                            <form action="{{ route('admin.admin.destroy', $user) }}" method="POST">
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
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        يتم عرض عدد ({{ $users->count() }}) طالب من إجمالي ({{ $users->total() }})
                                        طلاب
                                    </td>
                                    <td colspan="2" class=" text-left">
                                        {{ $users->links() }}
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
