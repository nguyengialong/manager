      <div class="container">
        <a class="navbar-brand" href="{{route('blog_home')}}">Stories<span>.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{route('blog_home')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{route('food')}}" class="nav-link">Foods</a></li>
            <li class="nav-item"><a href="{{route('life')}}" class="nav-link">Lifestyle</a></li>
            <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
            @if(Auth::check())
            <li class="nav-item"><a class="nav-link">{{Auth::user()->name}}</a></li>
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Logout</a></li>
            @endif
          </ul>
        </div>
      </div>
