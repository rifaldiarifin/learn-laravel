<div class="header">
    <div class="w-screen">
        <div class="w-cnt">
            <div>
                <h1 class="company-text white">
                    <a href="/">Learn <span>Laravel</span></a>
                </h1>
            </div>
            <div>
                <form action="/auth/logout" method="POST" class="btn-signout">
                    @csrf
                    <button type="submit">
                        <span class="material-symbols-outlined">logout</span>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>