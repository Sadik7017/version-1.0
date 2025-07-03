<h2>Reset Password</h2>

<form method="POST" action="{{ route('customer.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ $email }}" required>
    <input type="password" name="password" placeholder="New password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
    <button type="submit">Reset</button>
</form>
