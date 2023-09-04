@extends('layouts/master')

@section('title')
    ادارة المواعيد
@endsection
@section('links')
@endsection

@section('content')
    {{-- <section style="background-color: #eee;"> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">المسنخدمين</h5>
                        {{-- <p class="card-text">Add .table-bordered for borders on all sides of the table and cells.</p> --}}
                        <table class="table table-bordered table-hover mb-0" id="table">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الحالة </th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-danger">غير مفعل</span>
                                            @else
                                                <span class="badge badge-success">مفعل</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 0)
                                                <a href="{{ route('active',$item->id) }}" class="btn btn-success">تفعيل</a>
                                            @else
                                                <a href="{{ route('unactive',$item->id) }}" class="btn btn-danger">الغاء التفعيل</a>
                                            @endif
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

    {{-- </section> --}}
@endsection
