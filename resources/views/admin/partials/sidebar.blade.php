 <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
     <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
             <div class="flex items-center justify-start rtl:justify-end">
                 <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                     type="button"
                     class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                     <span class="sr-only">Open sidebar</span>
                     <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd"
                             d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                         </path>
                     </svg>
                 </button>
                 <a href="{{ route('admin.index') }}" class="flex ms-2 md:me-24">
                     <img src="{{ asset('static/admin/img/sekawan.png') }}" class="h-8 me-3" alt="Sekawan Logo" />
                     <span
                         class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sekawan
                         Media</span>
                 </a>
             </div>
             <div class="flex items-center">
                 <div class="flex items-center ms-3">
                     <div>
                         <button type="button"
                             class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                             aria-expanded="false" data-dropdown-toggle="dropdown-user">
                             <span class="sr-only">Open user menu</span>
                             <img class="w-8 h-8 rounded-full" alt="image"
                                 src="{{ auth()->user()->image ?: asset('static/admin/img/default.png') }}">
                         </button>
                     </div>
                     <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                         id="dropdown-user">
                         <div class="px-4 py-3" role="none">
                             <p class="text-sm text-gray-900 dark:text-white" role="none">
                                 {{ auth()->user()->name }}
                             </p>
                             <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                 {{ auth()->user()->email }}
                             </p>
                         </div>
                         <ul class="py-1" role="none">
                             <li>
                                 <a href="{{ route('admin.auth.logout') }}"
                                     class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                     role="menuitem">Sign out</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </nav>


 <aside id="logo-sidebar"
     class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
     aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
             @if (auth()->user()->hasAnyPermission(['users read']) or auth()->user()->hasRole('superadmin'))
                 <li class="text-gray-400">Master</li>
             @endif
             @if (auth()->user()->hasAnyPermission([
                         'sliders read',
                         'clients read',
                         'services read',
                         'abouts read',
                         'keunggulan read',
                         'testimoni read',
                         'menu read',
                         'submenu rsead',
                     ]) or auth()->user()->hasRole('superadmin'))
                 <li>
                     <a href="{{ route('admin.cars.index') }}"
                         class="flex items-center p-2 rounded-lg  hover:bg-gray-100 @if (@$menuActive === 'cars') active @endif group "
                         style="text-decoration: none">
                         <i class="fas fa-car group "></i>
                         <span class="ms-3 ">Car</span>
                     </a>
                 </li>
                 <li>
                     <button type="button"
                         class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group hover:bg-gray-100 @if (@$menuActive === 'log-book') active @endif"
                         aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                         <i class="fas fa-sticky-note "></i>
                         <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Log book</span>
                         <i class="fas fa-chevron-down group "></i>
                     </button>
                     <ul id="dropdown-example" class=" @if (@$menuActive !== 'log-book') hidden @endif  py-2 space-y-2">
                         <li>
                             <a href="{{ route('admin.rentcar.index') }}"
                                 class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group @if (@$subMenuActive === 'rentcar') active @endif">Rentcar</a>
                         </li>
                     </ul>
                 </li>
                 {{--  <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                        </li>
                    </ul>
                </li>  --}}
             @endif
         </ul>
     </div>
 </aside>
