@extends('admin.layout')

@section('title')
    Create User |
@endsection

@section('content')

    <section>
        <div class="block w-full bg-gray-50 py-6 rounded-lg">
            <h1 class="text-4xl font-medium text-[#073545] px-10">Users</h1>
        </div>

        <div class="mt-10 bg-gray-50 p-6 rounded-lg">
            @if (Session::has('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg  bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">{{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" name="name" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Name">
                </div>
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username" name="username" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Username">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        </label>
                        <input type="email" id="email" name="email" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Event of the Rentcar">
                    </div>
                </div>
                <hr class="text-gray-400 border-1.5">
                <p class="text-gray-400 font-light text-xs mt-2">Change Password</p>
                <br>
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Password">
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                            Confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Password Confirmation">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Image</label>

                        <input id="image" type="file" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 mb-3"
                            onchange="document.querySelector('img#image').src = window.URL.createObjectURL(this.files[0])"
                            accept="image/*" requireds>
                        <img src="{{ asset('static/admin/img/default.png') }}" alt="image" class="h-40 rounded-lg"
                            id="image">
                    </div>
                    <div>
                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full">
                            <option disabled @if (!old('role')) selected @endif>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if (old('role') === $role->name) selected @endif
                                    @if ($role->name === 'superadmin') disabled @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-actions">
                    <a href="{{ route('admin.rentcar.index') }}" class="text-sm text-white bg-gray-300 p-3 rounded">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="text-sm text-white bg-green-400 p-2.5 rounded mx-3" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </section>

@stop
