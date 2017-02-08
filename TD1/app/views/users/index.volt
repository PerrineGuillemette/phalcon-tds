<table class="ui table">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        {%  for user in users %}
        <tr>
                <td>{{ user.getFirstName() }}</td>
                <td>{{ user.getLastname() }}</td>
                <td>{{ user.getEmail() }}</td>
                <td>{{ user.getRole().getName() }}</td>
        </tr>
        {% endfor %}
        </tbody>
</table>

<input type="submit" id="delete">