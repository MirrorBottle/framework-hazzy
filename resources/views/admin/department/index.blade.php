@extends('layouts.admin.index')
@section('title', 'Daftar Departemen')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Search" required="">
                    </div>
                </form>
            </div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{ route('departments.create') }}"
                    class="flex items-center justify-center text-white bg-secondary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary focus:outline-none dark:focus:ring-primary">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah Departemen
                </a>
                <div class="flex items-center space-x-3 w-full md:w-auto">
                    <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="btn-secondary"
                        type="button">
                        <i class="fa-solid fa-chevron-down mr-2"></i>
                        Aksi
                    </button>
                    <div id="actionsDropdown"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Upload Data (.xlsx)
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Download
                                Data (.xslx)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Kode</th>
                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Tim K3L</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $department->name }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $department->code }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $department->teams->pluck('name')->join(", ") }}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $department->id }}-button" data-dropdown-toggle="{{ $department->id }}"
                                    data-dropdown-placement="top"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $department->id }}"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="{{ $department->id }}-button">
                                        <li>
                                            <a href="{{ route('departments.edit', $department->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                onclick="return confirm('Are you sure want to delete?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                <div class="text-center mt-4">
                                    <i class="fa-solid fa-inbox fa-3x"></i>
                                    <h1 class="mb-4 text-xl leading-none tracking-tight text-gray mt-4">Tidak ada data</h1>
                                </div>
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav class="space-y-3 md:space-y-0 p-4">
            {{-- {{ $departments->links() }} --}}
        </nav>
    </div>
@endsection
