<table width = '100%'>
	<tr>
		<th class = "logo" align = "center">
			<a href="allproduits.php">
				<img  src = "images/logoamazon.png" width="100px" alt = "amazon">
			</a>
		</th>
		<form action="search.php">
			<td class = "searchcont">
				<input type="text" name="q" placeholder="Chercher un produit">
				<input type="submit" name="" value="Chercher">
			</td>
		</form>
		<td id="usern">
			<div class="dropdown">
	  			<button class="dropbtn"><?php echo ucfirst($_SESSION['login'])." (".ucfirst($_SESSION['type']).")";?></button>
	  			<div class="dropdown-content">
	    			
	    			<a href="modifUser.php?login=<?php echo $_SESSION['login'];?>">Profile</a>
	    			<a href="logout.php">Se déconnecter</a>
	    			
	  			</div>
			</div> 
			
			<br >
			
		</td>
	</tr>



</table>

