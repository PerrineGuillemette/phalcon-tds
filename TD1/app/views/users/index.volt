
<div class="ui left icon input">
    <a class="ui basic button" href="{{url('users/formAjout')}}">Nouvel Utilisateur</a>
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
        {% for user in users %}
        <tr>

            <td>{{ user.getFirstname() }}</td>
            <td>{{ user.lastname }}</td>
            <td>{{ user.login }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.getRole().getName() }}</td>
            <td>  {{link_to("users/form/"~user.getId(), "<i class='edit icon'") }}</td>
            <td>{{ link_to("users/delete/"~user.getId(), "<i class='bordered red remove icon'") }}</td>
            {% endfor %}

        </tr>
    </table>
</div>