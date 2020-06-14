<?php

require_once "../../init.php";
$QuestionManager = new Question($db);

if(isset($_POST["query"])){
    if($_POST["query"] == "dashboard_age_stats"){

        $survey_id = $_POST["survey_id"];

        $dash_age_stats = [
          "R0_19" => ["male" => 0, "female" => 0],
          "R20_29" => ["male" => 0, "female" => 0],
          "R30_39" => ["male" => 0, "female" => 0],
          "R40_49" => ["male" => 0, "female" => 0],
          "R50_59" => ["male" => 0, "female" => 0],
          "R60_69" => ["male" => 0, "female" => 0],
          "R70_79" => ["male" => 0, "female" => 0],
          "R80_p" => ["male" => 0, "female" => 0],
        ];

        $dashboard_stats = PDOFactory::sendQuery(
            $db,
            'SELECT birthdate, gender FROM users WHERE user_id IN (
                        SELECT owner_id FROM answers WHERE survey_id = :survey_id)',
            ["survey_id" => $survey_id]
        );

        foreach ($dashboard_stats as $individual){
            $gender = $individual["gender"];
            $date_now = new DateTime("now");
            $date_birthday = new DateTime($individual["birthdate"]);
            $user_age = date_diff($date_now, $date_birthday)->format("%Y");
            if($user_age <= 19){
                if($gender == "Homme"){$dash_age_stats["R0_19"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R0_19"]["female"]++;}
            }else if($user_age >= 20 and $user_age <= 29){
                if($gender == "Homme"){$dash_age_stats["R20_29"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R20_29"]["female"]++;}
            }else if($user_age >= 30 and $user_age <= 39){
                if($gender == "Homme"){$dash_age_stats["R30_39"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R30_39"]["female"]++;}
            }else if($user_age >= 40 and $user_age <= 49){
                if($gender == "Homme"){$dash_age_stats["R40_49"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R40_49"]["female"]++;}
            }else if($user_age >= 50 and $user_age <= 59){
                if($gender == "Homme"){$dash_age_stats["R50_59"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R50_59"]["female"]++;}
            }else if($user_age >= 60 and $user_age <= 69){
                if($gender == "Homme"){$dash_age_stats["R60_69"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R60_69"]["female"]++;}
            }else if($user_age >= 70 and $user_age <= 79){
                if($gender == "Homme"){$dash_age_stats["R70_79"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R70_79"]["female"]++;}
            }else if($user_age >= 80){
                if($gender == "Homme"){$dash_age_stats["R80_p"]["male"]++;}
                else if($gender == "Femme"){$dash_age_stats["R80_p"]["female"]++;}
            }
        }

        echo json_encode($dash_age_stats);

    }
    if($_POST["query"] == "dashboard_job_stats"){

        $survey_id = $_POST["survey_id"];

        $dash_job_stats = ["student" => 0, "retired" => 0, "freelance" => 0, "no_job" => 0, "employee" => 0];

        $dashboard_stats = PDOFactory::sendQuery(
            $db,
            'SELECT job FROM users WHERE user_id IN (
                        SELECT owner_id FROM answers WHERE survey_id = :survey_id)',
            ["survey_id" => $survey_id]
        );

        foreach ($dashboard_stats as $individual){
            $job_category = $individual["job"];

            if($job_category == "Étudiant"){
                $dash_job_stats["student"]++;
            }else if($job_category == "Retraité"){
                $dash_job_stats["retired"]++;
            }else if($job_category == "Indépendant"){
                $dash_job_stats["freelance"]++;
            }else if($job_category == "Sans emploi"){
                $dash_job_stats["no_job"]++;
            }else if($job_category == "Salarié"){
                $dash_job_stats["employee"]++;
            }
        }

        echo json_encode($dash_job_stats);

    }
    if($_POST["query"] == "dashboard_gender_stats"){

        $survey_id = $_POST["survey_id"];

        $dash_gender_stats = ["male" => 0, "female" => 0];

        $dashboard_stats = PDOFactory::sendQuery(
            $db,
            'SELECT gender FROM users WHERE user_id IN (
                        SELECT owner_id FROM answers WHERE survey_id = :survey_id)',
            ["survey_id" => $survey_id]
        );

        foreach ($dashboard_stats as $individual){
            $gender = $individual["gender"];

            if($gender == "Homme"){
                $dash_gender_stats["male"]++;
            }else if($gender == "Femme"){
                $dash_gender_stats["female"]++;
            }
        }

        echo json_encode($dash_gender_stats);

    }
    if($_POST["query"] == "dashboard_countries_stats"){

        $survey_id = $_POST["survey_id"];

        $dash_countries_stats = [
            "top0country" => ["name" => "NULL", "individuals" => 0],
            "top1country" => ["name" => "NULL", "individuals" => 0],
            "top2country" => ["name" => "NULL", "individuals" => 0],
            "top3country" => ["name" => "NULL", "individuals" => 0],
            "top4country" => ["name" => "NULL", "individuals" => 0],
            "other_countries" => ["name" => "Reste du monde", "individuals" => 0]
        ];

        $dashboard_stats = PDOFactory::sendQuery(
            $db,
            'SELECT country, COUNT(*) AS count FROM users WHERE user_id IN (
                    SELECT owner_id FROM answers WHERE survey_id = :survey_id)
                  GROUP BY country ORDER BY count DESC;',
            ["survey_id" => $survey_id]
        );

        $total_count = 0;
        foreach ($dashboard_stats as $country){
            $total_count += $country["count"];
        }

        $dash_countries_stats["other_countries"]["individuals"] = $total_count;

        $top5countries = array_slice($dashboard_stats, 0, 5);

        foreach ($top5countries as $key => $top_country){

            $dash_countries_stats["top".$key."country"]["name"] = $QuestionManager->getCountryFromCode($top_country["country"]);
            $dash_countries_stats["top".$key."country"]["individuals"] = $top_country["count"];
            $dash_countries_stats["other_countries"]["individuals"] -= $dash_countries_stats["top".$key."country"]["individuals"];
        }

        echo json_encode($dash_countries_stats);

    }
    if($_POST["query"] == "numeric_stats"){

        $survey_id = $_POST["survey_id"];
        $question_id = $_POST["question_id"];

        $numeric_array_stats = [];

        $numeric_stats = PDOFactory::sendQuery(
            $db,
            'SELECT value, COUNT(*) AS count FROM answers WHERE question_id=:question_id AND survey_id=:survey_id
                  GROUP BY value ORDER BY count DESC;',
            ["survey_id" => $survey_id,
             "question_id" => $question_id]
        );

        foreach ($numeric_stats as $stats){
            array_push($numeric_array_stats, array($stats["value"], $stats["count"]));
        }

        echo json_encode($numeric_array_stats);



    }
    if($_POST["query"] == "qcmoru_stats"){

        $survey_id = $_POST["survey_id"];
        $question_id = $_POST["question_id"];

        $qcm_array_stats = [];
        $qcm_array_choices = [];

        $choice_number = 0;

        $qcm_choices = PDOFactory::sendQuery(
            $db,
            'SELECT title FROM choices WHERE question_id=:question_id;',
            ["question_id" => $question_id]
        );

        foreach ($qcm_choices as $choice){
            array_push($qcm_array_choices, $choice["title"]);
            array_push($qcm_array_stats, [$choice_number => ["choice" => $choice["title"], "individuals" => 0]]);
            $choice_number++;
        }

        $qcm_stats = PDOFactory::sendQuery(
            $db,
            'SELECT value FROM answers WHERE question_id=:question_id AND survey_id=:survey_id;',
            ["survey_id" => $survey_id,
             "question_id" => $question_id]
        );

        foreach ($qcm_stats as $answer){
            foreach ($qcm_array_choices as $choice){
                if (strpos($answer["value"], $choice) !== false) {
                    $i = 0;
                    foreach ($qcm_array_stats as $stat){
                        if($stat[$i]["choice"] == $choice) {
                            $qcm_array_stats[$i][$i]["individuals"] += 1;
                        }
                        $i += 1;
                    }
                }
            }
        }

        echo json_encode($qcm_array_stats);

    }
}


