@extends('layouts.master')
@section('page-title', 'Purchase Details')
@section('pages')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Purchase Order</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            font-size: 14px;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .border-top-dotted {
            border-top: 1px dotted #ccc;
        }

        .signature-line {
            height: 80px;
        }

        .table th {
            background-color: hsl(180deg 100% 27.06%);
            color: white;
        }

        .section-header {
            background-color: hsl(180deg 100% 27.06%);
            color: white;
            padding: 6px 10px;
        }
    </style>
</head>

<body>
    <div style="max-width: 70vw;" class="container card mt-5 px-4 py-5">

        <div class="text-center mb-4">
            <h3><strong>Company Name</strong></h3>
            <p class="mb-0">Company Address<br>
                Phone: +880-123456789<br>
                Email: info@example.com | Website: www.example.com</p>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="text-primary">PURCHASE ORDER</h5>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0"><strong>Date:</strong> 2025-07-14</p>
                <p><strong>Purchase Order No:</strong> {{$purchase->id}}</p>
            </div>
        </div>

        <!-- Vendor & Customer Info -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="section-header">SUPPLIER INFORMATION</div>
                <table class="table table-bordered mb-0">
                    <tr>
                        <th>Supplier Name</th>
                        <td>{{ $supplier->name }}</td>
                    </tr>
                    <tr>
                        <th>Sales Agent</th>
                        <td>{{ $agent->name }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>1667 K Street NW, Washington DC 20006</td>
                    </tr>
                    <tr>
                        <th>Contact No.</th>
                        <td>{{ $agent->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$agent->email}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 mb-3">
                <div class="section-header">CUSTOMER INFORMATION</div>
                <table class="table table-bordered mb-0">
                    <tr>
                        <th>Customer Name</th>
                        <td>Franklin Middle School</td>
                    </tr>
                    <tr>
                        <th>Contact Person</th>
                        <td>Helen Wilson / Purchasing Dept.</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>Washington DC, USA</td>
                    </tr>
                    <tr>
                        <th>Contact No.</th>
                        <td>(203) 334-7234</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>school@example.com</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Item Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item No.</th>
                        <th>Details</th>
                        <th>Unit</th>
                        <th class="text-end">Quantity</th>
                        <th class="text-end">Unit Price</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pencils HB</td>
                        <td>Dozen</td>
                        <td class="text-end">5</td>
                        <td class="text-end">10.00</td>
                        <td class="text-end">50.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pencils 2B</td>
                        <td>Dozen</td>
                        <td class="text-end">4</td>
                        <td class="text-end">10.00</td>
                        <td class="text-end">40.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Paper - A4, Photo copier, 70 gram</td>
                        <td>Ream</td>
                        <td class="text-end">10</td>
                        <td class="text-end">3.00</td>
                        <td class="text-end">30.00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Paper - A4, Photo copier, 80 gram</td>
                        <td>Ream</td>
                        <td class="text-end">15</td>
                        <td class="text-end">3.20</td>
                        <td class="text-end">48.00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Pen - Ball Point, Blue</td>
                        <td>Boxes</td>
                        <td class="text-end">10</td>
                        <td class="text-end">10.00</td>
                        <td class="text-end">100.00</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Highlighter - 3 color</td>
                        <td>Sets</td>
                        <td class="text-end">8</td>
                        <td class="text-end">6.00</td>
                        <td class="text-end">48.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Notes & Totals -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="section-header">Additional Notes:</div>
                <div class="border p-3">
                    Payment shall be 30 days upon delivery of the above items.
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-end">Subtotal</th>
                        <td class="text-end">316.00</td>
                    </tr>
                    <tr>
                        <th class="text-end">Taxes (12%)</th>
                        <td class="text-end">37.92</td>
                    </tr>
                    <tr>
                        <th class="text-end">Discount (5%)</th>
                        <td class="text-end">-15.80</td>
                    </tr>
                    <tr>
                        <th class="text-end">Total</th>
                        <td class="text-end"><strong>338.12</strong></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Signature -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="section-header">Authorized By</div>
                <div class="border p-3 signature-line">
                    <br><br>
                    <strong>&lt;Name of Authorized Signatory&gt;</strong><br>
                    <em>&lt;Title&gt;</em>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

@endsection