$(document).ready(function(){
    
var myProdduit = [
    {
      text: "Produits",
      nodes: [
        {
          text: "Produits végétaux",
          nodes: [
            {
              text: "Céréales"
            },
            {
              text: "Fruits"
            },
            {
              text: "Légumes"
            },
            {
              text: "horticoles"
            }
          ]
        },
        {
          text: "Produits animaux",
          nodes: [
            {
              text: "Vivants"
            },
            {
              text: "Laitiers"
            },
            {
              text: "Carnés"
            },
            {
              text: "Dérivés des peaux"
            }
          ]
        },
        {
          text: "Produits de la mer",
          nodes: [
            {
              text: "Poissons"
            },
            {
              text: "Fruits de Mer"
            },
            {
              text: "Algues"
            }
            
          ]
        },
        {
          text: "Produits miniers",
          nodes: [
            {
              text: "Minerais"
            },
            {
              text: "Ciments"
            },
            {
              text: "Béton"
            }
            
          ]
        },
        {
          text: "Produits manufacturés",
          nodes: [
            {
              text: "Alimentaires"
            },
            {
              text: "Electroménagers"
            },
            {
              text: "Textiles"
            },
            {
              text: "Construction immobilière"
            },
            {
              text: "Télécommunication"
            },
            {
              text: "Informatiques"
            },
            {
              text: "Textiles"
            },
            {
              text: "automobiles"
            },
            {
              text: "Equipement industriel"
            },
            {
              text: "Burautiques"
            }
            
          ]
        },
        {
          text: "Produits d’art & artisanat",
          nodes: [
            {
              text: "Couture"
            },
            {
              text: "Cordonnerie"
            },
            {
              text: "Tissage"
            },
            {
              text: "Teinture"
            },
            {
              text: "Poterie"
            },
            {
              text: "Céramique"
            },
            {
              text: "Ferronnerie"
            }
          ]
        },
        {
          text: "Produits culturels",
          nodes: [
            {
              text: "Livres"
            },
            {
              text: "Musique"
            },
            {
              text: "Cinéma"
            },
            {
              text: "Télévision"
            },
            {
              text: "Radio"
            },
            {
              text: "Presse"
            }
          ]
        },
        {
          text: "Produits énergétiques",
          nodes: [
            {
              text: "Hydrocarbures"
            },
            {
              text: "Charbon de bois"
            }
          ]
        }
      ]
    }
];

var mySerive = [
    {
      text: "Serviices",
      nodes: [
        {
          text: "Services de Santé",
          nodes: [
            {
              text: "Hôpitaux"
            },
            {
              text: "Centres de Santé"
            },
            {
              text: "Cliniques"
            },
            {
              text: "Cabinets privés"
            }
          ]
        },
        {
          text: "Services d’Education",
          nodes: [
            {
              text: "Universités"
            },
            {
              text: "Instituts et Ecoles Supérieurs"
            },
            {
              text: "Enseignement Secondaire"
            },
            {
              text: "Enseignement Primaire"
            },
            {
              text: "Structures maternelles"
            }
          ]
        },
        {
          text: "Services de Formation",
          nodes: [
            {
              text: "Formation professionnelle"
            },
            {
              text: "Formation continue"
            }
          ]
        },
        {
          text: "Services de Transport",
          nodes: [
            {
              text: "Terrestre"
            },
            {
              text: "Maritime"
            },
            {
              text: "Aérien"
            }
            
          ]
        },
        {
          text: "Services Eaux & Assainissement",
          nodes: [
            {
              text: "Eau courante"
            },
            {
              text: "Eaux à l’égout"
            },
            {
              text: "Voirie"
            }
            
          ]
        },
        {
          text: "Services Energétiques",
          nodes: [
            {
              text: "Electricité"
            },
            {
              text: "Energies durables"
            }
          ]
        },
        {
          text: "Services de Sécurité",
          nodes: [
            {
              text: "Assurance"
            },
            {
              text: "Conseil juridique"
            },
            {
              text: "Gardiennage"
            },
            {
              text: "Surveillance électronique"
            },
            {
              text: "Protection rapprochée"
            }
          ]
        },
        {
          text: "Services Financiers",
          nodes: [
            {
              text: "Hydrocarbures"
            },
            {
              text: "Structures de Microfinance"
            },
            {
              text: "Assurances"
            },
            {
              text: "Mutuelles"
            },
            {
              text: "Transferts d’argent"
            },
            {
              text: "Change"
            }
          ]
        },
        {
          text: "Services de Communication",
          nodes: [
            {
              text: "Publicité & Promotion"
            },
            {
              text: "Annonces"
            },
            {
              text: "Evénementielle"
            }
          ]
        },
        {
          text: "Services d’Hébergement",
          nodes: [
            {
              text: "Hôtellerie"
            },
            {
              text: "Auberges"
            },
            {
              text: "Résidences"
            }
          ]
        },
        {
          text: "Services de Restauration",
          nodes: [
            {
              text: "Industriels"
            },
            {
              text: "Entreprises"
            },
            {
              text: "Hôtels"
            },
            {
              text: "Restaurants"
            },
            {
              text: "Traiteurs"
            },
            {
              text: "Artisans"
            }
          ]
        },
        {
          text: "Services Immobiliers",
          nodes: [
            {
              text: "Achat"
            },
            {
              text: "Location"
            },
            {
              text: "Vente"
            }
          ]
        },
        {
          text: "Services de télécommunication",
          nodes: [
            {
              text: "Fixe"
            },
            {
              text: "Mobile"
            }
          ]
        },
        {
          text: "Services juridiques",
          nodes: [
            {
              text: "Notaires"
            },
            {
              text: "Avocats"
            },
            {
              text: "Huissiers"
            }
          ]
        }
      ]
    }
];
   $('#tree-produit').treeview({data: myProdduit});
   $('#tree-service').treeview({data: mySerive});

});



