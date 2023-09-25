
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>

    <style>
    .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }

    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    input{
        margin: 3px;
    }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" align="center">
            <h2>Log in</h2>       
            <div></div>
            <div>
                <input type="text" name="username" value='' placeholder="Username" required autocomplete="off" autofocus>
            </div>
            <div>
                <input type="password" autocomplete="off" placeholder="Password" name="password" required>
            </div>
            <div>
                <button type="submit" value="Submit">Log in</button>
            </div>      
        </form>
    </div>
</body>
</html>
<hr><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />session_start</span><span style="color: #007700">();<br /></span><span style="color: #0000BB">$s_username&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'abc'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$s_password&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'123'</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$message&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">''</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$username&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">''</span><span style="color: #007700">;<br />if(isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'username'</span><span style="color: #007700">])&nbsp;&amp;&amp;&nbsp;isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'password'</span><span style="color: #007700">]))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;1.&nbsp;sanitize&nbsp;data<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$username&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">filter_input</span><span style="color: #007700">(</span><span style="color: #0000BB">INPUT_POST</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'username'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">FILTER_SANITIZE_SPECIAL_CHARS</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$password&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">filter_input</span><span style="color: #007700">(</span><span style="color: #0000BB">INPUT_POST</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'password'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">FILTER_SANITIZE_STRING</span><span style="color: #007700">);<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;2.&nbsp;check&nbsp;if&nbsp;is&nbsp;a&nbsp;valid&nbsp;user<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if(</span><span style="color: #0000BB">$s_username&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">$username&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;</span><span style="color: #0000BB">$s_password&nbsp;</span><span style="color: #007700">===&nbsp;</span><span style="color: #0000BB">$password</span><span style="color: #007700">){&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;3.&nbsp;and&nbsp;if&nbsp;userid&nbsp;and&nbsp;password&nbsp;match,&nbsp;add&nbsp;username&nbsp;to&nbsp;session<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$_SESSION</span><span style="color: #007700">[</span><span style="color: #DD0000">"username"</span><span style="color: #007700">]&nbsp;=&nbsp;</span><span style="color: #0000BB">$username</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$message&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"Invalid&nbsp;Username&nbsp;or&nbsp;Password!"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />}<br />if(isset(</span><span style="color: #0000BB">$_SESSION</span><span style="color: #007700">[</span><span style="color: #DD0000">"username"</span><span style="color: #007700">]))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">header</span><span style="color: #007700">(</span><span style="color: #DD0000">"Location:index.php"</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">//&nbsp;now&nbsp;user&nbsp;is&nbsp;allowed&nbsp;to&nbsp;see&nbsp;the&nbsp;index&nbsp;page<br /></span><span style="color: #007700">}<br /><br /><br /><br /></span><span style="color: #0000BB">?&gt;<br /></span><br />&lt;!DOCTYPE&nbsp;html&gt;<br />&lt;html&nbsp;lang="en"&gt;<br />&lt;head&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;charset="utf-8"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;name="viewport"&nbsp;content="width=device-width,&nbsp;initial-scale=1,&nbsp;shrink-to-fit=no"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;title&gt;Login&nbsp;Form&lt;/title&gt;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;style&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;.login-form&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;width:&nbsp;340px;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;50px&nbsp;auto;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size:&nbsp;15px;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;.login-form&nbsp;form&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin-bottom:&nbsp;15px;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;background:&nbsp;#f7f7f7;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;box-shadow:&nbsp;0px&nbsp;2px&nbsp;2px&nbsp;rgba(0,&nbsp;0,&nbsp;0,&nbsp;0.3);<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;padding:&nbsp;30px;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;.login-form&nbsp;h2&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;0&nbsp;0&nbsp;15px;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;.btn&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-size:&nbsp;15px;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;font-weight:&nbsp;bold;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;input{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;margin:&nbsp;3px;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/style&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="login-form"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;form&nbsp;method="post"&nbsp;align="center"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Log&nbsp;in&lt;/h2&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<span style="color: #0000BB">&lt;?=&nbsp;$message&nbsp;?&gt;</span>&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="text"&nbsp;name="username"&nbsp;value='<span style="color: #0000BB">&lt;?=&nbsp;$username?&gt;</span>'&nbsp;placeholder="Username"&nbsp;required&nbsp;autocomplete="off"&nbsp;autofocus&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="password"&nbsp;autocomplete="off"&nbsp;placeholder="Password"&nbsp;name="password"&nbsp;required&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="submit"&nbsp;value="Submit"&gt;Log&nbsp;in&lt;/button&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/form&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&lt;/body&gt;<br />&lt;/html&gt;<br /><span style="color: #0000BB">&lt;?php&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"&lt;hr&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">show_source</span><span style="color: #007700">(</span><span style="color: #0000BB">__FILE__</span><span style="color: #007700">);&nbsp;<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code>