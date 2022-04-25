<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img width="100" height="100" src="{{asset('admin_panel/images/12.png')}}" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4"  style="direction: rtl"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="direction: rtl">
                <x-jet-label for="email" value="نام کاربری" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4" style="direction: rtl">
                <x-jet-label for="password" value="کلمه عبور" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4" style="direction: rtl">
                <label for="remember_me" class="flex items-center">


                </label>
            </div>

            <div class="flex items-center justify-end mt-4" >
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">

                    </a>
                @endif

                <x-jet-button class="ml-4">
                    ورود
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
