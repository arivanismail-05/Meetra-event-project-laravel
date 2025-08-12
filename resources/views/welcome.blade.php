<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> 

</head>
<body class=" bg-[linear-gradient(to_bottom_right,_#e835cf_0%,_#19132c_50%,_#19132c_70%,_#5b3af1_100%)]">
    <nav class="relative p-2 fixed-top">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="flex items-center flex-1 sm:items-stretch sm:justify-start">
        <div class="flex items-center text-[50px] font-bold text-white">
            <span class="bg-gradient-to-r from-white via-[#89c6ff] to-[#5b3af1] bg-clip-text text-transparent ">Meetra</span></h1>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium relative text-gray-300  tracking-[1px] hover:text-white
            after:content-[''] after:bg-[#5b3af1] after:h-[3px] after:w-[0%] after:left-0 after:bottom-0 after:absolute after:duration-300 hover:after:w-[100%]
            after:rounded-xl duration-300">Login</a>
            <a href="{{ route('register') }}" class="px-3 py-2 text-sm font-medium relative text-gray-300  tracking-[1px] hover:text-white
            after:content-[''] after:bg-[#5b3af1] after:h-[3px] after:w-[0%] after:left-0 after:bottom-0 after:absolute after:duration-300 hover:after:w-[100%]
            after:rounded-xl duration-300">Register</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<main>


<div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="grid ">
    <div class="flex flex-col items-center justify-center h-[calc(100vh-8rem)] px-4 gap-4 text-center">
        <div class="md:w-[50%]">
            <h1 class="text-[50px] font-bold text-white ">
                <span class="bg-gradient-to-r from-white via-[#89c6ff] to-[#5b3af1] bg-clip-text text-transparent">Meetra</span>
                Where Events Come to Life
            </h1>
        </div>
        <p class=" text-lg text-white mb-6">Find exciting events, connect with your community, and make every moment count.</p>
        <a href="{{ route('login') }}" class="px-12 py-3 text-lg font-semibold text-white transition duration-300 border border-white hover:bg-white hover:text-[#5b3af1] rounded-full">Get Started</a>
    </div>

    </div>
 </div>
</main>
 
</body>
</html>