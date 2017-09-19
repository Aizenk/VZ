<?php
die;
$request = \VZ\Core\Application::instance()->getRequest();

if ($request->isMethod('POST')) {
    $file = $request->files->get('userfile');
    /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
    $file->move('01');

    $content = file('01/' . $file->getFilename());
    saveToDatabase($content);
}

function saveToDatabase($content)
{
    $user = 'root';
    $pass = '';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=ram', $user, $pass);

        foreach ($content as $row) {
            $dbh->exec("INSERT INTO `ram`.`texts` (`id`, `text`) VALUES (NULL, '{$row}');");
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

?>
<meta charset="utf-8">
<h2>ram project</h2>

<br>

<form enctype="multipart/form-data" action="index.php" method="POST">
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file"/>
    <input type="submit" value="Send File"/>
</form>