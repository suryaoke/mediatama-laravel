  <!-- BEGIN: Side Menu -->
  <nav class="side-nav">
      <ul>

          <li>
              <a href="{{ route('dashboard') }}"
                  class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : (request()->routeIs('profile') ? 'side-menu--active' : '') }}">
                  <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                  <div class="side-menu__title"> Dashboard</div>
              </a>
          </li>

          <li>
              <a href="{{ route('admin.artikel.all') }}"
                  class="side-menu {{ request()->routeIs('admin.artikel.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="file"></i></div>
                  <div class="side-menu__title"> Artikel </div>
              </a>
          </li>


          <li>
              <a href="{{ route('admin.kategori.all') }}"
                  class="side-menu {{ request()->routeIs('admin.kategori.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trello">
                          <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                          <rect width="3" height="9" x="7" y="7" />
                          <rect width="3" height="5" x="14" y="7" />
                      </svg> </div>
                  <div class="side-menu__title"> Kategori</div>
              </a>
          </li>

          <li>
              <a href="{{ route('admin.author.all') }}"
                  class="side-menu {{ request()->routeIs('admin.author.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="users"></i></div>
                  <div class="side-menu__title"> Author</div>
              </a>
          </li>

          <li>
              <a href="{{ route('admin.tag.all') }}"
                  class="side-menu {{ request()->routeIs('admin.tag.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="tag"></i></div>
                  <div class="side-menu__title"> Tag </div>
              </a>
          </li>



      </ul>
  </nav>
  <!-- END: Side Menu -->
