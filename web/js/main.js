$(document).ready(function () {

    $(".dateDuRelever").datetimepicker();
    $(".periodicite").datetimepicker();

    $('#b1').click(function () {
        $('h1').hide();
    });

    $('#b2').click(function () {
        $('h1').show();
    });

//    Rendre le menu actif
    $(function () {
        var href = window.location.href;
        $('#menu a').each(function (e, i) {
            if (href.indexOf($(this).attr('href')) >= 0) {
                $(this).addClass('active');
            }
        });
    });

//    Debut  arborescence
    $.fn.extend({
        treed: function (o) {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';

            if (typeof o != 'undefined') {
                if (typeof o.openedClass != 'undefined') {
                    openedClass = o.openedClass;
                }
                if (typeof o.closedClass != 'undefined') {
                    closedClass = o.closedClass;
                }
            }
            ;

            //initialize each of the top levels
            var tree = $(this);
            tree.addClass("tree");
            tree.find('li').has("ul").each(function () {
                var branch = $(this); //li with children ul
                branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                branch.addClass('branch');
                branch.on('click', function (e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        icon.toggleClass(openedClass + " " + closedClass);
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
            });
            //fire event from the dynamically added icon
            tree.find('.branch .indicator').each(function () {
                $(this).on('click', function () {
                    $(this).closest('li').click();
                });
            });
            //fire event to open branch if the li contains an anchor instead of text
//            tree.find('.branch>a').each(function () {
//                $(this).on('click', function (e) {
//                    $(this).closest('li').click();
//                    e.preventDefault();
//                });
//            });
            //fire event to open branch if the li contains a button instead of text
            tree.find('.branch>button').each(function () {
                $(this).on('click', function (e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
        }
    });

//Initialization of treeviews

    $('#tree1').treed();

//Fin css arborescence

//Rendre les Sous categories adaptable aux categories indicateur choisi
  var listSousCateg = {
        'Accessibilité': ['Prix', 'Défaut de présentation de carte grise', 'Proximité',
            'Stock',],
        'Sécurité': ['Intrant', 'Traçabilité', 'Dépendance', 'Conservation',
            ],
        'Qualité': ['Adapté', 'Conforme', 'Satisfaction'
        ],
        'Environnement': ['Intrant', 'Production', 'Déchet', 'Eau',
            'Sols', 'Biodiversité',
        ],
    };
    
     var $sousCategorie = $('#sousCategorie');
    $('#categories').change(function () {
        //$('#sousCategorie').show()();
        var categories = $(this).val(), lcns = listSousCateg[categories] || [];
        var html = $.map(lcns, function (lcn) {
            return '<option value="' + lcn + '">' + lcn + '</option>';
        }).join('');
        $sousCategorie.html(html);
        //alert($sousCategorie.html(html));
    });
    
    //FIN Rendre les Sous categories adaptable aux categories indicateue


});

