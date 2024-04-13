@extends('layouts.main')

@section('content')
    <div class="main-content-inner">
        <div class="container">
            <div class="row">
                <!-- Primary table start -->
                <div class="col-12 mt-5">
                    @include('layouts.notification')
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex; align-items: center;  justify-content: space-between;">
                                <h4 class="header-title">Danh sách nhân viên</h4>
                                <a href="{{route('users.create')}}">
                                    <button type="button" class="btn btn-success btn-xs mb-3">Thêm mới</button>
                                </a>
                            </div>
                            <div class="data-tables datatable-primary">
                                <table id="dataTable2" class="text-center">
                                    <thead class="text-capitalize">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Chức năng</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $data->code }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if($data->position == 0)
                                                    <span class="badge badge-primary" style="font-size: 12px">Nhân viên</span>
                                                @elseif($data->position == 1)
                                                    <span class="badge badge-success" style="font-size: 12px">Quản lý</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(Auth::user()->position == 1 && Auth::user()->id != $data->id)
                                                <a href="{{route('users.edit', $data->id)}}">
                                                    <button class="btn btn-rounded btn-warning btn-xs mb-3" type="button"
                                                            value="Input"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <form action="{{route('users.destroy', $data->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="deleteBtn btn btn-rounded btn-danger btn-xs mb-3" type="button"
                                                            value="Reset"><i class="fa fa-trash"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Primary table end -->
            </div>
        </div>
    </div>
@endsection
