<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="AshCakes";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
include ("slideshow.html");
echo "<p></p>";
//display name of the page and some random text
echo "<h2> You can`t be Sad when you`re holding a CUPCAKE </h2>";
echo "<p>
		<h2> 1 cup cake contains </h2>
		<li> 1 cup friendliness </li>
		<li> 3 tablespoons of sweetness </li>
		<li>  1 large scoop of smiles </li>
		<li>  a pinch of giggles </li>
		<li>  a dash of innocence </li>
		";	
//include head layout
include("footlayout.html");
?>