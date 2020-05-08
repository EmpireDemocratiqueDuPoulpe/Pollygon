<!DOCTYPE html>

<html lang="fr" class="logreg">
    <head>
        <title>Pollygon - Connexion</title>
        <?php include_once(ROOT."/views/models/head.php"); ?>
    </head>

    <body>
        <!-- Error/success box -->
        <?php if(isset($messages) && !empty($messages)) echo $messages; ?>

        <!-- Register box -->
        <div id="register">
            <h1>Inscription</h1>

            <form action="./php/register_user.php" method="POST">
                <!-- Username -->
                <div class="field floating_label_wrapper">
                    <input type="text" id="username" class="floating_label_input" name="username" minlength="1" maxlength="32" placeholder="Nom d'utilisateur" required>
                    <label for="username" class="floating_label">Nom d'utilisateur</label>
                </div>

                <!-- Email -->
                <div class="field floating_label_wrapper">
                    <input type="email" id="email" class="floating_label_input" name="email" minlength="1" maxlength="255" placeholder="E-mail" required>
                    <label for="email" class="floating_label">E-mail</label>
                </div>

                <!-- Password -->
                <div class="double_field">
                    <div class="field floating_label_wrapper">
                        <input type="password" id="password1" class="floating_label_input" name="password1" minlength="8" maxlength="255" placeholder="Mot de passe" required>
                        <label for="password1" class="floating_label">Mot de passe</label>
                    </div>

                    <div class="field floating_label_wrapper">
                        <input type="password" id="password2" class="floating_label_input" name="password2" minlength="8" maxlength="255" placeholder="Mot de passe (r&eacute;p&eacute;ter)" required>
                        <label for="password2" class="floating_label">Mot de passe (r&eacute;p&eacute;ter)</label>
                    </div>
                </div>

                <!-- Gender -->
                <div class="field">
                    <h3>Sexe</h3>
                    <label for="gender1" class="radio_label">
                        <input type="radio" id="gender1" name="gender" value="Homme" required checked>
                        <span class="radio"></span>
                        <span>Homme</span>
                    </label>
                    <label for="gender2" class="radio_label">
                        <input type="radio" id="gender2" name="gender" value="Femme" required>
                        <span class="radio"></span>
                        Femme
                    </label>
                </div>

                <!-- Gender -->
                <div class="field">
                    <h3>Date de naissance</h3>
                    <label for="birthdate"></label>
                    <input type="date" id="birthdate" name="birthdate" min="1900-01-01" max="2020-12-31" required>
                </div>

                <!-- Country -->
                <div class="field">
                    <h3>Pays</h3>
                    <label for="country"></label>
                    <select id="country" name="country" required>
                        <option value="" selected>-- S&eacute;lectionnez votre pays --</option>
                        <option value="AFG">Afghanistan</option>
                        <option value="ALA">&Aring;land Islands</option>
                        <option value="ALB">Albania</option>
                        <option value="DZA">Algeria</option>
                        <option value="ASM">American Samoa</option>
                        <option value="AND">Andorra</option>
                        <option value="AGO">Angola</option>
                        <option value="AIA">Anguilla</option>
                        <option value="ATA">Antarctica</option>
                        <option value="ATG">Antigua and Barbuda</option>
                        <option value="ARG">Argentina</option>
                        <option value="ARM">Armenia</option>
                        <option value="ABW">Aruba</option>
                        <option value="AUS">Australia</option>
                        <option value="AUT">Austria</option>
                        <option value="AZE">Azerbaijan</option>
                        <option value="BHS">Bahamas</option>
                        <option value="BHR">Bahrain</option>
                        <option value="BGD">Bangladesh</option>
                        <option value="BRB">Barbados</option>
                        <option value="BLR">Belarus</option>
                        <option value="BEL">Belgium</option>
                        <option value="BLZ">Belize</option>
                        <option value="BEN">Benin</option>
                        <option value="BMU">Bermuda</option>
                        <option value="BTN">Bhutan</option>
                        <option value="BOL">Bolivia, Plurinational State of</option>
                        <option value="BES">Bonaire, Saint-Eustache et Saba</option>
                        <option value="BIH">Bosnie-Herz&eacute;govine</option>
                        <option value="BWA">Botswana</option>
                        <option value="BVT">&Icirc;le Bouvet</option>
                        <option value="BRA">Br&eacute;sil</option>
                        <option value="IOT">Territoire britannique de l'oc&eacute;an Indien</option>
                        <option value="BRN">Brun&eacute;i Darussalam</option>
                        <option value="BGR">Bulgarie</option>
                        <option value="BFA">Burkina Faso</option>
                        <option value="BDI">Burundi</option>
                        <option value="KHM">Cambodge</option>
                        <option value="CMR">Cameroun</option>
                        <option value="CAN">Canada</option>
                        <option value="CPV">Cap-Vert</option>
                        <option value="CYM">&Icirc;les Ca&icirc;mans</option>
                        <option value="CAF">R&eacute;publique centrafricaine</option>
                        <option value="TCD">Tchad</option>
                        <option value="CHL">Chili</option>
                        <option value="CHN">Chine</option>
                        <option value="CXR">&Icirc;le Christmas</option>
                        <option value="CCK">&Icirc;les Cocos (Keeling)</option>
                        <option value="COL">Colombie</option>
                        <option value="COM">Comores</option>
                        <option value="COG">Congo</option>
                        <option value="COD">Congo, R&eacute;publique d&eacute;mocratique du</option>
                        <option value="COK">&Icirc;les Cook</option>
                        <option value="CRI">Costa Rica</option>
                        <option value="CIV">C&ocirc;te d'Ivoire</option>
                        <option value="HRV">Croatie</option>
                        <option value="CUB">Cuba</option>
                        <option value="CUW">Cura&ccedil;ao</option>
                        <option value="CYP">Chypre</option>
                        <option value="CZE">R&eacute;publique tch&egrave;que</option>
                        <option value="DNK">Danemark</option>
                        <option value="DJI">Djibouti</option>
                        <option value="DMA">Dominique</option>
                        <option value="DOM">R&eacute;publique dominicaine</option>
                        <option value="ECU">&Eacute;quateur</option>
                        <option value="EGY">&Eacute;gypte</option>
                        <option value="SLV">El Salvador</option>
                        <option value="GNQ">Guin&eacute;e &eacute;quatoriale</option>
                        <option value="ERI">&Eacute;rythr&eacute;e</option>
                        <option value="EST">Estonie</option>
                        <option value="ETH">&Eacute;thiopie</option>
                        <option value="FLK">&Icirc;les Falkland (Malvinas)</option>
                        <option value="FRO">&Icirc;les F&eacute;ro&eacute;</option>
                        <option value="FJI">Fidji</option>
                        <option value="FIN">Finlande</option>
                        <option value="FRA">France</option>
                        <option value="GUF">Guyane fran&&ccedil;aise</option>
                        <option value="PYF">Polyn&eacute;sie fran&ccedil;aise</option>
                        <option value="ATF">Terres australes fran&ccedil;aises</option>
                        <option value="GAB">Gabon</option>
                        <option value="GMB">Gambie</option>
                        <option value="GEO">G&eacute;orgie</option>
                        <option value="DEU">Allemagne</option>
                        <option value="GHA">Ghana</option>
                        <option value="GIB">Gibraltar</option>
                        <option value="GRC">Gr&egrave;ce</option>
                        <option value="GRL">Groenland</option>
                        <option value="GRD">Grenade</option>
                        <option value="GLP">Guadeloupe</option>
                        <option value="GUM">Guam</option>
                        <option value="GTM">Guatemala</option>
                        <option value="GGY">Guernesey</option>
                        <option value="GIN">Guin&eacute;e</option>
                        <option value="GNB">Guin&eacute;e-Bissau</option>
                        <option value="GUY">Guyane</option>
                        <option value="HTI">Ha&iuml;ti</option>
                        <option value="HMD">&Icirc;le Heard et &icirc;les McDonald</option>
                        <option value="VAT">Saint-Si&egrave;ge (&eacute;tat de la Cit&eacute; du Vatican)</option>
                        <option value="HND">Honduras</option>
                        <option value="HKG">Hong Kong</option>
                        <option value="HUN">Hongrie</option>
                        <option value="ISL">Islande</option>
                        <option value="IND">Inde</option>
                        <option value="IDN">Indon&eacute;sie</option>
                        <option value="IRN">Iran, R&eacute;publique islamique d '</option>
                        <option value="IRQ">Irak</option>
                        <option value="IRL">Irlande</option>
                        <option value="IMN">&Icirc;le de Man</option>
                        <option value="ISR">Isra&euml;l</option>
                        <option value="ITA">Italie</option>
                        <option value="JAM">Jama&iuml;que</option>
                        <option value="JPN">Japon</option>
                        <option value="JEY">Jersey</option>
                        <option value="JOR">Jordanie</option>
                        <option value="KAZ">Kazakhstan</option>
                        <option value="KEN">Kenya</option>
                        <option value="KIR">Kiribati</option>
                        <option value="PRK">Cor&eacute;e, R&eacute;publique populaire d&eacute;mocratique de</option>
                        <option value="KOR">Cor&eacute;e, R&eacute;publique de</option>
                        <option value="KWT">Kowe&iuml;t</option>
                        <option value="KGZ">Kirghizistan</option>
                        <option value="LAO">R&eacute;publique d&eacute;mocratique populaire lao</option>
                        <option value="LVA">Lettonie</option>
                        <option value="LBN">Liban</option>
                        <option value="LSO">Lesotho</option>
                        <option value="LBR">Lib&eacute;ria</option>
                        <option value="LBY">Libye</option>
                        <option value="LIE">Liechtenstein</option>
                        <option value="LTU">Lituanie</option>
                        <option value="LUX">Luxembourg</option>
                        <option value="MAC">Macao</option>
                        <option value="MKD">Mac&eacute;doine, ancienne R&eacute;publique yougoslave de</option>
                        <option value="MDG">Madagascar</option>
                        <option value="MWI">Malawi</option>
                        <option value="MYS">Malaisie</option>
                        <option value="MDV">Maldives</option>
                        <option value="MLI">Mali</option>
                        <option value="MLT">Malte</option>
                        <option value="MHL">&Icirc;les Marshall</option>
                        <option value="MTQ">Martinique</option>
                        <option value="MRT">Mauritanie</option>
                        <option value="MUS">Maurice</option>
                        <option value="MYT">Mayotte</option>
                        <option value="MEX">Mexique</option>
                        <option value="FSM">Micron&eacute;sie, &eacute;tats f&eacute;d&eacute;r&eacute;s de</option>
                        <option value="MDA">Moldova, R&eacute;publique de</option>
                        <option value="MCO">Monaco</option>
                        <option value="MNG">Mongolie</option>
                        <option value="MNE">Mont&eacute;n&eacute;gro</option>
                        <option value="MSR">Montserrat</option>
                        <option value="MAR">Maroc</option>
                        <option value="MOZ">Mozambique</option>
                        <option value="MMR">Myanmar</option>
                        <option value="NAM">Namibie</option>
                        <option value="NRU">Nauru</option>
                        <option value="NPL">N&eacute;pal</option>
                        <option value="NLD">Pays-Bas</option>
                        <option value="NCL">Nouvelle-Cal&eacute;donie</option>
                        <option value="NZL">Nouvelle-Z&eacute;lande</option>
                        <option value="NIC">Nicaragua</option>
                        <option value="NER">Niger</option>
                        <option value="NGA">Nig&eacute;ria</option>
                        <option value="NIU">Niue</option>
                        <option value="NFK">&Icirc;le Norfolk</option>
                        <option value="MNP">&Icirc;les Mariannes du Nord</option>
                        <option value="NOR">Norv&egrave;ge</option>
                        <option value="OMN">Oman</option>
                        <option value="PAK">Pakistan</option>
                        <option value="PLW">Palau</option>
                        <option value="PSE">Territoire palestinien occup&eacute;</option>
                        <option value="PAN">Panama</option>
                        <option value="PNG">Papouasie-Nouvelle-Guin&eacute;e</option>
                        <option value="PRY">Paraguay</option>
                        <option value="PER">P&eacute;rou</option>
                        <option value="PHL">Philippines</option>
                        <option value="PCN">Pitcairn</option>
                        <option value="POL">Pologne</option>
                        <option value="PRT">Portugal</option>
                        <option value="PRI">Porto Rico</option>
                        <option value="QAT">Qatar</option>
                        <option value="REU">R&eacute;union</option>
                        <option value="ROU">Roumanie</option>
                        <option value="RUS">F&eacute;d&eacute;ration de Russie</option>
                        <option value="RWA">Rwanda</option>
                        <option value="BLM">Saint Barth&eacute;lemy</option>
                        <option value="SHN">Sainte-H&eacute;l&egrave;ne, Ascension et Tristan da Cunha</option>
                        <option value="KNA">Saint-Kitts-et-Nevis</option>
                        <option value="LCA">Sainte-Lucie</option>
                        <option value="MAF">Saint-Martin (partie française)</option>
                        <option value="SPM">Saint-Pierre-et-Miquelon</option>
                        <option value="VCT">Saint-Vincent-et-les Grenadines</option>
                        <option value="WSM">Samoa</option>
                        <option value="SMR">Saint-Marin</option>
                        <option value="STP">Sao Tom&eacute;-et-Principe</option>
                        <option value="SAU">Arabie saoudite</option>
                        <option value="SEN">S&eacute;n&eacute;gal</option>
                        <option value="SRB">Serbie</option>
                        <option value="SYC">Seychelles</option>
                        <option value="SLE">Sierra Leone</option>
                        <option value="SGP">Singapour</option>
                        <option value="SXM">Sint Maarten (partie n&eacute;erlandaise)</option>
                        <option value="SVK">Slovaquie</option>
                        <option value="SVN">Slov&eacute;nie</option>
                        <option value="SLB">&Icirc;les Salomon</option>
                        <option value="SOM">Somalie</option>
                        <option value="ZAF">Afrique du Sud</option>
                        <option value="SGS">G&eacute;orgie du Sud et &icirc;les Sandwich du Sud</option>
                        <option value="SSD">Soudan du Sud</option>
                        <option value="ESP">Espagne</option>
                        <option value="LKA">Sri Lanka</option>
                        <option value="SDN">Soudan</option>
                        <option value="SUR">Suriname</option>
                        <option value="SJM">Svalbard et Jan Mayen</option>
                        <option value="SWZ">Swaziland</option>
                        <option value="SWE">Su&egrave;de</option>
                        <option value="CHE">Suisse</option>
                        <option value="SYR">R&eacute;publique arabe syrienne</option>
                        <option value="TWN">Ta&iuml;wan, province de Chine</option>
                        <option value="TJK">Tadjikistan</option>
                        <option value="TZA">Tanzanie, R&eacute;publique-Unie de</option>
                        <option value="THA">Tha&iuml;lande</option>
                        <option value="TLS">Timor-Leste</option>
                        <option value="TGO">Togo</option>
                        <option value="TKL">Tokelau</option>
                        <option value="TON">Tonga</option>
                        <option value="TTO">Trinit&eacute;-et-Tobago</option>
                        <option value="TUN">Tunisie</option>
                        <option value="TUR">Turquie</option>
                        <option value="TKM">Turkm&eacute;nistan</option>
                        <option value="TCA">&Icirc;les Turques et Ca&iuml;ques</option>
                        <option value="TUV">Tuvalu</option>
                        <option value="UGA">Ouganda</option>
                        <option value="UKR">Ukraine</option>
                        <option value="ARE">&eacute;mirats arabes unis</option>
                        <option value="GBR">Royaume-Uni</option>
                        <option value="USA">&eacute;tats-Unis</option>
                        <option value="UMI">&Icirc;les mineures &eacute;loign&eacute;es des &eacute;tats-Unis</option>
                        <option value="URY">Uruguay</option>
                        <option value="UZB">Ouzb&eacute;kistan</option>
                        <option value="VUT">Vanuatu</option>
                        <option value="VEN">Venezuela, R&eacute;publique bolivarienne du</option>
                        <option value="VNM">Viet Nam</option>
                        <option value="VGB">&Icirc;les Vierges britanniques</option>
                        <option value="VIR">&Icirc;les Vierges am&eacute;ricaines.</option>
                        <option value="WLF">Wallis et Futuna</option>
                        <option value="ESH">Sahara occidental</option>
                        <option value="YEM">Y&eacute;men</option>
                        <option value="ZMB">Zambie</option>
                        <option value="ZWE">Zimbabwe</option>
                    </select>
                </div>

                <!-- Job -->
                <div class="field">
                    <h3>M&eacute;tier</h3>
                    <label for="job"></label>
                    <select id="job" name="job" required>
                        <option value="" selected>-- S&eacute;lectionnez votre m&eacute;tier --</option>
                        <option value="Salari&eacute;">Salari&eacute;</option>
                        <option value="Sans emploi">Sans emploi</option>
                        <option value="Ind&eacute;pendant">Ind&eacute;pendant</option>
                        <option value="Retrait&eacute;">Retrait&eacute;</option>
                        <option value="&Eacute;tudiant">&Eacute;tudiant</option>
                    </select>
                </div>

                <input type="submit" class="btn filled" value="INSCRIPTION">

                <div class="link_spacer"></div>
                <!-- As an account -->
                <a href="./login.php">J'ai d&eacute;j&agrave; un compte.</a>
            </form>
        </div>

        <!-- Footer -->
        <?php include_once(ROOT."/views/models/footer.php"); ?>
    </body>
</html>