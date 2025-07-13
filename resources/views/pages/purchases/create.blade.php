@extends('layouts.master')
@section('page-title', 'Create Purchase')
@section('pages')
    <div class="container">
        <style>
            body {
                background-color: #454b55;
                /* color: black !important; */
            }

            .main-header {
                background-color: #fff;
                /* Bootstrap primary */
                color: black;
                padding: 20px;
                margin-top: 25px;
            }

            .main-header img {
                max-height: 130px;
            }

            .company_name {
                text-align: right;
                font-size: 25px;
                color: black;
                font-weight: bolder;
            }

            .item-table th {
                background-color: #05054a;
                /* Bootstrap info */
                color: #fff;
                border-radius: 10px;
                text-align: center;
                /* margin-bottom: 50px; */
            }

            #addItemBtn,
            #submitBtn {
                border-radius: 15px;
                transition: background-color 0.3s ease;
            }

            #addItemBtn:hover,
            #submitBtn:hover {
                background-color: red !important;
            }
        </style>



        <!-- ✅ HEADER -->
        <div class="main-header d-flex justify-content-between align-items-center">
            <div class="left">
                <!-- <img src="https://via.placeholder.com/150x50?text=Logo" alt="Company Logo" />  -->
                <img src="{{ asset('assets/img/logos/mex_logo.png') }}" alt="logo">

            </div>
            <div class="company_name">
                <p class="mb-0">Global Money Exchange Ltd.</p>
                <div style="text-align: right; font-size: 15px; color: black;">
                    <p class="mb-0">1234 Exchange Street</p>
                    <p class="mb-0">Dhaka, Bangladesh</p>
                    <p class="mb-0">info@moneyexchange.com</p>
                </div>
            </div>
        </div>

        <!-- ✅ MAIN FORM -->
        <div class="container my-4 bg-white p-4 shadow rounded" style="margin-top:0 !important;">
            {{-- <h3 class="mb-3 text-center text-3x2 font-bold" style="margin-bottom:20px !important;">Create Purchase</h3> --}}
            <h3 class="mb-3 text-center text-3x2 font-bold"
                style="margin-bottom: 60px !important; background-color: rgb(72, 158, 72); color: white; padding: 15px 245px; border-radius:0 40px 40px 0; display: inline-block;">
                Create Purchase
            </h3>
            <!-- Master Fields -->
            <div class="row mb-3">
                <!-- id is auto, hidden -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Supplier Name</label>
                    <input type="text" id="supplier_name" class="form-control" />
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" id="purchase_date" class="form-control" />
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Total Amount</label>
                    <input type="number" id="total_amount" class="form-control" />
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select id="status" class="form-select">
                      <option value="">Select Status</option>
            @foreach ($statuses as $status)
            <option value="{{$status->name}}">{{$status->name}}</option>
            @endforeach
                    </select>
                </div>
            </div>

            <!-- Item Fields -->
            <h3 class="mb-3 text-center text-3x2 font-bold"
                style="margin-bottom: 60px !important; background-color: rgb(72, 158, 72); color: white; padding: 15px 280px; border-radius:0 40px 40px 0; display: inline-block;;">
                Add Items
            </h3>
            <div class="row mb-3" style="margin-bottom: 2rem !important;">
                <div class="col-md-3">
                    <label class="form-label">Item Description</label>
                    <input type="text" id="item_description" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label class="form-label">Quantity</label>
                    <input type="number" id="quantity" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label class="form-label">Unit Price</label>
                    <input type="number" id="unit_price" class="form-control" />
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button id="addItemBtn" class="btn btn-success w-100">
                        Add Item
                    </button>
                </div>
            </div>

            <!-- Item Table -->
            <table class="table table-bordered item-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <!-- Submit -->
            <button id="submitBtn" class="btn btn-success">Submit Purchase</button>

            <!-- JSON Output -->
            <!-- <pre id="output" class="mt-4 bg-dark text-white p-3 rounded"></pre> -->
        </div>

        <!-- ✅ JS -->
        <script>
            let items = [];
            let itemIdCounter = 1;

            document.getElementById('addItemBtn').addEventListener('click', function() {
                const itemDesc = document.getElementById('item_description').value;
                const qty = parseFloat(document.getElementById('quantity').value);
                const unitPrice = parseFloat(document.getElementById('unit_price').value);
                const totalPrice = qty * unitPrice;

                const item = {
                    // id: itemIdCounter++,
                    // purchase_id: 1,
                    item_description: itemDesc,
                    quantity: qty,
                    unit_price: unitPrice,
                    total_price: totalPrice
                };

                items.push(item);

                const row = `<tr>
                            <td>${itemDesc}</td>
                            <td>${qty}</td>
                            <td>${unitPrice}</td>
                            <td>${totalPrice}</td>
                        </tr>`;

                document.querySelector('.item-table tbody').insertAdjacentHTML('beforeend', row);

                // Clear item fields
                document.getElementById('item_description').value = '';
                document.getElementById('quantity').value = '';
                document.getElementById('unit_price').value = '';
            });

            document.getElementById('submitBtn').addEventListener('click', async function() {
                const data = {
                    // id: 1,
                    supplier_name: document.getElementById('supplier_name').value,
                    purchase_date: document.getElementById('purchase_date').value,
                    total_amount: parseFloat(document.getElementById('total_amount').value),
                    status: document.getElementById('status').value,
                    items: items
                };

                // document.getElementById('output').textContent = JSON.stringify(data, null, 2);

                //saving to the database
                try {
                    const response = await fetch('http://127.0.0.1:8000/api/purchases', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });

                    if (!response.ok) {
                        throw new Error(`Server error: ${response.status}`);
                    }

                    const result = await response.json();
                    console.log('Purchase created:', result);
                    alert('Purchase created successfully!');

                    //redirect to the index page
                    window.location.assign("{{ route('purchases.index') }}");

                } catch (error) {
                    console.error('Failed to create Purchase:', error);
                    alert('Error creating Purchase.');
                }

                console.log(data);
            });
        </script>

    </div>


@endsection
