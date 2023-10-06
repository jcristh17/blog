<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 bg-transparent hover:bg-transparent border-none focus:border-none active:bg-transparent focus:ring-transparent cursor-pointer']) }}>
    {{ $slot }}
</button>
                                        