<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen" style="background-color: #0D263C;">
    <form id="paymentForm" class="max-w-lg mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h2>Product: Laptop</h2>
        @csrf
        <div class="form-group mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="amount">Amount</label>
            <input type="number" name="amount" id="amount"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                placeholder="Enter amount">
        </div>

        <div
            class="form-submit w-full py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300">
            <button type="submit" onclick="payWithPaystack()">Pay with Paystack</button>
        </div>
    </form>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: "{{ env('PAYSTACK_PUBLIC_KEY') }}",
                email: "willegende162@gmail.com",
                amount: document.getElementById("amount").value * 100,
                metadata: {
                    custom_fields: [{
                            display_name: "Laptop",
                            variable_name: "laptop",
                            value: "Laptop"
                        },
                        {
                            display_name: "Quantity",
                            variable_name: "quantity",
                            value: "1"
                        }
                    ]
                },
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    //let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                    //alert(JSON.stringify(response));
                    // window.location.href = "{{ route('callback') }}" + response.redirecturl;
                }
            });
            handler.openIframe();
        }
    </script>
</body>

</html>
