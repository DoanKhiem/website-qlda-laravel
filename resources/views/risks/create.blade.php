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
                        <h4 class="header-title">Thêm Rủi Ro</h4>
                        <form action="{{route('risks.store')}}" method="POST">
                            @csrf
                            <p class="text-muted font-14 mb-4">Thông tin rủi ro.</p>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Mã rủi ro</label>
                                <input class="form-control" name="code" type="text" value="{{old('code')}}">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input" class="col-form-label">Tên rủi ro</label>
                                <input class="form-control" name="name" type="text" value="{{old('name')}}">
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
                                <label class="col-form-label">Ghi chú</label>
                                <textarea class="form-control" name="note" aria-label="With textarea">{{old('note')}}</textarea>
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
