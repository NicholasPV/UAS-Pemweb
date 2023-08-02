<input type="checkbox" id="check">

<header>
    <label for="check">
        <i class="fa-solid fa-bars" id="sidebarButton"></i>
    </label>
    <div class="leftArea">
        <h3>My<span>Games</span>List</h3>
    </div>
    <div class="rightArea">
        @auth
            <form action="/logout" class="logoutContainer" method="POST">
                @csrf
                <button class="logoutButton">Log Out</button>
            </form>
        @else
        @endauth
    </div>
</header>

<div class="sidebar">
    <center>
        @auth
            <i class="fa-solid fa-user fa-6x userProfile"></i>
            <h4>Welcome, {{ Auth::user()->name }}</h4>
        @else
            <i class="fa-solid fa-user fa-6x userProfile"></i>
            <h4>Welcome, Guest</h4>
        @endauth
    </center>
    <a href="/"><i class="fa-solid fa-desktop"></i><span>Home</span></a>
    <a href="/game"><i class="fa-solid fa-gamepad"></i><span>Games</span></a>
    <a href="/developer"><i class="fa-brands fa-dev"></i><span>Developers</span></a>
</div>