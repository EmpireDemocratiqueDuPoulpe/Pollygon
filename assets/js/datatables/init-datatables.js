var table;

var T = {
    table: undefined,
    settings: {
        dom: '<"top"fl>rt<"bottom"ip><"clear">',
        autoWidth: false,
        paging: true,
        pagingType: "simple_numbers",
        pageLength: 25,
        lengthMenu: [[1, 25, 50, -1], [1, 25, 50, "tous les"]],
        searching: true,
        search: {regex: true, smart: true},
        order: [[0, "asc"]],
        columnDefs: [
            {targets: "_all", defaultContent: ""},
            {targets: "no-search", searchable: false},
            {targets: "no-display", visible: false},
            {targets: "no-order", orderable: false}
        ],
        buttons: [
            {text: "Copier", titleAttr: "Copier dans le presse-papier", extend: "copyHtml5",
            
                exportOptions: {
                    columns: "th:not(.no-export)",
                    modifier: {page: "current"},
                    format: {header: function (idx, html, node) {return $("input", node).attr("placeholder");}}
                }
            },
            {text: "Excel", titleAttr: "Convertir en XLSX", extend: "excelHtml5",

                exportOptions: {
                    columns: "th:not(.no-export)",
                    modifier: {page: "current"},
                    format: {header: function (idx, html, node) {return $("input", node).attr("placeholder");}}
                }
            },
            {text: "PDF", titleAttr: "Convertir en PDF", extend: "pdfHtml5", orientation: "landscape", pageSize: "LEGAL",

                exportOptions: {
                    columns: "th:not(.no-export)",
                    modifier: {page: "current"},
                    format: {header: function (idx, html, node) {return $("input", node).attr("placeholder");}}
                }
            },
            {text: "CSV", titleAttr: "Convertir en CSV", extend: "csvHtml5", charset: "utf-8", bom: true,

                exportOptions: {
                    columns: "th:not(.no-export)",
                    modifier: {page: "current"},
                    format: {header: function (idx, html, node) {return $("input", node).attr("placeholder");}}
                },
            },
            {text: "Imprimer", titleAttr: "Imprimer toute la table", extend: "print",

                exportOptions: {
                    columns: "th:not(.no-print)",
                    modifier: {page: "current"},
                    format: {header: function (idx, html, node) {return $("input", node).attr("placeholder");}}
                },

                customize: function(win) {

                    $(win.document.body).css({
                        "max-width": "97vw",
                        "width": "100%",
                        "padding": "20px"
                    });

                    $(win.document.body).find("h1").css({
                        "font-size": "1rem",
                        "margin": "0"
                    });
        
                    $(win.document.body).find("table").css({
                        "font-size": "0.8rem",
                        "margin": "0 auto",
                        "border-collapse": "collapse"
                    });
                    
                    $(win.document.body).find("table tbody tr td").css({
                        "border": "1px #000000 solid"
                    });
        
                    $(win.document.body).find("table tbody tr td:first-child").css({
                        "background": "#3A3A3A",
                        "color": "#FDFFFC"
                    });
                }
            }
        ],
        language: {
            decimal: "",
            sEmptyTable: "Aucune donn&eacute;e disponible dans le tableau.",
            sInfo: "Affichage des &eacute;l&eacute;ments _START_ &agrave; _END_ sur _TOTAL_.",
            sInfoEmpty: "Affichage des &eacute;l&eacute;ments 0 &agrave; 0 sur 0.",
            sInfoFiltered: "(_TOTAL_/_MAX_ &eacute;l&eacute;ments affich&eacute;s)",
            sInfoPostFix: "",
            sProcessing: "Traitement en cours...",
            sLoadingRecords: "Chargement en cours...",
            sSearch: "",
            sSearchPlaceholder: "Rechercher dans toutes les colonnes:",
            sZeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher.",
            sLengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments.",
            oPaginate: {
                sFirst: "Premier",
                sPrevious: '<i class="fas fa-chevron-left"></i>' ,
                sNext: '<i class="fas fa-chevron-right"></i>',
                sLast: "Dernier"
            },
            oAria: {
                sSortAscending: ": activer pour trier la colonne par ordre croissant.",
                sSortDescending: ": activer pour trier la colonne par ordre d&eacute;croissant."
            },
            select: {
                    rows: {
                        _: "%d lignes séléctionnées.",
                        0: "Aucune ligne séléctionnée.",
                        1: "Une ligne séléctionnée."
                    } 
            },
            buttons: {
                copy: "Copier",
                copyTitle: "Ajout&eacute; au presse-papier.",
                copySuccess: {
                    1: "Copie d'une ligne dans le presse-papier.",
                    _: "Copie de %d lignes dans le presse-papier."
                },
                copyKeys: "Appuyez sur <strong>Ctrl + C</strong> pour copier la table<br />dans le presse-papier.<br /><br />Pour annuler, cliquez sur ce message ou appuyez sur <strong>Echap</strong>."
            }
        },
        destroy: true
    },

    init: function() {

        // Init
        this.table = $("table");
        table = this.table.DataTable(this.settings);

        // Remove class
        this.table.removeClass("not-loaded");

        // Add inputs
        table.columns().every(function() {

            const column = this;
            const title = column.header().firstChild.data;

            $(column.header()).empty().append('<input type="text" placeholder="'+title+'" value="">');
        });

        // Events
        this.events();
    },

    events: function() {
        T.searchBars.events();
    },

    searchBars: {

        searchInAllColumn: function() {

            table.search(this.value).draw();
        },

        search: function(input) {

            var th = $(input).closest("th"),
                thIndex = th.index(),
                index = table.column.index("toData", thIndex);

            // Recherche dans la colonne si la classe ".redirect-search" n'est pas là.
            if (!th.hasClass("redirect-search")) table.column(index).search(input.value, T.settings.search.regex, T.settings.search.smart).draw();
            // Sinon, recherche dans la colonne suivante.
            else table.column(index + 1).search(input.value, T.settings.search.regex, T.settings.search.smart).draw();
        },

        searchWithAllColumns: function() {

            T.table.find("thead input[type=text]").each(function(index, input) {

                T.searchBars.search(input);
            });
        },

        events: function() {

            table.columns().every(function() {
                var column = this;

                $("input", column.header()).on("keyup change", function() {T.searchBars.search(this);});
                $("input", column.header()).click(function(event) {console.log("fjdksj"); event.stopPropagation();});
            });
        }
    }
}

window.onload = () => {
    T.init();
}

