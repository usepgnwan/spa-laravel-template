<li class="nav-item">
  <a class="nav-link spa-link" href="{{ url('') }}/account/dashboard">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link spa-link" href="{{ url('') }}/account/client">
    <i class="bi bi-award"></i>
    <span>Client</span>
  </a>
</li>
<li class="nav-item ">
  <a class="nav-link multi-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    <li>
      {{-- <div style="width: 80%; margin-left: 36px;">
        <p class="ms-3 fw-bold">Asset<hr></p>
      </div> --}}
      <a class="spa-link" href="{{ url('') }}/account/user">
        <i class="bi bi-circle"></i><span>User</span>
      </a>
    </li>
    <li>
      <a class="spa-link" href="{{ route('asset') }}">
        <i class="bi bi-circle"></i><span>Asset</span>
      </a>
    </li>
    <li>
      <a class="spa-link" href="{{ url('') }}/account/category">
        <i class="bi bi-circle"></i><span>Kategori Asset</span>
      </a>
    </li>
    <li>
      <a class="spa-link" href="{{ url('') }}/account/paket">
        <i class="bi bi-circle"></i><span>Paket</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a class="nav-link spa-link" href="{{ url('') }}/account/profile">
    <i class="bi bi-person"></i>
    <span>Profile</span>
  </a>
</li>
<!-- End Dashboard Nav -->
 