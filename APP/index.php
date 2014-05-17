<?php
	include('../CM/modules/connection.php');
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
        <td>melding klantnummer <br /><input type="text" name="klantnummer"></td>
        </tr>
        
        <tr>
        <td>melding uitleg <br /><textarea type="text" rows="4" cols="50" name="uitleg"></textarea></td>
        </tr>       
        
        <tr>
        <td colspan="2"><input type="submit" name="voeg toe" value="voeg melding toe"><input type="reset" name="reset" value="reset formulier"></td>
        </tr>
        
        </table>
        </form>
        
        <?php
        // er is een post gedaan!

		if (isset($_POST["klantnummer"]))    
        {            
            // maak nieuwe melding aan met waardes uit de post
            
            $klantnummer = $_POST['klantnummer'];
            $uitleg = $_POST['uitleg'];
            
			// check of de required velden zijn ingevuld 
            if($klantnummer == NULL)
            {
                echo "geef de melding een naam";	
            }
            else if($uitleg == NULL)
            {
                echo "geef de melding een beschrijving";	
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
      
              $query7 ="INSERT INTO chats (`id`, `klantnummer`, `content`) VALUES ('$id', '$klantnummer', '$uitleg');";
              mysqli_query($db,$query7);
              
              echo "nieuwe melding succesvol toegevoegd";

            
            }
        }
        ?>

</body>
</html>