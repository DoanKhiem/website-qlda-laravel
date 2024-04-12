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
                            <h4 class="header-title">Danh sách rủi ro</h4>
                            <div class="data-tables datatable-primary">
                                <table id="dataTable2" class="text-center">
                                    <thead class="text-capitalize">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã rủi ro</th>
                                        <th>Tên rủi ro</th>
                                        <th>Dự án</th>
                                        <th>Ghi chú</th>
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
                                                {{ $data->project->name }}
                                            </td>

                                            <td>{{ $data->note }}</td>
                                            <td>
                                                <a href="{{route('risks.edit', $data->id)}}">
                                                    <button class="btn btn-rounded btn-warning btn-xs mb-3" type="button"
                                                            value="Input"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <form action="{{route('risks.destroy', $data->id)}}" method="POST" class="d-inline">
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
