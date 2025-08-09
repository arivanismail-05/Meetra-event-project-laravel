<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://cdn.tailwindcss.com"></script>
  <!-- <script src="./tailwind3.js"></script> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body class=" bg-[#1f202e]">



<nav class="fixed top-0 z-50 w-full ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="" class="flex ms-2 md:me-24">
          <span class="self-center text-bold text-[#4A69FF] text-xl font-semibold sm:text-2xl whitespace-nowrap">Admin Panel</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-6.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm" id="dropdown-user">
              <div class="px-4 py-3" role="none">
               
                <p class="text-sm font-medium text-gray-900 truncate " role="none">
                  {{ auth()->guard('admin')->user()->email }}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Dashboard</a>
                </li>
                  <form method="POST" action="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                           logout
                    </button>
                </form>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#24273F]  sm:translate-x-0 " aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-[#24273F] ">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('admin.dashboard')}}" class="flex items-center p-2  rounded-md text-gray-300   hover:bg-[#373b5e] hover:text-gray-100  group">
               <svg class="w-5 h-5 text-gray-300  transition duration-75  group-hover:text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

          <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-300 transition duration-75 rounded-lg group hover:bg-[#373b5e] hover:text-gray-100 " aria-controls="dropdown-event-1" data-collapse-toggle="dropdown-event-1">
                  <i class="w-5 h-5 text-gray-300 group-hover:text-gray-100  transition duration-75 fa-solid fa-calendar-days shrink-0"></i>
                  <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Events</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-event-1" class="hidden py-2 space-y-2">
                  <li>
                     <a href="" class="flex items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-900 ">Products</a>
                  </li>
            </ul>
         </li>



        

          <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-300 transition duration-75 rounded-lg group hover:bg-[#373b5e] hover:text-gray-100 " aria-controls="dropdown-event-2" data-collapse-toggle="dropdown-event-2">
                  <i class="w-5 h-5 text-gray-300 transition duration-75 fa-solid fa-calendar-days shrink-0 group-hover:text-gray-100 "></i>
                  <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Events</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-event-2" class="hidden py-2 space-y-2">
                  <li>
                     <a href="{{ route('admin.events.index') }}" class="flex items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-900 ">Show-Events</a>
                  </li>
                  <li>
                     <a href="{{ route('admin.events.create') }}" class="flex items-center w-full p-2 text-gray-400 transition duration-75 rounded-lg pl-11 group hover:bg-gray-900 ">Create-Event</a>
                  </li>
            </ul>
         </li>
         
       
         
      </ul>
   </div>
</aside>
<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-[#1E1E2D]  rounded-lg  mt-14">

    @yield('content')

   </div>
</div>
</body>
</html>



