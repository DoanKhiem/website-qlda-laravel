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
                                <h4 class="header-title">Danh sách vấn đề</h4>
                                <a href="{{route('issues.create')}}">
                                    <button type="button" class="btn btn-success btn-xs mb-3">Thêm mới</button>
                                </a>
                            </div>
                            <div class="data-tables datatable-primary">
                                <table id="dataTable2" class="text-center">
                                    <thead class="text-capitalize">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã vấn đề</th>
                                        <th>Tên vấn đề</th>
                                        <th>Nhân viên</th>
                                        <th>Dự án</th>
                                        <th>Trạng thái</th>
                                        <th>Mô tả</th>
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
                                            <td>
                                                {{ $data->user->name }}
                                            </td>
                                            <td>
                                                {{ $data->project->name }}
                                            </td>
                                            <td>
                                                @if($data->status == 1)
                                                    <span class="badge badge-danger" style="font-size: 12px">Chưa sửa</span>
                                                @elseif($data->status == 2)
                                                    <span class="badge badge-primary" style="font-size: 12px">Đang sửa</span>
                                                @elseif($data->status == 3)
                                                    <span class="badge badge-success" style="font-size: 12px">Đã sửa</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                <a href="{{route('issues.edit', $data->id)}}">
                                                    <button class="btn btn-rounded btn-warning btn-xs mb-3" type="button"
                                                            value="Input"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <form action="{{route('issues.destroy', $data->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="deleteBtn btn btn-rounded btn-danger btn-xs mb-3" type="button"
                                                            value="Reset"><i class="fa fa-trash"></i></button>
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
                <!-- Primary table end -->
            </div>
        </div>
    </div>
@endsection
