# Docker projet Ystudent

Cloner les répos pour le back et le front
    - git clone https://github.com/PFE-Ystudent/Ystudent-front.git
    - git clone https://github.com/PFE-Ystudent/Ystudent-back.git

Copier le fichier .env.example dans .env et mettre les chemins complets des dossiers des 2 projets clonés

## Information

Le projet contient un compose de 3 containers

    - Pour le front basé sur la techno Vuejs
    - Pour le back basé sur le framework Laravel
    - Pour la base de données faite avec MySQL

Nous n'avons pas encore de test mais nous pensons partir sur Playwright dans un container séparer
qui seras ensuite intégrer au job de build et éxecuter automatiquement lors d'une MR sur main