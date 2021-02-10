@extends('admin/layout')
@section('page_title', 'Manage Coupon')
@section('coupon_select', 'active')
@section('container')
    <h1>Manage Coupon</h1>
    <a href="{{url('admin/coupon')}}" class="mt-2">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.manage_coupon_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Title</label>
                            <input id="title" value="{{$title}}" name="title" type="text" class="form-control" required>
                            @error('title')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label mb-1">Code</label>
                            <input id="code" value="{{$code}}" name="code" type="text" class="form-control" required>
                            @error('code')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value" class="control-label mb-1">Value</label>
                            <input id="value" value="{{$value}}" name="value" type="text" class="form-control" required>
                            @error('value')
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