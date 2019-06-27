@extends('layouts.app')

@section('content')
    <div class="w-full lg:max-w-md mx-auto py-16">
        <form method="POST" action="{{ route('login') }}" class="bg-white hover:shadow-lg rounded px-8 pt-4 pb-8 mb-4">
            @csrf
            <div class="text-2xl mx-32 font-semibold mb-6">Let's get in</div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username or Email ID
                </label>
                <input class="mb-1 hover:shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none @error('email') is-invalid @enderror"

                       id="username"
                       name="email"
                       value="{{ old('email') }}"
                       type="email"
                       placeholder="Username"
                       required
                       autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500 font-normal">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="mb-1 hover:shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none @error('password') is-invalid @enderror"
                       name="password"
                       id="password"
                       type="password"
                       placeholder="******************"
                       required
                       autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500 font-normal">{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="flex items-center justify-between">

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Sign In
                </button>

                @if (Route::has('password.request'))
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif

            </div>
        </form>

        <p class="text-center text-gray-500 text-xs">
            &copy;2019 C-Soft. All rights reserved.
        </p>

    </div>
@endsection
