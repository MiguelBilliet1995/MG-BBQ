<div class="h-full">

    <form action="#" class="p-5 flex flex-col h-full">

        {{-- <p>Lorem ipsum</p> --}}


        <div class="content">

            @switch($page)
                @case(0)
                    
                    <h3 class="font-bold mb-5 text-xl">Algemene gegevens</h3>

                    <div class="block grid grid-cols-1">
            
                        <div class="mb-6">
                            <label for="naam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Naam</label>
                            <input wire:model="naam" type="naam" id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
            
                        <div class="mb-6">
                            <label for="voornaam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Voornaam</label>
                            <input wire:model="voorNaam" type="voornaam" id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
            
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                            <input wire:model="email" type="email" id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
            
                        <div class="mb-6">
                            <label for="telefoon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Telefoon</label>
                            <input wire:model="telefoon" type="telefoon" id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <label for="toggle-example" class="flex relative items-center mb-4 cursor-pointer">
                            <input type="checkbox" id="toggle-example" class="sr-only" wire:model="bbq">
                            <div class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Ik wens deel te nemen aan de BBQ</span>
                        </label>

                        {{-- <div class="flex items-center mb-4">
                            <input wire:model="bbq" id="bbq" aria-describedby="bbq" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <label for="bbq" class="ml-3 text-sm font-medium text-gray-900">Ik wens deel te nemen aan de BBQ</label>
                        </div> --}}
            
                    </div>

                    @break
                @case(1)

                    <h3 class="font-bold mb-5 text-xl">BBQ</h3>

                    <p>Sauzen zijn inbegrepen. (Ketchup, Mayonaise, Lookboter, Brazil (?), Andalouse)</p>

                    <div class="block">
            
                        @foreach ($productOrder as $product)

                            @if ($product['productData']['show'])
                                <h2 class="mt-2">
                                    <div class="flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-gray-200">
                                        <div class="grow-0">
                                            <span class="text-xl font-bold tracking-tight text-gray-900 block">{{ $product['productData']['name'] }}</span>
                                            <span class="text-l font-bold tracking-tight text-blue-700 block">€ {{ $product['productData']['price'] }}</span>
                                        </div>

                                        <div class="grow">
                                            <!-- input -->

                                            @if ($product['productData']['multiple'])
                                                <div class="flex p-4 justify-end input-button">
                                                    <span class="border border-gray-300 text-gray-900 text-sm p-2.5 cursor-pointer" wire:click="inputButtonHandler({{$product['productData']['id']}}, '-1')">-</span>
                                                    <input type="number" min="0" wire:model="productOrder.{{ $product['productData']['id'] }}.total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm p-2.5 w-14 inline-block align-middle pointer-events-none" required>
                                                    <span class="border border-gray-300 text-gray-900 text-sm p-2.5 cursor-pointer" wire:click="inputButtonHandler({{$product['productData']['id']}}, '+1')">+</span>
                                                </div>
                                            @else
                                                {{-- <input type="checkbox" wire:model="productOrder.{{ $product['productData']['id'] }}.total"> --}}
                                                <div class="p-4 flex justify-end">
                                                    <label for="toggle-example" class="flex relative cursor-pointer">
                                                        <input wire:model="productOrder.{{ $product['productData']['id'] }}.total" type="checkbox" id="toggle-example" class="sr-only">
                                                        <div class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg"></div>
                                                    </label>
                                                </div>
                                                

                                            @endif

                                        </div>
                                        <svg class="w-6 h-6 grow-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </h2>
                            @endif
            
                        @endforeach
            
                    </div>
                    
                    @break

                @case(2)

                    <h3 class="font-bold mb-5 text-xl">Overzicht</h3>

                    


                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Naam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        aantal
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right">
                                        Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productOrder as $product)

                                    @if($product['total'] !== 0)

                                        <tr class="bg-white border-b">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $product['productData']['name'] }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $product['total'] }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                € {{ $product['productData']['price'] * $product['total']}}
                                            </td>
                                        </tr>

                                    @endif
                                @endforeach

                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    </th>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4 text-right text-neutral-900">
                                        <b>Totaal: € {{ $total }}</b>
                                    </td>
                                </tr>
                                
                               
                            </tbody>
                        </table>
                    </div>

                    @break

                @case(3)

                    <h3 class="font-bold mb-5 text-xl">Bestelling ontvangen!</h3>

                    <p>Uw bestelling is succesvol geregistreerd!<br/>Om uw bestelling te bevestigen: stort <b>€{{ $total }}</b> naar <span class="copy bg-blue-100 cursor-pointer" onclick="navigator.clipboard.writeText('{{ $iban }}')">{{ $iban }}</span> met mededeling: <span class="copy bg-blue-100 cursor-pointer" onclick="navigator.clipboard.writeText('{{ $paymentNotice }}')">{{ $paymentNotice }}</span></p>


                    

                    @break
                
                @default
                    
            @endswitch


        </div>

        <!-- Knoppenbalk -->

        <div class="bottom-bar row justify-between">
            @switch($page)
                @case(0)
                    <div></div>
                    <span class="button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" wire:click="nextPage">Volgende</span>
                    @break
                @case(1)
                    <span class="button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" wire:click="previousPage">Terug</span>
                    <span class="button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" wire:click="nextPage">Volgende</span>
                    @break
                @case(2)
                    <span class="button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" wire:click="previousPage">Terug</span>
                    <span class="button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none" wire:click="nextPage">Bevestig bestelling</span>
                    @break
                @default
                    
            @endswitch
        </div>

    </form>
</div>
