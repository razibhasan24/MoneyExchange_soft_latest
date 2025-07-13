@extends('layouts.master')
@section('page-title', 'Create MoneyReceipt')
@section('pages')
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f5f5f5;
  }

  .main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* background: #003366; */
    color: black;
    padding: 20px;
    font-weight: ;
    font-size: 15px;
  }

  .main-header img {
    max-height: 130px;
    
  }

  .container {
    background: #fff;

  }

  h2 {
    color: #003366;
  }

  label {
    display: block;
    margin-bottom: 4px;
    font-weight: bold;
  }

  input,
  select,
  textarea {
    width: 100%;
    padding: 6px;
    margin-bottom: 12px;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    /* gap: 15px; */
  }

  .col-3 {
    flex: 1 1 calc(25% - 15px);
  }

  .col-4 {
    flex: 1 1 calc(33.33% - 15px);
  }

  .col-6 {
    flex: 1 1 calc(50% - 15px);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }

  table,
  th,
  td {
    border: 1px solid #003366;
  }

  th {
    background: #003366;
    color: #fff;
    padding: 8px;
  }

  td {
    padding: 8px;
  }

  .btn {
    background: #003366;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-right: 10px;
  }

  .btn:hover {
    background: #003366;
  }

  pre {
    background: #333;
    color: #0f0;
    padding: 15px;
  }
