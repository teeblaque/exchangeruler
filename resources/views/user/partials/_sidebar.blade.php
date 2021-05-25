<aside class="main-sidebar fixed offcanvas shadow" data-toggle="offcanvas">
      <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 392px;">
        <section class="sidebar" style="height: 392px; overflow: hidden; width: auto;">
        <div class="w-150px mt-3 mb-3 ml-3">
          <a href="{{ route('index') }}"><img src="{{ asset('userback/images/panel/logo.png') }}" width="50px" height="50px" alt="" class="spin"></a>
        </div>
        <div class="relative">
          <div class="user-panel p-3 light mb-2">
            <div>
              <div class="float-left image">
                <span style="margin-right: 10px;" class="avatar-letter avatar-letter-t circle"></span>
              </div>
              <div class="float-left info">
              <h6 class="font-weight-light mt-2 mb-1">{{ Auth::user()->name }}</h6>
                <a href="#"><i class="icon-circle text-primary blink"></i> <b>{{ Str::ucfirst(Auth::user()->role) }} </b></a>
                <hr />
                <i class="icon icon-money"> </i><b>
                    @if (Auth::user()->wallet != '')
                        N{{ number_format(Auth::user()->wallet->balance) }}.00
                        @else
                        N0.00
                    @endif
                </b>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <ul class="sidebar-menu">
          <li class="header"><strong>MAIN NAVIGATION</strong></li>
          <li class="treeview">
            <a href="{{ route('user.index') }}">
              <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
            </a>
          </li>
          @if (Auth::user()->role == 'user')
           <li class="header"><strong>Wallets</strong></li>
          <li class="treeview">
            <a href="{{ route('user.wallet') }}">
              <i class="icon icon-ac_unit purple-text s-18"></i> <span>Account Balance</span>
            </a>
          </li>

          <li class="header"><strong>Funds</strong></li>
          <li class="treeview">
                <a href="{{ route('user.sell.fund') }}">
                  <i class="icon icon-sellsy purple-text s-18"></i> <span>Sell Fund</span>
                </a>
              </li>

              <li class="header"><strong>ORDER MANAGEMENT</strong></li>
          <li class="treeview"><a href="#"><i class="icon icon-plus light-green-text s-18">
              </i>Create Order <i class="icon icon-angle-left s-18 pull-right"></i></a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="{{ route('user.sell.bitcoin') }}">
                  <i class="icon icon-sellsy purple-text s-18"></i> <span>Sell Bitcoin</span>
                </a>
              </li>

              <li class="treeview">
                <a href="{{ route('user.sell.bitcoin') }}">
                  <i class="icon icon-sellsy purple-text s-18"></i> <span>Sell USDT</span>
                </a>
              </li>

              <li class="treeview">
                <a href="{{ route('user.sell.bitcoin') }}">
                  <i class="icon icon-sellsy purple-text s-18"></i> <span>Sell ETHEREUM</span>
                </a>
              </li>

              <li class="treeview">
                <a href="{{ route('user.sell.bitcoin') }}">
                  <i class="icon icon-sellsy purple-text s-18"></i> <span>Sell Giftcard</span>
                </a>
              </li>

            </ul>
          </li>
          <li class="treeview">
              <a href="{{ route('user.orders') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>View Orders</span>
              </a>
            </li>
          @endif

          @if (Auth::user()->role == 'junior')
                <li class="header"><strong>Admin</strong></li>

                <li class="treeview">
                    <a href="{{ route('admin.users') }}">
                        <i class="icon icon-gear purple-text s-18"></i> <span>Users</span>
                    </a>
                </li>

            <li class="treeview">
              <a href="{{ route('admin.catalogue') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Catalogue</span>
              </a>
            </li>

            <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Orders <i class="icon icon-angle-left s-18 pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="treeview">
                  <a href="{{ route('admin.orders.pending') }}">
                    <i class="icon icon-eyedropper purple-text s-18"></i> <span>Pending Orders</span>
                  </a>
                </li>
              </ul>
            </li>
            @endif

            @if (Auth::user()->role == 'admin')
                <li class="header"><strong>Admin</strong></li>
            <li class="treeview">
              <a href="{{ route('admin.catalogue') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Catalogue</span>
              </a>
            </li>

            <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Orders <i class="icon icon-angle-left s-18 pull-right"></i></a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="{{ route('admin.orders') }}">
                  <i class="icon icon-new_releases purple-text s-18"></i> <span>All Orders</span>
                   </a>
                </li>
                <li class="treeview">
                  <a href="{{ route('admin.orders.approved') }}">
                    <i class="icon icon-eyedropper purple-text s-18"></i> <span>Approved Orders</span>
                  </a>
                </li>
              </ul>
            </li>

            <!--<li class="treeview">-->
            <!--  <a href="{{ route('admin.users') }}">-->
            <!--    <i class="icon icon-gear purple-text s-18"></i> <span>Users</span>-->
            <!--  </a>-->
            <!--</li>-->
            @endif

            @if (Auth::user()->role == 'accountant')
                <li class="header"><strong>Admin</strong></li>
            <li class="treeview">
              <a href="{{ route('admin.catalogue') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Catalogue</span>
              </a>
            </li>

            <!--<li class="treeview">-->
            <!--  <a href="{{ route('admin.users') }}">-->
            <!--    <i class="icon icon-gear purple-text s-18"></i> <span>Users</span>-->
            <!--  </a>-->
            <!--</li>-->

            @endif

            @if (Auth::user()->role == 'accountant' || Auth::user()->role == 'superadmin')
                <li class="treeview">
              <a href="{{ route('admin.accountant.request') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Withdrawal Request</span>
              </a>
            </li>
            @endif

            @if (Auth::user()->role == 'superadmin')
                <li class="header"><strong>Admin</strong></li>
            <li class="treeview">
              <a href="{{ route('admin.catalogue') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Catalogue</span>
              </a>
            </li>

            <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Orders <i class="icon icon-angle-left s-18 pull-right"></i></a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="{{ route('admin.orders') }}">
                  <i class="icon icon-new_releases purple-text s-18"></i> <span>All Orders</span>
                   </a>
                </li>
                <li class="treeview">
                  <a href="{{ route('admin.orders.pending') }}">
                    <i class="icon icon-eyedropper purple-text s-18"></i> <span>Pending Orders</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="{{ route('admin.orders.completed') }}">
                    <i class="icon icon-check purple-text s-18"></i> <span>Completed Orders</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="{{ route('admin.orders.cancelled') }}">
                    <i class="icon icon-times purple-text s-18"></i> <span>Cancelled Orders</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="{{ route('admin.users') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Users</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('admin.staff') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Staff</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('admin.blockchain') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Crypto</span>
              </a>
            </li>
            @endif
            <li class="header"><strong>Accounts</strong></li>
            <li class="treeview">
              <a href="{{ route('user.settings') }}">
                <i class="icon icon-gear purple-text s-18"></i> <span>Settings</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="icon icon-sign-out purple-text s-18"></i> <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
          </ul>
        </section>
        <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.3); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 226.64px;"></div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
      </aside>
