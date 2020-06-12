google.charts.load('current', {packages: ['corechart']});
google.charts.load('current', {'packages':['corechart'], 'language': 'fr'});

function ALERTJENAIPLEINLECUL() {
    alert("CACAHAHAHONSAMUSEMDR");
}

function drawNumericChart(survey_id, question_id){
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Individuals');
    data.addColumn('number', 'Answer value');

    data.addRows([

    ]);

    var options = {
        hAxis: {
            title: 'Nombred d\'individus',
            logScale: true
        },
        vAxis: {
            title: 'Réponse numérique',
            logScale: false
        },
    };

    var chart = new google.visualization.LineChart(document.getElementById('numericChart' + question_id));
    chart.draw(data, options);
}

window.onload = () => {

    T.init();

    var uri=window.location.search;
    var survey_id=uri.substring(uri.lastIndexOf("survey=")+7,uri.lastIndexOf("&"));

    if (window.location.search.includes("selected=-2")) {
        google.charts.setOnLoadCallback(drawAgeChart);
        google.charts.setOnLoadCallback(drawJobChart);
        google.charts.setOnLoadCallback(drawGenderChart);
        google.charts.setOnLoadCallback(drawCountryChart);

        function drawAgeChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tranche d\'âge');
            data.addColumn('number', 'Homme');
            data.addColumn('number', 'Femme');
            data.addColumn('number', 'Total');

            $.ajax({
                url : './php/survey/ajax_query.php',
                type : 'POST',
                data : 'query=dashboard_age_stats&survey_id=' + survey_id,
                dataType : 'json',
            })

            .done(function(response){

                data.addRows([
                    ['- de 20 ans', response.R0_19.male, response.R0_19.female, response.R0_19.male + response.R0_19.female],
                    ['20 à 30 ans', response.R20_29.male, response.R20_29.female, response.R20_29.male + response.R20_29.female],
                    ['30 à 40 ans', response.R30_39.male, response.R30_39.female, response.R30_39.male + response.R30_39.female],
                    ['40 à 50 ans', response.R40_49.male, response.R40_49.female, response.R40_49.male + response.R40_49.female],
                    ['50 à 60 ans', response.R50_59.male, response.R50_59.female, response.R50_59.male + response.R50_59.female],
                    ['60 à 70 ans', response.R60_69.male, response.R60_69.female, response.R60_69.male + response.R60_69.female],
                    ['70 à 80 ans', response.R70_79.male, response.R70_79.female, response.R70_79.male + response.R70_79.female],
                    ['+ de 80 ans', response.R80_p.male, response.R80_p.female, response.R80_p.male + response.R80_p.female],
                ]);

                var options = {
                    title: 'Tranches d\'âges selon le sexe',
                    legend: 'right',
                    vAxis: { title: 'Nombre d\'individus' }
                };

                barsVisualization = new google.visualization.ColumnChart(document.getElementById('AgeChart'));
                barsVisualization.draw(data, options);

                google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
                google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);

            })
            .fail(function(){
                alert("Erreur lors de la récupération des statistiques du formulaire.");
            });
        }

        function drawJobChart() {

            $.ajax({
                url : './php/survey/ajax_query.php',
                type : 'POST',
                data : 'query=dashboard_job_stats&survey_id=' + survey_id,
                dataType : 'json',
            })

            .done(function(response){

                var data = google.visualization.arrayToDataTable([
                    ['Situation professionnelle', 'Nombre d\'individus',],
                    ['Salarié', parseInt(response.employee)],
                    ['Sans emploi', parseInt(response.no_job)],
                    ['Indépendant', parseInt(response.freelance)],
                    ['Retraité', parseInt(response.retired)],
                    ['Étudiant', parseInt(response.student)]
                ]);

                var options = {
                    title: 'Répartition des individus par catégorie professionnelle',
                    chartArea: {width: '75%'},
                    hAxis: {
                        title: 'Nombre d\'individus',
                        minValue: 0
                    },
                    legend: 'none',
                    vAxis: {
                        title: 'Situation professionnelle'
                    }
                };

                var chart = new google.visualization.BarChart(document.getElementById('JobChart'));

                chart.draw(data, options);

            })
            .fail(function(){
                alert("Erreur lors de la récupération des statistiques du formulaire.");
            });


        }

        function drawGenderChart() {

            $.ajax({
                url : './php/survey/ajax_query.php',
                type : 'POST',
                data : 'query=dashboard_gender_stats&survey_id=' + survey_id,
                dataType : 'json',
            })

            .done(function(response){

                var data = google.visualization.arrayToDataTable([
                    ['Sexe', 'Nombre d\'individus'],
                    ['Homme', response.male],
                    ['Femme', response.female]
                ]);

                var options = {
                    title: 'Répartition par sexe',
                    legend: {'alignment':'center'},
                    titleTextStyle: {fontSize: 14, alignment:'center'}
                };

                var chart = new google.visualization.PieChart(document.getElementById('GenderChart'));

                chart.draw(data, options);

            })
            .fail(function(){
                alert("Erreur lors de la récupération des statistiques du formulaire.");
            });
        }

        function drawCountryChart() {

            $.ajax({
                url : './php/survey/ajax_query.php',
                type : 'POST',
                data : 'query=dashboard_countries_stats&survey_id=' + survey_id,
                dataType : 'json',
            })

            .done(function(response){

                var top0country, top1country, top2country, top3country, top4country;

                function decodeSpecialChars(html) {
                    var txt = document.createElement("textarea");
                    txt.innerHTML = html;
                    return txt.value;
                }

                top0country = decodeSpecialChars(response.top0country.name);
                top1country = decodeSpecialChars(response.top1country.name);
                top2country = decodeSpecialChars(response.top2country.name);
                top3country = decodeSpecialChars(response.top3country.name);
                top4country = decodeSpecialChars(response.top4country.name);

                var data = google.visualization.arrayToDataTable([
                    ['Pays', 'Pourcentage'],
                    [top0country, parseInt(response.top0country.individuals)],
                    [top1country, parseInt(response.top1country.individuals)],
                    [top2country, parseInt(response.top2country.individuals)],
                    [top3country, parseInt(response.top3country.individuals)],
                    [top4country, parseInt(response.top4country.individuals)],
                    [response.other_countries.name, parseInt(response.other_countries.individuals)]
                ]);

                var options = {
                    title: 'Pays majoritaires',
                    pieHole: 0.2,
                    legend: {'alignment':'center'},
                    titleTextStyle: {fontSize: 14, alignment:'center'}
                };

                var chart = new google.visualization.PieChart(document.getElementById('CountryChart'));
                chart.draw(data, options);

            })
            .fail(function(){
                alert("Erreur lors de la récupération des statistiques du formulaire.");
            });

        }

        function barMouseOver(e) {
            barsVisualization.setSelection([e]);
        }

        function barMouseOut(e) {
            barsVisualization.setSelection([{'row': null, 'column': null}]);
        }



    }
};
