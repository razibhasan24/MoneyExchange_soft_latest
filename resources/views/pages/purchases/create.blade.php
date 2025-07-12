@extends('layouts.master')
@section('page-title', 'Create Purchase')
@section('pages')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Money Exchange - Create Purchase</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
  <style>
    body {
      background-color: #f8f9fa;
    }

    .main-header {
      background-color: #0d6efd;
      /* Bootstrap primary */
      color: #fff;
      padding: 20px;
    }

    .main-header .left,
    .main-header .right {
      width: 50%;
    }

    .main-header img {
      max-height: 50px;
    }

    .item-table th {
      background-color: #0dcaf0;
      /* Bootstrap info */
      color: #fff;
    }
  </style>
</head>

<body>
  <!-- ✅ HEADER -->
  <div class="main-header d-flex justify-content-between align-items-center">
    <div class="left">
      <img src="https://via.placeholder.com/150x50?text=Logo" alt="Company Logo" />
      <p class="mb-0">Money Exchange Ltd.</p>
    </div>
    <div class="right text-end">
      <p class="mb-0">1234 Exchange Street</p>
      <p class="mb-0">Dhaka, Bangladesh</p>
      <p class="mb-0">info@moneyexchange.com</p>
    </div>
  </div>

  <!-- ✅ MAIN FORM -->
  <div class="container my-4 bg-white p-4 shadow rounded">
    <h3 class="mb-3">Create Purchase</h3>

    <!-- Master Fields -->
    <div class="row mb-4">
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
          <option value="Pending">Pending</option>
          <option value="Completed">Completed</option>
          <option value="Cancelled">Cancelled</option>
        </select>
      </div>
    </div>

    <!-- Item Fields -->
    <h5>Add Item</h5>
    <div class="row mb-3">
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
        <button id="addItemBtn" class="btn btn-primary w-100">Add Item</button>
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
</body>

</html>


@endsection