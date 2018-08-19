<nav class="navbar navbar-left navbar-dark bg-primary static-top">

        <a class="navbar-brand" href=""><img src="http://mdc.ph/wp-content/uploads/2013/08/MDC-Logo-clipped.png" alt="mdc-logo" 
        height="40" width="40">MDC Facilities Reservation System</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarDropdown">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Facilities</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Equipments</a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
          
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
           </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @else
          <li class="nav-item">
            <a href="#" class="nav-link">Request Reservation</a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
          </li>
          @endguest
          </ul>
        </div>
      
    </nav>