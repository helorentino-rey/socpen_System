<form method="POST" action="{{ route('staff.otp.verify') }}">
    @csrf
    <div>
        <label for="otp">OTP</label>
        <input type="text" name="otp" id="otp" required>
    </div>
    <button type="submit">Verify OTP</button>
</form>
