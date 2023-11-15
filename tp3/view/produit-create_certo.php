{{ include('header.php') }}
<main>
    <h1>Inserez les Informations de Votre Produit</h1>
    <form action="{{path}}produit/store" method="post">
        <span class="error">{{ errors | raw }}</span>
        <label>Type
            <select name="type">
                <option value="Collier">Collier</option>
                <option value="Boucle">Boucle d'oreille</option>
            </select>
        </label>
        <label>Description
            <input type="text" name="description">
        </label>
        <label>Prix
            <input type="number" name="prix">
        </label>
        <label>Material
        <select name="id_material" >
                {% for material in materials %}
                    <option value="{{ material.id_material}}">{{ material.description }}</option>
                {% endfor %}
            </select>
        </label>
        <label>Collaborateur
            <select name="id_usager" >
                {% for artiste in usagers %}
                <option value="{{ artiste.id_usager }}"> {{ artiste.prenom }} {{ artiste.nom }}</option>
                {% endfor %}
            </select>
        </label>
        <input type="submit" value="save">
    </form>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>


</main>
{{ include('footer.php') }}