@extends('admin/layout')
@section('page_title', 'Color')
@section('color_select', 'active')
@section('container')    
    @if (session("message"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session("message")}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>Color</h1>
    <a href="{{url('admin/color/manage_color')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Add Color
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
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->color}}</td>
                                <td>
                                    <a href="{{url("admin/color/manage_color")}}/{{$item->id}}">
                                        <button type="button" class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                    @if ($item->status == 1) 
                                        <a href="{{url("admin/color/manage_color/0")}}/{{$item->id}}">
                                            <button type="button" class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @elseif($item->status == 0)
                                            <a href="{{url("admin/color/manage_color/1")}}/{{$item->id}}">
                                                <button type="button" class="btn btn-sm btn-warning">Deactive</button>
                                            </a>
                                    @endif
                                    <a href="{{url("admin/color/delete")}}/{{$item->id}}">
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