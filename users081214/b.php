<html>
<head>
<script type="text/javascript" src="jquery.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).text());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close();
        mywindow.print();
        return true;
    }

</script>
</head>
<body>

<div id="mydiv">
    This will be printed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a quam at nibh adipiscing interdum. Nulla vitae accumsan ante. 
</div>

<div>
    This will not be printed.
</div>

<div id="anotherdiv">
    Nor will this.
</div>

<input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />

</body>
</html>