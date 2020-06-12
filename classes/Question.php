<?php

class Question {
    // Attributes
    private $_db;

    // Constructor
    public function __construct(PDO $db) { $this->_db = $db; }

    // Methods
    // GET
    public function getAll(int $survey_id) : array {
        return PDOFactory::sendQuery(
            $this->_db,
            'SELECT question_id, title, type FROM questions WHERE survey_id = :survey_id ORDER BY question_id ASC',
            ["survey_id" => $survey_id]
        );
    }

    public function get(int $survey_id, int $question_id) : array {
        $question = PDOFactory::sendQuery(
            $this->_db,
            'SELECT question_id, title, type FROM questions WHERE survey_id = :survey_id AND question_id = :question_id',
            ["survey_id" => $survey_id, "question_id" => $question_id]
        );

        return $question ? $question[0] : $question;
    }

    public function getResponseInput(int $survey_id, int $question_id) : string {
        $final_return = "";

        $question_answer = PDOFactory::sendQuery(
            $this->_db,
            'SELECT answer_id, value, owner_id FROM answers WHERE survey_id = :survey_id AND question_id = :question_id',
            ["survey_id" => $survey_id, "question_id" => $question_id]
        );

        foreach ($question_answer as $answer){
            $answer_id = $answer["answer_id"];
            $answer_value = $answer["value"];
            $user_id = $answer["owner_id"];

            $user_infos = PDOFactory::sendQuery(
                $this->_db,
                'SELECT gender, birthdate, country, job FROM users WHERE user_id = :user_id',
                ["user_id" => $user_id]
            );

            $user_gender = $user_infos[0]["gender"];

            try {
                $user_birthdate = $user_infos[0]["birthdate"];

                $date_now = new DateTime("now");
                $date_birthday = new DateTime($user_birthdate);
                $user_age = date_diff($date_now, $date_birthday)->format("%Y") . " ans";
            } catch (Exception $e) {
                $user_age = "error";
            }


            $user_country = $this->getCountryFromCode($user_infos[0]["country"]);
            $user_job = $user_infos[0]["job"];

            $final_return .=
                "<tr>" .
                    "<td>".htmlspecialchars($answer_id)."</td>" .
                    "<td>".htmlspecialchars($answer_value)."</td>" .
                    "<td>".htmlspecialchars($user_gender)."</td>" .
                    "<td>".htmlspecialchars($user_age)."</td>" .
                    "<td>".htmlspecialchars($user_country)."</td>" .
                    "<td>".htmlspecialchars($user_job)."</td>" .
                "</tr>";
        }

        return $final_return;
    }

