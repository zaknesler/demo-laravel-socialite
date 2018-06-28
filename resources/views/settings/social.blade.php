@extends('settings/layouts/master')

@section('title', 'Social settings')

@section('settings.content')
    <div class="mb-6">Here you may manage what social authentication providers you have enabled for your account.</div>

    <ul class="list-reset -mb-6">
        @foreach($user->socialAccounts as $socialAccount)
            <li class="bg-grey-lightest rounded shadow flex items-center justify-between mb-6 p-3">
                <div class="flex-1 flex">
                    <img class="w-16 h-16 rounded select-none pointer-events-none" src="{{ $user->getAvatar() }}" alt="Profile" />

                    <div class="ml-3">
                        <div class="font-semibold text-grey-darkest">{{ config("auth.social.providers.$socialAccount->provider.name") }}</div>

                        <div class="text-grey-dark text-sm">Added on {{ $socialAccount->created_at->format('F j, Y \a\t h:i a') }}</div>
                    </div>
                </div>

                <a class="block bg-grey-light hover:bg-grey text-grey-darker no-underline rounded flex items-center px-3 py-2" href="{{ config("auth.social.providers.$socialAccount->provider.manage_url") }}">
                    <span class="block mr-2">Manage</span>

                    <svg class="block w-4 h-4 text-grey-dark fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 6.41L8.7 16.71a1 1 0 1 1-1.4-1.42L17.58 5H14a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V6.41zM17 14a1 1 0 0 1 2 0v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2h5a1 1 0 0 1 0 2H5v12h12v-5z"/></svg>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
