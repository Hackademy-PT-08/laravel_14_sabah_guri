<x-layout>
    <h2 class="text-center">Accedi</h2>

    <x-form-errors/>
    <form action="/login" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Accedi</button>
    </form>
</x-layout>