    public function getCountryFromCode(string $country_code) : string {
        switch ($country_code) {
            case "AFG": return "Afghanistan"; break;
            case "ZAF": return "Afrique du Sud"; break;
            case "ALB": return "Albania"; break;
            case "DZA": return "Algeria"; break;
            case "DEU": return "Allemagne"; break;
            case "ASM": return "American Samoa"; break;
            case "AND": return "Andorra"; break;
            case "AGO": return "Angola"; break;
            case "AIA": return "Anguilla"; break;
            case "ATA": return "Antarctica"; break;
            case "ATG": return "Antigua and Barbuda"; break;
            case "SAU": return "Arabie saoudite"; break;
            case "ARG": return "Argentina"; break;
            case "ARM": return "Armenia"; break;
            case "ABW": return "Aruba"; break;
            case "AUS": return "Australia"; break;
            case "AUT": return "Austria"; break;
            case "AZE": return "Azerbaijan"; break;
            case "ALA": return "&Aring;land Islands"; break;
            case "BHS": return "Bahamas"; break;
            case "BHR": return "Bahrain"; break;
            case "BGD": return "Bangladesh"; break;
            case "BRB": return "Barbados"; break;
            case "BLR": return "Belarus"; break;
            case "BEL": return "Belgium"; break;
            case "BLZ": return "Belize"; break;
            case "BEN": return "Benin"; break;
            case "BMU": return "Bermuda"; break;
            case "BTN": return "Bhutan"; break;
            case "BOL": return "Bolivia, Plurinational State of"; break;
            case "BES": return "Bonaire, Saint-Eustache et Saba"; break;
            case "BIH": return "Bosnie-Herz&eacute;govine"; break;
            case "BWA": return "Botswana"; break;
            case "BRA": return "Br&eacute;sil"; break;
            case "BRN": return "Brun&eacute;i Darussalam"; break;
            case "BGR": return "Bulgarie"; break;
            case "BFA": return "Burkina Faso"; break;
            case "BDI": return "Burundi"; break;
            case "CIV": return "C&ocirc;te d'Ivoire"; break;
            case "KHM": return "Cambodge"; break;
            case "CMR": return "Cameroun"; break;
            case "CAN": return "Canada"; break;
            case "CPV": return "Cap-Vert"; break;
            case "CHL": return "Chili"; break;
            case "CHN": return "Chine"; break;
            case "CYP": return "Chypre"; break;
            case "COL": return "Colombie"; break;
            case "COM": return "Comores"; break;
            case "COG": return "Congo"; break;
            case "COD": return "Congo, R&eacute;publique d&eacute;mocratique du"; break;
            case "KOR": return "Cor&eacute;e, R&eacute;publique de"; break;
            case "PRK": return "Cor&eacute;e, R&eacute;publique populaire d&eacute;mocratique de"; break;
            case "CRI": return "Costa Rica"; break;
            case "HRV": return "Croatie"; break;
            case "CUB": return "Cuba"; break;
            case "CUW": return "Cura&ccedil;ao"; break;
            case "DNK": return "Danemark"; break;
            case "DJI": return "Djibouti"; break;
            case "DMA": return "Dominique"; break;
            case "EGY": return "&Eacute;gypte"; break;
            case "SLV": return "El Salvador"; break;
            case "ARE": return "&eacute;mirats arabes unis"; break;
            case "ECU": return "&Eacute;quateur"; break;
            case "ERI": return "&Eacute;rythr&eacute;e"; break;
            case "ESP": return "Espagne"; break;
            case "EST": return "Estonie"; break;
            case "USA": return "&eacute;tats-Unis"; break;
            case "ETH": return "&Eacute;thiopie"; break;
            case "RUS": return "F&eacute;d&eacute;ration de Russie"; break;
            case "FJI": return "Fidji"; break;
            case "FIN": return "Finlande"; break;
            case "FRA": return "France"; break;
            case "GEO": return "G&eacute;orgie"; break;
            case "SGS": return "G&eacute;orgie du Sud et &icirc;les Sandwich du Sud"; break;
            case "GAB": return "Gabon"; break;
            case "GMB": return "Gambie"; break;
            case "GHA": return "Ghana"; break;
            case "GIB": return "Gibraltar"; break;
            case "GRC": return "Gr&egrave;ce"; break;
            case "GRD": return "Grenade"; break;
            case "GRL": return "Groenland"; break;
            case "GLP": return "Guadeloupe"; break;
            case "GUM": return "Guam"; break;
            case "GTM": return "Guatemala"; break;
            case "GGY": return "Guernesey"; break;
            case "GIN": return "Guin&eacute;e"; break;
            case "GNQ": return "Guin&eacute;e &eacute;quatoriale"; break;
            case "GNB": return "Guin&eacute;e-Bissau"; break;
            case "GUY": return "Guyane"; break;
            case "GUF": return "Guyane fran&ccedil;aise"; break;
            case "HTI": return "Ha&iuml;ti"; break;
            case "HND": return "Honduras"; break;
            case "HKG": return "Hong Kong"; break;
            case "HUN": return "Hongrie"; break;
            case "BVT": return "&Icirc;le Bouvet"; break;
            case "CXR": return "&Icirc;le Christmas"; break;
            case "IMN": return "&Icirc;le de Man"; break;
            case "HMD": return "&Icirc;le Heard et &icirc;les McDonald"; break;
            case "NFK": return "&Icirc;le Norfolk"; break;
            case "CYM": return "&Icirc;les Ca&icirc;mans"; break;
            case "CCK": return "&Icirc;les Cocos (Keeling)"; break;
            case "COK": return "&Icirc;les Cook"; break;
            case "FRO": return "&Icirc;les F&eacute;ro&eacute;"; break;
            case "FLK": return "&Icirc;les Falkland (Malvinas)"; break;
            case "MNP": return "&Icirc;les Mariannes du Nord"; break;
            case "MHL": return "&Icirc;les Marshall"; break;
            case "UMI": return "&Icirc;les mineures &eacute;loign&eacute;es des &eacute;tats-Unis"; break;
            case "SLB": return "&Icirc;les Salomon"; break;
            case "TCA": return "&Icirc;les Turques et Ca&iuml;ques"; break;
            case "VIR": return "&Icirc;les Vierges am&eacute;ricaines."; break;
            case "VGB": return "&Icirc;les Vierges britanniques"; break;
            case "IND": return "Inde"; break;
            case "IDN": return "Indon&eacute;sie"; break;
            case "IRQ": return "Irak"; break;
            case "IRN": return "Iran, R&eacute;publique islamique d '"; break;
            case "IRL": return "Irlande"; break;
            case "ISL": return "Islande"; break;
            case "ISR": return "Isra&euml;l"; break;
            case "ITA": return "Italie"; break;
            case "JAM": return "Jama&iuml;que"; break;
            case "JPN": return "Japon"; break;
            case "JEY": return "Jersey"; break;
            case "JOR": return "Jordanie"; break;
            case "KAZ": return "Kazakhstan"; break;
            case "KEN": return "Kenya"; break;
            case "KGZ": return "Kirghizistan"; break;
            case "KIR": return "Kiribati"; break;
            case "KWT": return "Kowe&iuml;t"; break;
            case "LSO": return "Lesotho"; break;
            case "LVA": return "Lettonie"; break;
            case "LBR": return "Lib&eacute;ria"; break;
            case "LBN": return "Liban"; break;
            case "LBY": return "Libye"; break;
            case "LIE": return "Liechtenstein"; break;
            case "LTU": return "Lituanie"; break;
            case "LUX": return "Luxembourg"; break;
            case "MKD": return "Mac&eacute;doine, ancienne R&eacute;publique yougoslave de"; break;
            case "MAC": return "Macao"; break;
            case "MDG": return "Madagascar"; break;
            case "MYS": return "Malaisie"; break;
            case "MWI": return "Malawi"; break;
            case "MDV": return "Maldives"; break;
            case "MLI": return "Mali"; break;
            case "MLT": return "Malte"; break;
            case "MAR": return "Maroc"; break;
            case "MTQ": return "Martinique"; break;
            case "MUS": return "Maurice"; break;
            case "MRT": return "Mauritanie"; break;
            case "MYT": return "Mayotte"; break;
            case "MEX": return "Mexique"; break;
            case "FSM": return "Micron&eacute;sie, &eacute;tats f&eacute;d&eacute;r&eacute;s de"; break;
            case "MDA": return "Moldova, R&eacute;publique de"; break;
            case "MCO": return "Monaco"; break;
            case "MNG": return "Mongolie"; break;
            case "MNE": return "Mont&eacute;n&eacute;gro"; break;
            case "MSR": return "Montserrat"; break;
            case "MOZ": return "Mozambique"; break;
            case "MMR": return "Myanmar"; break;
            case "NPL": return "N&eacute;pal"; break;
            case "NAM": return "Namibie"; break;
            case "NRU": return "Nauru"; break;
            case "NIC": return "Nicaragua"; break;
            case "NGA": return "Nig&eacute;ria"; break;
            case "NER": return "Niger"; break;
            case "NIU": return "Niue"; break;
            case "NOR": return "Norv&egrave;ge"; break;
            case "NCL": return "Nouvelle-Cal&eacute;donie"; break;
            case "NZL": return "Nouvelle-Z&eacute;lande"; break;
            case "OMN": return "Oman"; break;
            case "UGA": return "Ouganda"; break;
            case "UZB": return "Ouzb&eacute;kistan"; break;
            case "PER": return "P&eacute;rou"; break;
            case "PAK": return "Pakistan"; break;
            case "PLW": return "Palau"; break;
            case "PAN": return "Panama"; break;
            case "PNG": return "Papouasie-Nouvelle-Guin&eacute;e"; break;
            case "PRY": return "Paraguay"; break;
            case "NLD": return "Pays-Bas"; break;
            case "PHL": return "Philippines"; break;
            case "PCN": return "Pitcairn"; break;
            case "POL": return "Pologne"; break;
            case "PYF": return "Polyn&eacute;sie fran&ccedil;aise"; break;
            case "PRI": return "Porto Rico"; break;
            case "PRT": return "Portugal"; break;
            case "QAT": return "Qatar"; break;
            case "SYR": return "R&eacute;publique arabe syrienne"; break;
            case "CAF": return "R&eacute;publique centrafricaine"; break;
            case "LAO": return "R&eacute;publique d&eacute;mocratique populaire lao"; break;
            case "DOM": return "R&eacute;publique dominicaine"; break;
            case "CZE": return "R&eacute;publique tch&egrave;que"; break;
            case "REU": return "R&eacute;union"; break;
            case "ROU": return "Roumanie"; break;
            case "GBR": return "Royaume-Uni"; break;
            case "RWA": return "Rwanda"; break;
            case "SEN": return "S&eacute;n&eacute;gal"; break;
            case "ESH": return "Sahara occidental"; break;
            case "BLM": return "Saint Barth&eacute;lemy"; break;
            case "SHN": return "Sainte-H&eacute;l&egrave;ne, Ascension et Tristan da Cunha"; break;
            case "LCA": return "Sainte-Lucie"; break;
            case "KNA": return "Saint-Kitts-et-Nevis"; break;
            case "SMR": return "Saint-Marin"; break;
            case "MAF": return "Saint-Martin (partie française)"; break;
            case "SPM": return "Saint-Pierre-et-Miquelon"; break;
            case "VAT": return "Saint-Si&egrave;ge (&eacute;tat de la Cit&eacute; du Vatican)"; break;
            case "VCT": return "Saint-Vincent-et-les Grenadines"; break;
            case "WSM": return "Samoa"; break;
            case "STP": return "Sao Tom&eacute;-et-Principe"; break;
            case "SRB": return "Serbie"; break;
            case "SYC": return "Seychelles"; break;
            case "SLE": return "Sierra Leone"; break;
            case "SGP": return "Singapour"; break;
            case "SXM": return "Sint Maarten (partie n&eacute;erlandaise)"; break;
            case "SVN": return "Slov&eacute;nie"; break;
            case "SVK": return "Slovaquie"; break;
            case "SOM": return "Somalie"; break;
            case "SDN": return "Soudan"; break;
            case "SSD": return "Soudan du Sud"; break;
            case "LKA": return "Sri Lanka"; break;
            case "SWE": return "Su&egrave;de"; break;
            case "CHE": return "Suisse"; break;
            case "SUR": return "Suriname"; break;
            case "SJM": return "Svalbard et Jan Mayen"; break;
            case "SWZ": return "Swaziland"; break;
            case "TWN": return "Ta&iuml;wan, province de Chine"; break;
            case "TJK": return "Tadjikistan"; break;
            case "TZA": return "Tanzanie, R&eacute;publique-Unie de"; break;
            case "TCD": return "Tchad"; break;
            case "ATF": return "Terres australes fran&ccedil;aises"; break;
            case "IOT": return "Territoire britannique de l'oc&eacute;an Indien"; break;
            case "PSE": return "Territoire palestinien occup&eacute;"; break;
            case "THA": return "Tha&iuml;lande"; break;
            case "TLS": return "Timor-Leste"; break;
            case "TGO": return "Togo"; break;
            case "TKL": return "Tokelau"; break;
            case "TON": return "Tonga"; break;
            case "TTO": return "Trinit&eacute;-et-Tobago"; break;
            case "TUN": return "Tunisie"; break;
            case "TKM": return "Turkm&eacute;nistan"; break;
            case "TUR": return "Turquie"; break;
            case "TUV": return "Tuvalu"; break;
            case "UKR": return "Ukraine"; break;
            case "URY": return "Uruguay"; break;
            case "VUT": return "Vanuatu"; break;
            case "VEN": return "Venezuela, R&eacute;publique bolivarienne du"; break;
            case "VNM": return "Viet Nam"; break;
            case "WLF": return "Wallis et Futuna"; break;
            case "YEM": return "Y&eacute;men"; break;
            case "ZMB": return "Zambie"; break;
            case "ZWE": return "Zimbabwe"; break;
        }
    }

