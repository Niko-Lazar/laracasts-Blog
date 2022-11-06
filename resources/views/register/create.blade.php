<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 p-6 border-gray-500 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form class="mt-10" action="/register" method="POST">
                @csrf

                <x-form.input name="name" />

                <x-form.input name="username" />

                <x-form.input name="email"  type="email" autocomplete="username" />
                <x-form.input name="password" type="password" autocomplete="new-password" />

                <x-form.button>Submit</x-form.button>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
