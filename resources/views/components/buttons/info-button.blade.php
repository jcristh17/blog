<button {{ $attributes->merge(['type' => 'button', 'class' => 
    'inline-flex items-center justify-center px-4 py-2 bg-cyan-800 border border-transparent rounded-md font-bold text-xs text-white 
    uppercase tracking-widest hover:bg-cyan-600 active:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:ring-offset-2 
    transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>