<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-[#51223a] border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#6b2d4a] focus:bg-[#6b2d4a] active:bg-[#3d1a2a] focus:outline-none focus:ring-2 focus:ring-[#c9a5b3] focus:ring-offset-2 focus:ring-offset-white transition ease-in-out duration-150 shadow-md']) }}>
    {{ $slot }}
</button>
