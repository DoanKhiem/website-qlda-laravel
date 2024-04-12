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
                        <h4 class="header-title">Thêm nhân viên</h4>
                        <form action="{{route('users.store')}}" method="POST">
                            @csrf
                            <p class="text-muted font-14 mb-4">Nhập thông tin nhân viên.</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã nhân viên</label>
                                <input class="form-control" name="code" type="text" value="{{old('code')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên nhân viên</label>
                                <input class="form-control" name="name" type="text" value="{{old('name')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-email-input" class="col-form-label">Email</label>
                                <input class="form-control" name="email" type="email" value="{{old('email')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="example-url-input" class="col-form-label text-muted mb-3 mt-4 d-block">Chức vụ</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="position" value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Quản lý</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" checked name="position" value="0" class="custom-control-input">
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
