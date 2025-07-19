<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Way Bill Shipment</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, #8b0000 0%, #dc143c 100%);
            border-radius: 50%;
        }

        .dispatched-stamp {
            transform: rotate(-15deg);
            border: 4px solid #1e40af;
            border-radius: 50%;
            padding: 20px 30px;
            font-weight: bold;
            font-size: 28px;
            color: #1e40af;
            letter-spacing: 3px;
            position: relative;
            background: transparent;
        }

        .dispatched-stamp::before {
            content: '';
            position: absolute;
            inset: -2px;
            border: 2px solid #1e40af;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-stone-100 p-8">
<div class="max-w-4xl mx-auto bg-stone-100 border border-gray-300" contenteditable>
    <!-- Header -->
    <div class="bg-stone-100 p-4 border-b border-gray-300">
        <div class="text-sm text-gray-600 mb-2">Air Way Bill Shipment</div>

        <div class="flex justify-between items-start">
            <!-- Barcode Section -->
            <div class="flex-1">
                <div class="barcode text-black mb-2">||||||||||||||||||||||||||||</div>
            </div>

            <!-- InterCity Logo -->
            <div class="flex-1 text-center">
                <div class="flex items-center justify-center">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center mr-2">
                        <span class="text-white font-bold text-sm">IC</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">InterCity</span>
                </div>
            </div>

            <!-- Date Information -->
            <div class="flex-1 text-right text-sm text-gray-600">
                <div>Date shipped:</div>
                <div class="font-semibold">11 December 2024</div>
                <div class="mt-2">Arrival Date:</div>
                <div class="font-semibold">DECEMBER, 13 2024</div>
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
                <div class="text-lg font-bold">ICL-913280</div>
            </div>

            <!-- Sender Information -->
            <div class="border border-gray-400 p-3">
                <div class="text-xs font-semibold text-gray-700 mb-2">SENDER INFORMATION</div>
                <div class="text-sm space-y-1">
                    <div><span class="font-semibold">NAME:</span> Laman Butler Montana</div>
                    <div><span class="font-semibold">ADDRESS:</span> 196 Lethrop Ave Battle Creek, MI 49014, Estados
                        Unidos
                    </div>
                    <div><span class="font-semibold">Phone:</span> +1904309304 — <span
                            class="font-semibold">Email:</span> Lamanbutteriern4@gmail.com
                    </div>
                </div>
            </div>

            <!-- Receiver Information -->
            <div class="border border-gray-400 p-3">
                <div class="text-xs font-semibold text-gray-700 mb-2">RECEIVER'S INFORMATION</div>
                <div class="text-sm space-y-1">
                    <div><span class="font-semibold">NAME:</span> LUCIANA BEZERRA DA SILVA</div>
                    <div><span class="font-semibold">ADDRESS:</span> RUA CAPITÃO REBELINHO 461 BOA VIAGEM RECIFE
                        PERNAMBUCO BRASIL
                    </div>
                    <div><span class="font-semibold">Phone:</span> (81)99197-6770</div>
                    <div><span class="font-semibold">Email:</span> Lucianabds1973@gmail.com</div>
                    <div><span class="font-semibold">Country:</span> BRAZIL</div>
                </div>
            </div>

            <!-- Terms of service -->
            <div class="text-xs text-gray-600 space-y-1">
                <div class="font-semibold">Terms of service</div>
                <div>1. Receivers of this consignment shall be required to provide valid proof of identification</div>
                <div>2. This company is not bound by law to provide a door to door service</div>
                <div>3. Consignee must make adequate arrangements for the receipt of this consignment</div>
                <div>4. Please keep this as this will be useful during the claiming process</div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="w-1/2 p-4">
            <!-- Shipment Information -->
            <div class="border border-gray-400 p-3 mb-4">
                <div class="text-xs font-semibold text-gray-700 mb-2">SHIPMENT INFORMATION</div>
                <div class="text-sm space-y-1">
                    <div>World Mail Three Days Dispatch</div>
                    <div>Express Diplomatic Goods World State Value Family Treasure</div>
                    <div>Domestic Express Express Service Date: 11 December 2024</div>
                    <div>Origin: TEL AVIV</div>
                    <div>Destination: BRAZIL</div>
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
                        <td class="border border-gray-400 p-2">PACKAGE</td>
                        <td class="border border-gray-400 p-2">15KG</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2 font-semibold">Total</td>
                        <td class="border border-gray-400 p-2 font-semibold">3000 USD</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Dispatched Stamp -->
            <div class="flex justify-center items-center relative mt-8">
                <div class="dispatched-stamp">
                    DISPATCHED
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-gray-300 p-4">
        <div class="text-sm font-semibold text-gray-700 mb-3">Sender's Signature</div>
        <div class="flex items-center">
            <div class="red-circle mr-4"></div>
            <div class="text-2xl font-bold text-gray-800" style="font-family: cursive;">Lyman</div>
        </div>
    </div>
</div>
</body>
</html>
