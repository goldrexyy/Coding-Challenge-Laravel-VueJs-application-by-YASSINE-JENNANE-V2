--
#TECH_CHALLENGE 
--

Une application simple qui permet d'ajouter des élements dans la base de donnée et de génerer une liste des élements enregistrés avec un infinite scroll. 
Après installation, le dossier migration vous permet d'installer la structure de la base de données 

Le projet utilise des dépendances, notamment :

 1-vue-filepond 
 
 2-filepond-plugin-file-validate-type
 
 3-filepond-plugin-image-preview
 
 4-vue-infinite-scroll
 
 5-aos
 

Commande line pour Ajouter 1000 Elements 
 php artisan AjouterElement:csv
 

Commande line pour Ajouter 100 Utilisateurs 
 php artisan AjouterUser:csv
