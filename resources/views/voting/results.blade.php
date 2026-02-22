@extends('layouts.front.app')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Hasil Voting Sementara</h2>
        <p class="text-muted">Hasil akan terus diperbarui selama voting berlangsung</p>
    </div>

    @php
    $grouped = $candidates->groupBy('position_id');
    @endphp

    @foreach($grouped as $positionId => $cands)
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-white border-0">
            <h6 class="card-title">{{ $cands->first()->position->name ?? 'Jabatan' }}</h6>
            <p class="text-muted">Dibawah ini adalah hasil sementara untuk pemilihan {{ $cands->first()->position->name ?? 'Jabatan' }}.</p>
        </div>

        <div class="card-body">
            @php
            $total = $cands->sum('votes_count');
            @endphp

            @foreach($cands as $c)
            @php
            $percent = $total > 0 ? round(($c->votes_count / $total) * 100) : 0;
            @endphp

            <div class="mb-4 p-3 border rounded-3 bg-white shadow-sm">

                <div class="d-flex align-items-center mb-2">

                    <!-- FOTO -->
                    <div class="me-3">
                        @if($c->photo)
                        <img src="{{ asset('storage/'.$c->photo) }}"
                            class="rounded-circle"
                            width="70"
                            height="70"
                            style="object-fit: cover;">
                        @else
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                            style="width:70px; height:70px;">
                            <span class="text-white fw-bold">
                                {{ strtoupper(substr($c->nama,0,1)) }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- NAMA & SUARA -->
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $c->nama }}</strong>
                            <span>{{ $c->votes_count }} suara</span>
                        </div>

                        @php
                        if ($percent < 35) {
                            $color='bg-danger' ;
                            } elseif ($percent < 70) {
                            $color='bg-warning' ;
                            } else {
                            $color='bg-success' ;
                            }
                            @endphp

                            <div class="progress mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated {{ $color }}"
                                role="progressbar"
                                style="width: {{ $percent }}%"
                                aria-valuenow="{{ $percent }}"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                    </div>

                    <small class="text-muted">{{ $percent }}%</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

@endsection