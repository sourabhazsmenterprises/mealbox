<style>
 svg{
    display:none !important;
}
            </style>


<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>  

        <x-jet-validation-errors class="mb-4" />
       
        <a href="{{ route('dashboard') }}" class="brand-link" style="height:300px; width:100%; font-size:30px; text-align:center;" >
 
     <!--<img src="{{ asset('assets/img/logsa.png')}}" alt="AdminLTE Logo"
      class="brand-image " style="opacity: .8;width:100%; height:100px;"> -->
			<h2 style="font-weight:800"> Meal Box </h2>
  </a>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" style="border: 2px solid;" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" style="border: 2px solid;" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                
            </div>

            <div class="flex items-center justify-end mt-4">
               

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
