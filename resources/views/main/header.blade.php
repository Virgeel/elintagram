



<header>
    <nav>
        <div class="logo">
            <h1>Elintagram</h1>
        </div>
        <div class="nav-links" style="display:flex">
            <a href="/home">Home</a>
            <a href="/explore">Explore</a>
            <a href="/profile">Profile</a>
        
                <form action="/logout" method="post">
                    @csrf
                  <button type="submit" style="font-family: Arial, sans-serif;background-color:transparent;border-style:none;padding-left:15px"> Logout </button>
                </form>
            
            
        </div>
    </nav>
</header>

