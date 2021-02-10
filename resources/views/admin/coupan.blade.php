@extends('admin/layout')
@section('page_title', 'Coupan')
@section('coupon_select', 'active')
@section('container')    
    @if (session("message"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session("message")}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>    
    @endif
    <h1>Coupan</h1>
    <a href="{{url('admin/coupon/manage_coupon')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Add Coupon
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->value}}</td>
                                <td>
                                    <a href="{{url("admin/coupon/manage_coupon")}}/{{$item->id}}">
                                        <button type="button" class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                    @if ($item->status == 1) 
                                        <a href="{{url("admin/coupon/manage_coupon/0")}}/{{$item->id}}">
                                            <button type="button" class="btn btn-sm btn-success">Active</button>
                                        </a>
                                    @elseif($item->status == 0)
                                        <a href="{{url("admin/coupon/manage_coupon/1")}}/{{$item->id}}">
                                            <button type="button" class="btn btn-sm btn-warning">Deactive</button>
                                        </a>
                                    @endif
                                    <a href="{{url("admin/coupon/delete")}}/{{$item->id}}">
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection