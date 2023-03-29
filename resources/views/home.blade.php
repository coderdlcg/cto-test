<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                @auth
                    <div class="flex justify-between">
                        <a href="{{ route('dashboard') }}" class="w-full text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx">
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                @else
                    <div class="flex justify-between">
                        <a  href="{{ route('login') }}" class="w-1/2 text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx">
                            {{ __('Sign In') }}
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-1/2 text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx">
                                {{ __('Sign Up') }}
                            </a>
                        @endif
                    </div>
                @endauth

                <div class="flex justify-between">
                    <a href="{{ route('employees') }}" class="w-full text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx">
                        {{ __('Employees') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
