<%@ Page Language="VB" AutoEventWireup="false" CodeFile="FormSubmit.aspx.vb" Inherits="FormBased_FormSubmit" %>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>FusionMaps v3 - Form Based Example</title>
    <%
       
        'You need to include the following JS file to embed the map using JavaScript
        'Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
        'When you make your own maps, make sure that the path to this JS file is correct. Else, you would get JavaScript errors.
        
    %>

    <script language="Javascript" src="../JSClass/FusionMaps.js"></script>

    <style type="text/css">
	    <!--
	        body{font-family:Verdana;font-size:8pt;}
            .text{font-family:Verdana;font-size:8pt;}
	    -->
	</style>
</head>
<body>
    <form id='form1' name='form1' method='post' runat="server">
        <center>
            <h2>
                <a href="http://www.fusioncharts.com/maps" target="_blank">FusionMaps v3</a> - Form
                Based Example</h2>
            <h4>
                Plotting Data from Form Using dataXML method
                <br />
                State-wise population distribution - with respect to total US population.</h4>
            <% ' Show the Map %>
            <asp:Literal ID="FusionMapsContainer" runat="server"/>
            <br />
            <br />
            <a href="Default.aspx">&laquo; Click here to Enter Data Again</a><br />
            <br />
            <a href='../Default.aspx'>&laquo; Back to list of examples</a>
            <br />
            <br />
            <a href='../NoMap.html' target="_blank">Unable to see the MAP above?</a>
            
        </center>
    </form>
</body>
</html>
