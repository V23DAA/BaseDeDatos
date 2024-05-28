 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-light  " style="background-color: #1c976ebb; padding-top: 10px; padding-bottom: 10px; ">
    <div class="container-fluid"> <!-- Nuevo contenedor para los elementos del navbar -->
  
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
  
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-1 mr-2 d-flex align-items-center">
                <div class="image mr-2">
                    <i class="far fa-user fa-1x"></i>
                </div>
                <div class="info">
                    @if(Auth::check() && Auth::user()->roles->isNotEmpty())
                    <p class="d-block text-dark fw-bold mb-0">{{ Auth::user()->name }} - {{ Auth::user()->roles->first()->name }}</p>
                @endif
                </div>
                
            </div>
  
            <div class="ml-2  mt-1 mr-2 d-flex align-items-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger fw-bold p-0">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </ul>
  
    </div> <!-- Fin del contenedor fluido -->
  </nav>
  <!-- /.navbar -->