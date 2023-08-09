
<form action="{{ route('route_login_admin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Submit" name="SubmitLogin">

</form>