<?php
$draftLocation = './data/drafts/default.json';
$content = '';

if (file_exists($draftLocation)) {
    $jsonData = file_get_contents($draftLocation);
    $content = $jsonData;
}else{
    echo 'Conteúdo não encontrado...';
    exit(0);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Preview - Minimal Editor.JS</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
  <link href="./public/assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="./public/assets/json-preview.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body>

  <div class="" style="width:100%; height:52px;">
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./public/assets/logo-editor-js.svg" alt="" width="30" height="24"
            class="d-inline-block align-text-top">
          <span>Minimal Editor.JS (Preview)
        </a>
        <div class="d-flex">
          <button style="margin-right:20px;" class="btn btn-primary" id="copyToClipboard">Copy to Clipboard</button>
        </div>
      </div>
    </nav>
  </div>

  <div class="content-draft" style="width:100%; height: calc(100vh - 52px); overflow:auto; padding:20px;; font-size:16px;"><?php echo $content; ?></div>

</body>
<script>
        document.getElementById('copyToClipboard').addEventListener('click', function() {
            const contentDiv = document.querySelector('.content-draft');
            const textToCopy = contentDiv.textContent || contentDiv.innerText;

            const textarea = document.createElement('textarea');
            textarea.value = textToCopy;
            document.body.appendChild(textarea);

            textarea.select();
            document.execCommand('copy');

            document.body.removeChild(textarea);

            alert('Content copied to clipboard!');
        });
</script>
</html>