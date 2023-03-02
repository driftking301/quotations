<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="">Pollux</a>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" id="nav-section-visits">
                <a class="nav-link" href=""><i class="fa fa-list-alt fa-fw"></i> @lang('Visits')</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        </ul>
    </div>
</nav>
<input type="hidden" id="nav-section" value="@yield('nav-section')" />

