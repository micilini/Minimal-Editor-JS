<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data']) && !empty($_POST['data'])) {
        $draftLocation = './drafts/default.json';
        $myfile = fopen($draftLocation, "w") or die("Unable to open file!");
        $txt = json_encode(array('blocks' => $_POST['data']['blocks']));
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    if (isset($_POST['reset']) && !empty($_POST['reset'])) {
        unlink('./drafts/default.json');
    }
}

?>