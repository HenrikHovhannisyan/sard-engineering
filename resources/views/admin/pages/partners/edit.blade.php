@extends('admin.layouts.app')
@section('title')
    Edit Partner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Edit Partner</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('partners.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $partner->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <div class="w-100 text-center">
                        <img src="/uploaded/partner/{{ $partner->image }}" class="img-fluid mt-2" width="300px">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </button>
            </div>
        </div>

    </form>

@endsection
