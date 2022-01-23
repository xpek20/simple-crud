<x-app-layout>
   

    <div class="grid gap-x-8 gap-y-4 py-12 p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('search')
                @livewire('client-crud')
                
                
            </div>
            <div class="p-2 bg-white overflow-hidden shadow-xl sm:rounded-lg" style="margin-top: 0.6rem">
                @livewire('payment-crud')
            </div>
        </div>
    </div>
    
</x-app-layout>