</style>
<div style="max-width: 70vw; margin: 0 auto;" class="container my-5 py-3">
  <!-- ✅ HEADER -->
  <div class="main-header mb-3">
    <div>
      <img src="{{ asset('assets/img/logos/money-exchange-logo.png') }}" alt="Logo">
      
    </div>
    <div style="text-align:right;">
      <p>Money Exchange Company Ltd.</p>
      <p>123 Exchange Road, Dhaka</p>
      <p>info@moneyexchange.com</p>

    </div>
  </div>
  <!-- ✅ BODY -->
  <div class="container">
    <h2 class="mb-3 text-center text-3x2 font-bold">Create Money Receipt</h2>

    <!-- Master Fields -->
    <div class="row">
      <div class="col-3">
        <label>Receipt Number</label>
        <input disabled type="text" id="receipt_number" value="{{ $newMrNo }}">
      </div>
      <div class="col-3">
        <label>Transaction ID</label>
        <select name="transaction-id" id="transaction_id" class="form-control">
            <option value="">Transaction Id</option>
            @foreach ($transactions as $transaction)
            <option value="{{$transaction->id}}">{{$transaction->status}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-3">
        <label>Customer ID</label>
        <select name="customer-id" id="customer_id" class="form-control">
          <option value="">Select Customer</option>
          @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-3">
        <label>Agent ID</label>
       <select name="agent-id" id="agent_id" class="form-control">
        <option value="">Select Agent</option>
        @foreach ($agents as $agent )
        <option value="{{$agent->id}}">{{$agent->name}}</option>
        @endforeach
       </select>
      </div>
      <div class="col-3">
        <label>Total Amount</label>
        <input type="number" id="total_amount">
      </div>
      <div class="col-3">
        <label>Payment Method</label>
        <select name="payment-id" id="payment_method" class="form-control">
            <option value="">Select Payment</option>
            @foreach ($payments as $payment)
            <option value="{{$payment->id}}">{{$payment->payment_method}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-3">
        <label>Status</label>
        <select name="status-id" id="status" class="form-control">
            <option value="">Select Status</option>
            @foreach ($statuses as $status)
            <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-3">
        <label>Issued By</label>
        <select name="authority_id" id="issued_by" class="form-control">
            <option value="">Select authority</option>
            @foreach ($authorities as $authority)
            <option value="{{$authority->name}}">{{$authority->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-3">
        <label>Issued Date</label>
        <input type="date" id="issued_date">
      </div>
      <div class="col-6">
        <label>Notes</label>
        <textarea id="notes"></textarea>
      </div>
    </div>

    <!-- Detail Fields -->
    <h3 class="mb-3 text-center text-3xl font-bold">Add Receipt Detail</h3>
    <div class="row">
      <div class="col-2">
        <label>Currency Code</label>
        <select name="currency_code" id="currency_code" class="form-control">
          <option value="">Select Currency</option>
          @foreach ($currencies as $currency)
            <option value="{{ $currency->currency_code }}">{{ $currency->currency_code }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-2">
        <label>Amount</label>
        <input type="number" id="amount">
      </div>
      <div class="col-2">
        <label>Exchange Rate</label>
        <input type="number" id="exchange_rate">
      </div>
      <div class="col-2">
        <label>E. Amount</label>
        <input type="number" id="equivalent_amount">
      </div>
      <div class="col-2">
        <label>Fee</label>
        <input type="number" id="fee">
      </div>
      <div class="col-2" style="display:flex;align-items:center; margin-top: 15px;">
        <button class="btn btn-success w-100" id="addItemBtn">Add Item</button>
      </div>
    </div>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>Currency Code</th>
          <th>Amount</th>
          <th>Exchange Rate</th>
          <th>Equivalent</th>
          <th>Fee</th>
        </tr>
      </thead>
      <tbody id="itemsBody"></tbody>
    </table>

    <!-- Submit -->
    <div style="margin-top:20px;">
      <button class="btn btn-success" id="submitBtn">Save Money Receipt</button>
    </div>

    <!-- Debug -->
    <pre id="output"></pre>
  </div>

  <!-- ✅ JS -->
  <script>
    let items = [];
    let itemId = 1;

    document.getElementById('addItemBtn').addEventListener('click', function() {
      const currency_code = document.getElementById('currency_code').value;
      const amount = parseFloat(document.getElementById('amount').value);
      const exchange_rate = parseFloat(document.getElementById('exchange_rate').value);
      const equivalent_amount = parseFloat(document.getElementById('equivalent_amount').value);
      const fee = parseFloat(document.getElementById('fee').value);
      // const type = document.getElementById('type').value;

      const item = {
        id: itemId++,
        receipt_id: 1,
        currency_code,
        amount,
        exchange_rate,
        equivalent_amount,
        fee,
        // type,
        // created_at: new Date().toISOString()
      };

      items.push(item);

      document.getElementById('itemsBody').insertAdjacentHTML('beforeend', `
        <tr>
          <td>${currency_code}</td>
          <td>${amount}</td>
          <td>${exchange_rate}</td>
          <td>${equivalent_amount}</td>
          <td>${fee}</td>
        </tr>
      `);

      // Clear inputs
      document.getElementById('currency_code').value = '';
      document.getElementById('amount').value = '';
      document.getElementById('exchange_rate').value = '';
      document.getElementById('equivalent_amount').value = '';
      document.getElementById('fee').value = '';
      // document.getElementById('type').value = '';
    });

    document.getElementById('submitBtn').addEventListener('click', async function() {
      const data = {
        receipt_number: document.getElementById('receipt_number').value,
        transaction_id: document.getElementById('transaction_id').value,
        customer_id: document.getElementById('customer_id').value,
        agent_id: document.getElementById('agent_id').value,
        total_amount: parseFloat(document.getElementById('total_amount').value),
        payment_method: document.getElementById('payment_method').value,
        status: document.getElementById('status').value,
        issued_by: document.getElementById('issued_by').value,
        issued_date: document.getElementById('issued_date').value,
        notes: document.getElementById('notes').value,
        // created_at: new Date().toISOString(),
        // updated_at: new Date().toISOString(),
        items: items
      };

      document.getElementById('output').textContent = JSON.stringify(data, null, 2);

      //saving to the database
            try {
                const response = await fetch('http://127.0.0.1:8000/api/money_receipts', {
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
                console.log('Money Receipt created:', result);
                alert('Money Receipt created successfully!');

                //redirect to the index page
                window.location.assign("{{ route('money_receipts.index') }}");

            } catch (error) {
                console.error('Failed to create Money Receipt:', error);
                alert('Error creating Money Receipt.');
            }

            console.log(data);

      
    });
  </script>
</div>
@endsection
