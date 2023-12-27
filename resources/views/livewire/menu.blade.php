<div>
    <section class="text-center">
        <div
            class="flex justify-center items-center flex-col pt-10"
            style="color: {{$menu->header_text_color}}; background-color: {{$menu->header_bg_color}};"
        >
            <img src="/storage/{{$menu->logo}}" alt="{{$menu->brand_name}}">
            <ul class="flex justify-around items-center pb-6 w-1/3">
                <li class="py-4 px-4">
                    <a class="tracking-widest text-menu--item" href="">Home</a>
                </li>
                <li class="py-4 px-4">
                    <a class="tracking-widest text-menu--item" href="#menu">Menu</a>
                </li>
                <li class="py-4 px-4">
                    <a class="tracking-widest text-menu--item" href="#contact">Contact</a>
                </li>
            </ul>
        </div>



        <ul
            id="menu"
            class="pb-10"
            style="color: {{$menu->body_text_color}}; background-color: {{$menu->body_bg_color}};"
        >
            <li class="pt-10 pb-6 text-5xl tracking-widest uppercase">Menu</li>
            <div class="container mx-auto px-4 w-3/4 content-center">
                {{-- Loop through each category --}}
                @foreach ($menu->menuCategory()->get() as $category)
                    {{-- Category headers --}}
                    <h2 class="text-3xl font-bold underline underline-offset-4 mb-2 mt-16">{{$category->name}}</h2>
                    @if (!empty($category->description))
                    <p class="text-base pb-10">{{$category->description}}</p>
                    @endif

                    {{-- Menu Items --}}
                    @foreach ($category->menuItems()->get() as $item)
                        {{-- Every other loop, add a new div --}}
                        @if ($loop->odd)
                            <div class="flex flex-col md:flex-row md:w-2/3 mx-auto md:justify-around">
                        @endif
                        <div class="w-100 md:w-1/3">
                            <h2 class="text-3xl font-bold mb-2 mt-5">{{$item->name}}</h2>
                            <p class="text-base">{{$item->description}}</p>
                            <p class="text-base">{{$item->unit_price}}</p>
                        </div>
                        {{-- Every other loop, or the last loop --}}
                        @if ($loop->even || $loop->last)
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </ul>

        {{-- Footer --}}
        <footer
            class="py-8 pt-1"
            style="color: {{$menu->footer_text_color}}; background-color: {{$menu->footer_bg_color}};"
        >
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="w-full md:w-auto mx-auto my-12">
                        <h3 class="text-2xl mb-2">Company Name</h3>
                        <address>
                            123 Main Street, Anytown, USA
                        </address>
                    </div>
                    <div class="flex items-center">
                        <a href="#" class="text-white mx-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white mx-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-white mx-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</div>
