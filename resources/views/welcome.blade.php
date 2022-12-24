<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
          <link rel="stylesheet" href="{{ mix('css/app.css') }}">

         <!--Styles-->
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body class="bg-gray-100">
    
    <nav class="md:flex md:justify-between"  x-data="{open:false}">
        <div class="flex justify-between mb-3 py-4 px-6">
            <div class="flex items-center font-bold text-purple-800"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                DD
            </div>
            <div  class="md:hidden">
                <button @click="open=!open" class="relative">
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute bottom-0 left-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute  bottom-0 left-0 " viewBox="0 0 20 20" fill="currentColor">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <div :class="open ? 'block' : 'hidden' " class="px-6 py-2 text-underline text-purple-500 md:block">
          <a href="#features"  class="hover:underline  block md:inline-block hover:font-bold focus:font-bold focus:underline md:mx-5 my-2">Features</a>
            @if(Route::has('login'))
                @auth
                    <a href="{{url('/dashboard')}}"  class="hover:underline  block md:inline-block hover:font-bold focus:font-bold focus:underline mx-5  my-2 "> Dashboard</a>
                @else
                    <a href="{{route('login')}}"  class="hover:underline  block md:inline-block hover:font-bold focus:font-bold focus:underline mx-5 my-2">Login</a>

                @if(Route::has('register'))
                    <a href="{{route('register')}}" class="hover:underline  block md:inline-block hover:font-bold focus:font-bold focus:underline mx-5 my-2" >Register</a>
                @endif
                @endauth
            @endif
        </div>
    </nav>
        <section class="mt-6 pt-6 px-4" id="features"> 
                <h3 class="text-2xl xl:text-4xl xl:leading-tight text-center text-gray-800">Planning is for everyone
                <br class="sm:hidden xl:inline"><span class="text-purple-600">DD (Daily Diary) is your friend </span> <br class="sm:hidden lg:inline"> for listing and tracking activites personally or as a team </h3>   
        </section>

        <section class="flex justify-center px-4">
            <div class="lg:flex  lg:flex-wrap lg:justify-around max-w-screen-xl w-full xl:mt-6 xl:px-6">
                    <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                        <div class="mr-4 lg:mr-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div class="lg:mt-7">
                        <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Work that needs to be done</h3>
                        <p class="text-xs lg:text-sm xl:text-lg text-gray-600">DD helps you <span class="text-purple-500 underline">list the activities of </span> and mark them done.
                        This keeps you in a good state to know your progress and keep you more productive </p>
                    </div>
                    </div>

                     <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                        <div class="mr-4 lg:mr-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="lg:mt-7">
                            <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Reminders</h3>
                            <p class="text-xs lg:text-sm xl:text-lg text-gray-600">You can mark activites as  <span class="text-purple-500 underline">important </span> and DD will prioritise them for you by allowing you to 
                            set email reminders to keep you up-to-date on those activities </p>
                        </div>
                    </div>
                    <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                        <div class="mr-4 lg:mr-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="lg:mt-7">
                            <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Team work</h3>
                            <p class="text-xs lg:text-sm xl:text-lg text-gray-600">Create a team and set weekly tasks on DD that can be <span class="text-purple-500 underline">seemlessly monitored</span> Instead of organising many 
                            meetings to set activites</p>
                        </div>
                </div>
                <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                        <div class="mr-4 lg:mr-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        </div>
                        <div class="lg:mt-7">
                            <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Chats</h3>
                            <p class="text-xs lg:text-sm xl:text-lg text-gray-600">Team members can easily enter into<span class="text-purple-500 underline">Chat rooms </span> and participate in <span class="text-purple-500 underline">Real time </span>  discussions. </p>
                        </div>
                </div>
                <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                        <div class="mr-4 lg:mr-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="lg:mt-7">
                            <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Reports</h3>
                            <p class="text-xs lg:text-sm xl:text-lg text-gray-600">From <span class="text-purple-500 underline">blank activity reports to progress reports </span> of what you have set out to do. These are downloadable 
                            from the click of a button.</p>
                        </div>
                </div>
                  <div class="flex lg:w-1/3 lg:p-5 mt-8 w-full max-w-md lg:flex-col">
                    <div class="mr-4 lg:mr-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 xl:h-8 xl:w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="lg:mt-7">
                        <h3 class="text:sm lg:text-lg font-semibold xl:text-xl text-gray-800">Reviewing your day</h3>
                        <p class="text-xs lg:text-sm xl:text-lg text-gray-600">DD has a special feature: <span class="text-purple-500 underline">reviewing your day </span> that lets you see the wins that you have had on your day 
                        and those thay you may have missed.</p>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>