    public function getHTMLForQuestion(int $survey_id, array $question, bool $editMode, bool $analytics, string $disabledAnswer = "") : string {
        switch ($question["type"]) {
            case "input":
                return '
                    <div class="field floating_label_wrapper">
                        <input type="text" id="question_input" class="floating_label_input" name="question_input" placeholder="R&eacute;ponse" required '.$disabledAnswer.'>
                        <label for="question_input" class="floating_label">R&eacute;ponse</label>
                    </div>
                ';

            case "unique":
                // Init vars
                $ChoiceManager = new Choice($this->_db);

                $html = '<div class="field">';
                $radios = $ChoiceManager->get($question["question_id"]);
                $checked = "checked";

                // Create each radio button
                foreach ($radios as $key => $choice) {
                    $id = $choice["choice_id"];
                    $value = $choice["title"];
                    $display = $choice["title"];
                    $delete = "";

                    if ($editMode) {
                        $display = '<input type="text" id="question_unique_title_'.$id.'" name="question_unique_title_'.$id.'" placeholder="Nouvelle option" value="'.$value.'" required>';
                        $delete = '<a class="deleteChoice" href="./php/survey/deleteChoice.php?survey='.$survey_id.'&selected='.$question["question_id"].'&choice='.$id.'">
                                        '.file_get_contents(ROOT."/assets/images/icons/del_survey.svg").'
                                    </a>';
                    }

                    $html .= '
                        <label for="question_unique_'.$id.'" class="radio_label">
                            <input type="radio" id="question_unique_'.$id.'" name="question_unique" value="'.$value.'" required '.$checked.' '.$disabledAnswer.'>
                            <span class="radio"></span>
                            <span>'.$display.'</span>
                            '.$delete.'
                        </label>
                    ';

                    $checked = "";
                }

                // Add a "Add option" button if in edit mode
                if ($editMode) {
                    if (isset($_GET["newChoice"])) {
                        $html .= '
                        <div class="new_radio_label">
                            <span class="radio"></span>
                            <span><input type="text" name="newChoiceName" placeholder="Nouvelle option"></span>
                        </div>
                    ';
                    } else {
                        $html .= '
                        <a class="new_radio_label" href="./php/survey/addChoice.php?survey='.$survey_id.'&selected='.$question["question_id"].'">
                            <span class="radio"></span>
                            <span>Nouvelle option</span>
                        </a>
                    ';
                    }

                    $html .= '
                        <div class="radio_label">
                            <input class="btn filled smaller-2" type="submit" name="setChoices" value="ENREGISTRER OPTS.">
                        </div>
                    ';
                }

                return $html.'</div>';

            case "multiple":
                // Init vars
                $ChoiceManager = new Choice($this->_db);

                $html = '<div class="field">';
                $checkboxes = $ChoiceManager->get($question["question_id"]);

                // Create each checkboxes
                foreach ($checkboxes as $key => $choice) {
                    $id = $choice["choice_id"];
                    $value = $choice["title"];
                    $display = $choice["title"];
                    $delete = "";

                    if ($editMode) {
                        $display = '<input type="text" id="question_multiple_title_'.$id.'" name="question_multiple_title_'.$id.'" placeholder="Nouvelle option" value="'.$value.'" required>';
                        $delete = '<a class="deleteChoice" href="./php/survey/deleteChoice.php?survey='.$survey_id.'&selected='.$question["question_id"].'&choice='.$id.'">
                                        '.file_get_contents(ROOT."/assets/images/icons/del_survey.svg").'
                                    </a>';
                    }

                    $html .= '
                        <label for="question_multiple_'.$id.'" class="checkbox_label">
                            <input type="checkbox" id="question_multiple_'.$id.'" name="question_multiple_'.$id.'" value="'.$value.'" '.$disabledAnswer.'>
                            <span class="checkbox"></span>
                            <span>'.$display.'</span>
                            '.$delete.'
                        </label>
                    ';
                }

                // Add a "Add option" button if in edit mode
                if ($editMode) {
                    if (isset($_GET["newChoice"])) {
                        $html .= '
                        <div class="new_checkbox_label">
                            <span class="checkbox"></span>
                            <span><input type="text" name="newChoiceName" placeholder="Nouvelle option"></span>
                        </div>
                    ';
                    } else {
                        $html .= '
                        <a class="new_checkbox_label" href="./php/survey/addChoice.php?survey='.$survey_id.'&selected='.$question["question_id"].'">
                            <span class="checkbox"></span>
                            <span>Nouvelle option</span>
                        </a>
                    ';
                    }

                    $html .= '
                        <div class="checkbox_label">
                            <input class="btn filled smaller-2" type="submit" name="setChoices" value="ENREGISTRER OPTS.">
                        </div>
                    ';
                }

                return $html.'</div>';

            case "number":
                /*
                 * return '
                        <div class="double_field">
                            <div class="field floating_label_wrapper">
                                <input type="number" id="question_number_min" class="floating_label_input" name="question_number_min" placeholder="Minimum" required>
                                <label for="question_number_min" class="floating_label">Minimum</label>
                            </div>

                            <div class="field floating_label_wrapper">
                                <input type="number" id="question_number_max" class="floating_label_input" name="question_number_max" placeholder="Maximum" required>
                                <label for="question_number_max" class="floating_label">Maximum</label>
                            </div>
                        </div>

                        <input class="btn filled smaller" type="submit" name="setNumberRange" value="ENREGISTRER PLAGE">
                    ';
                 */

                return '
                    <div class="field floating_label_wrapper">
                        <input type="number" id="question_number" class="floating_label_input" name="question_number" placeholder="Nombre" step="0.1" required '.$disabledAnswer.'>
                        <label for="question_number" class="floating_label">Nombre</label>
                    </div>
                ';

            default:
                return '';
        }
    }

