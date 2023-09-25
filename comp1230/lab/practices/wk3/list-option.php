
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic dropdown</title>
    <meta name="description" content="Dynamically Generate Select Dropdown options">
    <meta name="author" content="Mak Nikooray">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form>
        
        <select name="selection">
            <option selected="selected">Choose one</option>
            <option value='mobile'>Mobile</option>
            <option value='laptop'>Laptop</option>
            <option value='tablet'>Tablet</option>
            <option value='camera'>Camera</option>
        </select>
            <input list="devices" name="devices"> 
            <datalist id="devices">
                <option value='mobile'>Mobile</option>
                <option value='laptop'>Laptop</option>
                <option value='tablet'>Tablet</option>
                <option value='camera'>Camera</option>            
            </datalist>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
    
</body>
</html>
<?php
    $select = filter_input(INPUT_GET, 'selection', FILTER_SANITIZE_STRING);
    $device = filter_input(INPUT_GET, 'devices', FILTER_SANITIZE_STRING);

    if($select != NULL && $device != NULL) {
        echo "<h2>Selected: $select Device: $device</h2>";
    }
?>
<hr><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$devices&nbsp;</span><span style="color: #007700">=&nbsp;array(</span><span style="color: #DD0000">"Mobile"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"Laptop"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"Tablet"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"Camera"</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;<br /></span><br />&lt;!DOCTYPE&nbsp;html&gt;<br />&lt;html&nbsp;lang="en"&gt;<br />&lt;head&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;charset="UTF-8"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;title&gt;Dynamic&nbsp;dropdown&lt;/title&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;name="description"&nbsp;content="Dynamically&nbsp;Generate&nbsp;Select&nbsp;Dropdown&nbsp;options"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;name="author"&nbsp;content="Mak&nbsp;Nikooray"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;meta&nbsp;name="viewport"&nbsp;content="width=device-width,&nbsp;initial-scale=1.0"&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;form&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;select&nbsp;name="selection"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;option&nbsp;selected="selected"&gt;Choose&nbsp;one&lt;/option&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Iterating&nbsp;through&nbsp;the&nbsp;product&nbsp;array&nbsp;to&nbsp;populate&nbsp;options&nbsp;in&nbsp;form<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">foreach(</span><span style="color: #0000BB">$devices&nbsp;</span><span style="color: #007700">as&nbsp;</span><span style="color: #0000BB">$device</span><span style="color: #007700">){<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;option&nbsp;value='"&nbsp;</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">strtolower</span><span style="color: #007700">(</span><span style="color: #0000BB">$device</span><span style="color: #007700">)&nbsp;.&nbsp;</span><span style="color: #DD0000">"'&gt;</span><span style="color: #0000BB">$device</span><span style="color: #DD0000">&lt;/option&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/select&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;list="devices"&nbsp;name="devices"&gt;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;datalist&nbsp;id="devices"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Iterating&nbsp;through&nbsp;the&nbsp;product&nbsp;array&nbsp;to&nbsp;populate&nbsp;options&nbsp;in&nbsp;form<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">foreach(</span><span style="color: #0000BB">$devices&nbsp;</span><span style="color: #007700">as&nbsp;</span><span style="color: #0000BB">$device</span><span style="color: #007700">){<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;option&nbsp;value='"&nbsp;</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">strtolower</span><span style="color: #007700">(</span><span style="color: #0000BB">$device</span><span style="color: #007700">)&nbsp;.</span><span style="color: #DD0000">"'&gt;</span><span style="color: #0000BB">$device</span><span style="color: #DD0000">&lt;/option&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">?&gt;<br /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/datalist&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="submit"&nbsp;value="Submit"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/form&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;<br />&lt;/body&gt;<br />&lt;/html&gt;<br /><br /><span style="color: #0000BB">&lt;?php&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">"&lt;hr&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">show_source</span><span style="color: #007700">(</span><span style="color: #0000BB">__FILE__</span><span style="color: #007700">);&nbsp;<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code>