<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('rendezvous.store') }}" method="POST">
		@csrf
		<label>Date</label>
		<input type="date" name="date">
		<br>
		<br>
		<br>
		<label>Adresse</label>
		<input type="text" name="adresse">
		<br>
		<br>
		<br>
		<h1> Heure rendez-vous</h1>
		<input type="radio" id="male" name="heure" value="male">
  <label for="male">9h:00</label><br>
  <input type="radio" id="female" name="heure" value="female">
  <label for="female">10h:00</label><br>
  <input type="radio" id="other" name="heure" value="other">
   <label for="female">11h:00</label><br>
    
  <input type="radio" id="female" name="heure" value="female">
  <label for="female">12h:00</label><br>
  
  <button type="submit" class="btn btn-primary">Submit</button>

  


	</form>

</body>
</html>