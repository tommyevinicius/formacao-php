<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 01/11/17
 * Time: 08:20
 */

require __DIR__ . '/../../layout/header.php';

$people = selectPeople($conn);

function selectPeople ($conn) {
    $sql = ' SELECT * FROM people; ';
    $select = $conn->prepare($sql);
    $select->execute();

    if (!$select->rowCount()) {
        return [];
    }

    return $select->fetchAll(PDO::FETCH_OBJ);
}

?>

<h1>People</h1>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead style="background-color: #85898d">
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 15%">Name</th>
            <th style="width: 15%">Lastname</th>
            <th style="width: 20%; text-align: center">Phone</th>
            <th style="width: 20%; text-align: center">Email</th>
            <th style="width: 15%; text-align: center">CPF</th>
            <th style="width: 10%; text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (empty($people)) : ?>
            <tr>
                <td colspan="4" style="text-align: center;" class="table-bordered">Empty</td>
            </tr>
        <?php else :
            foreach ($people as $person) : ?>
                <tr>
                    <td style="text-align: center;"><?=$person->ID_PEOPLE?></td>
                    <td><?=$person->NAME?></td>
                    <td><?=$person->LASTNAME?></td>
                    <td style="text-align: center;"><?=$person->PHONE?></td>
                    <td style="text-align: center;"><?=$person->EMAIL?></td>
                    <td style="text-align: center;"><?=$person->CPF?></td>
                    <td style="text-align: center">
                        <a class="btn btn-default" disabled="" onclick="return false" role="button" href="/aplicacao/people/people.php"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a class="btn btn-default" disabled="" onclick="return false" role="button" href="#"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; endif;?>
        </tbody>
        <tfoot">
        <tr style="background-color: #b3b3b3; font-weight: bold;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tfoot>
    </table>
</div>