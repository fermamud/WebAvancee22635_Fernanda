<?php
RequirePage::model('CRUD');
RequirePage::model('Genre');
RequirePage::model('Artiste');
RequirePage::library('Validation');

class ControllerGenre extends Controller {
    
    public function index() {
        $genre = new Genre;
        $selectGenre = $genre->select('id_genre');

        return Twig::render('liste-genres.php', ['genres'=>$selectGenre]);
    }

    public function create() {
        return Twig::render('genre-create.php');
    }

    public function store() {  
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom_genre')->value($nom_genre)->max(20)->min(3);

        if(!$validation->isSuccess()) {
            $errors = $validation->displayErrors();

            // return Twig::render('genre-create.php', ['errors' => $errors, 'genre' => $_POST]);
            return Twig::render('genre-create.php', ['errors' => $errors]);
            exit();
        } else {
            $genre = new Genre;
            $insert = $genre->insert($_POST);
            RequirePage::url('genre');
        }
    }

    public function destroy($id) {
        $artiste = new Artiste;
        $selectArtiste = $artiste->select('id_usager');
        $suppressionAutorisee = true;

        foreach ($selectArtiste as $artiste) {
            echo $artiste['id_genre'];
            if ($id == $artiste['id_genre']) {
                $suppressionAutorisee = false;
                break;
            }
        }
        if ($suppressionAutorisee) {
            $genre = new Genre;
            $delete = $genre->delete($id);

            RequirePage::url('genre');
        } else {
            RequirePage::url('genre');
        }         
    }

}

?>