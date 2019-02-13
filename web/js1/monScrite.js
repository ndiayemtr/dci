$(document).ready(function(){

    var listNomProduit = {
        'Produits végétaux': ['Céréales', 'Fruits', 'Légumes', 'Produits horticoles'],
        'Produits animaux': ['vivants', 'laitiers', 'carnés', 'dérivés des peaux'],
        'Produits de la mer': ['Poissons', 'Fruits de Mer', 'Algues'],
        'Produits miniers': ['Minerais', 'Ciments', 'Béton'],
        'Produits énergétiques': ['Hydrocarbures', 'Charbon de bois'],
        'Produits manufacturés': ['alimentaires', 'électroménagers','textiles','construction immobilière', 'télécommunication','informatiques', 'bureautiques', 'automobiles', 'équipement industriel'],
        'Produits d’art & artisanat': ['Couture', 'Cordonnerie', 'Tissage', 'Teinture', 'Poterie', 'Céramique', 'Ferronnerie'],
        'Produits culturels': ['Livres', 'Musique', 'Cinéma', 'Télévision', 'Radio', 'Presse'],
    };

    var $nomProduit = $('#nomProduit');
    $('#categorieProduit').change(function () {
        
        var categorieProduit = $(this).val(), lcns = listNomProduit[categorieProduit] || [];
        var html = $.map(lcns, function (lcn) {
            return '<option value="' + lcn + '">' + lcn + '</option>';
        }).join('');
        $nomProduit.html(html);
    });
    
    $('#categorieProduit').mousedown(function (){
        $('#cacheNomProduit').show()();
    });
   
   $('#navbar li > a').each(function () {
    if (window.location.pathname.indexOf($(this).attr('href')) > -1) {
            $('li').removeClass('active')
            $(this).closest('li').addClass('active');
            return false;
        }
});
});





