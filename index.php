<?php

include "functions.php";
$output = null;
$spaces = false;
$capitals = false;

if (isset($_POST['encrypt']) || isset($_POST['decrypt'])) {
    $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING));
    $key = filter_input(INPUT_POST, 'key', FILTER_VALIDATE_INT);
    
    if(isset($_POST['spaces'])) {
        $spaces = true;
    }
    
     if(isset($_POST['capitals'])) {
        $capitals = true;
    }
    
    if ($text == "") {
        $output = "Prosimo vnesite besedilo"; 
    } elseif(!is_int($key) || $key < 0 || $key > 25) {
        $output = "Prosimo izberite zamik med 1 in 24";
    }  else {
           if(isset($_POST['encrypt'])) {
               $output = caesar_cipher($text,$key,$spaces,$capitals);
        } elseif(isset($_POST['decrypt'])) {
               $output = caesar_decipher($text,$key);
           }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Cezarjeva Šifra</title>
    </head>
    <body>
        <div class="container">
         
              
                
                <div class="col-xs-12 glavni">
                    <div class="row">
                        <h1>CEZARJEVA ŠIFRA</h1>
                    </div>
                    <div class="row">
                        <div class="kamen">
                            <p>Cezarjeva šifra je preprosta šifra pri kateri se vsaka črka prepiše v določeno drugo črko, glede na določen zamik. Tako se npr. pri zamiku tri a prepiše v č, b v d, c v e in tako naprej. Program podpira 25 črk slovenske abecede drugih znakov in črk ne šifrira.</p>
                        </div>
                    </div>
                    <div class="row">
                        
                        <form method="post">
                            <div class="form-group">
                                <textarea class="form-control" id="text-input" name="text"><?php echo htmlspecialchars($output); ?></textarea>
                                <input type="text" class="form-control key-input" placeholder="Vnesi zamik med 1 in 24" name="key">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="spaces">
                                        Ohrani presledke
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="capitals">
                                        Ohrani velike začetnice
                                    </label>
                                </div>
                                <input type="submit" class="form-control submit-button" value="ŠIFRIRAJ" name="encrypt">
                                <input type="submit" class="form-control submit-button" value="ODŠIFRIRAJ" name="decrypt">
                            </div>
                        </form>
                        
                    </div>
                </div>
                
                
                
   
        </div>
    </body>
</html>
