@extends('admin/layout')
@section('page_title', 'Manage Color')
@section('color_select', 'active')
@section('container')
    <h1>Color</h1>
    <a href="{{url('admin/color')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.manage_color_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="color" class="control-label mb-1">Color Name</label>
                            <input id="color" value="{{$color}}" name="color" type="text" class="form-control" required>
                            @error('color')
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