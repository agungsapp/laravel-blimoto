@extends('user.layouts.main')
@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-main bg-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2 class="text-white">Detail Leasing no reload</h2>
                        <ul>
                            <li>
                                <a class="text-white" href="javascript:void(0)">Home</a>
                            </li>
                            <li><i class="fa fa-angle-double-right text-white"></i></li>
                            <li>
                                <a class="text-white" href="javascript:void(0)">detail motor </a>
                            </li>
                            <li><i class="fa fa-angle-double-right text-white"></i></li>
                            <li>
                                <a class="text-white" href="javascript:void(0)">detail leasing </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->



{{-- section logo leasing --}}
<div class="container-fluid mb-5 mt-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ asset('assets') }}/images/custom/leasing/{{ $data[0]->gambar }}" alt="{{ $data[0]->gambar }}" srcset="">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 bg-basic p-4">
            <h3 class="text-center text-white">Opsi angsuran {{ $motor->nama }} terbaik untukmu hari ini !</h3>
        </div>
    </div>
</div>


{{-- section detail cicilan --}}
<section class="container mb-5">
    <div class="row px-4">
        <div class="col-12">

            <div class="d-flex align-items-baseline mb-3">
                <h4 class="text-doff">Filter By DP :</h4>
                <div class="w-75 ms-3">
                    <select id="dp" class="form-select rounded-3 w-100" style="width: 100% !important" aria-label="Default select example">
                        <option selected="">-- Pilih DP --</option>
                        @foreach ($dp as $d)
                        <option value="{{ $d->dp }}">{{ Str::rupiah($d->dp) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <ul>
                <li>
                    <h4 class="text-doff">Filter By Tenor :</h4>
                </li>
                @foreach ($tenor as $t)
                <li>
                    <a href="{{ request()->fullUrl() }}&tenor={{ $t->tenor }}" class="btn btn-sm {{ request()->get('tenor') != null ? (request()->get('tenor') == $t->tenor ? 'btn-basic' : 'btn-outline-basic') : 'btn-outline-basic' }} btn-rounded">Tenor
                        {{ $t->tenor }}</a>
                </li>
                @endforeach

            </ul>

        </div>
        {{-- for loop --}}
        @foreach ($data as $d)
        <div class="col-12 cicilan-wrapper d-flex flex-column mt-3 p-3">
            <h4 class="text-doff fw-bold text-start">Cicilan:</h4>
            <h4 class="text-danger fw-bold text-start">{{ Str::rupiah($d->cicilan) }} x {{ $d->tenor }} Bulan</h4>
            <div class="d-flex justify-content-between align-content-end mt-4">
                <div class="d-flex align-content-end">
                    <a href="https://wa.me/6281373939116?text=Hallo,%20Admin,%20saya%20ingin%20bertanya%20terkait%20dengan%20cicilan%20unit%20{{ $motor->nama }}%20dengan%20tenor%20{{ $d->tenor }}%20Bulan%20dan%20cicilan%20{{ Str::rupiah($d->cicilan) }}.%20apa%20saja%20untuk%20sayaratnya%20?%20%20" class="btn btn-sm btn-success" style="height: fit-content" target="_blank"> <i class="fa fa-whatsapp" aria-hidden="true"></i><span class="ms-2">Ajukan
                            Sekarang</span></a>
                </div>
                <div>
                    <h5 class="text-doff">DP : {{ Str::rupiah($d->dp) }}</h5>
                    <del class="text-doff text-end">DP Normal : {{ Str::rupiah($d->diskon_normal) }}</del>
                    <h5 class="text-doff text-end">DP Hari ini : {{ Str::rupiah($d->diskon) }}</h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- end --}}
    </div>
</section>
@endsection


@push('script')

<script>
    $(document).ready(function() {
        var selectElement = $("#dp");
        selectElement.on("change", function() {
            var selectedDp = selectElement.val();
            var currentUrl = window.location.href;
            var newUrl = currentUrl + "&dp=" + selectedDp;
            window.location.href = newUrl;
        });
    });
</script>
@endpush

