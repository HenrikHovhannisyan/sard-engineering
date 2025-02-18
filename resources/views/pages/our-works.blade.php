@extends('layouts.app')

@section('content')
    <section id="our_works">
        <h2 class="text-center mb-3">Our works</h2>
        <div class="container">
            <div class="row">
                @foreach($our_works as $work)
                    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset("/uploaded/image/" . $work->image) }}" class="btn p-0 img-fluid shadow mb-3"
                             data-bs-toggle="modal" data-bs-target="#ourWorksModal"
                             data-bs-image="{{ asset("/uploaded/image/" . $work->image) }}">
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $our_works->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </section>

    <!-- Our Works Modal -->
    <div class="modal fade" id="ourWorksModal" tabindex="-1" aria-labelledby="ourWorksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ourWorksModalLabel">Our work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modalImage">
                </div>
            </div>
        </div>
    </div>
@endsection
