 @php
     $prefix = Request::route()->getPrefix();
     $route =  Route::current()->getName();
 @endphp
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->usertype=='Admin')     
    <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('user.view')}}" class="nav-link {{($route=='user.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View User </p>
            </a>
          </li>
        </ul>
      </li>
      @endif

      <li class="nav-item {{($prefix=='/profiles')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Profile
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Your Profiles </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password </p>
              </a>
            </li>

        </ul>
      </li>
      <li class="nav-item {{($prefix=='/logos')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Logo
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('logos.view')}}" class="nav-link {{($route=='logos.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Logo </p>
            </a>
          </li>
        </ul>
         <li class="nav-item {{($prefix=='/sliders')?'menu-open':''}}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('sliders.view')}}" class="nav-link {{($route=='sliders.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sliders </p>
                </a>
              </li>
      </li>
    </ul>
    <li class="nav-item {{($prefix=='/missions')?'menu-open':''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Missions
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{route('missions.view')}}" class="nav-link {{($route=='missions.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Missions </p>
          </a>
        </li>
      </ul>

      <li class="nav-item {{($prefix=='/visions')?'menu-open':''}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Manage Vision
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('visions.view')}}" class="nav-link {{($route=='visions.view')?'active':''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>View Vision </p>
            </a>
          </li>
        </ul>
        <li class="nav-item {{($prefix=='/news_events')?'menu-open':''}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             Manage News Events
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{route('news_events.view')}}" class="nav-link {{($route=='news_events.view')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>View News Events </p>
              </a>
            </li>
          </ul>
          
          <li class="nav-item {{($prefix=='/services')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('services.view')}}" class="nav-link {{($route=='services.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Services </p>
                </a>
              </li>
            </ul>

            <li class="nav-item {{($prefix=='/contacts')?'menu-open':''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                 Manage Contacts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('contacts.view')}}" class="nav-link {{($route=='contacts.view')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Contacts </p>
                  </a>
                </li>
              </ul>

              <li class="nav-item {{($prefix=='/aboutus')?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                   Manage About-Us
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="{{route('aboutus.view')}}" class="nav-link {{($route=='aboutus.view')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View About-Us </p>
                    </a>
                  </li>
                </ul>


                
</li>
  </nav>