<x-mail::message>
Hello {{ $user->name}}
 
We Understand .it's happend
 
<a href="{{ url('admin/reset/' . $user->remember_token) }}">Reset Your Password</a>

 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>