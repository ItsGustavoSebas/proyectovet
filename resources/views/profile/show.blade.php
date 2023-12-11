<x-app-layout>
    <title>Perfil</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="mx-auto sm:w-full md:w-3/4 lg:w-1/2 xl:w-1/3">
        <div style="background: #f9fafa" class="mx-4 md:mx-10 my-4 md:my-0 p-4 md:p-10">
            <div class="max-w-7xl mx-auto">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
    
                    <x-section-border />
                @endif
    
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-4 sm:mt-6">
                        @livewire('profile.update-password-form')
                    </div>
    
                    <x-section-border />
                @endif
    
                <div class="mt-4 sm:mt-6">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
    
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />
    
                    <div class="mt-4 sm:mt-6">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>    
</x-app-layout>
