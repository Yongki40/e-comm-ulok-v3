<h1>Forget Password Email</h1>

You can reset password from bellow link:
{{-- {{ dd('/reset-password/' . $token) }} --}}
<a href="{{ 'http://localhost:8000/reset-password/' . $token }}">Reset Password</a>
