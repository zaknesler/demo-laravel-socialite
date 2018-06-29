@extends('layouts/base')

@section('show-header', true)

@section('content-full')
    <div class="max-w-xl mx-auto p-6">
        <div class="bg-white border rounded overflow-hidden md:flex">
            <div class="min-h-full w-full md:w-1/4 border-b md:border-b-0 md:border-r">
                @include('settings/partials/_sidebar')
            </div>

            <div class="min-h-full flex-1 p-6">
                <div class="font-semibold text-black mb-6">@yield('title')</div>

                @yield('settings.content')
            </div>
        </div>
    </div>
@endsection
