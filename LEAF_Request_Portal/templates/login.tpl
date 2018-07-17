{if $name == ''}
    <form name="login" method="post" action="?a=login">
    <span class="alert">STATUS: {$status}</span>
    <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
{else}
    Welcome, <b>{$name|sanitize}</b>! | <a href="?a=logout">Sign out</a>
{/if}
