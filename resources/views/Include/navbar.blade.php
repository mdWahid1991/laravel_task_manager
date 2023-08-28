{{-- navigation bar --}}
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            @if(Session::has('loginId'))
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('task')}}">View Task</a>
            </li>
            @endif
            
        </ul>
        
        </ul>
        <ul class="nav navbar-nav ml-auto">
            @if(Session::has('loginId'))
            <li class="nav-item mr-3"><a href="{{route('logout')}}"><span class="fa-solid fa-right-to-bracket"></span> Logout</a></li>
            @else
            <li class="nav-item mr-3"><a href="{{route('reg')}}"><span class="fa-solid fa-right-to-bracket"></span> Register</a></li>
            <li class="nav-item mr-3"><a href="{{route('log')}}"><span class="fa-solid fa-right-to-bracket"></span> Login</a></li>
            @endif
        </ul>
        </div>
    </div>
    </nav>