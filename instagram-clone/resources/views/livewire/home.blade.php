<div class="w-full h-full">
    {{-- Header --}}
    <header class="md:hidden sticky top-0 bg-white">
        <div class="grid grid-cols-12 gap-2 items-center">
            <div class="col-span-3">
                <img src="{{asset('assets/logo.jpeg')}}" class="h-12 max-w-lg w-full" />
            </div>

            <div class="col-span-8 flex justify-center px-2">
                <input type="text" placeholder="Search"
                class="border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg focus:ring-0 hover:r" />
            </div>

            <div class="col-span-1 flex justify-center">
                <a href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                          </svg>
                    </span>
                </a>

            </div>
        </div>

    </header>

    {{-- main --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">

        <aside class="lg:col-span-8  overflow-hidden ">
            {{-- Stories --}}
            <section>

            </section>


            <section>
                @for ($i = 0; $i < 10; $i++)
                <ul class="flex overflow-x-auto scrollbar-hide items-center gap-2">
                    <li class="flex flex-col justify-center w-20 gap-1 p-2">
                        <x-avatar story src="https://images.unsplash.com/profile-1449546653256-0faea3006d34?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=32&w=32-{{$i}}" class="h-14 w-14" />
                        <p class="text-xs font-medium truncate"> {{fake()->name}}</p>
                    </li>
                @endfor
                </ul>
            </section>

            {{-- posts --}}
            <section class="mt-5 space-y-4 p-2">
            @if ($posts)

                @foreach($posts->take(10) as $post)
                    <livewire:post.item wire:key="post-{{$post->id}}" :post="$post"/>
                @endforeach
            @else
             <p class="font-bol flex justify-center">No Posts</p>

            @endif
            </section>


        </aside>

        {{-- suggestions --}}
        <aside class="lg:col-span-4  hidden lg:block p-4">
            <div class="flex items-center map-2">
                {{-- <x-avatar src="https://api.pexels.com/500x500?face" class="w-12 h-12"/> --}}
                <x-avatar  src="https://images.unsplash.com/profile-1441298803695-accd94000cac?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&cs=tinysrgb&fit=crop&h=32&w=32&s=7cfe3b93750cb0c93e2f7caec08b5a41" class="w-12 h-12"/>

                <h4 class="font-medium">{{fake()->name}}</h4>
            </div>
            {{-- suggestion section. --}}
            <section class="mt-4">
                <h4 class="font-bold text-gray-700/95">Suggestions for you</h4>

                <ul class="my-2 space-y-3">
                   @for ($i = 0; $i < 5; $i++)
                   <li class="flex items-center gap-3">
                    <x-avatar src="https://images.unsplash.com/profile-1449546653256-0faea3006d34?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=32&w=32" class="w-12 h-12" />

                    <div class="grid grid-cols-7 w-full gap-2">
                        <div class="col-span-5">
                            <h5 class="font-semibold truncate text-sm">{{fake()->name}}</h5>
                            <p class="text-x5 truncate">Followed by {{fake()->name}}</p>
                        </div>

                        <div class="col-span-2 flex text-right justify-end">
                            <button class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                        </div>
                    </div>
                     </li>
                   @endfor
                </ul>
            </section>

            {{-- App links --}}
            <section class="mt-5">

                <ol class="flex gap-2 flex-wrap">
                <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline"></a></li>
                </ol>
            </section>
        </aside>
    </main>
</div>
