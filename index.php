    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Quick Viewer</title>
    </head>
     
    <frameset cols="250,*" frameborder="yes" border="3" bordercolor="#999999" framespacing="2">
    <?
    switch( $_GET['geo'] ){
    case "americas":
    case "apac":
    case "japan":
    echo '<frame src="qv-navigation-non-emea.php?geo=' . $_GET['geo'] . '&' . $_GET['height'] . '" name="leftFrame" scrolling="No" id="leftFrame" title="leftFrame" />';
    break;
    default:
    echo '<frame src="qv-navigation.php?height=' . $_GET['height'] . '" name="leftFrame" scrolling="No" id="leftFrame" title="leftFrame" />';
    break;
    }
    ?>
    <frame src="about:blank" name="mainFrame" id="mainFrame" title="mainFrame" />
    <noframes><body>
    </body>
    </noframes></html>