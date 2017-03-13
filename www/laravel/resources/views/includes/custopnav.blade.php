<div class="top-bar">
  <div class="top-nav">
    <a href="/index"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="/index">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="/customercatalogue">Catalogue</a></li>

       
        @if(Session::has('customer_id'))
        <li class="top-nav-listItem login"><a href="/customerlogout">Logout</a></li> 

      
        @else
        <li class="top-nav-listItem login"><a href="/customerlogin">Login</a></li>
        <li class="top-nav-listItem register"><a href="/customerregister">Register</a></li>
        @endif

        @if(Session::has('customer_id'))
        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
          @if(Session::has('customer_id'))
            <p>{!! $totalItems !!}</p>
            @else
            <p>{!! 0 !!}</p>
          @endif
          </div>
          <a href="/customercart/{!! Session::get('customer_id') !!}/">Cart</a>
        </li>
        @endif
      </ul>
    <form class="search-brainfood">
      <input type="text" class="text-field" placeholder="Search all books">
    </form>
  </div>
</div>
