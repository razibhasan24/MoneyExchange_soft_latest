@extends('layouts.master')
@section('page-title', 'Create Transaction')
@section('pages')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Money Exchange - Receipt Transaction Slip</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      background: #fff;
      border-radius: 8px;
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
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 15px;
    }

    .form-row > div {
      flex: 1 1 30%;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      margin-left: 0.5rem;
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
      <div class="logo">💱 MoneyExchange</div>
      <div class="info">
        123 Main Street, Dhaka, Bangladesh<br>
        Phone: +880 1234 567890<br>
        Email: info@moneyexchange.com
      </div>
    </header>

    <main>
      <h3>Add Transaction Item</h3>
      <div class="form-row">
        <div>
          <label for="id">ID</label>
          <input type="text" id="id" placeholder="ID">
        </div>
        <div>
          <label for="customer_id">Customer ID</label>
          <input type="text" id="customer_id" placeholder="Customer ID">
        </div>
        <div>
          <label for="currency_from">Currency From</label>
          <select id="currency_from">
            <option value="">--Select--</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BDT">BDT</option>
          </select>
        </div>
        <div>
          <label for="currency_to">Currency To</label>
          <select id="currency_to">
            <option value="">--Select--</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BDT">BDT</option>
          </select>
        </div>
        <div>
          <label for="amount_from">Amount From</label>
          <input type="number" id="amount_from" placeholder="Amount From">
        </div>
        <div>
          <label for="amount_to">Amount To</label>
          <input type="number" id="amount_to" placeholder="Amount To">
        </div>
        <div>
          <label for="rate">Rate</label>
          <input type="number" id="rate" placeholder="Rate">
        </div>
        <div>
          <label for="transaction_date">Transaction Date</label>
          <input type="date" id="transaction_date">
        </div>
        <div>
          <label for="agent_id">Agent ID</label>
          <input type="text" id="agent_id" placeholder="Agent ID">
        </div>
        <div>
          <label for="remarks">Remarks</label>
          <input type="text" id="remarks" placeholder="Remarks">
        </div>
        <div>
          <label for="receipt_document">Receipt Document</label>
          <input type="text" id="receipt_document" placeholder="Document">
        </div>
      </div>

      <button class="btn" onclick="addItem()">Add Item</button>

      <h3>Transaction Items</h3>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Customer ID</th>
            <th>From</th>
            <th>To</th>
            <th>Amount From</th>
            <th>Amount To</th>
            <th>Rate</th>
            <th>Date</th>
            <th>Agent</th>
            <th>Remarks</th>
            <th>Doc</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="itemsTable">
          <!-- Items here -->
        </tbody>
      </table>

      <button class="btn" style="margin-top:15px;" onclick="saveAll()">Save All & Go to Index</button>
    </main>

    <footer>
      &copy; 2025 MoneyExchange Software | All Rights Reserved.
    </footer>
  </div>

  <script>
    let items = [];

    function addItem() {
      const item = {
        id: document.getElementById('id').value.trim(),
        customer_id: document.getElementById('customer_id').value.trim(),
        currency_from: document.getElementById('currency_from').value,
        currency_to: document.getElementById('currency_to').value,
        amount_from: document.getElementById('amount_from').value.trim(),
        amount_to: document.getElementById('amount_to').value.trim(),
        rate: document.getElementById('rate').value.trim(),
        transaction_date: document.getElementById('transaction_date').value,
        agent_id: document.getElementById('agent_id').value.trim(),
        remarks: document.getElementById('remarks').value.trim(),
        receipt_document: document.getElementById('receipt_document').value.trim()
      };

      if (!item.id || !item.customer_id || !item.currency_from || !item.currency_to || !item.amount_from || !item.amount_to || !item.rate || !item.transaction_date || !item.agent_id) {
        alert('Please fill all required fields!');
        return;
      }

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
            <td>${item.id}</td>
            <td>${item.customer_id}</td>
            <td>${item.currency_from}</td>
            <td>${item.currency_to}</td>
            <td>${item.amount_from}</td>
            <td>${item.amount_to}</td>
            <td>${item.rate}</td>
            <td>${item.transaction_date}</td>
            <td>${item.agent_id}</td>
            <td>${item.remarks}</td>
            <td>${item.receipt_document}</td>
            <td><button class="btn btn-danger" onclick="deleteItem(${index})">Delete</button></td>
          </tr>
        `;
      });
    }

    function clearForm() {
      document.querySelectorAll('input, select').forEach(el => el.value = '');
    }

    function saveAll() {
      if (items.length === 0) {
        alert('No items to save!');
        return;
      }

      // Save to localStorage (mock API)
      localStorage.setItem('transactions', JSON.stringify(items));

      alert('✅ Transactions saved successfully!');
      // Redirect to index.html after 1 second
      setTimeout(() => {
        window.location.href = 'index.html'; // change to your index page
      }, 1000);
    }

    // Optional: load existing data
    window.onload = () => {
      const saved = localStorage.getItem('transactions');
      if (saved) {
        items = JSON.parse(saved);
        renderItems();
      }
    };
  </script>
</body>
</html>



@endsection
