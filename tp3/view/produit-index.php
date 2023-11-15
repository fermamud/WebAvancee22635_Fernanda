{{ include('header.php') }}
<main>
    {% if error_message is defined %}
        <div class="alert">
            {{ error_message }}
        </div>
    {% endif %}
    <h1>Fait main, avec amour</h1>
    <div>
    {% for produit in produits %}
        <section>
            <img src="{{path}}assets/img/{{ produit.id_produit }}.jpeg" alt="image_collier">
            <div class="produit">
                <p>Type : {{ produit.type }}</p>
                <p>Description : {{ produit.description }}</p>
                <p>Material :
                    {% for material in materials %}
                        {% if material.id_material == produit.id_material %}
                            {{ material.description }}
                        {% endif %}    
                    {% endfor %}
                </p>
                <p>Prix : {{ produit.prix }} CAD</p>
                <p>Artiste :
                    {% for artiste in usagers %}
                        {% if artiste.id_usager == produit.id_usager %}
                            {{ artiste.prenom }} {{ artiste.nom }}
                        {% endif %}     
                    {% endfor %}
                </p>
                <a href="{{path}}produit/edit/{{ produit.id_produit }}">Modifier les informations</a> | 
                <a href="{{path}}produit/destroy/{{ produit.id_produit }}">Supprimer produit</a>
            </div>
        </section>
    {% endfor %}
    </div>
    <br>
    <a href="{{path}}produit/create">Insérer un nouveau produit</a>
</main>
{{ include('footer.php') }}