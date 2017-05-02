-- View: achatcommande

-- DROP VIEW achatcommande;

CREATE OR REPLACE VIEW achatcommande AS 
 SELECT ventedetails.idvente,
    ventedetails.nomutilisateur,
    ventedetails.nomclient,
    ventedetails.adresse,
    ventedetails.count AS nombrebillet,
    ventedetails.typebillet,
    packdetails.prixachat AS unitaire,
    ventedetails.statut,
    packdetails.prixachat * ventedetails.count::numeric AS nombre
   FROM ventedetails
     JOIN packdetails ON ventedetails.typebillet::numeric = packdetails.prixvente;

ALTER TABLE achatcommande
  OWNER TO postgres;


  -- View: achatdemande

-- DROP VIEW achatdemande;

CREATE OR REPLACE VIEW achatdemande AS 
 SELECT ventedetails.idvente,
    ventedetails.nomutilisateur,
    ventedetails.nomclient,
    ventedetails.adresse,
    ventedetails.count AS nombrebillet,
    ventedetails.typebillet AS unitaire,
    ventedetails.statut,
    packdetails.prixachat * ventedetails.count::numeric AS nombre
   FROM ventedetails
     JOIN packdetails ON ventedetails.typebillet::numeric = packdetails.prixvente;

ALTER TABLE achatdemande
  OWNER TO postgres;


-- View: etatvente

-- DROP VIEW etatvente;

CREATE OR REPLACE VIEW etatvente AS 
 SELECT achatcommande.idvente,
    achatcommande.nomutilisateur,
    achatcommande.nomclient,
    achatcommande.adresse,
    sum(achatcommande.nombrebillet) AS nombrebillet,
    achatcommande.statut,
    sum(achatcommande.nombre) AS valeur
   FROM achatcommande
  GROUP BY achatcommande.idvente, achatcommande.nomutilisateur, achatcommande.nomclient, achatcommande.adresse, achatcommande.statut;

ALTER TABLE etatvente
  OWNER TO postgres;


-- View: packdetails

-- DROP VIEW packdetails;

CREATE OR REPLACE VIEW packdetails AS 
 SELECT pack.idpack,
    pack.designation,
    pack.prix AS prixvente,
    count(packproduit.idpackproduit) AS nombreingredient,
    sum(produit.prix * packproduit.valeur::numeric / produit.valeur::numeric) AS prixachat
   FROM pack
     LEFT JOIN packproduit ON pack.idpack = packproduit.idpack
     JOIN produit ON produit.idproduit = packproduit.idproduit
  GROUP BY pack.idpack, pack.designation, pack.prix;

ALTER TABLE packdetails
  OWNER TO postgres;


-- View: payementstatus

-- DROP VIEW payementstatus;

CREATE OR REPLACE VIEW payementstatus AS 
 SELECT achatcommande.idvente,
    achatcommande.nomutilisateur,
    achatcommande.nomclient,
    achatcommande.adresse,
    achatcommande.nombrebillet,
    achatcommande.statut,
    achatcommande.nombre,
    COALESCE(( SELECT sum(payement.montant) AS sum
           FROM payement
          WHERE payement.typebillet = achatcommande.typebillet), 0::numeric) AS dejapaye
   FROM achatcommande;

ALTER TABLE payementstatus
  OWNER TO postgres;


-- View: statutetudiant

-- DROP VIEW statutetudiant;

CREATE OR REPLACE VIEW statutetudiant AS 
 SELECT utilisateur.idutilisateur,
    utilisateur.nom,
    utilisateur.code,
    utilisateur.statut,
    facturefille.valeur,
    count(utilisateur.idutilisateur) AS count
   FROM utilisateur
     LEFT JOIN vente ON utilisateur.idutilisateur = vente.idutilisateur
     JOIN facturefille ON vente.idvente = facturefille.idvente
  GROUP BY utilisateur.idutilisateur, utilisateur.nom, utilisateur.code, utilisateur.statut, facturefille.valeur;

ALTER TABLE statutetudiant
  OWNER TO postgres;


-- View: ventedetails

-- DROP VIEW ventedetails;

CREATE OR REPLACE VIEW ventedetails AS 
 SELECT vente.idvente,
    vente.idutilisateur,
    vente.idclient,
    vente.adresse,
    vente.statut,
    vente.date,
    client.nom AS nomclient,
    utilisateur.nom AS nomutilisateur,
    count(facturefille.idfacturefille) AS count,
    facturefille.valeur AS typebillet
   FROM vente
     LEFT JOIN utilisateur ON vente.idutilisateur = utilisateur.idutilisateur
     JOIN client ON client.idclient = vente.idclient
     JOIN facturefille ON facturefille.idvente = vente.idvente
  GROUP BY vente.idvente, vente.idutilisateur, vente.idclient, vente.adresse, vente.statut, vente.date, client.nom, utilisateur.nom, facturefille.valeur;

ALTER TABLE ventedetails
  OWNER TO postgres;