    // ADD
    public function addQuestion(int $survey_id, string $type) : bool {
        // Get last ID before query
        $emptyDb = false;

        $lastIDBefore = PDOFactory::sendQuery($this->_db, 'SELECT question_id FROM questions ORDER BY question_id DESC LIMIT 1');

        if (!$lastIDBefore) $emptyDb = true;
        else {
            $lastIDBefore = $lastIDBefore[0]["question_id"];
        }

        // Add question
        PDOFactory::sendQuery(
            $this->_db,
            'INSERT INTO 
                    questions(survey_id, title, type) 
                VALUES
                    (:survey_id, :title, :type)',
            ["survey_id" => $survey_id, "title" => "Nouvelle question", "type" => $type],
            false
        );

        // Get last ID after query
        $lastIDAfter = -1;

        if (!$emptyDb)
            $lastIDAfter = PDOFactory::sendQuery($this->_db, 'SELECT question_id FROM questions ORDER BY question_id DESC LIMIT 1')[0]["question_id"];

        // Return true if the survey is created
        if (!$emptyDb && ($lastIDBefore === $lastIDAfter)) {
            setError(UNKNOWN_QUESTION_ADD_ERROR);
            return false;
        } else {
            setSuccess(QUESTION_ADDED);
            return true;
        }
    }

