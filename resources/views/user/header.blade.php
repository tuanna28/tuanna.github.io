

<header>
    <div class="conten">
        <div class="conten-avatar">
            <img src="../src/image/<?php ?>" alt="">
        </div>
        <div class="conten-name">
            <p><span class="span1">Xin chào, {{Auth::user()->name}} </span><span><?php ?></span></p>
        </div>
        <div class="conten-v">
        <form method="POST" action="{{ route('logout') }}">
                                                     @csrf
         <button  type="submit"><i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Logout</button>
        </form>
            <a href="profile"><i class="fa-solid fa-user" aria-hidden="true"></i> Profile</a><br>
         
        </div>
    </div>
</header>