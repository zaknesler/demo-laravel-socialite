@extends('settings/layouts/master')

@section('title', 'Social settings')

@section('settings.content')
    @foreach($user->socialAccounts as $socialAccount)
        {{ $socialAccount->toJson() }}
    @endforeach
@endsection
