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
                        <h4 class="header-title">Thêm vấn đề</h4>
                        <form action="{{route('issues.store')}}" method="POST">
                            @csrf
                            <p class="text-muted font-14 mb-4">Thông tin vấn đề.</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã vấn đề</label>
                                <input class="form-control" name="code" type="text" value="{{old('code')}}">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên vấn đề</label>
                                <input class="form-control" name="name" type="text" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nhân viên</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach($users as $item)
                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dự án</label>
                                <select class="form-control" name="project_id" required>
                                    @foreach($projects as $item)
                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Trạng thái</label>
                                <select class="form-control" name="status" required>
                                    <option value="">Lựa chọn</option>
                                    <option value="1">Chưa sửa</option>
                                    <option value="2">Đang sửa</option>
                                    <option value="3">Đã sửa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Trạng thái</label>
                                <textarea class="form-control" name="description" aria-label="With textarea">{{old('description')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
        </div>
    </div>
</div>
@endsection
