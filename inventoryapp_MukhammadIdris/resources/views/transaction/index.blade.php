@extends('layouts.master')
@section('judul')
    Riwayat Transaksi
@endsection
@section('content')

<a href="/transaction/create" class= "btn btn-primary btn-sm my-2">Pembelian Produk</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Product</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Notes</th>
    
            @if(Auth::user()->role == 'admin')
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($transaction as $item) 
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->user->name ?? 'N/A' }}</td>
            <td>{{ $item->product->name ?? 'Produk Terhapus' }}</td>
            <td>
                <span class="badge {{ $item->type == 'In' ? 'bg-success' : 'bg-danger' }}">
                    {{ $item->type }}
                </span>
            </td>
            <td>{{ number_format($item->amount) }}pcs</td>
            <td>{{ $item->notes }}</td>

        
            @if(Auth::user()->role == 'admin')
            <td>
                <div class="d-flex gap-2">
                    <a href="/product/create"{{ $item->id }}" class="btn btn-sm btn-info">Update</a>
                    <form action="/transaction/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini, King?')">Delete</button>
                    </form>
                </div>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="{{ Auth::user()->role == 'admin' ? '7' : '6' }}" class="text-center">
                Data Transaksi Kosong.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection