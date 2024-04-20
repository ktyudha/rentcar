@extends('admin.layout')

@section('title')
    Rentcar |
@endsection

@section('content')

    <div class="block w-full bg-gray-50 py-6 rounded-lg">
        <h1 class="text-4xl font-medium text-[#073545] px-10">Rentcar</h1>
    </div>

    <div class="mt-10 bg-gray-50 p-6 rounded-lg">
        @if (Session::has('status'))
            <div id="toast-success"
                class="flex items-center my-2 w-full p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        <div class="mb-5">
            <a href="{{ route('admin.rentcar.create') }}" class=" text-sm text-white bg-green-400 py-2 px-4 rounded-full">
                <i class="fa fa-plus"></i> Add Rent
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 h-16">
                    <tr>
                        <th scope="col" class="pl-6  py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Car
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Information
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $key => $model)
                        <tr class="odd:bg-slate-100 even:bg-gray-50 ">
                            <td class="px-6 py-4 ">
                                {{ ++$key }}
                            </td>
                            <td class="px-6 py-4">
                                {{ @$model['author'] }}
                            </td>
                            <td class="px-6 py-4">
                                <b> {{ @$model->car['name'] }}</b> <br>
                                {{ @$model->car['nopol'] }}
                            </td>
                            <td class="px-6 py-4">
                                <p> <b> {{ @$model['event'] }}</b></p>
                                <p class="mb-2"> {{ @$model['destination'] }}</p>
                                <p class="mb-2"> {{ @$model['start_time'] }} - {{ @$model['finish_time'] }}</p>
                                <span class="px-2 py-1 bg-blue-700 rounded-full capitalize text-white">
                                    {{ @$model['status'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex">
                                    <a class="block px-4 py-2 bg-yellow-400 rounded text-white font-medium"
                                        href="{{ route('admin.rentcar.edit', $model->id) }}">Edit</a>
                                    <form action="{{ route('admin.rentcar.destroy', $model->id) }}" method="post"
                                        id="deleteForm-{{ $model->slug }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button onclick="confirmDelete(event, '{{ $model->slug }}')"
                                            class="ml-4 block px-4 py-2 bg-red-700 rounded text-white font-medium">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @if ($models->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center"> <b>Table is empty</b> </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    {{ $models->links() }}

@stop
@section('additional-scripts')
    <script>
        function confirmDelete(event, inislug) {
            event.preventDefault();
            const formSubmit = document.getElementById(`deleteForm-${inislug}`);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will remove this Car!",
                icon: "warning",
                buttons: {
                    cancel: true,
                    confirm: true,
                },
            }).then((result) => {
                if (result == true) {
                    formSubmit.submit();
                }
            });

        }
    </script>

@endsection
