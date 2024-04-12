@extends('layouts.main')

@section('content')
<div class="main-content-inner">
    <div class="container">
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sửa thông tin nhân viên</h4>
                        <form action="{{route('users.update', $item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <p class="text-muted font-14 mb-4">Nhập thông tin nhân viên.</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã nhân viên</label>
                                <input class="form-control" name="code" type="text" value="{{$item->code}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên nhân viên</label>
                                <input class="form-control" name="name" type="text" value="{{$item->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input" class="col-form-label">Email</label>
                                <input class="form-control" name="email" type="email" value="{{$item->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label text-muted mb-3 mt-4 d-block">Chức vụ</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="position" {{$item->position == 1 ? "checked" : ""}} value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Quản lý</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" {{$item->position == 0 ? "checked" : ""}} name="position" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5">Nhân viên</label>
                                </div>
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
