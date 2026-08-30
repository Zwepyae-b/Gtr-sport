@props(['label', 'value', 'icon' => null])

<div class="spec-card">
    @if($icon)
    <div class="spec-card-icon">
        <i class="{{ $icon }}"></i>
    </div>
    @endif
    <div class="spec-card-content">
        <span class="spec-card-label">{{ $label }}</span>
        <span class="spec-card-value">{{ $value }}</span>
    </div>
</div>
