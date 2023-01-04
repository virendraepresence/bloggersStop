      <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong style="font-size: 35px;">Virendra Mishra</strong>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav">
                      <li class="{{Request::is('/') ? "active" : ""}}">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="{{Request::is('about') ? "active" : ""}}">
                        <a class="nav-link" href="about">About</a>
                      </li>
                      <li class="{{Request::is('services') ? "active" : ""}}">
                        <a class="nav-link" href="/services">Services</a>
                      </li>
                      <li class="{{Request::is('contact') ? "active" : ""}}">
                        <a class="nav-link" href="/contact">Contact</a>
                      </li>
                      <li class="{{Request::is('blog') ? "active" : ""}}">
                        <a class="nav-link" href="/blog">Blog</a>
                      </li>
                      <li class="{{Request::is('gallery') ? "active" : ""}}">
                        <a class="nav-link" href="/gallery">Gallery</a>
                      </li>
                   </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="/posts/create" class="btn btn-default" style="padding: 5px 20px 5px 20px; margin-top: 8px;">Create Posts</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="/home">Dashboard</a></li>
                                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                                    <li><a href="{{ route('tags.index') }}">Tags</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>