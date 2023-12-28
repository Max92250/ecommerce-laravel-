<!-- resources/views/your-view.blade.php -->

<!-- Include the logout button -->
<form method="GET" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
