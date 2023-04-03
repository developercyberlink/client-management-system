@include('layouts.components.header')

<div class="row">
    <div class="col-md-3">
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
              <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                  <a href="{{route('user.index')}}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                  </a>
                  <a href="{{route('user.task.index')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Task Management</span>
                  </a>
                  <a href="{{route('user.invoice.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                      class="fas fa-lock fa-fw me-3"></i><span>Invoices</span>
                    </a>
                    <a href="{{route('user.inquiry.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                      class="fas fa-lock fa-fw me-3"></i><span>Inquiry</span>
                    </a>
                </div>
              </div>
            </nav>
            <!-- Navbar -->
          </header>
    </div>
    <div class="col-md-9">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @yield('content')
    </div>
</div>

@include('layouts.components.footer')