<div class="card shadow h-100 py-2 {{ is_array($class) ? implode(' ', $class) : $class }}">
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
