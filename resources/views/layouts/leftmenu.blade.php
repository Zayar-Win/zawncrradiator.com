<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

  :root {
      --header-height: 3rem;
      --nav-width: 180px;
      --black-color: black;
      --first-color: #4723D9;
      --first-color-light: #AFA5D9;
      --white-color: #F7F6FB;
      --body-font: 'Nunito', sans-serif;
      --normal-font-size: 1rem;
      --z-fixed: 100
  }

  *,
  ::before,
  ::after {
      box-sizing: border-box
  }

  body {
      position: relative;
      margin: calc(var(--header-height) + 3rem) 0 0 0;
      padding: 0 1rem;
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
      transition: .5s
  }

  a {
      text-decoration: none
  }

  .header {
      width: 100%;
      height: var(--header-height);
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1rem;
      background-color: var(--white-color);
      z-index: var(--z-fixed);
      transition: .5s;


  }

  .header_toggle {
      color: black;
      font-size: 1.5rem;
      cursor: pointer
  }



  .l-navbar {
      position: fixed;
      top: 0;
      left: -50%;
      width: var(--nav-width);
      height: 100vh;
      background-color: var(--first-color);
      padding-top: 10px;
      padding-left: 10px;
      padding-right: 10px;
      transition: .5s;
      z-index: var(--z-fixed)
  }

  .nav {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow: hidden
  }

  .nav_logo,
  .nav_link {
      display: grid;
      grid-template-columns: max-content max-content;
      align-items: center;
      column-gap: 1rem;
      padding: .5rem 0 .5rem 1.5rem
  }

  .nav_logo {
      margin-bottom: 2rem
  }

  .nav_logo-icon {
      font-size: 1.25rem;
      color: var(--white-color)
  }

  .nav_logo-name {
      color: var(--white-color);
      font-weight: 700
  }

  .nav_link {
      position: relative;
      color: var(--first-color-light);
      margin-bottom: 1.5rem;
      transition: .3s
  }

  .nav_link:hover {
      color: var(--white-color)
  }

  .nav_icon {
      font-size: 1.25rem
  }

  .show {
      left: 0
  }

  .body-pd {
      padding-left: calc(var(--nav-width) + 1rem)
  }

  .active {
      color: var(--white-color)
  }

  .active::before {
      content: '';
      position: absolute;
      left: 0;

      background-color: var(--white-color)
  }

  .height-100 {
      height: 100vh
  }

  @media screen and (min-width: 768px) {
      body {
          margin: calc(var(--header-height) + 3rem) 0 0 0;

      }
      .l-navbar {
          left: 0;
          padding: 1rem 0 0 0;
          padding-left: 10px;
          padding-right: 10px;
      }



      .body-pd {
          padding-left: calc(var(--nav-width) + 100px)
      }
  }
  </style>

  <body id="body-pd">
  <header class="header" id="header">
          <div class="header_toggle"> <i class='fas fa-bars' id="header-toggle"></i> </div>

      </header>
      <div class="l-navbar " style="background: rgb(95, 44, 120);" id="nav-bar">
          <nav class="nav">
              <div> <a href="#" class="nav_logo">  <i class="far fa-user text-white" style="font-size: 25px;"></i>
              <h5 class="text-white">{{ Auth::user()->name }}</h5> </a>
                  <div class="nav_list">


                      @if (Auth::user()->status=='dx')
                      <a href="{{ url('/foreign_item_view') }}" class="nav_link active">
                        <i class="nav-icon fas fa-th"></i>
                        <span class="nav_name">  Foreign Item List</span>
                      </a>
                      @endif

                      @if (Auth::user()->status=='user')

                            <a href="{{ url('/item') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Radiator List</span>
                            </a>
                            <a href="{{ url('/tank') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Tank List</span>
                            </a>

                            <a href="{{ url('/order') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Radiator order</span>
                            </a>
                            <a href="{{ url('/tank_order') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Tank order</span>
                            </a>

                            <a href="{{ url('/daily_usage') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Daily Usage</span>
                            </a>

                          @endif
                            @if (Auth::user()->status=='admin')


                            <a href="{{ url('/item') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Radiator List</span>
                            </a>
                            <a href="{{ url('/tank') }}" class="nav_link active">
                              <i class="nav-icon fas fa-th"></i>
                              <span class="nav_name">  Tank List</span>
                            </a>
                            <ul class="list-unstyled ps-0">
                                <li class="mb-1">
                                  <button class="btn btn-toggle align-items-center rounded collapsed nav_link active" data-bs-toggle="collapse" data-bs-target="#radiator" aria-expanded="false">
                                    <i class="nav-icon fas fa-th"></i>
                                    <span class="nav_name">  Radiator Order</span>
                                  </button>
                                  <div class="collapse mx-4" id="radiator">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                                      <li><a href="{{ url('/order') }}" class="link-light"> <i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name"> Order</span></a></li>
                                      <li><a href="{{ url('/order/history') }}" class="link-light rounded"><i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name">History</span></a></li>

                                    </ul>
                                  </div>
                                </li>
                            </ul>

                            <ul class="list-unstyled ps-0">
                                <li class="mb-1">
                                  <button class="btn btn-toggle align-items-center rounded collapsed nav_link active" data-bs-toggle="collapse" data-bs-target="#usage" aria-expanded="false">
                                    <i class="nav-icon fas fa-th"></i>
                                    <span class="nav_name"> Usage</span>
                                  </button>
                                  <div class="collapse mx-4" id="usage">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                                      <li><a href="{{ url('/daily_usage') }}" class="link-light"> <i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name"> Daily Usage</span></a></li>
                                      <li><a href="{{ url('/debt') }}" class="link-light rounded"><i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name">Debt List</span></a></li>
                                        <li><a href="{{ url('/daily_history') }}" class="link-light rounded"><i class="nav-icon fas fa-th"></i>
                                            <span class="nav_name">Daily History</span></a></li>

                                    </ul>
                                  </div>
                                </li>
                            </ul>

                            <ul class="list-unstyled ps-0">
                                <li class="mb-1">
                                  <button class="btn btn-toggle align-items-center rounded collapsed nav_link active" data-bs-toggle="collapse" data-bs-target="#foreign_item" aria-expanded="false">
                                    <i class="nav-icon fas fa-th"></i>
                                    <span class="nav_name">  Foreign Item</span>
                                  </button>
                                  <div class="collapse mx-4" id="foreign_item">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                                      <li><a href="{{ url('/foreign_item_view') }}" class="link-light"> <i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name">  Dx List</span></a></li>
                                        <li><a href="{{ url('/foreign_joka_view') }}" class="link-light"> <i class="nav-icon fas fa-th"></i>
                                            <span class="nav_name">  Joka List</span></a></li>
                                            <li><a href="{{ url('/foreign_tk_view') }}" class="link-light"> <i class="nav-icon fas fa-th"></i>
                                                <span class="nav_name">  Tk List</span></a></li>

                                      <li><a href="{{ url('/foreign_history') }}" class="link-light rounded"><i class="nav-icon fas fa-th"></i>
                                        <span class="nav_name">  History</span></a></li>
                                        <li><a href="{{ url('/message_view') }}" class="link-light rounded"><i class="nav-icon fas fa-th"></i>
                                            <span class="nav_name">  Message</span></a></li>
                                    </ul>
                                  </div>
                                </li>
                            </ul>



                            @endif
                              </div>
                              <a href="{{ route('logout') }}" class="nav-link bg-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="border-radius: 10px;">
              <i class="fas fa-sign-out-alt nav-icon" style="color: black;"></i>
              <span class="nav_name" style="color: black;">LogOut</span> </a>
            </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
              </form>
          </nav>
              </div>

      </div>


      <script>
      document.addEventListener("DOMContentLoaded", function(event) {

  const showNavbar = (toggleId, navId, bodyId, headerId) =>{
  const toggle = document.getElementById(toggleId),
  nav = document.getElementById(navId),
  bodypd = document.getElementById(bodyId),
  headerpd = document.getElementById(headerId)

  // Validate that all variables exist
  if(toggle && nav && bodypd && headerpd){
  toggle.addEventListener('click', ()=>{
  // show navbar
  nav.classList.toggle('show')
  // change icon
  toggle.classList.toggle('bx-x')
  // add padding to body
  bodypd.classList.toggle('body-pd')
  // add padding to header
  headerpd.classList.toggle('body-pd')
  })
  }
  }

  showNavbar('header-toggle','nav-bar','body-pd','header')

  /*===== LINK ACTIVE =====*/
  const linkColor = document.querySelectorAll('.nav_link')

  function colorLink(){
  if(linkColor){
  linkColor.forEach(l=> l.classList.remove('active'))
  this.classList.add('active')
  }
  }
  linkColor.forEach(l=> l.addEventListener('click', colorLink))

  // Your code to run since DOM is loaded and ready
  });
      </script>

      <!--Container Main end-->
      @yield('content')
      <!--Container Main end-->
