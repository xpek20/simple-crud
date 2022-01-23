
<div class="grid p-2 bd-highlight justify-end rounded">
    <input type="text" wire:model="searchTerm" placeholder="Search" class="rounded">
    <ul class="bg-indigo-500">
        @foreach ($clients as $client)
        <li>
            <p class="text-blue-600">
                @if ($searchTerm!=null)
                <a class="underline decoration-pink-500" href="{{ route('show.client', ['id' => $client->id]) }}">{{$client->first_name}} {{$client->last_name}}</a>
                @endif
            </p>
        </li>
        @endforeach
    </ul>
</div>
