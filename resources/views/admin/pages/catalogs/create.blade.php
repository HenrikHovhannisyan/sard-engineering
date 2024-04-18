@extends('admin.layouts.app')
@section('title')
    Add New Catalog
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Add New Catalog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('catalogs.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('catalogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Brand: <span class="text-danger">*</span></strong>
                    <input type="text" name="brand" class="form-control" placeholder="Brand" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Image: <span class="text-danger">*</span></strong>
                    <input type="file" name="image" class="form-control" placeholder="image" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>File: <span class="text-danger">*</span></strong>
                    <input type="file" name="file" accept="application/pdf" class="form-control" placeholder="File"
                           required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </button>
            </div>
        </div>

    </form>

@endsection
