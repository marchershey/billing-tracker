<aside id="sidebar" class="hidden absolute md:relative md:block w-64 h-screen-nav overflow-y-hidden flex-shrink-0 bg-gray-900">
    <div id="logo" class="p-4 mt-px align-middle hidden">
        <a href="{{route('index')}}" class="text-xl font-bold text-gray-400">
            {{config('app.name')}} <sup>BETA</sup>
        </a>
    </div>
    <div id="nav-links" class="text-sm">
        <ul class="w-64">
            <li>
                <a href="{{route('drivers.dashboard.index')}}" class="block px-4 py-2 text-gray-600 hover:text-gray-300 transition duration-500">
                    <i class="fas fa-tachometer-alt fa-fw"></i>
                    <span class="ml-4 font-semibold">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:text-gray-300 transition duration-500">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <span class="ml-4 font-semibold">
                        Dispatches
                    </span>
                </a>
            </li>
            {{-- <li>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:text-gray-300 transition duration-500 dropdown">
                    <i class="fas fa-chart-line fa-fw"></i>
                    <span class="ml-4 font-semibold">
                        Reports <i class="caret fas fa-angle-down fa-fw float-right mt-1"></i>
                    </span>
                </a>
                <div class="dropdown-box mx-4 rounded hidden">
                    <ul>
                        <li>
                            <a href="#" class="block hover:text-gray-300 transition duration-500 w-full px-4 py-1">
                                Recent Trips
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block hover:text-gray-300 transition duration-500 w-full px-4 py-1">
                                System Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li>
                <a href="{{route('drivers.rates.index')}}" class="block px-4 py-2 text-gray-600 hover:text-gray-300 transition duration-500">
                    <i class="fas fa-dollar-sign fa-fw"></i>
                    <span class="ml-4 font-semibold">
                        Pay Rates
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>