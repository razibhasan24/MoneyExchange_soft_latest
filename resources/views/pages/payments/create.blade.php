@extends('layouts.master')
@section('page-title', 'Create Payment')
@section('pages')
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Money Exchange - Payment Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    header {
      background: #007bff;
      color: #fff;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header .logo {
      font-size: 28px;
      font-weight: bold;
    }

    header .info {
      text-align: right;
      font-size: 14px;
    }

    main {
      padding: 20px;
    }

    footer {
      background: #007bff;
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    .form-row {
      display: flex;
      gap: 15px;
      margin-bottom: 15px;
    }

    .form-row > div {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 4px;
      margin-left: 0.5rem; /* ms-2 equivalent */
    }

    input, select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn {
      background: #28a745;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 5px;
    }

    .btn:hover {
      background: #218838;
    }

    .btn-danger {
      background: #dc3545;
    }

    .btn-danger:hover {
      background: #c82333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table, th, td {
      border: 1px solid #bbb;
    }

    th {
      background: #343a40;
      color: #fff;
    }

    th, td {
      padding: 8px;
      text-align: center;
    }

    h3 {
      margin-top: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">
        💱 MoneyExchange
      </div>
      <div class="info">
        123 Main Street, Dhaka, Bangladesh<br>
        Phone: +880 1234 567890<br>
        Email: info@moneyexchange.com
      </div>
    </header>

    <main>
      <h3>Add Payment Item</h3>
      <div class="form-row">
        <div>
          <label for="payment_id">Payment ID</label>
          <input type="text" id="payment_id" placeholder="Enter Payment ID">
        </div>
        <div>
          <label for="transaction_id">Transaction ID</label>
          <input type="text" id="transaction_id" placeholder="Enter Transaction ID">
        </div>
        <div>
          <label for="payment_method">Payment Method</label>
          <select id="payment_method">
            <option value="">-- Select Method --</option>
            <option value="Cash">Cash</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Card">Card</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div>
          <label for="payment_reference">Payment Reference</label>
          <input type="text" id="payment_reference" placeholder="Enter Reference">
        </div>
        <div>
          <label for="payment_date">Payment Date</label>
          <input type="date" id="payment_date">
        </div>
        <div>
          <label for="payment_document">Payment Document</label>
          <input type="text" id="payment_document" placeholder="Enter Document">
        </div>
      </div>

      <button class="btn" onclick="addItem()">Add Item</button>

      <h3>Payment Items</h3>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Payment ID</th>
            <th>Transaction ID</th>
            <th>Method</th>
            <th>Reference</th>
            <th>Date</th>
            <th>Document</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="itemsTable">
          <!-- Items will be added here -->
        </tbody>
      </table>

      <button class="btn" style="margin-top:15px;" onclick="saveAll()">Save All</button>
    </main>

    <footer>
      &copy; 2025 MoneyExchange Software | All Rights Reserved.
    </footer>
  </div>

  <script>
    let items = [];

    function addItem() {
      const payment_id = document.getElementById('payment_id').value.trim();
      const transaction_id = document.getElementById('transaction_id').value.trim();
      const payment_method = document.getElementById('payment_method').value;
      const payment_reference = document.getElementById('payment_reference').value.trim();
      const payment_date = document.getElementById('payment_date').value;
      const payment_document = document.getElementById('payment_document').value.trim();

      if (!payment_id || !transaction_id || !payment_method || !payment_date) {
        alert('Please fill in all required fields!');
        return;
      }

      const item = {
        payment_id,
        transaction_id,
        payment_method,
        payment_reference,
        payment_date,
        payment_document
      };

      items.push(item);
      renderItems();
      clearForm();
    }

    function deleteItem(index) {
      items.splice(index, 1);
      renderItems();
    }

    function renderItems() {
      const tbody = document.getElementById('itemsTable');
      tbody.innerHTML = '';
      items.forEach((item, index) => {
        tbody.innerHTML += `
          <tr>
            <td>${index + 1}</td>
            <td>${item.payment_id}</td>
            <td>${item.transaction_id}</td>
            <td>${item.payment_method}</td>
            <td>${item.payment_reference}</td>
            <td>${item.payment_date}</td>
            <td>${item.payment_document}</td>
            <td><button class="btn btn-danger" onclick="deleteItem(${index})">Delete</button></td>
          </tr>
        `;
      });
    }

    function clearForm() {
      document.getElementById('payment_id').value = '';
      document.getElementById('transaction_id').value = '';
      document.getElementById('payment_method').value = '';
      document.getElementById('payment_reference').value = '';
      document.getElementById('payment_date').value = '';
      document.getElementById('payment_document').value = '';
    }

    function saveAll() {
      if (items.length === 0) {
        alert('No items to save.');
        return;
      }

      fetch('https://your-api-url.com/api/payments', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ payments: items })
      })
      .then(res => {
        if (res.ok) {
          alert('✅ Payments saved successfully!');
          items = [];
          renderItems();
        } else {
          alert('❌ Failed to save payments.');
        }
      })
      .catch(err => {
        console.error(err);
        alert('❌ Error connecting to server.');
      });
    }
  </script>
</body>
</html>
@endsection
