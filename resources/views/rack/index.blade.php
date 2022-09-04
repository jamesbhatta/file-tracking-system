<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Racks') }}
            </h2>
            {{-- <a href="#" class="btn btn-primary btn-sm gap-2 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add
            </a> --}}
            <label for="my-drawer-4" class="drawer-button btn btn-sm btn-primary gap-2 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add
            </label>
        </div>
    </x-slot>

    <div class="drawer drawer-end border border-red-500">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
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
        </div>
        <div class="drawer-side">
            <label for="my-drawer-4" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content">
                <!-- Sidebar content here -->
                <form action="{{ $updateMode ? route('files.update', $file) : route('files.store') }}" method="POST">
                    @csrf
                    @if ($updateMode)
                    @method('put')
                    <input type="hidden" name="id" value="{{ $file->id }}">
                    @endif
                    <h4 class="text-lg font-semibold">
                        Add New file
                    </h4>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 form-control w-full">
                            <label class="label">
                                <span class="label-text">File Number</span>
                            </label>
                            <input type="text" name="number" placeholder="Type here" class="input input-bordered w-full" value="{{ old('number', $file->number) }}" />
                        </div>

                        <div class="col-span-12 form-control w-full">
                            <label class="label">
                                <span class="label-text">Select Rack</span>
                            </label>
                            <select name="rack_id" class="select select-bordered">
                                <option disabled selected>Choose Rack</option>
                                @foreach ($racks as $rack)
                                <option value="{{ $rack->id }}" @if(old('rack_id', $file->rack_id) == $rack->id) selected @endif>{{ $rack->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-12">
                            <button type="submit" class="btn btn-primary px-10 w-full">Save</button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
    </div>

</x-app-layout>
