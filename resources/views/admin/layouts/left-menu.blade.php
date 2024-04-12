<section id="sidebar">
    <ul class="list-unstyled components">
        <li class="{{isActiveRoute('dashboard')}}">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-desktop me-1"></i>
                Dashboard
            </a>
        </li>
        <li class="{{isActiveRoute('images.index')}}">
            <a href="{{route('images.index')}}">
                <i class="fa-solid fa-images"></i>
                Images
            </a>
        </li>
        <li class="">
            <a href="#">
                <i class="fa-solid fa-address-card me-1"></i>
                Contact</a>
        </li>
        <li class="">
            <a href="#">
                <i class="fa-solid fa-handshake me-1"></i>
                Partners
            </a>
        </li>
    </ul>
</section>
