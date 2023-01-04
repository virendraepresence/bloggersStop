Not using Currently


You have requested to change your password.

Click Here to Reset your Password: <br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>

Let us know if is was not you!