    // UPDATE
    public function setTitle(int $question_id, string $title) : bool {
        // Get the old title
        $old_title = PDOFactory::sendQuery(
            $this->_db,
            'SELECT title FROM questions WHERE question_id = :question_id',
            ["question_id" => $question_id]
        );

        if (!$old_title) {
            setError(QUESTION_NOT_FOUND);
            return false;
        } else {
            $old_title = $old_title[0]["title"];
        }

        if ($old_title == $title) {
            return true;
        }

        // Update the title
        PDOFactory::sendQuery(
            $this->_db,
            'UPDATE questions SET title = :title WHERE question_id = :question_id',
            ["title" => $title, "question_id" => $question_id],
            false
        );

        // Check if the title is changed
        return !((bool) PDOFactory::sendQuery(
            $this->_db,
            'SELECT question_id FROM questions WHERE title = :title AND question_id = :question_id',
            ["title" => $old_title, "question_id" => $question_id]
        ));
    }

    // REMOVE

    // CHECK

    // OTHER
    public function buildList(int $survey_id, bool $editMode, bool $analytics, int $selected = -1) : string {
        $questions = $this->getAll($survey_id);
        $html = "";

        if ($editMode) {
            $page = "./create_survey.php";
        } elseif ($analytics) {
            $page = "./analytics.php";
        } else {
            $page = null;
        }

        foreach ($questions as $question) {
            $question_id = $question["question_id"];
            $question_title = $question["title"];
            $class = ($question_id == $selected) ? 'class="selected"' : '';
            $linkURI = "";

            if (!is_null($page))
                $linkURI = 'href="'.$page.'?survey='.$survey_id.'&selected='.$question_id.'"';

            $html .= '<li '.$class.'><a '.$linkURI.'>'.$question_title.'</a></li>';
        }

        return $html;
    }

