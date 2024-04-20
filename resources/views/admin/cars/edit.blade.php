@extends('admin.layout')

@section('title')
    Edit Car |
@endsection

@section('content')

    <section>
        <div class="block w-full bg-gray-50 py-6 rounded-lg">
            <h1 class="text-4xl font-medium text-[#073545] px-10">Car</h1>
        </div>

        <div class="mt-10 bg-gray-50 p-6 rounded-lg">
            <form action="{{ route('admin.cars.update', @$model->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="name" name="name" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Name of the Car" value="{{ @$model['name'] }}">
                </div>
                <div class="grid grid-cols-4 gap-6 mb-6">
                    <div>
                        <label for="nopol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Polisi</label>
                        <input type="text" id="nopol" name="nopol" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Nomor Police of the Car" value="{{ @$model['nopol'] }}">
                    </div>
                    <div>
                        <label for="bbm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bahan
                            Bakar</label>
                        <select name="bbm"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full">
                            <option :value="null" disabled>Bahan Bakar</option>
                            <option value="pertalite" {{ @$model['bbm'] == 'pertalite' ? 'selected' : '' }}>Pertalite
                            </option>
                            <option value="pertamax" {{ @$model['bbm'] == 'pertamax' ? 'selected' : '' }}>Pertamax</option>
                            <option value="solar" {{ @$model['bbm'] == 'solar' ? 'selected' : '' }}>Solar</option>
                        </select>
                    </div>
                    <div>
                        <label for="seat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                            Seat</label>
                        <input type="text" id="seat" name="seat" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Seat of the Car" value="{{ @$model['seat'] }}">
                    </div>
                    <div>
                        <label for="tahun_pembelian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                            Pembelian</label>
                        <input type="text" id="tahun_pembelian" name="tahun_pembelian"
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"
                            placeholder="Tahun Pembelian of the Car" value="{{ @$model['tahun_pembelian'] }}">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>

                    <input id="image" type="file" name="image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 mb-3"
                        onchange="document.querySelector('img#image').src = window.URL.createObjectURL(this.files[0])"
                        accept="image/*" requireds>
                    <img src="{{ asset(@$model['image']->path) }}" alt="image" class="h-40 rounded-lg" id="image">
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.cars.index') }}" class="text-sm text-white bg-gray-300 p-3 rounded">
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
