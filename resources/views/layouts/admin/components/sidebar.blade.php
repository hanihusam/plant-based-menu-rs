
<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{-- <i class="lni lni-laravel"></i> --}}
            <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
            {{-- <img src="assets/images/livewire.png" class="logo-icon" alt="logo icon"> --}}

        </div>
        <div>
            <h4 class="logo-text">Plant Base Diet</h4>
            {{-- <h4 class="logo-text">Plant Base Diet</h4> --}}
        </div>
        <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">

        {{-- Start Dashboard --}}

        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon">
                    <i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('riwayat.index') }}">
                <div class="parent-icon">
                    <i class="lni lni-book"></i>
                </div>
                <div class="menu-title">Counting History</div>
            </a>
        </li>

        {{-- Start Multiple Menu --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class="lni lni-files"></i>
                </div>
                <div class="menu-title">Food Menu Data</div>
            </a>
            <ul>
                {{-- <li> <a href="{{ route('dataMenu') }}">
                        <i class="bi bi-circle"></i>Input Data
                    </a>
                </li> --}}
                <li> <a href="{{ route('dataMenu') }}">
                        <i class="bi bi-circle"></i>Import Data Excel
                    </a>
                </li>
            </ul>
        </li>
        {{-- End Multiple Menu --}}


    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
