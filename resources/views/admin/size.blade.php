@extends('admin/layout')
@section('page_title', 'Size')
@section('size_select', 'active')
@section('container')    
    @if (session("message"))
        <div class="alert alert-danger">
            {{session("message")}}
        </div>
    @endif
    <h1>Size</h1>
    <a href="{{url('admin/size/manage_size')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Add Size
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
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->size}}</td>
                                <td>
                                    <a href="{{url("admin/size/manage_size")}}/{{$item->id}}">
                                        <button type="button" class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                    @if ($item->status == 1) 
                                        <a href="{{url("admin/size/manage_size/0")}}/{{$item->id}}">
                                            <button type="button" class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @elseif($item->status == 0)
                                            <a href="{{url("admin/size/manage_size/1")}}/{{$item->id}}">
                                                <button type="button" class="btn btn-sm btn-warning">Deactive</button>
                                            </a>
                                    @endif
                                    <a href="{{url("admin/size/delete")}}/{{$item->id}}">
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