@extends('site.layouts.app')
@section('content')
    <style>
        /* General table styling */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 1.1em;
        }

        .styled-table th {
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
        }

        .styled-table tbody tr {
            transition: background-color 0.3s ease;
        }

        .styled-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .styled-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Action button styling */
        .btn-view {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9em;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            text-transform: capitalize;
            font-size: 0.9em;
        }

        .badge-success {
            background-color: #28a745;
            /* Green for Confirmed */
        }

        .badge-pending {
            background-color: #ffc107;
            /* Yellow for Pending */
        }
    </style>
    <section class="plan" id="plan" style="margin-top: 100px; margin-bottom: 100px">
        <div class="box-container">
            <h1 class="heading">My Bookings</h1>
        </div>

        <div class="box-container">
            @if ($bookings->isEmpty())
                <p>You have no bookings yet.</p>
            @else
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Booking ID</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Contact No</th>
                            <th>Address</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->payment_method }}</td>
                                <td>{{ number_format($booking->amount, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                                <td><span class="badge {{ $booking->status ? 'badge-success' : 'badge-pending' }}">
                                        {{ $booking->status ? 'Confirmed' : 'Pending' }}
                                    </span></td>
                                <td>{{ $booking->contact_no }}</td>
                                <td>{{ $booking->address }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
