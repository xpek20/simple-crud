<div class="py-12">
    <h2 class="text-center">Company Clients</h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700" style="margin-bottom: 10px">
                Create Client
            </button>
            @if($isModalOpen)
            @include('livewire.client.create-client')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td class="border px-4 py-2">{{ $client->id }}</td>
                        <td class="border px-4 py-2">{{ $client->first_name }}</td>
                        <td class="border px-4 py-2">{{ $client->last_name }}</td>
                        <td class="border px-4 py-2">{{ $client->email}}</td>
                        <td class="border px-4 py-2">{{ $client->mobile}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $client->id }})"
                                class="flex px-4 py-2 bg-gray-500 text-blue-900 cursor-pointer" style="margin-bottom:10px">Edit</button>
                            <button wire:click="delete({{ $client->id }})"
                                class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>