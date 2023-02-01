<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-2 py-1 bg-gradient-to-tr rounded from-blue-400 to-blue-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</button>
