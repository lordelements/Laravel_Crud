<h1>HOME PAGES</h1>
<br>
<x-messages />


<form action="{{ url('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

<a href="{{ url('index-display') }}">List of accounts</a>