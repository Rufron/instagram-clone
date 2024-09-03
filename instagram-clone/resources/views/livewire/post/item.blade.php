<div class="max-w-lg mx-auto">
    {{-- Because she competes with no one, no one can compete with her. --}}

    {{-- header --}}
    <header class="flex items-center gap-3">

        <x-avatar story
            src="https://images.unsplash.com/profile-1449546653256-0faea3006d34?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=32&w=32"
            class="h-14 w-14" />

        <div class="grid grid-cols-7 w-full gap-2">
            <div class="col-span-5">
                <h5 class="font-semibold truncate text-sm">{{ fake()->name }}</h5>
            </div>
            <div class="col-span-2 flex text-right justify-end">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    </svg>
                </button>
            </div>
        </div>
    </header>
    {{-- main --}}
    <main>
        <div class="my-2">
            {{-- <x-video /> --}}
            <!-- Slider main container -->
            <div x-init="new Swiper($el, {
                modules: [Navigation, Pagination],

                pagination: {
                    el: '.swiper-pagination',
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });" class="swiper">
                <!-- Additional required wrapper -->
                <ul x-cloak class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($post->media as $file)

                        <li class="swiper-slide">
                            @switch($file->mime)
                                @case('video/webm')
                                    <x-video source="{{$file->url}}"/>
                                @break

                                @case('image')
                                @break

                                @default
                            @endswitch
                        </li>
                    @endforeach


                    <li class="swiper-slide"><img
                            src="https://images.unsplash.com/photo-1620554600249-636b81e27699?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c291cmNlfGVufDB8fDB8fHww" />
                    </li>
                    <li class="swiper-slide"><img
                            src="https://images.unsplash.com/photo-1630349575347-89fde96c7e4f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8c291cmNlfGVufDB8fDB8fHww" />
                    </li>
                    ...
                </ul>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </main>


    {{-- footer --}}
    <footer>
        <div class="flex gap-4 items-center my-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-heart" viewBox="0 0 16 16">
                    <path
                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                </svg>
            </span>


            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chat-right" viewBox="0 0 16 16">
                    <path
                        d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                </svg>
            </span>

            <span ml-auto>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-send" viewBox="0 0 16 16">
                    <path
                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                </svg>
            </span>
        </div>

        {{-- likes and views --}}
        <p class="font-bold text-sm">
            104,474 likes
        </p>

        {{-- names and comment --}}
        {{-- <div class="flex text-sm gap-2 font-medium">
            <p><strong class="font-bold">{{ fake()->name }}</strong>Lorem ipsum dolor sit amet consectetur, adipisicing
                elit. Neque, modi!</p>
        </div> --}}

        <div class="flex text-sm gap-2 font-medium">
            <p><strong class="font-bold">{{ $post->user->name }}</strong>{{$post->description}}</p>
        </div>


        {{-- view post modal --}}
        <button onclick="Livewire.dispatch('openModal', {component:'post.view.modal', arguments: {'post':{{$post->id}}}})" class="text-slate-500/90 text-sm font-medium"> View all {{$post->comments->count()}} comments</button>

        {{-- leave comment --}}
        <form x-data="{ inputText: '' }"class="grid-grid-cols-12 items-center w-full"></form>
        @csrf
        <input x-model="inputText" type="text" placeholder="leave a comment"
            class="border-0 col-span-10 placeholder:text-sm outline-none focus:outline-none px-0 rounded-lg hover:ring-0">
        <div class="col-span-1 ml-auto flex justify-end text-right">
            <button class="text-sm font-semibold flex justify-end text-blue-500">
                Post
            </button>
        </div>

        <span class="col-span-1 ml-auto">

        </span>
    </footer>
</div>
