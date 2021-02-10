@extends('admin/layout')
@section('product_title', 'Product')
@section('product_select', 'active')
@section('container')    
    @if (session("message"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session("message")}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
    @endif
    <h1>Product</h1>
    <a href="{{url('admin/product/manage_product')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Add Product
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                @if ($item->images != '')
                                    <td><img width="100px" src="{{ asset('storage/media/'.$item->images) }}" alt=""></td>
                                @endif
                                <td>
                                    <a href="{{url("admin/product/manage_product")}}/{{$item->id}}">
                                        <button type="button" class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                    @if ($item->status == 1) 
                                        <a href="{{url("admin/product/manage_product/0")}}/{{$item->id}}">
                                            <button type="button" class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @elseif($item->status == 0)
                                            <a href="{{url("admin/product/manage_product/1")}}/{{$item->id}}">
                                                <button type="button" class="btn btn-sm btn-warning">Deactive</button>
                                            </a>
                                    @endif
                                    <a href="{{url("admin/product/delete")}}/{{$item->id}}">
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