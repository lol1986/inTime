<nav class="navbar-light bg-light p-0">
  <a class="navbar-brand" href="#">Menú Superadmin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#superadminMenu" aria-controls="superadminMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse show navbar-collapse" id="superadminMenu">
      <ul class="navbar-nav">
         <li class="nav-item">
              <a class="nav-link" href={{route('companies.index')}}>{{ __('menu.companies') }}</a>
         </li>
          <li class="nav-item">
              <a class="nav-link" href={{route('roles.index')}}>{{ __('menu.roles') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{route('calendars.index')}}>{{ __('menu.calendars') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{route('holidays.index')}}>{{ __('menu.holidays') }}</a>
          </li>
      </ul>
    </div>
  </nav>