@extends('layouts.main')

@section('content')
<div class="main-content-inner">
    <div class="container">
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sửa thông tin công việc</h4>
                        <form action="{{route('works.update', $item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <p class="text-muted font-14 mb-4">Thông tin công việc.</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã công việc</label>
                                <input class="form-control" name="code" type="text" value="{{$item->code}}">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên công việc</label>
                                <input class="form-control" name="name" type="search" value="{{$item->name}}">
                            </div>
                            <div class="form-group">
                                <label for="example-email-input" class="col-form-label" >Thời gian bắt đầu</label>
                                <input class="form-control" name="start_date" type="date" value="{{$item->start_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label">Thời gian kết thúc</label>
                                <input class="form-control" name="end_date" type="date" value="{{$item->end_date}}" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nhân viên</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{$item->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dự án</label>
                                <select class="form-control" name="project_id" required>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}" {{$item->project_id == $project->id ? 'selected' : ''}} >{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Trạng thái</label>
                                <select class="form-control" name="status" required>
                                    <option value="">Lựa chọn</option>
                                    <option value="1" {{$item->status == 1 ? 'selected' : ''}}>Chưa bắt đầu</option>
                                    <option value="2" {{$item->status == 2 ? 'selected' : ''}}>Đang thực hiện</option>
                                    <option value="3" {{$item->status == 3 ? 'selected' : ''}}>Hoàn thành</option>
                                    <option value="4" {{$item->status == 4 ? 'selected' : ''}}>Quá hạn</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
        </div>
    </div>
</div>
@endsection
