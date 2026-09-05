<h1>Fazer login</h1>
<form method="POST" action="{{ route('admin.login.store') }}">
    @csrf
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
    <p>{{ $message }}</p>
    @enderror
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>