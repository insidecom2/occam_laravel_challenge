<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary d-grid w-100']) }}>
    {{ $slot }}
</button>
