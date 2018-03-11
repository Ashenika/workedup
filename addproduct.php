<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Add Product";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("adminheadfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

echo "<form action=productconfirm.php method=POST>
<table>
<tr><td>Product Name*</td><td><input type=text name=prodName size = 45 maxlength=45></td></tr>
<tr><td>Picture Name*</td><td><input type=text name=picName size = 45 maxlength=45></td></tr>
<tr><td>Description</td><td><input type=text name=desc size = 45 maxlength=45></td></tr>
<tr><td>Price*</td><td><input type=text name=price size = 8 maxlength=8></td></tr>
<tr><td>Initial quantity*</td><td><input type=text name=initstock size = 8 maxlength=8></td></tr>
<tr><td><input type=submit value=Add></td><td><input type=reset value=Clear></td></tr>
</table>
</form>";

//include head layout
include("footlayout.html");
?>
