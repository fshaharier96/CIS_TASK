@if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 mt-4 ms-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="  text-decoration-none btn btn-lg btn-info ml-2 text-secondary  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                         
                        @if (Auth::user()->is_active === 1)
                        <a href="{{ url('/stripe') }}" class="   text-decoration-none btn btn-lg btn-success   hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Activate Account</a>
                        @else
                        <a href="" class="   text-decoration-none btn btn-lg btn-success   hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Account Activated</a>
                        @endif
                        

                        <a href="{{ url('/logout') }}" class="  text-decoration-none btn btn-lg btn-secondary  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                    @else
                       
                       {{--  <a href="{{ route('home') }}" class="mx-2 mx-auto fw-bold y text-decoration-none font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a> --}}
                       

                        @if (Route::has('register_view'))
                        @if (!Request::is('register_view'))
                          <div class="d-flex justify-content-end p-4">
                            <a href="{{ route('register_view') }}" class="btn btn-lg btn-primary mx-2   text-decoration-none ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            </div>
                           @else
                           <div class="d-flex justify-content-end p-4">
                            <a href="{{ route('home') }}" class="btn btn-lg btn-primary mx-2   text-decoration-none ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                            </div>
                            @endif


                        @endif
                    @endauth
                </div>
    @endif