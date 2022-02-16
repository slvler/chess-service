<h4>home</h4>


<ul>
    <li>{{ Auth::guard('web')->user()->name }}</li>
    <li>{{ Auth::guard('web')->user()->email }}</li>

</ul>

<form action="{{ route('user.logout') }}" method="post">
    @csrf
    @method('POST')
             <button type="submit">Logout</button>
</form>
