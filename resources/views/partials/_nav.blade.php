
<nav class="navbar navbar-expand-lg navbar-dark nav-bg">

    <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mr-auto justify-content-around">

                
                <li class="{{ Request::is('/') ? "active" : "" }}">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="{{ Request::is('blog') ? "active" : "" }}">
                    <a class="nav-link" href="/blog">Browse</a>
                </li>

                <li class="{{ Request::is('about') ? "active" : "" }}">
                    <a class="nav-link" href="/about">About</a>
                </li>

                <li class="{{ Request::is('contact') ? "active" : "" }}">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>

            </ul>

        </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ml-auto">

                @if(Auth::check())
                <li class="nav-item">

                <div class="dropdown">

                    <button class="btn btn-secondary dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">All Posts</a>
                    <a class="dropdown-item" href="{{ route('categories.index') }}">Category</a>
                    <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                        <hr>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Log Out</a>
                    </div>

                </div>

                </li>
                @else

                <a href="{{ route('login') }}" class="btn btn-block btn-outline-primary text-capitalize">sign in</a>

                @endif

            </ul>

        </div>
        
    </nav>