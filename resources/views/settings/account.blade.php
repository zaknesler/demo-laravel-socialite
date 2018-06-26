@extends('settings/layouts/master')

@section('title', 'Account settings')

@section('settings.content')
    <form class="w-full" action="{{ route('settings.account.update') }}" method="POST">
        @csrf

        <div class="block mb-6">
            <label class="mb-2 inline-block text-sm font-semibold uppercase tracking-wide" for="name">Name</label>

            <div class="relative">
                <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                    <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/></svg>
                </div>

                <input autofocus type="name" name="name" id="name" placeholder="Alex Smith" value="{{ old('name') ?? $user->name }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('name', ' border-red') }}" />
            </div>

            @if ($errors->has('name'))
                <div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="block mb-6">
            <label class="mb-2 inline-block text-sm font-semibold uppercase tracking-wide" for="email">Email</label>

            <div class="relative">
                <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                    <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2zm16 3.38V6H4v1.38l8 4 8-4zm0 2.24l-7.55 3.77a1 1 0 0 1-.9 0L4 9.62V18h16V9.62z"/></svg>
                </div>

                <input required type="email" name="email" id="email" placeholder="example&#64;domain.com" value="{{ old('email') ?? $user->email }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('email', ' border-red') }}" />
            </div>

            @if ($errors->has('email'))
                <div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="block">
            <input class="inline-block appearance-none border-0 bg-blue hover:bg-blue-dark text-white rounded cursor-pointer py-3 px-6" type="submit" value="Update Account Settings" />
        </div>
    </form>
@endsection
