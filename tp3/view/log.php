{{ include('header.php') }}
<main>
    {% for log in logs %}
    <p>Id : {{ log.id }}</p>
    <p>Adresse Ip : {{ log.adresse_ip }}</p>
    <p>Date : {{ log.date }}</p>
    <p>Nom : {{ log.nom }}</p>
    <p>Page : {{ log.page }}</p>
    <p>Usager privilege : {{ log.usager }}</p>
    <br>
    <br>
    {% endfor %}
</main>
{{ include('footer.php') }}