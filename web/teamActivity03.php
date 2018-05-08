<html>
<body>

<form action="form.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>

Major: <br>
<input type="radio" name="major" value="ComputerScience">Computer Science <br>
<input type="radio" name="major" value="webDesign">Web Design and Development <br>
<input type="radio" name="major" value="CIT">CIT <br>
<input type="radio" name="major" value="compE">Computer Engineering<br>
Comments <br>
<textarea name="comments" rows="5" columns="40"></textarea> <br>
Continents Visited:<br>
<select name="continents" size="7" multiple>
<option value="North America">North America</option>
<option value="South America">South America</option>
<option value="Europe">Europe</option>
<option value="Asia">Asia</option>
<option value="Australia">Australia</option>
<option value="Africa">Africa</option>
<option value="Antarctica">Antarctica</option><br>


<input type="submit">
</form>

</body>
</html>