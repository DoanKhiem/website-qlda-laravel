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
                            <h4 class="header-title">Danh sách công việc</h4>
                            <div class="data-tables datatable-primary">
                                <table id="dataTable2" class="text-center">
                                    <thead class="text-capitalize">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã công việc</th>
                                        <th>Tên công việc</th>
                                        <th>Thời gian</th>
                                        <th>Nhân viên</th>
                                        <th>Dự án</th>
                                        <th>Trạng thái</th>
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
                                                Bắt đầu: {{ $data->start_date }}
                                                <br>
                                                Kết thúc: {{ $data->end_date }}
                                            </td>
                                            <td>
                                                {{ $data->user->name }}
                                            </td>
                                            <td>
                                                {{ $data->project->name }}
                                            </td>
                                            <td>
                                                @if($data->status == 1)
                                                    <span class="badge badge-primary" style="font-size: 12px">Chưa bắt đầu</span>
                                                @elseif($data->status == 2)
                                                    <span class="badge badge-success" style="font-size: 12px">Đang thực hiện</span>
                                                @elseif($data->status == 3)
                                                    <span class="badge badge-secondary" style="font-size: 12px">Hoàn thành</span>
                                                @elseif($data->status == 4)
                                                    <span class="badge badge-danger" style="font-size: 12px">Quá hạn</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('works.edit', $data->id)}}">
                                                    <button class="btn btn-rounded btn-warning btn-xs mb-3" type="button"
                                                            value="Input"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <form action="{{route('works.destroy', $data->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="deleteBtn btn btn-rounded btn-danger btn-xs mb-3" type="button"
                                                            value="Reset"><i class="fa fa-trash"></i></button>
                                                </form>

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
