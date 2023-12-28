<div class="sidebar admin-cars-sidebar p-2">
    <a href="{{ route('carsList') }}" class="btn btn-outline-light"><i class="fa-solid fa-list fa-xl me-2" style="color: #ffffff;"></i>Samochody</a>
    <a href="{{ route('admin.create.car') }}"  class="btn btn-outline-light"><i class="fa-regular fa-square-plus fa-xl me-2" style="color: #ffffff;"></i>Dodaj samochód</a>
    <a  href="{{ route('admin.create.brand') }}" class="btn btn-outline-light"><i class="fa-solid fa-font-awesome fa-xl me-2" style="color: #ffffff;"></i>Marki samochodów</a>
    <a {{-- href="{{ route('cars.suspended') }}"--}} class="btn btn-outline-light"><i class="fa-solid fa-circle-stop fa-xl me-2" style="color: #ffffff;"></i>Wstrzymane samochody</a>
</div>
