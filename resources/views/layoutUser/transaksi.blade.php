@extends('layoutUser.layout.index')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>

    <section class="transaksi">
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="col-1">
                        <a href="/tutor" class="pembayaran-back-icon"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-11">
                        <div class="pembayaran-card-search-pem">
                            <div class="card-body">
                                <h5 class="pembayaran-card-title-search">Pembayaran</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <div class="transaksi grid">
                <div class="col-span-3">
                    <div class="p-4 mb-4 rounded-lg bg-white shadow-soft">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Transaction Detail</p>
                            <p class="text-sm text-primary font-medium">{{ $detail->reference }}</p>
                        </div>
                        <div class="row">
                            <div class="mt-3 col-md-5">
                                    <h4 class="text-sm font-medium text-gray-400 ">Nama Pengajar : {{ $detail->customer_name }}</h4>
                                   
                                <h3 class="text-3xl font-medium text-primary mt-2">Rp. {{ number_format($detail->amount) }}</h3>
                                
                            </div>
                            <div class="mt-3 col-md-7">
                                <h4 class="text-sm font-medium text-gray-400" style="margin-left: 234px;">Nama Paket :  {{ $detail->order_items[0]->name }}</h4>
                            </div>
                        </div>
                        <div class="">
                            <div
                                    class="text-xs px-2 py-1 rounded-full bg-red-200 inline-block text-red-600 font-semibold status-unpaid">
                                    {{ $detail->status }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="p-4 mb-4 rounded-lg bg-white shadow-soft">
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Instruction</p> 
                        @foreach ($detail->instructions as $trans )     
                        <div tabindex="0" class="collapse mt-3" style="display: block">
                            <div class="collapse-title font-medium">
                                <div class="flex items-center justify-between cursor-pointer">
                                    <span>
                                      {{ $trans->title }}
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" style="height: 20px; width: 20px;" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="collapse-content">
                               <ul style=" list-style-type: none;">
                                @foreach ($trans->steps as $step )
                                <li class="text-sm">{{ $loop->iteration }}.{!! $step !!} </li>
                                @endforeach
                               </ul>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection