<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-[#0D1331] border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#181f46] focus:bg-[#181f46] active:bg-black focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-white transition ease-in-out duration-150 shadow-md']) }}>
    {{ $slot }}
</button>
