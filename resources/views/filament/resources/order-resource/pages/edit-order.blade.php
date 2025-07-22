<x-filament-panels::page>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Arial:wght@400;600;700&display=swap');

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f4f0;
        }

        .barcode {
            font-family: 'Courier New', monospace;
            font-size: 20px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .red-circle {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #8b0000 10%, #dc143c 90%);
            border-radius: 50%;
            box-shadow: 0 0 0 4px #8b0000, inset 0 0 5px rgba(0, 0, 0, 0.3);
            position: relative;
            filter: contrast(1.1) brightness(0.95);
            background-blend-mode: multiply;
        }

        .red-circle::before {
            content: '';
            position: absolute;
            top: -6px;
            left: -6px;
            right: -6px;
            bottom: -6px;
            border-radius: 50%;
            background: repeating-radial-gradient(
                circle,
                transparent 0px,
                transparent 2px,
                #8b0000 2px,
                #8b0000 4px
            );
            z-index: -1;
        }

        .red-circle::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: repeating-linear-gradient(
                45deg,
                rgba(0, 0, 0, 0.05) 0,
                rgba(0, 0, 0, 0.05) 2px,
                transparent 2px,
                transparent 4px
            );
            mix-blend-mode: multiply;
            pointer-events: none;
        }


    </style>


    <div class="flex flex-col lg:flex-row gap-2">


        <div id="receipt-container" class=" w-full bg-yellow-50 border border-gray-300">
            <!-- Header -->
            <div class="bg-yellow-50 p-4 border-b border-gray-300">
                <div class="text-sm text-gray-600 mb-2">Intercity Way Bill Shipment</div>

                <div class="flex justify-between items-center">
                    <!-- Barcode Section -->
                    <div wire:ignore>
                        <svg id="barcode"></svg>
                    </div>

                    <!-- InterCity Logo -->
                    <div class="text-center">
                        <div class="flex items-center justify-center">
                            <img src="{{asset('logo.svg')}}" alt="InterCityLogistics Logo"
                                 class="rounded-full h-12">
                        </div>
                    </div>

                    <!-- Date Information -->
                    <div class="text-right text-sm text-gray-600">
                        <div>Date shipped:</div>
                        <div class="font-semibold cursor-pointer"
                             onclick="document.getElementById('date_shipped_picker').showPicker()">
                            {{$date_shipped->format('F, d Y')}}
                            <input type="date"
                                   id="date_shipped_picker"
                                   wire:model.live="date_shipped"
                                   class="absolute opacity-0 pointer-events-none"/>
                        </div>
                        <div>Arrival Date:</div>
                        <div class="font-semibold cursor-pointer"
                             onclick="document.getElementById('arrival_date_picker').showPicker()">
                            {{$arrival_date->format('F, d Y')}}
                            <input type="date"
                                   id="arrival_date_picker"
                                   wire:model.live="arrival_date"
                                   class="absolute opacity-0 pointer-events-none"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex">
                <!-- Left Column -->
                <div class="w-1/2 p-4 space-y-4">
                    <!-- Tracking Number -->
                    <div class="border border-gray-400 p-3">
                        <div class="text-xs text-gray-600 mb-1">Tracking Number:</div>
                        <input class="text-lg font-bold appearance-none outline-none w-full"
                               wire:model.blur="tracking_id"></input>
                    </div>

                    <!-- Sender Information -->
                    <div class="border border-gray-400 p-3">
                        <div class="text-xs font-semibold text-gray-700 mb-2">SENDER INFORMATION</div>
                        <div class="text-sm space-y-1">
                            <div><span class="font-semibold w-full">NAME:</span>
                                <input wire:model.blur="sender_name" type="text"
                                       class="appearance-none outline-none"
                                       placeholder="name"/>
                            </div>
                            <div><span class="font-semibold">ADDRESS:</span> <input wire:model.blur="sender_address"
                                                                                    class="appearance-none outline-none"
                                                                                    placeholder="sender address"/>
                            </div>
                            <div><span class="font-semibold">Phone:</span>

                                <input wire:model.blur="sender_phone" type="tel"
                                       class="appearance-none outline-none" placeholder="phone"/>

                                <span
                                    class="font-semibold">Email:</span>
                                <input wire:model.blur="sender_email" type="email"
                                       class="appearance-none outline-none" placeholder="sender email"/>
                            </div>
                        </div>
                    </div>

                    <!-- Receiver Information -->
                    <div class="border border-gray-400 p-3">
                        <div class="text-xs font-semibold text-gray-700 mb-2">RECEIVER'S INFORMATION</div>
                        <div class="text-sm space-y-1">
                            <div><span class="font-semibold">NAME:</span>
                                <input wire:model.blur="receiver_name" type="text" class="appearance-none outline-none"
                                       placeholder="receiver name"/>
                            </div>
                            <div><span class="font-semibold">ADDRESS:</span> <input wire:model.blur="receiver_address"
                                                                                    class="appearance-none outline-none"
                                                                                    placeholder="receiver address"/>
                            </div>
                            <div><span class="font-semibold">Phone:</span>
                                <input wire:model.blur="receiver_phone" type="tel" class="appearance-none outline-none"
                                       placeholder="receiver phone"/>
                            </div>
                            <div><span class="font-semibold">Email:</span>
                                <input wire:model.blur="receiver_email" type="email"
                                       class="appearance-none outline-none"
                                       placeholder="receiver email"/>
                            </div>
                            <div><span class="font-semibold">Country:</span>

                                <input wire:model.blur="country" type="text" class="appearance-none outline-none"
                                       placeholder="country"/>

                            </div>
                        </div>
                    </div>

                    <!-- Terms of service -->
                    <div class="text-xs text-gray-600 space-y-1">
                        <div class="font-semibold">Terms of service</div>
                        <div>1. Receivers of this consignment shall be required to provide valid proof of identification
                        </div>
                        <div>2. This company is not bound by law to provide a door to door service</div>
                        <div>3. Consignee must make adequate arrangements for the receipt of this consignment</div>
                        <div>4. Please keep this as this will be useful during the claiming process</div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="w-1/2 p-4 relative">
                    <!-- Shipment Information -->
                    <div class="border border-gray-400 p-3 mb-4">
                        <div class="text-xs font-semibold text-gray-700 mb-2">SHIPMENT INFORMATION</div>
                        <div class="text-sm space-y-1">
                            <div>World Mail Three Days Dispatch</div>
                            <div>Express Diplomatic Goods World State Value Family Treasure</div>
                            <div>Origin:
                                <input wire:model.blur="origin" type="text" class="appearance-none outline-none"
                                       placeholder="origin"/>
                            </div>
                            <div>Destination:
                                <input wire:model.blur="destination" type="text" class="appearance-none outline-none"
                                       placeholder="desitination"/>
                            </div>
                        </div>
                    </div>

                    <!-- Shipment Description -->
                    <div class="mb-4">
                        <div class="text-sm font-semibold text-gray-700 mb-2">Shipment Description</div>

                        <table class="w-full border border-gray-400 text-sm">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 p-2 text-left">QTY</th>
                                <th class="border border-gray-400 p-2 text-left">Description</th>
                                <th class="border border-gray-400 p-2 text-left">Weight</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border border-gray-400 p-2">1</td>
                                <td class="border border-gray-400 p-2">
                                    <input wire:model.blur="item_name" type="text" class="appearance-none outline-none"
                                           placeholder="item_name"/>
                                </td>
                                <td class="border border-gray-400 p-2">
                                    <input wire:model.blur="item_weight" type="text"
                                           class="appearance-none outline-none"
                                           placeholder="item_weight"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-400 p-2"></td>
                                <td class="border border-gray-400 p-2 font-semibold">Total</td>
                                <td class="border border-gray-400 p-2 font-semibold">
                                    <input wire:model.blur="item_total_cost" type="text"
                                           class="appearance-none outline-none"
                                           placeholder="total price"/>
                                    USD
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <img src="{{asset('dispatched.png')}}" class="absolute w-80 -bottom-5 -left-40"
                         alt="Dispatched Stamp"/>


                </div>
            </div>

            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
            <style>
                .signature {
                    font-family: 'Dancing Script', cursive;
                    font-size: 28px;
                }
            </style>

            <!-- Bottom Section -->
            <div class="border-t border-gray-300 p-4">
                <div class="text-sm font-semibold text-gray-700 mb-3">Sender's Signature</div>
                <div class="flex items-center">
                    <div class="red-circle mr-4"></div>
                    <div class="text-lg font-bold text-gray-800 signature"
                         wire:text="sender_name"></div>
                </div>
            </div>
        </div>

    </div>


</x-filament-panels::page>

@script
<script>
    JsBarcode("#barcode", "{{uniqid()}}", {
        displayValue: false,
        height: 40,
        width: 1,
        background: "#ffffff00"
    });

    const downloadBtn = document.getElementById('download-btn');
    const receiptContainer = document.getElementById('receipt-container');

    if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
            html2canvas(receiptContainer, {
                useCORS: true,
                scale: 4,
                onclone: (clonedDocument) => {
                    // Copy the current values from your text inputs.
                    const originalInputs = receiptContainer.querySelectorAll('input');
                    const clonedInputs = clonedDocument.querySelectorAll('input');
                    originalInputs.forEach((input, index) => {
                        clonedInputs[index].value = input.value;
                    });

                    // Ensure the dynamically updated signature is captured.
                    const originalSignature = receiptContainer.querySelector('.signature');
                    const clonedSignature = clonedDocument.querySelector('.signature');
                    if (originalSignature && clonedSignature) {
                        clonedSignature.textContent = originalSignature.textContent;
                    }
                }
            }).then(canvas => {

                const link = document.createElement('a');

                link.href = canvas.toDataURL('image/png');

                link.download = 'receipt.png';

                link.click();
            });
        });
    }


</script>

@endscript





