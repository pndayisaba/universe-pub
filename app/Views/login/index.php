<form id="login-form" action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <div class="login-row"><label for="email">Email</label><input type="text" name="email" id="email" /></div>
    <div class="login-row"><label for="password">Password</label><input type="password" name="password" id="password" /></div>
    <div class="login-row send"><button type="submit" id="btn-submit">Submit</button>
</form>
