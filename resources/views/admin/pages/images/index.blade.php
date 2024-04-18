@extends('admin.layouts.app')
@section('title')
    Images
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Images</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('images.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Create New Image
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($images as $image)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/uploaded/image/{{ $image->image }}" width="100px"></td>
                    <td>{{ $image->name }}</td>
                    <td>{{ $image->detail }}</td>
                    <td>
                        <form action="{{ route('images.destroy',$image->id) }}" method="POST">

                            <a class="btn btn-outline-success" href="{{ route('images.show',$image->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a class="btn btn-outline-primary" href="{{ route('images.edit',$image->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $images->links() !!}

@endsection