    public function buildView(int $survey_id, int $question_id, bool $editMode, bool $analytics, int $answer_id = null) : string {
        $question = $this->get($survey_id, $question_id);
        $question_title = $question["title"];
        $question_type = $question["type"];
        $formURI = $editMode ? "./php/survey/set_question_title.php" : "./php/survey/set_question_response.php";
        $disabledAnswer = $editMode ? "disabled" : "";

        // Set title
        if ($editMode)
            $question_title = '<textarea name="question_name" placeholder="Nouvelle question" minlength="1" maxlength="255">'.$question_title.'</textarea>';

        $question_title = '<h2>'.$question_title.'</h2>';

        if ($editMode)
            $question_title .= '<input class="btn filled inputFixed" type="submit" name="setQuestionTitle" value="CHANGER">';

        // Set ID inputs used in scripts
        $id_inputs = '
            <input type="hidden" id="survey_id" name="survey_id" value="'.$survey_id.'">
            <input type="hidden" id="question_id" name="question_id" value="'.$question_id.'">';

        $submit_btn = "";

        if (!$editMode AND !$analytics) {
            $submit_btn = '<input class="btn filled" type="submit" name="setAnswer" value="ENVOYER">';

            if (!is_null($answer_id))
                $id_inputs .= '<input type="hidden" id="answer_id" name="answer_id" value="'.$answer_id.'">';
        }

        return
            '<form action="'.$formURI.'" method="POST">
                '.$id_inputs.'
                
                <div id="questionTitle">'.$question_title.'</div>

                '.$this->getHTMLForQuestion($survey_id, $question, $editMode, $analytics, $disabledAnswer).'
                
                '.$submit_btn.'
            </form>';
    }

