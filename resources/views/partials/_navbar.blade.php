<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class=" nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Home</a>
            </li>

             <li class="nav-item">
              <a class=" nav-link {{ Request::is('blog') ? "active" : "" }}" href="/blog">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">Contact</a>
            </li>
            
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a>
                <a class="dropdown-item" href="#">Visi Misi</a>
                <a class="dropdown-item" href="#">Struktur Organisasi</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>