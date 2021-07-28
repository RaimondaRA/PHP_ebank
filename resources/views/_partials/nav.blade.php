<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link active" href="/account"><span>Account</span></a></li>
                        <li><p class="nav-item"><a class="nav-link active" aria-current="page" href="/transfer">Transfer Money</a></p></li>
                        <li><p class="nav-item"><a class="nav-link active" aria-current="page" href="/transferBetween">Transfer Money Between<br> Your own Accounts</a></p></li>
                        <li><p class="nav-item"><a class="nav-link active" aria-current="page" href="/report">Transaction Report</a></p></li>
                        <li><p class="nav-item"><a class="nav-link active" aria-current="page" href="/logout">Logout</a></p></li>
                        @else
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Login</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/register">Register</a></li>
                        @endif                    
                    </ul>
                </div>
            </div>
        </nav>



  