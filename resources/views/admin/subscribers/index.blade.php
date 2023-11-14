@extends('layouts.admin')

@section('title', 'Admin Subscribers')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="h6 mb-0 text-gray-800">Subscribers</h6>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive font-size-90">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none">
                <thead>
                    <tr>
                        <th>Date&nbsp;&amp; Time</th>
                        <th>Name</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                    <tr>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($subscriber['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll') }}</td>
                        <td class="align-middle">{{ json_decode($subscriber['data'], true)['name'] }}</td>
                        <td class="align-middle">{{ $subscriber['email'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
