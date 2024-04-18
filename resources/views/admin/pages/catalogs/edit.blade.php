@extends('admin.layouts.app')
@section('title')
    Edit Catalog
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Edit Catalog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('catalogs.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('catalogs.update',$catalog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $catalog->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Brand: <span class="text-danger">*</span></strong>
                    <select name="brand" class="form-control" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}" @if($brand->name === $catalog->brand) selected @endif>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <div class="w-100 text-center">
                        <img src="/uploaded/catalogs/images/{{ $catalog->image }}" class="img-fluid mt-2" width="300px">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>File:</strong>
                    <input type="file" name="file" accept="application/pdf" class="form-control" placeholder="File">
                    <a href="/uploaded/catalogs/files//{{ $catalog->file }}" class="btn btn-outline-success mt-3"
                       target="_blank">
                        Open File
                    </a>
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
