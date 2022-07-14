<nav>
    <ul>
        <li><a href="#">Control Panel</a></li>
        <li><a href="#">Area<i class="fa-solid fa-chevron-down"></i></a>
            <ul>
                <li><a href="#">Department of Teacher Education</a></li>
                <li><a href="#">Department of Business and Accountancy</a></li>
                <li><a href="#">Department of Computing and Informatics</a></li>
            </ul>
        </li>
        <li><a href="#">User Setting</a></li>
        <li><a href="#">Account Setting</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                    Log Out
                </a>
            </form>
        </li>
    </ul>
</nav>
