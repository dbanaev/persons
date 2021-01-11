<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заголовок "Список персон максимального возраста <?=$maxAge ?>"</title>
</head>
<body>
    <h1>Заголовок "Список персон максимального возраста <?=$maxAge ?>"</h1>

    <?php if ($persons): ?>
        <table border="1">
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Возраст</th>
            </tr>
            <?php foreach($persons as $person): ?>
                <tr>
                    <td><?=$person->lastname ?></td>
                    <td><?=$person->firstname ?></td>
                    <td><?=$person->age ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>