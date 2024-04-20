@extends('admin.layout')

@section('title')
    Create Rentcar |
@endsection

@section('content')

    <section>
        <div class="block w-full bg-gray-50 py-6 rounded-lg">
            <h1 class="text-4xl font-medium text-[#073545] px-10">Rentcar</h1>
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
            <form action="{{ route('admin.rentcar.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-6">
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Pemohon</label>
                    <input type="text" id="author" name="author" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama Pemohon of the Rentcar">
                </div>
                <div class="grid grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="car_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car</label>
                        <select name="car_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full">
                            <option :value="null" disabled>Car</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                    {{ $car->name }}
                                    </option=>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event
                        </label>
                        <input type="text" id="event" name="event" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Event of the Rentcar">
                    </div>

                    <div>
                        <label for="destination"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination</label>
                        <input type="text" id="destination" name="destination" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Destination of the Rentcar">
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                            Time</label>
                        <input type="text" id="start_time" name="start_time" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Start Time of the Rentar">
                    </div>
                    <div>
                        <label for="finish_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Finish
                            Time</label>
                        <input type="text" id="finish_time" name="finish_time" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Finish Time of the Rentar">
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
