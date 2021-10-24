<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="lastname" value="{{ __('Last Name') }}" />
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="lastname2" value="{{ __('Second Last Name') }}" />
                <x-jet-input id="lastname2" class="block mt-1 w-full" type="text" name="lastname2" :value="old('lastname2')" required autofocus autocomplete="lastname2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('User Name') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="profile_id" value="{{ __('Profile') }}" />
                <select id="profile_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="profile_id" :value="old('profile_id')" required autofocus autocomplete="profile_id">
                    <option value="1">Administrador</option>
                    <option value="2">Gestor</option>
                    <option value="3">Capturista</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" oninput="limitChar(this)" maxlenght="15" />
                <p class="block font-medium text-sm text-gray-700" id="charCounter">15 Characters limit</p>

            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" oninput="limitChar2(this)" maxlenght=" 15" />
                <p class="block font-medium text-sm text-gray-700" id="charCounter2">15 Characters limit</p>

            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        <script>
            let limitChar = (element) => {
                const maxChar = 15;

                let ele = document.getElementById(element.id);
                let charLen = ele.value.length;

                let p = document.getElementById('charCounter');
                p.innerHTML = maxChar - charLen + ' characters remaining';

                if (charLen > maxChar) {
                    ele.value = ele.value.substring(0, maxChar);
                    p.innerHTML = 0 + ' characters remaining';
                }
            }
            let limitChar2 = (element) => {
                const maxChar = 15;

                let ele = document.getElementById(element.id);
                let charLen = ele.value.length;

                let p = document.getElementById('charCounter2');
                p.innerHTML = maxChar - charLen + ' characters remaining';

                if (charLen > maxChar) {
                    ele.value = ele.value.substring(0, maxChar);
                    p.innerHTML = 0 + ' characters remaining';
                }
            }

        </script>

    </x-jet-authentication-card>
</x-guest-layout>