    public function buildViewAnalytics(int $survey_id, int $question_id) : string {
        $question_title = "";
        $question_view = "";
        if($question_id == -2){
            $question_title = '<h2>Statistiques g&eacute;n&eacute;rales</h2>';
            $question_view = '
                <div id="AgeChart"></div>
                <div style="display: flex; flex-direction: row; justify-content: space-around; background-color: white">
                    <div id="GenderChart"></div>
                    <div id="CountryChart"></div>
                </div>
                <div id="JobChart"></div>
                ';
            return $question_title . $question_view;
        }else {
            $question = $this->get($survey_id, $question_id);
            $question_title = $question["title"];
            $question_type = $question["type"];
            $question_view = "";

            // Set title
            $question_title = '<h2>' . $question_title . '</h2>';

            if ($question_type = "input") {
                $answers = $this->getResponseInput($survey_id, $question_id);
                $question_view = '
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="no-display">ID</th>
                                <th>R&eacute;ponse</th>
                                <th>Sexe</th>
                                <th>&Acirc;ge</th>
                                <th>Pays</th>
                                <th>M&eacute;tier</th>
                            </tr>
                        </thead>
                        <tbody>
                            ' . html_entity_decode($answers) . '
                        </tbody>
                    </table>';
            }

            if ($question_type = "number") {
                //$question_view = '<div id="numericChart ' . $question_id . '"></div><script type="text/javascript">drawNumericChart(' . $survey_id . ',' . $question_id . ');' . '</script>';
                $question_view = '<div id="numericChart ' . $question_id . '"></div><script type="text/javascript">alertogogol('. $survey_id . ',' . $question_id .');</script>';
            }

        }

        return $question_title . $question_view;
    }
}