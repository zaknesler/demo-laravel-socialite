@extends('layouts/base')

@section('title', 'Login')

@section('show-header', false)

@section('content-full')
    <div class="min-h-full h-full bg-grey-lightest flex flex-col items-center overflow-auto">
        <div class="m-auto max-w-sm w-full sm:px-8">
            <div class="m-8">
                <div class="text-xl text-center mb-8">
                    <a class="text-grey-darker hover:text-grey-darkest no-underline" href="/">{{ config('app.name') }}</a>
                </div>

                <div class="bg-white rounded">
                    <div class="block rounded-t w-full h-2 bg-blue"></div>

                    <div class="w-full border border-t-0 p-8">
                        <div class="text-center mb-8">Please sign in using one of following methods:</div>

                        <div class="-mb-6">
                            <a class="block appearance-none w-full border-0 bg-blue hover:bg-blue-dark text-white no-underline text-center rounded cursor-pointer p-3 mb-6" href="{{ route('auth.social.redirect', 'github') }}">GitHub</a>
                            <a class="block appearance-none w-full border-0 bg-blue hover:bg-blue-dark text-white no-underline text-center rounded cursor-pointer p-3 mb-6" href="{{ route('auth.social.redirect', 'twitter') }}">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
