<nav class="navbar navbar-dark fixed-top" style="background-color:#006837">
    <a href="{{Request::is("/")?"#":"/"}}" class="navbar-brand"><img src="{{ Request::is("/") ? asset("Images/archkl.png") : asset("Images/asayokl-banner.png") }}" height=70 width=auto/></a>

    <div class="d-flex justify-content-between align-items-center" style="min-width:10rem; flex: 0 0 10rem;">
        <div>
            <a id="eng">ENG</a><span style="cursor:default;">&nbsp;|&nbsp;</span><a id="bm">BM</a>
        </div>
        <button type="button" class="navbar-toggler collapsed">
            <span class="menu-icon-bar top-bar"></span>
            <span class="menu-icon-bar middle-bar"></span>
            <span class="menu-icon-bar bottom-bar"></span>
        </button>
    </div>
</nav>

<div id="navbarCollapse">
    @include("layouts.menu")
</div>