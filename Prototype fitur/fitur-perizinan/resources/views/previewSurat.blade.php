<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Preview Surat</h3>
    <pre><?php echo $fileContent ?></pre>
    <form action="<?php echo route('validate-surat-izin') ?>" method='POST'>
        @csrf
        <input type="hidden" name='id' value='<?php echo encrypt($id);?>'>
        <button type='submit' name='validateButton' value='tidak'>Tidak</button>
        <button type='submit' name='validateButton' value='ya'>ya</button>
    </form>
</body>
</html>