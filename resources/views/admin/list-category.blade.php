@extends('admin.layouts.master')

@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Danh sách thương hiệu</h5>
                <table class="mb-0 table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thương hiệu</th>
                        <th>Đường dẫn</th>
                        <th>Trạng thái</th>
                        <th>Hình ảnh</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($category as $value)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}}</td>
{{--                        @if($value->status == 1)--}}
{{--                        <td>Hien</td>--}}
{{--                        @else--}}
{{--                        <td>An</td>--}}
{{--                        @endif--}}
                        <td>{{$value->status == 1 ? 'Hien' : 'An'}}</td>
                        <td>{{$value->logo}}</td>
                        <td>
                            <a href="{{route('admin.edit-category', $value->id)}}" class="mb-2 mr-2 btn btn-warning">Sửa</a>
                            <a href="{{route('admin.delete-category', $value->id)}}" class="mb-2 mr-2 btn btn-danger">Xóa</a>
                            <!-- <button class="mb-2 mr-2 btn btn-light"><a target="_blank" href="{{ route('user.products') }}">View</a></button> -->
                        </td>
                    </tr>
                    @empty
                        <div>Khoong cos ban gi nao</div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
