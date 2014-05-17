<?php
	include('modules/connection.php');
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Nieuwe melding</title>
</head>

<body>
		<form name="formulier" class="formulier" action="#" onsubmit="return send()" method="post">
        <table>
        
        <tr>
        <td>melding naam <br /><input type="text" name="naam"></td>
        </tr>
        
        <tr>
        <td>melding uitleg <br /><textarea type="text" rows="4" cols="50" name="uitleg"></textarea></td>
        </tr>
        
        <tr>
        <td>prioriteit (hoe lager, hoe belangrijker)<br />
        <select name="prioriteit" id="prioriteit">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
        </td>
        </tr>
        
        <tr>
        <td>categorie<br />
        <select name="categorie" id="categorie">
        <option value="1">categorie 1</option>
        <option value="2">categorie 2</option>
        <option value="3">categorie 3</option>
        <option value="4">categorie 4</option>
        </select>
        </td>
        </tr>        
        
        <tr>
        <td colspan="2"><input type="submit" name="voeg toe" value="voeg melding toe"><input type="reset" name="reset" value="reset formulier"></td>
        </tr>
        
        </table>
        </form>
        
        <?php
        // er is een post gedaan!

		if (isset($_POST["naam"]))    
        {            
            // maak nieuwe melding aan met waardes uit de post
            
            $naam = $_POST['naam'];
            $uitleg = $_POST['uitleg'];
            $prioriteit = $_POST['prioriteit'];
            $categorie = $_POST['categorie'];
			$archief = 0; 
			$datum = date('d-m-Y');
			$tijd = date('H:i'); 
			$nu = "$datum $tijd"; 
            
			// check of de required velden zijn ingevuld 
            if($naam == NULL)
            {
                echo "geef de melding een naam";	
            }
            else if($uitleg == NULL)
            {
                echo "geef de melding een beschrijving";	
            }
            else if($prioriteit == NULL)
            {
                echo "kies een prioriteit";	
            }
            else if($categorie == NULL)
            {
                echo "selecteer een categorie";	
            }
            else
            {
            
			// check welke id nog niet bezet is		
		   $query1 = "SELECT MAX(id) AS id FROM chats LIMIT 1";
			
            $resultaat1 = mysqli_query($db, $query1);
			while( $rij1 = mysqli_fetch_array($resultaat1) )
			{
				$lastid = $rij1["id"];
				$id = $lastid + 1; 
			}
			 		
			// voeg melding toe in database
      
              $query7 ="INSERT INTO chats (`id`, `titel`, `content`, `datum`, `tijd`, `archief`, `prioriteit`, `categorie`, `nu`) VALUES ('$id', '$naam', '$uitleg', '$datum', '$tijd', '$archief', '$prioriteit', '$categorie','$nu');";
              mysqli_query($db,$query7);
              
              echo "nieuwe melding succesvol toegevoegd";

            
            }
        }
        ?>

</body>
</html>