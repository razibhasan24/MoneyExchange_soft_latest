@extends('layouts.master')
@section('page-title', 'Create Invoice')
@section('pages')
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Money Exchange - Create Customer</title>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
  <style>
    body {
      background-color: #f8f9fa;
    }
    .main-header {
      background-color: #0d6efd; /* Bootstrap primary */
      color: #fff;
      padding: 20px;
    }
    .main-header .left, .main-header .right {
      width: 50%;
    }
    .main-header img {
      max-height: 50px;
    }
    .item-table th {
      background-color: #0dcaf0; /* Bootstrap info */
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
    <h3 class="mb-3">Create Customer & Transactions</h3>

    <!-- Master Fields -->
    <h5>Customer Info</h5>
    <div class="row mb-4">
      <div class="col-md-4 mb-3">
        <label class="form-label">Name</label>
        <input type="text" id="name" class="form-control" />
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">ID Type</label>
        <input type="text" id="id_type" class="form-control" />
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">ID Number</label>
        <input type="text" id="id_number" class="form-control" />
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Phone</label>
        <input type="text" id="phone" class="form-control" />
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Address</label>
        <input type="text" id="address" class="form-control" />
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">ID Proof Document</label>
        <input type="text" id="id_proof_document" class="form-control" />
      </div>
    </div>

    <!-- Item Fields -->
    <h5>Add Transaction</h5>
    <div class="row mb-3">
      <div class="col-md-2">
        <label class="form-label">Currency From</label>
        <input type="text" id="currency_from" class="form-control" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Currency To</label>
        <input type="text" id="currency_to" class="form-control" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Amount From</label>
        <input type="number" id="amount_from" class="form-control" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Amount To</label>
        <input type="number" id="amount_to" class="form-control" />
      </div>
      <div class="col-md-1">
        <label class="form-label">Rate</label>
        <input type="number" id="rate" class="form-control" />
      </div>
      <div class="col-md-2">
        <label class="form-label">Agent ID</label>
        <input type="text" id="agent_id" class="form-control" />
      </div>
      <div class="col-md-1 d-flex align-items-end">
        <button id="addItemBtn" class="btn btn-primary w-100">Add</button>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12">
        <label class="form-label">Remarks</label>
        <input type="text" id="remarks" class="form-control" />
      </div>
      <div class="col-md-12 mt-2">
        <label class="form-label">Receipt Document</label>
        <input type="text" id="receipt_document" class="form-control" />
      </div>
    </div>

    <!-- Item Table -->
    <table class="table table-bordered item-table">
      <thead>
        <tr>
          <th>Currency From</th>
          <th>Currency To</th>
          <th>Amount From</th>
          <th>Amount To</th>
          <th>Rate</th>
          <th>Agent ID</th>
          <th>Remarks</th>
          <th>Receipt Document</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <!-- Submit -->
    <button id="submitBtn" class="btn btn-success">Save Customer & Transactions</button>

    <!-- JSON Output (Debug) -->
    <pre id="output" class="mt-4 bg-dark text-white p-3 rounded"></pre>
  </div>

  <!-- ✅ JS -->
  <script>
    let items = [];
    let transactionIdCounter = 1;

    document.getElementById('addItemBtn').addEventListener('click', function () {
      const currencyFrom = document.getElementById('currency_from').value;
      const currencyTo = document.getElementById('currency_to').value;
      const amountFrom = parseFloat(document.getElementById('amount_from').value);
      const amountTo = parseFloat(document.getElementById('amount_to').value);
      const rate = parseFloat(document.getElementById('rate').value);
      const agentId = document.getElementById('agent_id').value;
      const remarks = document.getElementById('remarks').value;
      const receiptDocument = document.getElementById('receipt_document').value;

      const item = {
        id: transactionIdCounter++,
        customer_id: 1, // For demo — your backend will link
        currency_from: currencyFrom,
        currency_to: currencyTo,
        amount_from: amountFrom,
        amount_to: amountTo,
        rate: rate,
        transaction_date: new Date().toISOString().slice(0,10), // today
        agent_id: agentId,
        remarks: remarks,
        receipt_document: receiptDocument
      };

      items.push(item);

      const row = `<tr>
        <td>${currencyFrom}</td>
        <td>${currencyTo}</td>
        <td>${amountFrom}</td>
        <td>${amountTo}</td>
        <td>${rate}</td>
        <td>${agentId}</td>
        <td>${remarks}</td>
        <td>${receiptDocument}</td>
      </tr>`;
      document.querySelector('.item-table tbody').insertAdjacentHTML('beforeend', row);

      // Clear item fields
      document.getElementById('currency_from').value = '';
      document.getElementById('currency_to').value = '';
      document.getElementById('amount_from').value = '';
      document.getElementById('amount_to').value = '';
      document.getElementById('rate').value = '';
      document.getElementById('agent_id').value = '';
      document.getElementById('remarks').value = '';
      document.getElementById('receipt_document').value = '';
    });

    document.getElementById('submitBtn').addEventListener('click', function () {
      const data = {
        name: document.getElementById('name').value,
        id_type: document.getElementById('id_type').value,
        id_number: document.getElementById('id_number').value,
        phone: document.getElementById('phone').value,
        address: document.getElementById('address').value,
        id_proof_document: document.getElementById('id_proof_document').value,
        items: items
      };

      document.getElementById('output').textContent = JSON.stringify(data, null, 2);

      // ✅ POST to Laravel API
      fetch('/api/customers', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // if using Blade
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(res => {
        alert('Successfully saved!');
        window.location.href = '/customers'; // ✅ Redirect to index page
      })
      .catch(err => {
        alert('Error saving data!');
        console.error(err);
      });
    });
  </script>
</body>
</html>

@endsection
