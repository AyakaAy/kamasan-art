@props(['order'])

@php
    $isReadyStock = ($order['order_type'] ?? 'ready_stock') === 'ready_stock';
    $steps = $order['steps'] ?? [];
@endphp

<div class="tracking-timeline-card">
    <div class="timeline-card-header">
        <div>
            <span class="card-kicker">
                {{ $isReadyStock ? 'KRONOLOGI OTENTIK READY STOCK' : 'KRONOLOGI OTENTIK PRE-ORDER' }}
            </span>
            <h2 class="timeline-heading">
                {{ $isReadyStock ? 'Tahapan Verifikasi & Penyerahan Karya' : 'Tahapan Pengerjaan & Penyerahan Mahakarya' }}
            </h2>
        </div>

        <span class="step-progress-pill">
            • Langkah {{ $order['active_step_number'] }} dari {{ $order['total_steps'] }} Berjalan
        </span>
    </div>

    <div class="timeline-list">
        @foreach($steps as $step)
            <div class="timeline-item is-{{ $step['state'] }}">
                <div class="timeline-marker-col">
                    <div class="timeline-marker">
                        @if($step['state'] === 'completed')
                            <span aria-hidden="true">✓</span>
                        @elseif($step['state'] === 'active')
                            <span aria-hidden="true">✦</span>
                        @else
                            <span aria-hidden="true">◫</span>
                        @endif
                    </div>
                    @if(!$loop->last)
                        <div class="timeline-line"></div>
                    @endif
                </div>

                <div class="timeline-content-box">
                    <div class="timeline-top-row">
                        <h3 class="step-title">
                            {{ $step['number'] }}. {{ $step['title'] }}
                            @if($step['state'] === 'active')
                                <span class="badge-active-step">SEDANG AKTIF</span>
                            @endif
                        </h3>

                        <span class="step-meta-right">
                            @if(!empty($step['timestamp']))
                                {{ $step['timestamp'] }}
                            @elseif($step['state'] === 'upcoming')
                                Tahap Berikutnya
                            @endif
                        </span>
                    </div>

                    <p class="step-desc">{{ $step['description'] }}</p>

                    @if(!empty($step['note']) && in_array($step['state'], ['completed', 'active'], true))
                        <div class="step-subnote">
                            <span aria-hidden="true">◈</span> {{ $step['note'] }}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>