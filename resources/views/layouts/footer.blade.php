<footer class="py-5 bg-success text-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset("/img/logo.png") }}" class="" alt="">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-2 mb-3">
                <h5>Pages</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-light">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-light">Catalogs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-light">Our works</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 link-light">About us</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3 mb-3">
                <h5>Contacts</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link p-0 link-light" href="tel:{{$contact->phone}}">
                            <i class="fa-solid fa-phone"></i>
                            {{$contact->phone}}
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link p-0 link-light" href="mailto:{{$contact->email}}">
                            <i class="fa-solid fa-envelope"></i>
                            {{$contact->email}}
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link p-0 link-light" href="mailto:{{$contact->address}}">
                            <i class="fa-solid fa-location-dot"></i>
                            {{$contact->address}}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-5 mb-3">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?width=600&amp;height=200&amp;hl=en&amp;q=Sard Engineering&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© <?php echo date("Y"); ?> {{ config('app.name', 'Laravel') }}, LLC. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="link-light" href="{{ $contact->facebook }}" target="_blank">
                            <i class="fa-brands fa-square-facebook fa-2x"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-light" href="{{ $contact->instagram }}" target="_blank">
                            <i class="fa-brands fa-instagram fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
</footer>
