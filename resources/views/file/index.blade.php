<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Files') }}
            </h2>
            <a href="{{ route('files.create') }}" class="btn btn-primary btn-sm  gap-2 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="GET">
                        <div class="form-control">
                            <label class="input-group">
                                <input type="text" name="number" placeholder="File #" class="input input-bordered" value="{{ request()->query('number') }}" />
                                <button class="btn btn-square">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                  </button>
                            </label>
                        </div>
                    </form>
                    <br>
                    <table class="table table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left">File No.</th>
                                <th class="text-left">Rack No.</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file )
                            <tr>
                                <td>{{ $file->number }}</td>
                                <td>{{ $file->rack->number }}</td>
                                <td>
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('files.edit', $file) }}" class="btn btn-sm rounded">Edit</a>
                                        <form action="{{ route('files.destroy', $file) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm rounded">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
