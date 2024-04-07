<?php 

class SecurityController {

    // Static a été ajouté 

    // Control if user is log 
    public static function isLog(){
        return (!empty($_SESSION)) ? true : false;
    }

    // Check data $_POST
    public static function checkData(){
        foreach($_POST as $key => $value){
            $valid = (isset($value) && !empty($value)) ? htmlspecialchars($value) : '';

            // if ($valid == null){
            //     throw new Exception("Veuillez remplir tous les champs en entrant des données valides. <br><br>");
            // }

            $tab[$key]=$valid;
        }
        
        return $tab;
    }

    // Check Slug 
    public static function checkSlug($slug){
        $searchChars = ['à', 'ä', 'ç', 'é', 'è', 'ë', 'ê', 'ï', 'î', 'ô', 'ù', 'û', '%20', ' / ', ' ', '\'', '^'];
        $replacedChars = ['a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'o', 'u', 'u', '-', '-', '-', '-', ''];

        $slugCharsReplaced = str_replace($searchChars, $replacedChars, $slug);
        
        $slugChecked = strtolower($slugCharsReplaced);
        return $slugChecked;
    }
    
    public static function checkImg(){
        
        if($_FILES['photo']['error']){
            switch($_FILES['photo']['error']){

                case 1 : //UPLOAD_ERR_OK
                    throw new Exception();
                    break;
                case 2 : //UPLOAD_ERR_INI_SIZE
                    throw new Exception();

                    break;
                case 3 : //UPLOAD_ERR_FORM_SIZE
                    throw new Exception();

                    break;
                // case 4 : // UPLOAD_ERR_PARTIAL
                //     throw new Exception('Absence de photo');

                //     break;
                case 5 : // UPLOAD_ERR_NO_FILE
                    throw new Exception();

                    break;
                case 6 : // UPLOAD_ERR_NO_TMP_DIR
                    throw new Exception();

                    break;
                case 7 : // UPLOAD_ERR_CANT_WRITE
                    throw new Exception();

                    break;
                case 8 : // UPLOAD_ERR_EXTENSION
                    throw new Exception();

            }
        } else {
            if((isset($_FILES['photo']['name'])) && ($_FILES['photo']['error'] == UPLOAD_ERR_OK)){ // ou == 0
                // $_SERVER['DOCUMENT_ROOT'] = localhost
                $chemin = PATH.'/Public/assets/img/photos/';
                move_uploaded_file($_FILES['photo']['tmp_name'], $chemin.$_FILES['photo']['name']);

                //Retourner true pour pouvoir le vardump
                return true;
            } else {
                throw new Exception("Le fichier n'a pas pu être copié dans le répertoire");
            }
        }
    }
}
