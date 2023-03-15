<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="flex justify-between">
                    <a class="w-1/2 text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx" href="{{ route('register') }}">
                        {{ __('Sign Up') }}
                    </a>
                    <a class="w-1/2 text-center p-4 bg-gray-200 hover:bg-gray-300 font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-lx" href="{{ route('login') }}">
                        {{ __('Sign In') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
