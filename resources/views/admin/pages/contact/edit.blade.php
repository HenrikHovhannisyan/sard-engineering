@extends('admin.layouts.app')
@section('title')
    Edit Catalog
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Edit Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contact.index') }}">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('contact.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Phone: <span class="text-danger">*</span></strong>
                    <input type="text" name="phone" value="{{$contact->phone}}" class="form-control" placeholder="Phone" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Email: <span class="text-danger">*</span></strong>
                    <input type="email" name="email" value="{{$contact->email}}" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Address: <span class="text-danger">*</span></strong>
                    <input type="text" name="address" value="{{$contact->address}}" class="form-control" placeholder="Address" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Facebook: <span class="text-danger">*</span></strong>
                    <input type="text" name="facebook" value="{{$contact->facebook}}" class="form-control" placeholder="Facebook" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <strong>Instagram: <span class="text-danger">*</span></strong>
                    <input type="text" name="instagram" value="{{$contact->instagram}}" class="form-control" placeholder="Instagram" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-edit"></i>
                    Edit
                </button>
            </div>
        </div>

    </form>

@endsection
