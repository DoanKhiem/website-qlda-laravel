@extends('layouts.main')

@section('content')
<div class="main-content-inner">
    <div class="container">
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$error}}!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sửa thông tin dự án</h4>
                        <form action="{{route('projects.update', $item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <p class="text-muted font-14 mb-4">Nhập thông tin dự án</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã dự án</label>
                                <input class="form-control" name="code" type="text" value="{{$item->code}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên dự án</label>
                                <input class="form-control" name="name" type="text" value="{{$item->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input" class="col-form-label">Thời gian bắt đầu</label>
                                <input class="form-control" name="start_date" type="date" value="{{$item->start_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label">Thời gian kết thúc</label>
                                <input class="form-control" name="end_date" type="date" value="{{$item->end_date}}" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nhân viên</label>
                                <select class="form-control" multiple name="user_id[]" required>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ in_array($user->id, $item->users->pluck('id')->toArray()) ? 'selected' : '' }}>{{$user->name}}</option>
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
