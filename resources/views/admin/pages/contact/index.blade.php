@extends('admin.layouts.app')
@section('title')
    Catalogs
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <div class="pull-left">
                <h2>Contact</h2>
            </div>
{{--            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contact.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Create New Contact
                </a>
            </div>--}}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th width="150px">Action</th>
            </tr>
            @foreach ($contact as $item)
                <tr>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ $item->facebook }}" target="_blank">Facebook</a>
                    </td>
                    <td>
                        <a href="{{ $item->instagram }}" target="_blank">Instagram</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('contact.edit',$item->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $contact->links() !!}

@endsection
