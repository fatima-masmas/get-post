<?php
function create_post($username, $content) {
    $folder_path = './/posts/'; // Pfad zum Ordner mit den Beiträgen
    $id = uniqid(); // Generieren Sie eine eindeutige ID für den Beitrag
    $file_name = $id . '.txt'; // Dateiname: ID + .txt
    $file_path = $folder_path . $file_name; // Vollständiger Pfad zur neuen Datei

    // Öffnen Sie die neue Datei im Schreibmodus
    $file = fopen($file_path, 'w');

    // Schreiben Sie die Daten (Titel, Inhalt und Datum) in die Datei
    $date = date('Y-m-d H:i:s');
    $data = array(
        'id' => $id,
        'username' => $username,
        'content' => $content,
        'date' => $date
    );
    fwrite($file, json_encode($data)); // Konvertieren Sie das Array in JSON und schreiben Sie es in die Datei

    // Schließen Sie die Datei
    fclose($file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['username'];
    $content = $_POST['content'];
    $filename = time() . '.txt'; // Verwenden Sie die aktuelle Zeit als Dateinamen

    $data = [
        'username' => $username,
        'content' => $content,
        'date' => date('Y-m-d H:i:s'), // Aktuelles Datum und Uhrzeit
    ];

    $json_data = json_encode($data); // Konvertieren Sie das Array in JSON-Format

    file_put_contents($filename, $json_data); // Schreiben Sie die Daten in die Datei


    function get_all_posts() {
        $files = glob('*.txt'); // alle .txt-Dateien im aktuellen Verzeichnis abrufen
        $posts = [];
    
        foreach ($files as $file) {
            $json_data = file_get_contents($file); // JSON-Daten aus der Datei lesen
            $data = json_decode($json_data, true); // Konvertieren Sie die JSON-Daten in ein Array
    
            // Fügen Sie die Dateiinformationen (Dateiname) zum Datenarray hinzu
            $data['id'] = $file;
            $posts[] = $data;
        }
    
        return $posts;
    }

    
    
    
}
?>