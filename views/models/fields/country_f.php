<!-- Country -->
<?php
    $defaultCheck = "";

    if(isset($user)) {
        if (isset($user["country"])) {
            $defaultCheck = $user["country"];
        }
    }
?>

<div class="field">
    <h3>Pays</h3>
    <label for="country"></label>
    <select id="country" name="country" required>
        <option value=""    <?php if ($defaultCheck == "") echo "selected"; ?>>-- S&eacute;lectionnez votre pays --</option>
        <option value="AFG" <?php if ($defaultCheck == "AFG") echo "selected"; ?>>Afghanistan</option>
        <option value="ZAF" <?php if ($defaultCheck == "ZAF") echo "selected"; ?>>Afrique du Sud</option>
        <option value="ALB" <?php if ($defaultCheck == "ALB") echo "selected"; ?>>Albania</option>
        <option value="DZA" <?php if ($defaultCheck == "DZA") echo "selected"; ?>>Algeria</option>
        <option value="DEU" <?php if ($defaultCheck == "DEU") echo "selected"; ?>>Allemagne</option>
        <option value="ASM" <?php if ($defaultCheck == "ASM") echo "selected"; ?>>American Samoa</option>
        <option value="AND" <?php if ($defaultCheck == "AND") echo "selected"; ?>>Andorra</option>
        <option value="AGO" <?php if ($defaultCheck == "AGO") echo "selected"; ?>>Angola</option>
        <option value="AIA" <?php if ($defaultCheck == "AIA") echo "selected"; ?>>Anguilla</option>
        <option value="ATA" <?php if ($defaultCheck == "ATA") echo "selected"; ?>>Antarctica</option>
        <option value="ATG" <?php if ($defaultCheck == "ATG") echo "selected"; ?>>Antigua and Barbuda</option>
        <option value="SAU" <?php if ($defaultCheck == "SAU") echo "selected"; ?>>Arabie saoudite</option>
        <option value="ARG" <?php if ($defaultCheck == "ARG") echo "selected"; ?>>Argentina</option>
        <option value="ARM" <?php if ($defaultCheck == "ARM") echo "selected"; ?>>Armenia</option>
        <option value="ABW" <?php if ($defaultCheck == "ABW") echo "selected"; ?>>Aruba</option>
        <option value="AUS" <?php if ($defaultCheck == "AUS") echo "selected"; ?>>Australia</option>
        <option value="AUT" <?php if ($defaultCheck == "AUT") echo "selected"; ?>>Austria</option>
        <option value="AZE" <?php if ($defaultCheck == "AZE") echo "selected"; ?>>Azerbaijan</option>
        <option value="ALA" <?php if ($defaultCheck == "ALA") echo "selected"; ?>>&Aring;land Islands</option>
        <option value="BHS" <?php if ($defaultCheck == "BHS") echo "selected"; ?>>Bahamas</option>
        <option value="BHR" <?php if ($defaultCheck == "BHR") echo "selected"; ?>>Bahrain</option>
        <option value="BGD" <?php if ($defaultCheck == "BGD") echo "selected"; ?>>Bangladesh</option>
        <option value="BRB" <?php if ($defaultCheck == "BRB") echo "selected"; ?>>Barbados</option>
        <option value="BLR" <?php if ($defaultCheck == "BLR") echo "selected"; ?>>Belarus</option>
        <option value="BEL" <?php if ($defaultCheck == "BEL") echo "selected"; ?>>Belgium</option>
        <option value="BLZ" <?php if ($defaultCheck == "BLZ") echo "selected"; ?>>Belize</option>
        <option value="BEN" <?php if ($defaultCheck == "BEN") echo "selected"; ?>>Benin</option>
        <option value="BMU" <?php if ($defaultCheck == "BMU") echo "selected"; ?>>Bermuda</option>
        <option value="BTN" <?php if ($defaultCheck == "BTN") echo "selected"; ?>>Bhutan</option>
        <option value="BOL" <?php if ($defaultCheck == "BOL") echo "selected"; ?>>Bolivia, Plurinational State of</option>
        <option value="BES" <?php if ($defaultCheck == "BES") echo "selected"; ?>>Bonaire, Saint-Eustache et Saba</option>
        <option value="BIH" <?php if ($defaultCheck == "BIH") echo "selected"; ?>>Bosnie-Herz&eacute;govine</option>
        <option value="BWA" <?php if ($defaultCheck == "BWA") echo "selected"; ?>>Botswana</option>
        <option value="BRA" <?php if ($defaultCheck == "BRA") echo "selected"; ?>>Br&eacute;sil</option>
        <option value="BRN" <?php if ($defaultCheck == "BRN") echo "selected"; ?>>Brun&eacute;i Darussalam</option>
        <option value="BGR" <?php if ($defaultCheck == "BGR") echo "selected"; ?>>Bulgarie</option>
        <option value="BFA" <?php if ($defaultCheck == "BFA") echo "selected"; ?>>Burkina Faso</option>
        <option value="BDI" <?php if ($defaultCheck == "BDI") echo "selected"; ?>>Burundi</option>
        <option value="CIV" <?php if ($defaultCheck == "CIV") echo "selected"; ?>>C&ocirc;te d'Ivoire</option>
        <option value="KHM" <?php if ($defaultCheck == "KHM") echo "selected"; ?>>Cambodge</option>
        <option value="CMR" <?php if ($defaultCheck == "CMR") echo "selected"; ?>>Cameroun</option>
        <option value="CAN" <?php if ($defaultCheck == "CAN") echo "selected"; ?>>Canada</option>
        <option value="CPV" <?php if ($defaultCheck == "CPV") echo "selected"; ?>>Cap-Vert</option>
        <option value="CHL" <?php if ($defaultCheck == "CHL") echo "selected"; ?>>Chili</option>
        <option value="CHN" <?php if ($defaultCheck == "CHN") echo "selected"; ?>>Chine</option>
        <option value="CYP" <?php if ($defaultCheck == "CYP") echo "selected"; ?>>Chypre</option>
        <option value="COL" <?php if ($defaultCheck == "COL") echo "selected"; ?>>Colombie</option>
        <option value="COM" <?php if ($defaultCheck == "COM") echo "selected"; ?>>Comores</option>
        <option value="COG" <?php if ($defaultCheck == "COG") echo "selected"; ?>>Congo</option>
        <option value="COD" <?php if ($defaultCheck == "COD") echo "selected"; ?>>Congo, R&eacute;publique d&eacute;mocratique du</option>
        <option value="KOR" <?php if ($defaultCheck == "KOR") echo "selected"; ?>>Cor&eacute;e, R&eacute;publique de</option>
        <option value="PRK" <?php if ($defaultCheck == "PRK") echo "selected"; ?>>Cor&eacute;e, R&eacute;publique populaire d&eacute;mocratique de</option>
        <option value="CRI" <?php if ($defaultCheck == "CRI") echo "selected"; ?>>Costa Rica</option>
        <option value="HRV" <?php if ($defaultCheck == "HRV") echo "selected"; ?>>Croatie</option>
        <option value="CUB" <?php if ($defaultCheck == "CUB") echo "selected"; ?>>Cuba</option>
        <option value="CUW" <?php if ($defaultCheck == "CUW") echo "selected"; ?>>Cura&ccedil;ao</option>
        <option value="DNK" <?php if ($defaultCheck == "DNK") echo "selected"; ?>>Danemark</option>
        <option value="DJI" <?php if ($defaultCheck == "DJI") echo "selected"; ?>>Djibouti</option>
        <option value="DMA" <?php if ($defaultCheck == "DMA") echo "selected"; ?>>Dominique</option>
        <option value="EGY" <?php if ($defaultCheck == "EGY") echo "selected"; ?>>&Eacute;gypte</option>
        <option value="SLV" <?php if ($defaultCheck == "SLV") echo "selected"; ?>>El Salvador</option>
        <option value="ARE" <?php if ($defaultCheck == "ARE") echo "selected"; ?>>&eacute;mirats arabes unis</option>
        <option value="ECU" <?php if ($defaultCheck == "ECU") echo "selected"; ?>>&Eacute;quateur</option>
        <option value="ERI" <?php if ($defaultCheck == "ERI") echo "selected"; ?>>&Eacute;rythr&eacute;e</option>
        <option value="ESP" <?php if ($defaultCheck == "ESP") echo "selected"; ?>>Espagne</option>
        <option value="EST" <?php if ($defaultCheck == "EST") echo "selected"; ?>>Estonie</option>
        <option value="USA" <?php if ($defaultCheck == "USA") echo "selected"; ?>>&eacute;tats-Unis</option>
        <option value="ETH" <?php if ($defaultCheck == "ETH") echo "selected"; ?>>&Eacute;thiopie</option>
        <option value="RUS" <?php if ($defaultCheck == "RUS") echo "selected"; ?>>F&eacute;d&eacute;ration de Russie</option>
        <option value="FJI" <?php if ($defaultCheck == "FJI") echo "selected"; ?>>Fidji</option>
        <option value="FIN" <?php if ($defaultCheck == "FIN") echo "selected"; ?>>Finlande</option>
        <option value="FRA" <?php if ($defaultCheck == "FRA") echo "selected"; ?>>France</option>
        <option value="GEO" <?php if ($defaultCheck == "GEO") echo "selected"; ?>>G&eacute;orgie</option>
        <option value="SGS" <?php if ($defaultCheck == "SGS") echo "selected"; ?>>G&eacute;orgie du Sud et &icirc;les Sandwich du Sud</option>
        <option value="GAB" <?php if ($defaultCheck == "GAB") echo "selected"; ?>>Gabon</option>
        <option value="GMB" <?php if ($defaultCheck == "GMB") echo "selected"; ?>>Gambie</option>
        <option value="GHA" <?php if ($defaultCheck == "GHA") echo "selected"; ?>>Ghana</option>
        <option value="GIB" <?php if ($defaultCheck == "GIB") echo "selected"; ?>>Gibraltar</option>
        <option value="GRC" <?php if ($defaultCheck == "GRC") echo "selected"; ?>>Gr&egrave;ce</option>
        <option value="GRD" <?php if ($defaultCheck == "GRD") echo "selected"; ?>>Grenade</option>
        <option value="GRL" <?php if ($defaultCheck == "GRL") echo "selected"; ?>>Groenland</option>
        <option value="GLP" <?php if ($defaultCheck == "GLP") echo "selected"; ?>>Guadeloupe</option>
        <option value="GUM" <?php if ($defaultCheck == "GUM") echo "selected"; ?>>Guam</option>
        <option value="GTM" <?php if ($defaultCheck == "GTM") echo "selected"; ?>>Guatemala</option>
        <option value="GGY" <?php if ($defaultCheck == "GGY") echo "selected"; ?>>Guernesey</option>
        <option value="GIN" <?php if ($defaultCheck == "GIN") echo "selected"; ?>>Guin&eacute;e</option>
        <option value="GNQ" <?php if ($defaultCheck == "GNQ") echo "selected"; ?>>Guin&eacute;e &eacute;quatoriale</option>
        <option value="GNB" <?php if ($defaultCheck == "GNB") echo "selected"; ?>>Guin&eacute;e-Bissau</option>
        <option value="GUY" <?php if ($defaultCheck == "GUY") echo "selected"; ?>>Guyane</option>
        <option value="GUF" <?php if ($defaultCheck == "GUF") echo "selected"; ?>>Guyane fran&ccedil;aise</option>
        <option value="HTI" <?php if ($defaultCheck == "HTI") echo "selected"; ?>>Ha&iuml;ti</option>
        <option value="HND" <?php if ($defaultCheck == "HND") echo "selected"; ?>>Honduras</option>
        <option value="HKG" <?php if ($defaultCheck == "HKG") echo "selected"; ?>>Hong Kong</option>
        <option value="HUN" <?php if ($defaultCheck == "HUN") echo "selected"; ?>>Hongrie</option>
        <option value="BVT" <?php if ($defaultCheck == "BVT") echo "selected"; ?>>&Icirc;le Bouvet</option>
        <option value="CXR" <?php if ($defaultCheck == "CXR") echo "selected"; ?>>&Icirc;le Christmas</option>
        <option value="IMN" <?php if ($defaultCheck == "IMN") echo "selected"; ?>>&Icirc;le de Man</option>
        <option value="HMD" <?php if ($defaultCheck == "HMD") echo "selected"; ?>>&Icirc;le Heard et &icirc;les McDonald</option>
        <option value="NFK" <?php if ($defaultCheck == "NFK") echo "selected"; ?>>&Icirc;le Norfolk</option>
        <option value="CYM" <?php if ($defaultCheck == "CYM") echo "selected"; ?>>&Icirc;les Ca&icirc;mans</option>
        <option value="CCK" <?php if ($defaultCheck == "CCK") echo "selected"; ?>>&Icirc;les Cocos (Keeling)</option>
        <option value="COK" <?php if ($defaultCheck == "COK") echo "selected"; ?>>&Icirc;les Cook</option>
        <option value="FRO" <?php if ($defaultCheck == "FRO") echo "selected"; ?>>&Icirc;les F&eacute;ro&eacute;</option>
        <option value="FLK" <?php if ($defaultCheck == "FLK") echo "selected"; ?>>&Icirc;les Falkland (Malvinas)</option>
        <option value="MNP" <?php if ($defaultCheck == "MNP") echo "selected"; ?>>&Icirc;les Mariannes du Nord</option>
        <option value="MHL" <?php if ($defaultCheck == "MHL") echo "selected"; ?>>&Icirc;les Marshall</option>
        <option value="UMI" <?php if ($defaultCheck == "UMI") echo "selected"; ?>>&Icirc;les mineures &eacute;loign&eacute;es des &eacute;tats-Unis</option>
        <option value="SLB" <?php if ($defaultCheck == "SLB") echo "selected"; ?>>&Icirc;les Salomon</option>
        <option value="TCA" <?php if ($defaultCheck == "TCA") echo "selected"; ?>>&Icirc;les Turques et Ca&iuml;ques</option>
        <option value="VIR" <?php if ($defaultCheck == "VIR") echo "selected"; ?>>&Icirc;les Vierges am&eacute;ricaines.</option>
        <option value="VGB" <?php if ($defaultCheck == "VGB") echo "selected"; ?>>&Icirc;les Vierges britanniques</option>
        <option value="IND" <?php if ($defaultCheck == "IND") echo "selected"; ?>>Inde</option>
        <option value="IDN" <?php if ($defaultCheck == "IDN") echo "selected"; ?>>Indon&eacute;sie</option>
        <option value="IRQ" <?php if ($defaultCheck == "IRQ") echo "selected"; ?>>Irak</option>
        <option value="IRN" <?php if ($defaultCheck == "IRN") echo "selected"; ?>>Iran, R&eacute;publique islamique d '</option>
        <option value="IRL" <?php if ($defaultCheck == "IRL") echo "selected"; ?>>Irlande</option>
        <option value="ISL" <?php if ($defaultCheck == "ISL") echo "selected"; ?>>Islande</option>
        <option value="ISR" <?php if ($defaultCheck == "ISR") echo "selected"; ?>>Isra&euml;l</option>
        <option value="ITA" <?php if ($defaultCheck == "ITA") echo "selected"; ?>>Italie</option>
        <option value="JAM" <?php if ($defaultCheck == "JAM") echo "selected"; ?>>Jama&iuml;que</option>
        <option value="JPN" <?php if ($defaultCheck == "JPN") echo "selected"; ?>>Japon</option>
        <option value="JEY" <?php if ($defaultCheck == "JEY") echo "selected"; ?>>Jersey</option>
        <option value="JOR" <?php if ($defaultCheck == "JOR") echo "selected"; ?>>Jordanie</option>
        <option value="KAZ" <?php if ($defaultCheck == "KAZ") echo "selected"; ?>>Kazakhstan</option>
        <option value="KEN" <?php if ($defaultCheck == "KEN") echo "selected"; ?>>Kenya</option>
        <option value="KGZ" <?php if ($defaultCheck == "KGZ") echo "selected"; ?>>Kirghizistan</option>
        <option value="KIR" <?php if ($defaultCheck == "KIR") echo "selected"; ?>>Kiribati</option>
        <option value="KWT" <?php if ($defaultCheck == "KWT") echo "selected"; ?>>Kowe&iuml;t</option>
        <option value="LSO" <?php if ($defaultCheck == "LSO") echo "selected"; ?>>Lesotho</option>
        <option value="LVA" <?php if ($defaultCheck == "LVA") echo "selected"; ?>>Lettonie</option>
        <option value="LBR" <?php if ($defaultCheck == "LBR") echo "selected"; ?>>Lib&eacute;ria</option>
        <option value="LBN" <?php if ($defaultCheck == "LBN") echo "selected"; ?>>Liban</option>
        <option value="LBY" <?php if ($defaultCheck == "LBY") echo "selected"; ?>>Libye</option>
        <option value="LIE" <?php if ($defaultCheck == "LIE") echo "selected"; ?>>Liechtenstein</option>
        <option value="LTU" <?php if ($defaultCheck == "LTU") echo "selected"; ?>>Lituanie</option>
        <option value="LUX" <?php if ($defaultCheck == "LUX") echo "selected"; ?>>Luxembourg</option>
        <option value="MKD" <?php if ($defaultCheck == "MKD") echo "selected"; ?>>Mac&eacute;doine, ancienne R&eacute;publique yougoslave de</option>
        <option value="MAC" <?php if ($defaultCheck == "MAC") echo "selected"; ?>>Macao</option>
        <option value="MDG" <?php if ($defaultCheck == "MDG") echo "selected"; ?>>Madagascar</option>
        <option value="MYS" <?php if ($defaultCheck == "MYS") echo "selected"; ?>>Malaisie</option>
        <option value="MWI" <?php if ($defaultCheck == "MWI") echo "selected"; ?>>Malawi</option>
        <option value="MDV" <?php if ($defaultCheck == "MDV") echo "selected"; ?>>Maldives</option>
        <option value="MLI" <?php if ($defaultCheck == "MLI") echo "selected"; ?>>Mali</option>
        <option value="MLT" <?php if ($defaultCheck == "MLT") echo "selected"; ?>>Malte</option>
        <option value="MAR" <?php if ($defaultCheck == "MAR") echo "selected"; ?>>Maroc</option>
        <option value="MTQ" <?php if ($defaultCheck == "MTQ") echo "selected"; ?>>Martinique</option>
        <option value="MUS" <?php if ($defaultCheck == "MUS") echo "selected"; ?>>Maurice</option>
        <option value="MRT" <?php if ($defaultCheck == "MRT") echo "selected"; ?>>Mauritanie</option>
        <option value="MYT" <?php if ($defaultCheck == "MYT") echo "selected"; ?>>Mayotte</option>
        <option value="MEX" <?php if ($defaultCheck == "MEX") echo "selected"; ?>>Mexique</option>
        <option value="FSM" <?php if ($defaultCheck == "FSM") echo "selected"; ?>>Micron&eacute;sie, &eacute;tats f&eacute;d&eacute;r&eacute;s de</option>
        <option value="MDA" <?php if ($defaultCheck == "MDA") echo "selected"; ?>>Moldova, R&eacute;publique de</option>
        <option value="MCO" <?php if ($defaultCheck == "MCO") echo "selected"; ?>>Monaco</option>
        <option value="MNG" <?php if ($defaultCheck == "MNG") echo "selected"; ?>>Mongolie</option>
        <option value="MNE" <?php if ($defaultCheck == "MNE") echo "selected"; ?>>Mont&eacute;n&eacute;gro</option>
        <option value="MSR" <?php if ($defaultCheck == "MSR") echo "selected"; ?>>Montserrat</option>
        <option value="MOZ" <?php if ($defaultCheck == "MOZ") echo "selected"; ?>>Mozambique</option>
        <option value="MMR" <?php if ($defaultCheck == "MMR") echo "selected"; ?>>Myanmar</option>
        <option value="NPL" <?php if ($defaultCheck == "NPL") echo "selected"; ?>>N&eacute;pal</option>
        <option value="NAM" <?php if ($defaultCheck == "NAM") echo "selected"; ?>>Namibie</option>
        <option value="NRU" <?php if ($defaultCheck == "NRU") echo "selected"; ?>>Nauru</option>
        <option value="NIC" <?php if ($defaultCheck == "NIC") echo "selected"; ?>>Nicaragua</option>
        <option value="NGA" <?php if ($defaultCheck == "NGA") echo "selected"; ?>>Nig&eacute;ria</option>
        <option value="NER" <?php if ($defaultCheck == "NER") echo "selected"; ?>>Niger</option>
        <option value="NIU" <?php if ($defaultCheck == "NIU") echo "selected"; ?>>Niue</option>
        <option value="NOR" <?php if ($defaultCheck == "NOR") echo "selected"; ?>>Norv&egrave;ge</option>
        <option value="NCL" <?php if ($defaultCheck == "NCL") echo "selected"; ?>>Nouvelle-Cal&eacute;donie</option>
        <option value="NZL" <?php if ($defaultCheck == "NZL") echo "selected"; ?>>Nouvelle-Z&eacute;lande</option>
        <option value="OMN" <?php if ($defaultCheck == "OMN") echo "selected"; ?>>Oman</option>
        <option value="UGA" <?php if ($defaultCheck == "UGA") echo "selected"; ?>>Ouganda</option>
        <option value="UZB" <?php if ($defaultCheck == "UZB") echo "selected"; ?>>Ouzb&eacute;kistan</option>
        <option value="PER" <?php if ($defaultCheck == "PER") echo "selected"; ?>>P&eacute;rou</option>
        <option value="PAK" <?php if ($defaultCheck == "PAK") echo "selected"; ?>>Pakistan</option>
        <option value="PLW" <?php if ($defaultCheck == "PLW") echo "selected"; ?>>Palau</option>
        <option value="PAN" <?php if ($defaultCheck == "PAN") echo "selected"; ?>>Panama</option>
        <option value="PNG" <?php if ($defaultCheck == "PNG") echo "selected"; ?>>Papouasie-Nouvelle-Guin&eacute;e</option>
        <option value="PRY" <?php if ($defaultCheck == "PRY") echo "selected"; ?>>Paraguay</option>
        <option value="NLD" <?php if ($defaultCheck == "NLD") echo "selected"; ?>>Pays-Bas</option>
        <option value="PHL" <?php if ($defaultCheck == "PHL") echo "selected"; ?>>Philippines</option>
        <option value="PCN" <?php if ($defaultCheck == "PCN") echo "selected"; ?>>Pitcairn</option>
        <option value="POL" <?php if ($defaultCheck == "POL") echo "selected"; ?>>Pologne</option>
        <option value="PYF" <?php if ($defaultCheck == "PYF") echo "selected"; ?>>Polyn&eacute;sie fran&ccedil;aise</option>
        <option value="PRI" <?php if ($defaultCheck == "PRI") echo "selected"; ?>>Porto Rico</option>
        <option value="PRT" <?php if ($defaultCheck == "PRT") echo "selected"; ?>>Portugal</option>
        <option value="QAT" <?php if ($defaultCheck == "QAT") echo "selected"; ?>>Qatar</option>
        <option value="SYR" <?php if ($defaultCheck == "SYR") echo "selected"; ?>>R&eacute;publique arabe syrienne</option>
        <option value="CAF" <?php if ($defaultCheck == "CAF") echo "selected"; ?>>R&eacute;publique centrafricaine</option>
        <option value="LAO" <?php if ($defaultCheck == "LAO") echo "selected"; ?>>R&eacute;publique d&eacute;mocratique populaire lao</option>
        <option value="DOM" <?php if ($defaultCheck == "DOM") echo "selected"; ?>>R&eacute;publique dominicaine</option>
        <option value="CZE" <?php if ($defaultCheck == "CZE") echo "selected"; ?>>R&eacute;publique tch&egrave;que</option>
        <option value="REU" <?php if ($defaultCheck == "REU") echo "selected"; ?>>R&eacute;union</option>
        <option value="ROU" <?php if ($defaultCheck == "ROU") echo "selected"; ?>>Roumanie</option>
        <option value="GBR" <?php if ($defaultCheck == "GBR") echo "selected"; ?>>Royaume-Uni</option>
        <option value="RWA" <?php if ($defaultCheck == "RWA") echo "selected"; ?>>Rwanda</option>
        <option value="SEN" <?php if ($defaultCheck == "SEN") echo "selected"; ?>>S&eacute;n&eacute;gal</option>
        <option value="ESH" <?php if ($defaultCheck == "ESH") echo "selected"; ?>>Sahara occidental</option>
        <option value="BLM" <?php if ($defaultCheck == "BLM") echo "selected"; ?>>Saint Barth&eacute;lemy</option>
        <option value="SHN" <?php if ($defaultCheck == "SHN") echo "selected"; ?>>Sainte-H&eacute;l&egrave;ne, Ascension et Tristan da Cunha</option>
        <option value="LCA" <?php if ($defaultCheck == "LCA") echo "selected"; ?>>Sainte-Lucie</option>
        <option value="KNA" <?php if ($defaultCheck == "KNA") echo "selected"; ?>>Saint-Kitts-et-Nevis</option>
        <option value="SMR" <?php if ($defaultCheck == "SMR") echo "selected"; ?>>Saint-Marin</option>
        <option value="MAF" <?php if ($defaultCheck == "MAF") echo "selected"; ?>>Saint-Martin (partie française)</option>
        <option value="SPM" <?php if ($defaultCheck == "SPM") echo "selected"; ?>>Saint-Pierre-et-Miquelon</option>
        <option value="VAT" <?php if ($defaultCheck == "VAT") echo "selected"; ?>>Saint-Si&egrave;ge (&eacute;tat de la Cit&eacute; du Vatican)</option>
        <option value="VCT" <?php if ($defaultCheck == "VCT") echo "selected"; ?>>Saint-Vincent-et-les Grenadines</option>
        <option value="WSM" <?php if ($defaultCheck == "WSM") echo "selected"; ?>>Samoa</option>
        <option value="STP" <?php if ($defaultCheck == "STP") echo "selected"; ?>>Sao Tom&eacute;-et-Principe</option>
        <option value="SRB" <?php if ($defaultCheck == "SRB") echo "selected"; ?>>Serbie</option>
        <option value="SYC" <?php if ($defaultCheck == "SYC") echo "selected"; ?>>Seychelles</option>
        <option value="SLE" <?php if ($defaultCheck == "SLE") echo "selected"; ?>>Sierra Leone</option>
        <option value="SGP" <?php if ($defaultCheck == "SGP") echo "selected"; ?>>Singapour</option>
        <option value="SXM" <?php if ($defaultCheck == "SXM") echo "selected"; ?>>Sint Maarten (partie n&eacute;erlandaise)</option>
        <option value="SVN" <?php if ($defaultCheck == "SVN") echo "selected"; ?>>Slov&eacute;nie</option>
        <option value="SVK" <?php if ($defaultCheck == "SVK") echo "selected"; ?>>Slovaquie</option>
        <option value="SOM" <?php if ($defaultCheck == "SOM") echo "selected"; ?>>Somalie</option>
        <option value="SDN" <?php if ($defaultCheck == "SDN") echo "selected"; ?>>Soudan</option>
        <option value="SSD" <?php if ($defaultCheck == "SSD") echo "selected"; ?>>Soudan du Sud</option>
        <option value="LKA" <?php if ($defaultCheck == "LKA") echo "selected"; ?>>Sri Lanka</option>
        <option value="SWE" <?php if ($defaultCheck == "SWE") echo "selected"; ?>>Su&egrave;de</option>
        <option value="CHE" <?php if ($defaultCheck == "CHE") echo "selected"; ?>>Suisse</option>
        <option value="SUR" <?php if ($defaultCheck == "SUR") echo "selected"; ?>>Suriname</option>
        <option value="SJM" <?php if ($defaultCheck == "SJM") echo "selected"; ?>>Svalbard et Jan Mayen</option>
        <option value="SWZ" <?php if ($defaultCheck == "SWZ") echo "selected"; ?>>Swaziland</option>
        <option value="TWN" <?php if ($defaultCheck == "TWN") echo "selected"; ?>>Ta&iuml;wan, province de Chine</option>
        <option value="TJK" <?php if ($defaultCheck == "TJK") echo "selected"; ?>>Tadjikistan</option>
        <option value="TZA" <?php if ($defaultCheck == "TZA") echo "selected"; ?>>Tanzanie, R&eacute;publique-Unie de</option>
        <option value="TCD" <?php if ($defaultCheck == "TCD") echo "selected"; ?>>Tchad</option>
        <option value="ATF" <?php if ($defaultCheck == "ATF") echo "selected"; ?>>Terres australes fran&ccedil;aises</option>
        <option value="IOT" <?php if ($defaultCheck == "IOT") echo "selected"; ?>>Territoire britannique de l'oc&eacute;an Indien</option>
        <option value="PSE" <?php if ($defaultCheck == "PSE") echo "selected"; ?>>Territoire palestinien occup&eacute;</option>
        <option value="THA" <?php if ($defaultCheck == "THA") echo "selected"; ?>>Tha&iuml;lande</option>
        <option value="TLS" <?php if ($defaultCheck == "TLS") echo "selected"; ?>>Timor-Leste</option>
        <option value="TGO" <?php if ($defaultCheck == "TGO") echo "selected"; ?>>Togo</option>
        <option value="TKL" <?php if ($defaultCheck == "TKL") echo "selected"; ?>>Tokelau</option>
        <option value="TON" <?php if ($defaultCheck == "TON") echo "selected"; ?>>Tonga</option>
        <option value="TTO" <?php if ($defaultCheck == "TTO") echo "selected"; ?>>Trinit&eacute;-et-Tobago</option>
        <option value="TUN" <?php if ($defaultCheck == "TUN") echo "selected"; ?>>Tunisie</option>
        <option value="TKM" <?php if ($defaultCheck == "TKM") echo "selected"; ?>>Turkm&eacute;nistan</option>
        <option value="TUR" <?php if ($defaultCheck == "TUR") echo "selected"; ?>>Turquie</option>
        <option value="TUV" <?php if ($defaultCheck == "TUV") echo "selected"; ?>>Tuvalu</option>
        <option value="UKR" <?php if ($defaultCheck == "UKR") echo "selected"; ?>>Ukraine</option>
        <option value="URY" <?php if ($defaultCheck == "URY") echo "selected"; ?>>Uruguay</option>
        <option value="VUT" <?php if ($defaultCheck == "VUT") echo "selected"; ?>>Vanuatu</option>
        <option value="VEN" <?php if ($defaultCheck == "VEN") echo "selected"; ?>>Venezuela, R&eacute;publique bolivarienne du</option>
        <option value="VNM" <?php if ($defaultCheck == "VNW") echo "selected"; ?>>Viet Nam</option>
        <option value="WLF" <?php if ($defaultCheck == "WLF") echo "selected"; ?>>Wallis et Futuna</option>
        <option value="YEM" <?php if ($defaultCheck == "YEM") echo "selected"; ?>>Y&eacute;men</option>
        <option value="ZMB" <?php if ($defaultCheck == "ZMB") echo "selected"; ?>>Zambie</option>
        <option value="ZWE" <?php if ($defaultCheck == "ZWE") echo "selected"; ?>>Zimbabwe</option>
    </select>
</div>
