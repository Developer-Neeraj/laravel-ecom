@extends('admin/layout')
@section('page_title', 'Manage Size')
@section('size_select', 'active')
@section('container')
    <h1>Manage Size</h1>
    <a href="{{url('admin/size')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.manage_size_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="size" class="control-label mb-1">Size</label>
                            <input id="size" value="{{$size}}" name="size" type="text" class="form-control" required>
                            @error('size')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection