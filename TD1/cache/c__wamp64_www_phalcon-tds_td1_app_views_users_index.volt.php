
<div class="ui left icon input">
    <a class="ui basic button" href="<?= $this->url->get('users/formAjout') ?>">Nouvel Utilisateur</a>
</div>
<div class="ui list">


    <table class="ui seven column table segment">

        <tr>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Login</td>
            <td>Email</td>
            <td>Role</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>

        <br>
        <?php foreach ($users as $user) { ?>
        <tr>

            <td><?= $user->getFirstname() ?></td>
            <td><?= $user->lastname ?></td>
            <td><?= $user->login ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->getRole()->getName() ?></td>
            <td>  <?= $this->tag->linkTo(['users/form/' . $user->getId(), '<i class=\'edit icon\'']) ?></td>
            <td><?= $this->tag->linkTo(['users/delete/' . $user->getId(), '<i class=\'bordered red remove icon\'']) ?></td>
            <?php } ?>

        </tr>
    </table>
</div>