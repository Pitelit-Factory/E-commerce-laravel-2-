<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('produits')" :active="request()->routeIs('produits')">
                        {{__('Boutiques')}}
                    </x-nav-link>
                    @auth
                    <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')">
                        {{__('Logout')}}
                    </x-nav-link>
                    <x-nav-link :href="route('account')" :active="request()->routeIs('account')">
                        {{__('Account')}}
                    </x-nav-link>
                    <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                        Panier<span class="badge badge-pill badge-dark">{{Cart::count()}}</span>
                    </x-nav-link>
                    
                    @endauth
                </div>
            </div>
           
</nav>
