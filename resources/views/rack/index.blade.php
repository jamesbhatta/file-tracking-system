<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Racks') }}
            </h2>
            <a href="#" class="btn btn-primary btn-sm gap-2 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add
            </a>
        </div>
    </x-slot>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Rack No.</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($racks as $rack)
                            <tr>
                                <td>{{ $rack->number }}</td>
                                <td>
                                    <div class="flex justify-end gap-3">
                                        <a href="#" class="btn btn-sm rounded">Edit</a>
                                        <a href="#" class="btn btn-sm rounded">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
