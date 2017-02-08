<table>
        <thead></thead>
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