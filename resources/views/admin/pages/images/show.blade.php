@extends('admin.layouts.app')
@section('title')
    Show Image
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Image</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('images.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="/uploaded/image/{{ $image->image }}" class="img-fluid mt-3 mb-3" width="500px">
            </div>
        </div>
        <hr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $image->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $image->detail }}
            </div>
        </div>
    </div>

@endsection
