<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('search')
                @livewire('client-crud')
                
                
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('payment-crud')
            </div>
        </div>
    </div>
    
</x-app-layout>
