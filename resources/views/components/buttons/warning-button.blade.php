<button {{ $attributes->merge(['type' => 'button', 'class' => 
    'inline-flex items-center justify-center px-4 py-2 bg-yellow-800 border border-transparent rounded-md font-bold text-xs text-white 
    uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-offset-2 
    transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>