<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //1. Save the data to default.json file:
    if (isset($_POST['data']) && !empty($_POST['data'])) {
        //1. Save the data to default.json file:
        $draftLocation = './data/drafts/default.json';
        $myfile = fopen($draftLocation, "w") or die("Unable to open file!");
        $txt = json_encode(array('blocks' => json_decode($_POST['data'], true)), JSON_UNESCAPED_SLASHES);
        fwrite($myfile, $txt);
        fclose($myfile);
        //2. Save the data to a new temporary file:
        $draftLocationTemp = './data/temp/'.time().'.json';
        $myfileTemp = fopen($draftLocationTemp, "w") or die("Unable to open file!");
        fwrite($myfileTemp, $txt);
        fclose($myfileTemp);
    }
    //2. Save the data to a custom file:
    if (isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['filename']) && !empty($_POST['filename'])) {
        $documentLocation = './data/documents/'.$_POST['filename'];
        $myDocumentFile = fopen($documentLocation, "w") or die("Unable to open file!");
        fwrite($myDocumentFile, $_POST['data']);
        fclose($myDocumentFile);
    }
    //3. Reset the default.json file:
    if (isset($_POST['reset']) && !empty($_POST['reset'])) {
        unlink('./data/drafts/default.json');
    }
    //4. Reset the temp directory:
    if (isset($_POST['resetTemp']) && !empty($_POST['resetTemp'])) {
        deleteFilesInDirectory('./data/temp');
    }
}

function deleteFilesInDirectory($dir) {
    if (!file_exists($dir) || !is_dir($dir)) {
        return false;
    }

    $items = array_diff(scandir($dir), array('.', '..'));

    foreach ($items as $item) {
        $path = $dir . DIRECTORY_SEPARATOR . $item;

        if (is_file($path)) {
            unlink($path);
        }
    }

    return true;
}

?>