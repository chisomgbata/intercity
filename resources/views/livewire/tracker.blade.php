<section id="track" class="py-20 bg-white pattern" x-data>
    <div class="container mx-auto px-6 text-center "
         x-intersect.once="$el.classList.add('animate__animated', 'animate__fadeInUp')">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Track Your Shipment</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-8">Enter your tracking ID below to get real-time updates on
            your package's location.</p>
        <form wire:submit.prevent="$js.trackShipment"
              class="max-w-2xl mx-auto flex flex-col sm:flex-row gap-4 bg-white p-4 rounded-lg lg:rounded-full shadow-2xl">
            <div class="relative flex-grow">
                <i class="fas fa-truck-fast absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Enter Tracking ID (e.g., SL123456789)"
                       required
                       name="trackingId"
                       wire:model="trackingId"
                       class="w-full pl-12 pr-4 py-3 rounded-full  focus:ring-blue-200 focus:ring-opacity-50 transition duration-300">
            </div>
            <button
                type="submit"
                class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-search"></i>
                Track Order
            </button>
        </form>
    </div>
    <div x-data>
        <div x-cloak wire:show="modalOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="$wire.modalOpen"
             x-on:keydown.esc.window="$wire.modalOpen = false" x-on:click.self="$wire.modalOpen = false"
             class="fixed inset-0 z-30 flex justify-center bg-black/20 p-4 pb-8 backdrop-blur-md items-center lg:p-8"
             role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
            <!-- Modal Dialog -->
            <div wire:show="modalOpen"
                 x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                 x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                 class="flex max-w-xl w-xl flex-col gap-4 overflow-hidden rounded-lg  bg-white ">
                <!-- Dialog Body -->
                <div class="px-4 py-8 w-full">

                    <div wire:loading class="grid place-items-center w-full ">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
                    </div>

                    <div wire:loading.remove>
                        @if($order)
                            <div class="bg-white rounded-lg  p-6 max-w-2xl mx-auto">
                                <!-- Header -->
                                <div class="border-b pb-4 mb-6">
                                    <h2 class="text-xl font-bold text-gray-800">Tracking
                                        ID: {{ $order->tracking_id }}</h2>
                                    <p class="text-gray-600 mt-1">{{ $order->item_name }}</p>
                                </div>

                                <!-- Recipient Info -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Delivery Information</h3>
                                    <div class="bg-gray-50 rounded-md p-4">
                                        <p class="font-medium text-gray-700">{{ $order->receiver_name }}</p>
                                        <p class="text-gray-600 text-sm mt-1">{{ $order->receiver_address }}</p>
                                    </div>
                                </div>

                                {{--                                <!-- Delivery Steps -->--}}
                                {{--                                <div class="mb-6">--}}
                                {{--                                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Delivery Progress</h3>--}}
                                {{--                                    <div class="space-y-6">--}}
                                {{--                                        @foreach($order->delivery_steps as $index => $step)--}}
                                {{--                                            @php--}}
                                {{--                                                $stepNumber = $index + 1;--}}
                                {{--                                                $isCompleted = $stepNumber <= $order->current_step;--}}
                                {{--                                                $isCurrent = $stepNumber == $order->current_step;--}}
                                {{--                                            @endphp--}}

                                {{--                                            <div class="flex items-center">--}}
                                {{--                                                <!-- Step Icon -->--}}
                                {{--                                                <div--}}
                                {{--                                                    class="flex-shrink-0 w-8 h-8 rounded-full border-2 flex items-center justify-center mr-4 {{ $isCompleted ? 'bg-green-500 border-green-500' : 'bg-gray-200 border-gray-300' }}">--}}
                                {{--                                                    @if($isCompleted && !$isCurrent)--}}
                                {{--                                                        <i class="fas fa-check text-white text-sm"></i>--}}
                                {{--                                                    @elseif($isCurrent)--}}
                                {{--                                                        <span--}}
                                {{--                                                            class="text-white text-sm font-bold">{{ $stepNumber }}</span>--}}
                                {{--                                                    @else--}}
                                {{--                                                        <span--}}
                                {{--                                                            class="text-gray-500 text-sm font-bold">{{ $stepNumber }}</span>--}}
                                {{--                                                    @endif--}}
                                {{--                                                </div>--}}

                                {{--                                                <!-- Step Content -->--}}
                                {{--                                                <div class="flex-1 flex gap-2 items-center">--}}
                                {{--                                                    <p class="font-medium {{ $isCompleted ? 'text-green-700' : 'text-gray-700' }}">--}}
                                {{--                                                        {{ $step['step_name'] ?? $step }}--}}
                                {{--                                                    </p>--}}
                                {{--                                                    @if($isCurrent)--}}
                                {{--                                                        <span--}}
                                {{--                                                            class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mt-1">Current</span>--}}
                                {{--                                                    @endif--}}
                                {{--                                                </div>--}}

                                {{--                                                <!-- Connecting Line -->--}}
                                {{--                                                @if(!$loop->last)--}}
                                {{--                                                    <div--}}
                                {{--                                                        class="absolute left-4 mt-8 w-0.5 h-4 {{ $stepNumber < $order->current_step ? 'bg-green-500' : 'bg-gray-300' }}"></div>--}}
                                {{--                                                @endif--}}
                                {{--                                            </div>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <!-- Status Footer -->--}}
                                {{--                                <div class="border-t pt-4">--}}
                                {{--                                    <div class="flex items-center text-blue-600">--}}
                                {{--                                        <i class="fas fa-circle-exclamation mr-2"></i>--}}
                                {{--                                        <span class="font-medium">--}}
                                {{--                                                    @if($order->info)--}}
                                {{--                                                {{ $order->info }}--}}
                                {{--                                            @else--}}
                                {{--                                                Your package is on its way!--}}
                                {{--                                            @endif--}}
                                {{--                                        </span>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        @else

                            <div class="flex flex-col items-center justify-center h-full">
                                <svg class="w-20 h-20 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 21 21"
                                     fill="currentColor">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                       stroke-linejoin="round" transform="translate(0 1)">
                                        <path
                                            d="m3.5 6.5 7-4 5.9922779 3.42415879c.62315.35608571 1.0077221 1.01877259 1.0077221 1.73648628v4.67870983c0 .7177137-.3845721 1.3804006-1.0077221 1.7364863l-5 2.8571429c-.6148654.3513516-1.3696904.3513516-1.98455578 0l-5-2.8571429c-.62314999-.3560857-1.00772212-1.0187726-1.00772212-1.7364863 0-1.2454967 0-2.1796192 0-2.8023676"></path>
                                        <path
                                            d="m9.55180035 9.98943096c.59195265.31874374 1.30444665.31874374 1.89639925 0l5.5518004-2.98943096"></path>
                                        <path d="m10.5 10.5v6.5"></path>
                                        <path d="m3.5 6.5 7 4-3 1-7-4z"></path>
                                        <path d="m10.5 2.5 7 4 2-2-7-4z"></path>
                                    </g>
                                </svg>
                            </div>

                            <div class="text-center text-red-500">
                                <p>No order found for this tracking ID.</p>
                            </div>
                        @endif
                    </div>


                </div>

            </div>
        </div>
    </div>


</section>

@script
<script>
    $js('closeModal', () => {
        $wire.modalOpen = false;
    })

    $js('trackShipment', () => {
        console.log('Tracking ID:', $wire.trackingId);
        if ($wire.trackingId) {
            $wire.modalOpen = true;
            $wire.trackOrder();
        } else {
            alert('Please enter a valid tracking ID.');
        }
    });
</script>
@endscript
