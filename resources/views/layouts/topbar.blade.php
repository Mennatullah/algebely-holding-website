@php
    $contacts = \App\Models\Contact::where('created_at', '>=', now()->subDays(7))
        ->orderBy('created_at', 'desc')
        ->get();
@endphp
 <header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
      <div class="btn-toggle">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
      </div>
      <div class="search-bar flex-grow-1">

      </div>
      <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
            <span class="badge-notify">{{$contacts->count()}}</span>
          </a>
          <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
            <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
              <h5 class="notiy-title mb-0">Contacts</h5>
            </div>
            <div class="notify-list">
              @forelse($contacts as $item)
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                      <span>{{ ucfirst(substr($item->type, 0, 1)) }}</span>
                    </div>
                    <div class="">
                      <h5 class="notify-title">{{ $item->name }}</h5>
                      <p class="mb-0 notify-desc">{{ $item->message }}</p>
                      <p class="mb-0 notify-time">
                          @if ($item->created_at->isToday())
                              Today
                          @elseif ($item->created_at->isYesterday())
                              Yesterday
                          @else
                              {{ $item->created_at->diffInDays() }} days ago
                          @endif
                      </p>
                    </div>
{{--                    <div class="notify-close position-absolute end-0 me-3">--}}
{{--                      <i class="material-icons-outlined fs-6">close</i>--}}
{{--                    </div>--}}
                  </div>
                </a>
              </div>
              @empty

              @endforelse
            </div>
          </div>
        </li>
{{--        <li class="nav-item d-md-flex d-none">--}}
{{--          <a class="nav-link position-relative" data-bs-toggle="offcanvas" href="#offcanvasCart"><i--}}
{{--              class="material-icons-outlined">shopping_cart</i>--}}
{{--            <span class="badge-notify">8</span>--}}
{{--          </a>--}}
{{--        </li>--}}
        <li class="nav-item dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
             <img src="https://avatar.iran.liara.run/public/boy" class="rounded-circle p-1 border" width="45" height="45" alt="">
          </a>
          <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
              <div class="text-center">
                <img src="https://avatar.iran.liara.run/public/boy" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                  alt="">
                <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
              </div>
            </a>
            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{route('users.edit',['user'=>auth()->id()])}}"><i
              class="material-icons-outlined">person_outline</i>Profile</a>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{route('settings.index')}}"><i
              class="material-icons-outlined">local_bar</i>Setting</a>
            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit()"><i
            class="material-icons-outlined">power_settings_new</i>Logout</a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>
          </div>
        </li>
      </ul>

    </nav>
  </header>
  <!--end top header-->
