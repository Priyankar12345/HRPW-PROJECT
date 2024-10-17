<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
?>



<style>
        .hidden {
            display: none;
        }
    </style>
<!--html starts here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <!--<link rel="stylesheet" href="stylex.css" />!-->
    <link rel="stylesheet" type="text/css" href="previewForm/previewForm.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	 <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; /* Background color for the whole page */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Background color for the form */
        }
        h2 {
            text-align: center;
        }
        .session-info {
            margin-bottom: 20px;
        }
        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        .submit {
            width: 30%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .submit:hover {
            background-color: #45a049;
        }
		
		.title-bar {
    display: flex;
    justify-content: center; /* Horizontally center */
    align-items: center; /* Vertically center */
    padding: 20px; /* Adjust as needed */
}

.title-bar img {
    margin-right: 10px; /* Adjust as needed */
}
    </style>
	
	<title>Session Info</title>
    <style>
        /* Your CSS styles for the page */
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

     <div class="container">
        <div class="title-bar">
    <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
    <h5>ACTION FOR
    REDUCTION OF<br>
    MATERNAL AND NEONATAL<br> DEATHS
    IN TINSUKIA DISTRICT</h5>
</div>
        
		
		
    <form action="csurveyins.php" method="post" enctype="multipart/form-data">
        <div>
                    <br><input class="input " type="hidden" name="date" id="date" readonly>
                </div>

                <div>
                    <br><input class="input " type="hidden" name="time" id="time" readonly>
                </div>

                <div>
                     <br>
                    <input class="input " type="hidden" name="geoLocation" id="geoLocation" readonly>
                </div>

                <!--Name of the person :<br><input class="input" type="text" name="sperson" id="sperson" value="" required >
                <span class="error">* <?php echo $nameError;?></span>
                <br>!-->

                

                <div id="pregnancyQuestion">
    <br>
    
	<input class="input" type="hidden" name="pregnant" id="pregnant" value="no" >
	    
</div>

                <!--Enter the aadhar nmuber:<br><br>
				<input class="input" type="text" name="aadhaar" id="aadhar" value="" required >
                <br>
				
				
                <label for="image">Upload Aadhaar card Image:</label><br><br>
                <input type="file" id="image3" name="image3" accept="image/*"><br><br>!-->
				
                Select the state :<br>
                <select class="input" id="state" name="state" value="" required onchange="showExtraFields(this.value)">
                    <option value="Assam">ASSAM</option>
             
                </select><br><br>
				Select the District :<br>
                <select class="input" id="District" name="District" value="" required onchange="showExtraFields(this.value)">
                    <option value="Tinsukia">Tinsukia</option>
             
                </select><br><br>
				 Select the Block :<br>
        <select  class="input" name="block" id="block" value="" required onchange="showExtraFields(this.value)">
            <option value="">Select Block</option>
                <?php
			    $blocks = array(
             
			    "Guijan" => array("Baruaholla" => array("Balijan Gaon", "Baruahula Gaon","Betioni Gaon","Betoni Gaon","Dhariya Gaon", "Gandhiya Naharani Gaon" ,"Kajikhowa Gaon" ,"Ketanghabi Gaon","Panimodi Habi Gaon"),
				"Borguri" => array("Ahukhat Gaon", "Bherjan Gaon","Chandmari Bongali Gaon","Chandmari Gaon","Chandmari Nepali Gaon","Chikajan Gaon","Gelapukhuri Gaon","Gelapukhuri T.E.258 Nlr .Gt.","Gelapukhuri T.E.No-261 Nlr","Gelapukhuri Te.No-266 Nlr.Gt.","Gelapukhuri T.E.No-285 Nlr.Gt.","Hengaluguri Gaon (Og)","Hijuguri Gaon (Og)","Hukanpukhuri Gaon","Jariguri Gaon","Kachujan Gaon (Ct)","Kakaratoli Gaon","Katchujan Te. No 236/234/163,160,257 Nlr","Parbatia Gaon"),
				"Bozaltoli" => array("Bahbari Gaon (Ct)","Bajatoli Gaon (Og)","Lezaihula Gaon","Nakhrai Bongali Gaon","Nakhrai Dhekeri Gaon","Nakhrai Gaon","No-1balupara Gaon","No-2 Balupara Gaon","Nokhroy Te. 149/146(P)161/158,216/194/192 Nlr","Nokhroy T.E. 162/159 Nlr - 149/146 Nlr","Nokhroy T.E.184/187 Nlr","Padumani Gaon" ),
				"Dimoruguri" => array("Changmai Gaon","Dhekiajuri Gaon","Dihingia Gaon","Dimoruguri","Gaharipam Gaon","Jugipathar Gaon","Kadomoni Gaon","Kaptanchuk Gaon","Kukurekhowa Gaon","Nunpuria Bongali Gaon","Nunpuriya Kaibartta Gaon","Okanimaria Kachari Gaon","Okanimuriya Bongali Gaon"),
				"Gottong" => array("Dhakual", "Gaon Dhalakhat" ,"Bagan Gaon" ,"Dhelakhat Gaon" ,"Gotong Bongali Gaon", "Gotong Gaon", "Limbuguri T.E.151/148 Nlr.Gt.", "Limbuguri T.E.152/149/ Nlr" ,"Limbuguri T.E.225/227 Nlr.Gt." ,"Limbuguri T.E.251/149 Nlr.Gt. ","Limbuguri T.E.No-98 Darkhasta", "Wathoi Gaon"),				
				"Guijan" => array("Balijan Gaon","Bazaltoli Gaon","Bozaltoli T.E.(Div.) No-13 Fs.Gt","Erasuti Gaon","Erasuti N.C.","Guijan Gaon","Laika Forest Vill. Laika Gaon","Nalanihula Gaon","No-1 Gorangjan","No-2 Gorangjan"),
                "Khamtiguali" => array("Dinjan T.E. 106 F.C(B)","Dinjan T.E. 111 1/2 Nlr","Dinjan Te. 2 No.F.S(A)Nlr","Dinjan Te.2 No.F.S (B)","Khamti Gohali T.E 106 No.F.S(B)","Khamtigohali T.E.No 111 1/2 Nlr Gt","Nalani T.E. 187/190 Nlr.","Nalani T.E. 94/97 Nlr","Nalani T.E. No-111 Fs.","Nalani T.E.No 188/189/185/186 Nlr","Nalani T.E. No-7 Wla.","No-4 Fs.Rangagara Te.Natungaon","Rangagarah T.E. 18/179 Orr.Nlr","Wathoi Habi"),
                "Panitola" => array("Baghbari Gaon","Panitola Gaon","Panitola T.E. 108/105 Fs.","Panitola T.E. No - 105/102,75/72 Nlr","Panitola Te.No-111 Nlr","Panitola Te.No-66 Fs.Gt.","Panitola Te.No-68 Fs.Gt.","Panitola Town")),
						
				
                "Hapjan" => array("Baghjan" => array("Baghjan Gaon" ,"Dighaltarang Gaon","Dighaltarang T.E. 120/117","Dighal Tarang T.E. 120/123/215","Dighaltarang T.E. 121/122/118"), 
				"Banderkhati" => array(" Bandarkhati Gaon","Diamuli 39 Nlr","Diamuli Gaon No-1","Diamuli Gaon No-2","Diamuli T.E. 11 Nlr","Diamuli T.E. 139/136 Nlr","Diamuli T.E. 141/138 Nlr","Diamuli T.E. 168/144/195/193 N","Diamuli T.E. 181 Wl.","Diamuli T.E. 183/224 Nlr","Diamuli T.E. 205/203","Diamuli T.E. 269 Nlr","Diamuli T.E. 41 Wl","Dohutia Gaon"),
				"Barekuri" => array("Bebejia Gaon","Bihiating Gaon","Borgaon","Denka Gaon","Dhelakhat T.E. 17 Wl","Dighal Sako Gaon","Disaojan Gaon","Hatibat Gaon No-1","Hatibat Gaon No-2","Hatigarh Gaon","Jangu Khowa Gaon","Langsowal T.E. 210/208","Langsowal T.E. 31 Wl","Lesenka Gaon","Longsowal T.E. 109/112","Longsowal T.E. 114 Nlr","Lonsowal T.E. 429/192 Nlr","Na-Matapung Gaon","Purani Matapung No-1","Purani Matapung No-2","Purani Matapung No-3","Purani Matapung No-4","Purani Matapung No-5","Tarajan Gaon"),
				"Bogapani" => array("Bogapani T.E.27 Appln.No.1 Block","Bogapani T.E.27 Appln.No.2 Block","Bogapani T.E.27 Appln No.3 Block","Bogapani T.E.27 Block No.4","Bogapani T.E.32 Darkhasta","Obhatajan T.E.293 Nlr."),
				"Borhapjan" => array("Assomiya Balijan Gaon","Bongali Balijan Gaon","Borhapjan Gaon","Bortarani Gaon","Gupanari Habi Gaon","Kecheruguri Gaon","Sukanguri T.E. 109/111 Nlr"),
				"Daisajan" => array("Bor Rupai Gaon","Rupai T.E. 38/32 Wla)","Chota Rupai Gaon","Daisa.16 No. Wl.P","Daisajan T.E. 10/12/ Wl","Daisajan T.E. (1) 2 Wl","Daisajan T.E. 13/14/22/15","Daisajan T.E. 2/8/9 Wl","Daisajan T.E.No.12 Wl.","Daisa T.E. 13/9(A)","Daisa T.E. No.2 Wl","Hallowkhowa Gaon","Rupai (Patta Land)","Rupai T.E. 182 Wl","Rupai T.E. 232/230 Nlr","Rupai T.E. 233/231 Nlr","Rupai T.E. 246/244 Nlr","Rupai T.E. 249/246/265/250","Rupai T.E. 265 Nlr (Rupai T.E. 265/540 Wla)"),
				"Doidam" => array("Daidam T.E. 135/138 Wl","Daidam T.E. 38 Wl","Daidam T.E. 561/7 Wl","Pabhajan T.E. 219 Wl","Pavajan T.E. 137/130/129/124","Pavajan T.E. 206 Wl","Pavajan T.E. 65 Wl","Pabhajan T.E.220/218","Pabhajan T.E.223/221 Nlr"),
				"Doimukhia" => array("Bisakupi T.E. 72 Fs.","Bissakopi Gaon","Bissakupi T.E. 72 Wl","Daimukhiya Gaon","Daimukhiya T.E. 12 Wl","Daimukhiya T.E. 13/34/49 Wl","Daimukhiya T.E. 25/26 Wl","Daimukhiya T.E. 83 Wl","Daimukhiya T.E. 84 Wl"),
				"Hansara" => array("Chengelijan Gaon","Doomdooma Pathar Gaon","Hahsara 8 No,Grant","Hahsara T.E.15/12 Nlr.","Hahsara T.E.20/156 Orr.","Hahsara T.E. 59/56 Appln.","Hahsara T.E. 79/538 Gt.","Mulan Pathar Gaon","Raidang T.E. 122 Fs.Gt.","Samdang T.E. 48 Fs.(A)"),
				"Hapjan" => array("Betjan Bongali Gaon","Betjan Gaon","Betjan T.E. 154/151 Nlr","Betjan T.E. 255 Nlr","Betjan T.E. 297 Nlr","Chuta Hapjan G Aon No-1","Chuta Hapjan T.E. 129 Fs.","Chuta Hapjan T.E. 56 Wl","Lesengka Bangali Gaon","Makum Junction Gaon","Chotohapjan 114/4 Nlr.","Chotohapjan 120 (Pattaland)","Chotohapjan T.E. 128 Nlr.","No.2 Chutahapjan Gaon","No.3 Chotohapjan Gaon"),
				"Hatijan" => array("Amguri Gaon","Hallowtup Gaon","Hatijan Gaon","Hilikha T.E. 265 Wl","Hilikha T.E. 27 Fs.","Hilikha T.E. 5 Wl","Hukanguri T.E. 110 Fs.","Hukanguri T.E. 23/20 Nlr","Hukanguri T.E. 27 Fs.","Hukanguri T.E. 86 Nlr","Longsowal T.E. 254 Nlr","Samaguri Gaon"),
				"Kordoiguri" => array("Baghjan N.C.","Baghjan T.E. 137/140 (A) Nlr","Baghjan T.E. 137/140(B) Nlr","Baghjan T.E. 212/167/214/164","Baghjan T.E. 31 Wl","Baghjan T.E. 351/352","Baghjan T.E. 353 Nlr","Darjijan Gaon No.2","Dazijan No.1","Gatang Gaon","Hatisal Gaon No.1","Hatisal Gaon No.2","Jakaichuk Gaon","Kajanga Gaon","Kardaiguri Gaon No-2","Kardoiguri No.1","Kardoiguri No.3","Kecheruguri Gaon"),
				"Panikhowa" => array("No.1 Nazirating Gaon","No.1 Tokowani Gaon","No.2 Assomiya Gaon","No.2 Naziratng Gaon","No.2 Tokowani Gaon","Panikhowa Bongali Gaon","Panikhowa Gaon","Raidang Bongali Gaon","Raidang Gaon","Raidang Pathar Gaon","Sukanpukhuri Gaon"),
				"Samdang" => array("Raidang T.E.132 Fs.","Samdang T.E. 241/239 Nlr.","Samdang T.E.309/9i276 Wl.Appln.","Samdang T.E.46 Appln","Samdang T.E. 48 Fs (B)","Samdang T.E.48 Grant (A)","Samdang T.E.59/126/16 Wla."),
				"Tingrai" => array("Anandabag T.E.","Assomiya Pathar Gaon","Chototingrai No-2 Wla Gt.","Hullunghabi T.E.126 Appln.","No.1 Assomiya Gaon","Obhatajan Gaon","Owguri Gaon","Tingrai Forest Village","Tingrai Gaon","Uppar Mamorani Gaon"),
				"Tipuk" => array("Asomiya Balijan Gaon", "Bangali Balijan","Daisa Balijan No.1","Daisa Balijan No.2","Daisa Gaon","Dariabheti Gaon","Garumoratup Gaon","Ouguri Gaon","Tipuk 102(M) Fs","Tipuk T.E. 100 Fs.","Tipuk T.E. 101 Fs.")),
				
				
                "Itakhuli" => array("Bapuji" => array("Borbheta Bongali Gaon","Borbheta Kuhiyar Bari","Borbheta Te.331 Nlr","Borjan Gaon","Chototingrai Te.54 Fs.","Chototingrai Te. 7/8 Nlr","Khetopathar Gaon","Mohakali Te.315 Nlr.Gt.","Mohakali Te.328/338 Nlr. Grt","Mohkhuli Gaon","Pagla Basti"), 
				"Bordubi Konwaripather" => array("Bishphutia Gaon","Bordubi Rev. Town.","Hugrijan Gaon","Hugrijan No. 116 Fs.Gt.","Hugrijan T.E. 64/116 Nlr.","Konwari Pathar Block 2.","Konwari Pathar Gaon","Monkhoshi Te. No.339 Nlr.Gt.","Monkhushi T.E. 304/311 Nlr.","No. 1. Bordubi Gaon.","Sawtal Basti"),
				"Itakhuli Chariali" => array("Itakhuli Khetobari","Itakhuli T.E. 107 Nlr (125/129/126 Nlr)","Itakhuli T.E. 128,125,165,162 Nlr.Gt","Itakhuli T.E.129/125 Nlr","Itakhuli Te.250 Nlr.Gt.","Itakhuli T.E.33 Nlr Gt.","Jhinga Gaon","Kakajan Gaon","Kehang Te. 5/18 No.Darkhast","Keheng T.E. 23/145/Nlr","Keheng T.E. 36/144 Orr."),
				"Kachamari" => array("Bahadur Te.344 Nlr.","Hokani Pathar Gaon","Jengoni Gaon","Kachamari Gaon","Kharia Gaon","Khetojan 333 Nlr","No-1 Hebeda Gaon","No-2 Hebeda Gaon","No-2 Khetojan","No.2 Sukanigaon","No-3 Hebeda Gaon","Tingrai Bongali Gaon"),
				"Laipuli" => array("Bambari Gaon","Dahutia Gaon","Deohal Te.146/143 Nlr","Dewhal Te.147/144 Nlr.","Dewhal Te.278 Nlr","Dewhal T.E. Appl. No - 11 Block No - 2","Dewhal Te.Appl.No-11block No-4","Dewhal T.E.No - 6/140,193/191 Nlr. Gt","Dhoria Raitak Gaon","Hilikhaguri Goan","Keheng T.E. 23/145/Nlr","Keheng T.E. 36/144 Orr.","Kharikatia Gaon","Matie Khana Gaon","Maut Ghat Gaon","Morankari Gaon"),
				"Lakhipather" => array("Forest Vill. Lakhipathar (Ct)","Lakhipathar Block (A To E)","Mamorani Forest Village","Mamorani Gaon"),
				"Langkashi" => array("Bherbheri Gaon","Bokajan Gaon","Bozaloni T.E.19 Nlr.","Bozaloni T.E.22 Nlr","Bozaloni T.E. 23 Nlr.","Bozaloni T.E. 8/6119 N.L R","Dhulijan Gaon","Holloguri Gaon","Langkachi Gaon","Langkachi Gutibari","No.2 Dhulijan Habi Gaon","Simaluguri Gaon","Simoluguri Chuck"),
				"Rangpuria" => array("Bhimpara Gaon","Dhekiajuri Bongali Gaon","Hukanpukhuri Te.37/73 Nlr.Gt.","Lahari Kachari Gaon (Og)","Luhari Bongali Gaon","Luhari Nepali Gaon","Narsing Gaon","No-1 Patia Pathar Gaon","No-2 Patia Pathar Gaon","Pakhorijan Gaon","Tingrai Habi Gaon"),
				"Tengapani" => array("Hebeda Bongali Gaon","Hebeda Te.176/179 Nlr","Hebeda Te.Wla No-32","Langkachi T.E.307/329 Nlr.","Makum Jn.Bongali Gaon","No-2 Tingari Hebeda","Rabar Bari","Raigarh T.E.15 Nlr.","Rajgarh T.E.17 Nlr.","Rajgarh Te.26/21no.Nlr Gt","Tengapani Gaon","Tengapani Te.664/105 Nlr.Gt.","Tengapani Te.No-316 Nlr.Gt.","Tingrai Bongali Gaon","Tingrai Gaon","Tingrai Hebeda")),
				
				
				"Kakopathar" => array("Bijuliban" => array("Chikarajan","Duwarmara Gaon No.1","Duwarmara Pathar","Hahkhata Rahbari Gaon","Hollong Guri","Mailapung No.1","Natun Maithong No.1","Phillobari T.E.Co.(Darkhast 284/285)","Phillobari T.E.(Darkhast No.306)","Philobari T.E.(Dar.No.2)Pt-1"), 
				"Bordubi" => array("Bokpara T.E. 168/173 Fs.","Bokpara T.E. 169/174 Fs.","Bordubi T.E. 171/168 Nlr.","Bordubi T.E. 172/169 Nlr.","Bordubi T.E. 183/180 Nlr","Bordubi T.E. 183/180 Nlrc.","Bordubi T.E. 207/205 Nlr","Bordubi T.E. 217/215/244/242 N","Bordubi T.E. 4/544 Wl","Bordubi T.E. Wl 6","Bordubi T.E. Wli","Tongain Sunjan No-1"),
				"Buridihing" => array("Boka Pathar","Boka Pathar N.C.","Borhollong No.1","Borhollong No.2","Borhollong No.3","Borhollong Pathar","Chikarajan","Hollong Guri","Hollong Guti Bari N.C. No.2","Hollong Guti Buri N.C. No.1","Hollong Na Gaon No.1","Hollong Na Gaon No.2","Hollong Pathar","Nam Hollong Nagaon","Raidangani N.C.","Ratani Block N.C.","Ratani Pathar","Tarani Ban Gaon","Tarani Gaon","Tarani Pathar No.1","Tarani Pathar No.2"),
				"Dirak" => array("Amguri Gaon No - 1 + 2","Bor Dirak No-1","Bor Dirak No-2","Bor Dirak No-3","Bor Mechai No-1","Bor Mechai No-2","Bor Mechai No-3","Maithong Pani No-1","Maithong Pani No-2","Saru Mechai No-1","Saru Mechai No-2","Saru Mechai No-3","Soon Jan","Sumoni Gaon","Bordirak"),
				"Duwarmora" => array("Balijan","Balijan N.C.","Bebejia","Bebejia N.C.","Duarmara Gaon","Duarmara Gaon No.2","Duarmara Tea Co No 17 (Nla)","Duarmara Tea Co No 258(Wla)","Duarmara Tea Co No 259(Wla)","Duarmara Tea Co No 304(Wla)","Duarmara Tea Co No 32 (Wla)","Nalani Gaon No.2","No.1 Nalani Gaon N.C."),
				"Gabharubheti" => array("Amguri Gaon","Bamun Gaon","Bishnurpur","Borjan","Gabharu Bhati Na-Gaon","Gabhorubheti","Gauripur Gaon","Gonhai Krishnapur","Madhabpur Gaon","Mising Gaon","Moran Gaon","Padum Pathar Bijulibon","Parbotipur Gaon","Phillobari T.E. 34 Wl","Rabar Guri Gaon","Rangpur","Sitalpur Gaon","Sonowal Gaon","Soonapur Deori","Tongani Sumjan No-2","Tongani Sunjan Nc."),
				"Kailashpur" => array("Dakhin Bishrampur","Dighali Pathar","Dumchi Hatigarh","Kailashpur","Litong Gaon","Madarkhat Gaon","Nabajyoti","Namhollong Block Gaon","Namhollong Gaon","Simaluguri","Suwani Pathar N.C.","Tal Pathar","Tangana Na Gaon","Tangana T.E.(Darkhast No.3)","Tangana T.E.(Grant No.108)","Tangana T.E.(Grant No.55)","Uttar Bishrampur","Wat Hoi"),
				"Kakajan" => array("Badalbheta T.E. 111/114 Nlr","Badalbheta T.E. 28 Wl","Badla Bheta T.E. 17 Wl","Badlabheta T.E. 79/76 Nlr","Badlabheta T.E. No-559 Wl.","Kakajan Gaon No-1","Kakajan Gaon No-2","Kakajan Gaon No-3","Kakajan No-4","Kaliapani Gaon","Pithaguti Gaon No-1","Pithaguti Gaon No-2","Sakreting 40 Wl","Sakreting. 560 Wl","Sakreting (Patta Land )","Sakreting T.E. 135 Fs.","Sakreting Wl No-8","Sitolpati Gaon","Tara T.E. 123 Nlr","Tara T.E. 175/172 Nlr","Tara T.E. 2/10/53 Wl","Tara T.E. 36/92 Wl","Tara T.E. 37/41 Wl","Tara T.E. 387 Wla","Tara T.E. 81/8/548/210 Wl.","Tara T.E. 91 Wl. (A)","Tara T.E. 9 (B) Wl","Tara T.E. Wl. 546","Tara T.E. Wl. 9 (A)","Tara T.E. Wl 9 (C)","Tara T.E. Wla. 31","Tara T.E. Wl. No-37"),
				"Kakopathar" => array("Ahom Pathar","Bora Chuk No-1","Bora Chuk No-2","Borali Gaon No-1","Borali Gaon No-2","Borali Gaon No-3","Borali N.C.","Jengani Gaon","Kakapatar Town","Kakapathar No-1","Kakapathar No-2","Kakapathar No-3","Lajum Gaon No-1","Lazum Gaon","Lazum Pathar Gaon No - 1","Lazum Pathar Gaon No-2","Maj Gaon","Namuvon","Tezi Gaon No-1","Tezi Gaon No-2","Tezi Gaon No-3","Tezi Pathar","Tezi Pathar No-3","Upar Kuli Gaon","Upar Kuli Pathar","Upar Uvon Gaon No-1","Upar Uvon Gaon No-2","Uvota","Nam Hollong Nagaon","Tangana Soonjan"),
				"Koomsung" => array("Cheleng Guri Gaon No-1","Cheleng Guri No-2","Kharjan Gaon","Kumchang T.E. Grant 145/14","Kumchang Te.Grant No-287(Ab)Nc","Kumchang T.E. No-146/147 Wl.","Kumchang T.E. No-15/25/63 Wl.","Kumchang Te.No-2871(Bc) Nlr","Kumsang Te.1/48 Wl.","Kumsang Te. No-116 Wl.","Kumsang T.E. No-308 Nlr.","Kumsong Forest(Dirak Forest)","Romai Gabharu No-1","Romai Gabharu No-2","Romai Gabharu No-3","Tinga Mira Gaon (Tinga)"),
				"Maithong" => array("Chuta Dirak Gaon (Dirak)","Chuta Dirak No-1","Duwonia Maithong No-3","Duwonia Maithong No-4","Duwonia Maithong No-5","Duwonia Maithong No-6","Duwonia Maithon No-1","Duwonia Maithon No-2","Hahkhati Forest Village","Hahkhati Gaon","Hahkhati Pathar","Kachari Maithong No-2","Kachari Maithong No-3","Kachari Mathong No-4","Kachrai Mathong No-1","Saru Dirak Gaon No-1","Saru Dirak No-2"),
				"Mankhowa" => array("Bisakapi T.E. 121 Fs.","Bisakupi T.E. 121 Wl","Bisa Kupi T.E. 73 Fs.","Bisa Kupi T.E. 8 No. L.C.","Fatickjan Gaon","Manuh Khowa Gaon"),
				"Puronipukhuri " => array("Kana Pathar No.1","Kana Pathar No.2","Kana Pathar No.3","Kariajan","Kariajan N.C.","Kathal Guri","Kuju Gaon","Kuju Pathar Gaon","Madhavpur N.C.","Mahong Gaon No.1","Mahong Gaon No.2","Mihali Ritu No.1","Mihali Ritu No.2","Naya Kuju No 1","Naya Kuju No.2","Naya Kuju No.3","Naya Kuju No.4","Rituban Gaon","Ritu Kathal Guri No.1","Ritu Kathal Guri No.2"),
				"Rangajan" => array("Athengia Gaon","Borjan Gaon","Dangari T.E. 100/41/158 No.","Dangari T.E. 130 Fs.","Dangari T.E. 131 No. Fs.","Gobani Gaon","Na-Gaon","Rajagarh Gaon","Rangajan Bangali","Rangajan Block","Rangajan Gaon No-1","Rangajan Gaon No-2","Talap Bagan Gaon","Talap Gaon","Upartalap No.1","Upartalap No.2"),
				"Tongana" => array("Hatigarh Gaon","Kachijan Gaon No-2","Kachijan No-1","Kuli Bill Gaon","Na-Gaon Bongali","Tangana Bangali","Tangana Gaon","Tangana T.E. No-114 Wla.","Tongana T.E. No-22 Wla.")),
				
								
				
                "Margherita" => array("Bhitorpawoi" => array("Borkuruka","Jonglo Kuruka","Lama Gaon","Likhajan Grant No.21","Makum Block No.1","Makum Block No.2","Makum Block No.3","Makum Block No.4","Makum Block No.5","Makum Killa Forest Village","Niz Makum Gaon","Powai Mukh No.1","Powai Mukh No.2","Tankeswar Baruah Grant No.41","Vitor Powai No.1","Vitor Powai No.2"), 
				"Borbil" => array("Balijan Forest Gaon","Borbil Gaon No.1","Borbil Gaon No.2 (Bogapani)","Borbil Gaon No.3","Borjan Forest Village"),
				"Borgolai" => array("Borgolai Electric Line","Borgolai Gaon No.1","Borgolai Gaon No.2","Borgolai Grant No.Ii (Ct)","Borgolai Telkhat","Ledo Namdang Gaon","Namdang Bahbari","Namdang Coal Grant No.4","Namdang Coalliory N.C.","Namdan Golai"),
				"Brahmajan" => array("Ambikapur","Ambikapur N.C.","Brahmajan","Dibrujan No.1","Dibrujan No.2","Dibrujan No.3","Dibrujan No.4","Dibrujan No.5","Pengerigarh Grant No.8/313","Pengerigarh Grant No.93","Pengeri Garh N.C.","Phapolajan"),
				"Enthem" => array("Enthem Gaon","Enthem Naga Pathar","Hahchara Pathar","Khatangpani Gaon","Khatangpani T.E. Grant No.121","Long Gaon","Long Tikhak","Maichang Pathar","Manmaw Gaon","Manmaw Maichang N.C.","Manmaw Pathar","Manmaw Ulup Gaon","Manmaw Ulup N.C.","Mugong Gaon No.1","Mugong Gaon No.2","Mugong Pathar Gaon","Mugong Ritu Pathar N.C","Naga Pathar N.C.","Pani Gaon","Tekeri Block N.C.","Tekeri Block No.2","Tekeri Block No.3","Tekeri Gaon Block No.1","Tokopathar No.1","Toko Pathar No.2","Tokow Pathar","Ulup Pathar"),
				"Golai" => array("A.O.C. Block 2 Ndpt","Bapapung No.2","Bhim Pathar","Dhekiajan Forest Village No.1","Dhekiajan Forest Village No.2","Golai Aoc Block Gaon","Golai Gaon No.1","Golai Gaon No.2","Golai Gaon No.3","Golai Gaon No.5","Golai No.4","Kherjan Forest Village","Panbari Forest Village"),
				"Jagun" => array("Abor Gaon N.C.","Bishnupur N.C. No.1","Bishnupur N.C. No.2","Chandrapur N.C.","Doom Dooma Forest Village","Famang Nc.No.1","Famang N.C.No.2","Hemza Gaon","Hollong Guti Forest Village","Jagun","Jagun Forest Village","Kakharani Nagar N.C.","Katha Adarsha N.C.","Katha Gaon","Katha Ramnagar Nc","Kathasema N.C.","Kengia N.C.No.1","Kengia N.C.No.2","Khatang Pani Joyrampur N.C.","Lakla Pathar N.C.","Makum T.E. 88 No. Grant","Mancha Pathar","Namphai Nc","Namphoi Forest Village","Parbatipur Gaon","Parbatipur N.C.","Phillobari Na Gaon Forest Village","Rampur Nc","Rampur No.1","Rampur No.2","Rampur No.3","Tokow Pathar Sema Gaon N.C.","Wara Gaon"),
				"Ketetong" => array("Alubari Gaon No.1","Alubari Gaon No.2","Alubari Gaon No.3","Baghmora Gaon","Bapu Pathar No.1","Bapu Pathar No.2","Dibongbari","Dibong Fakial","Dibong No.1","Dibong No.2","Fakial Gaon No.1","Fakial Gaon No.2","Khaman Pathar No.1","Khaman Pathar No.2","Manmaw Gaon","Manmaw Kuhiar Bari","Manmawmukh","Manmaw Nanglai Gaon","Nakong Pathar No.1","Nakong Pathar No.2","Pangna Gaon","Pithaguti Bari Gaon","Rajkhowa Gaon","Rajkhowa Pathar","Rath Gaon (Duba)","Ubon Gaon","Ubon Pathar No.1","Ubon Pathar No.2"),
				"Kumarpatty" => array("112/109 Makum Assam T.C.No.3","112/109/Nla Grant.1 Makum Tea Co.","112/109/Nla Grant 2 Makum Tea Co.","Dirak No.1","Inthong","Makum Assam Tea Co.Darkhast-2","Margherita Kumar Potty","Namdan Gaon","Namdang Tea Co.Kabula Darkhast","Namdang Tea Co.Nlr.Grant 277(C)","Namdang Tea Co.Nlr Grant (A) No.277","Namdang Tea Co.Nlr Grant (B) No.277","Namdang Tea Co.Nlr No.277(F)","Segun Bari"),
				"Kumsai" => array("Amrit Gaon","Bisa Gaon No.1","Bisa Gaon No.2","Hasak","Hawai Pathar No.1","Hawai Pathar No.2","Hawai Pathar No.3","Kamba Gaon","Kharang Kong","Kumsai Gaon","Longtong No.1","Longtong No.2","Mulong Gaon","Nim Gaon N.C.","Nim Gaon No.1","Nim Gaon No.2","Panchung Navajuti","Panchung No.1","Taklong Nepali No.1","Taklong Nepali No.2","Tinisuti No.1","Tinisuti No.2","Tirap Mukh"),
				"Ledo" => array("Ledo Bangali Gaon","Ledo Coal Para","Ledo Gaon","Lido Town (Ct)","Wla No.11"),
				"Ledo Collieary" => array("Chiboo Gaon","Chipe Gaon","Ledo Tea Co.Nlr Grant No.174/1","Malu Gaon","Malu Gaon No. 2","Molong Pathar No.1","Molong Pathar No.2","Molong Pathar No.3","Ningda Gaon","Saliki N.C."),
				"Lekhapani" => array("Assam Rly.Wla No.85","Balijan N.C.","Lalpahar Pathar Gaon","Lalpathar Gaon","Lekha Pani Gaon","Lekhapani Nadi Kash","Lekhapani Nepali","Paharpur N.C.","Tipang Coal Grant","Tipang Pani Natun Gaon","Tipangpani Stn. Side","Tipangpani Ward","Tirap Gaon No.1","Tirap Gaon No.2","Tirap Grant No.2","Udoipur No.1","Udoipur No.2","Udoipur No.3","Wla No.2(Grant No.200 F/923-2)"),
				"Makumpathar" => array("177/174 Nlr.Grant","Agbandha ","Agbandha Bangali ","Dihing T.E.","Lagum Gaon No.1+2","Makum Pathar No.1","Makum Pathar No.2","Makum Pathar No.3","Makum Pathar No.4","Mase Gaon"),
				"Pawoi" => array("Powai Forest Village","Powai T.E."),
				"Samukjan" => array("Ledo Tikak N.C.","Lido Tikok (Ct)","Molong Bangali Gaon No.1","Molong Bangali Gaon No.2","Molong Gaon No.1","Molong Gaon No.2","Phaltu Gaon","Samukjan")),
				
				
                "Sadiya" => array("Amarpur" => array("2 No. Chillling","Amarpur","Arapatang","Bahbari","Bairagi Chapari","Champet Bodo","Charah Gaon","Chilling Lachan","Chilling Madhupur","Chilling Ming Mang","Churki Chapari","Etsum","Gejengpuri","Ghahpur","Hastinapur","Laimakuri","Napun","No. 1 Gomariguri","No. 1 Karmi","No 2 Gahpur","No.2 Karmi","No.3 Karmi","Purana Repot","Teliabari"), 
				"Ambikapur" => array("Adarsha Deori","Bodo Gaon","Dhaniapur","Katual Khuti","Kuhia Bari","Magar Gaon (Ambikapur)","Majkachari","Makuri Bosti","Milanpur Deori","Na-Chaki Gaon","Natai Deori","No.2 Lakhimi Pathar","Shimoluguri","Sonowal Gaon","Sonowal Gaon","Takajan Gaon (Tokajan Deori)"),
				"Borjiya" => array("Bokapathar","Borjhiya","Jyotish Nagar","Kapawpathar Deori","Kapou Pathar","Lakhimijan","Lakhimi Pathar","Na Tarani","Padum Pukhuri","Sonaligaon"),
				"Buraburi" => array("1 No.Borgorah Assamiya","2 No.Borgorah Assamiya","3 No.Borgorah Assamiya","Barpather","Batoni Tarani","Bhabani Gar Deori","Bhobanegar Deori","Borgorah Deopani Miri No.2","Borgorah Deopani No.1","Borgorah Kalani Miri","Buraburi Deori","Buraburi Deori No-2","Buraburi No.3","Dora Gaon","Khristian Gohain","Lakhyapur","Pachim Block Bananchal","Ratanpur","Taribari","Torani","Uttar Block"),
				"Hollowgaon" => array("Ali Chinga","Bahani Gaon N.C.","Changchap","Changchap N.C.","Gargaon N.C.","Hollow Gaon","Hulung Pathar","Kakaramara","Kukuramora Bananchal","Kukuramora N.C.","Majgaon","Nasai Gaon N.C.","Telikola Hollow","Tupsinga Gaon N.C.","Upper Nasai"),
				"Kundil" => array("1 No.Kundil","2 No. Kundil","2 No. Muluk Chapori","Bogaribari","Bojal Gaon","Borbil Pathar","Borbil Pathar Masaki","Deopani Chapori","Dikrang Gaon","Disai Miri","Disai Nadiyal","Ganeshbari","Ghurmara Chapori","Gosala Abor Miri","Jhia Gaon","Kundil Chapori","Miri Chapori","Muluk Chapori","Natun Gaon","No.1 Muluk Pathar","Purana Sadiya","Shanti Nagar Nepali"),
				"Na-Gaon" => array("1 No. Chapakhowa","2 No.Chapakhowa","2 No.Gohain Gaon","Kundil Nagar","Kundil Najia","Majuli","Mugalpur","Patidai Nagaon","Rajmao Na-Paglam"),
				"Na-Sadiya" => array("1 No.Bacha Gaon","1 No.Boiragi Math","2 No. Bacha Gaon","2 No.Boiragimath","2 No.Lakhimpuriya","3 Mile","4 Mile","Basa Gaon","Bhabala","Bhim Chapari","Dhorpur","Doom Pathar","Eka Basti","Halow Bananchal","Hilaguri Chapari N.C.","Kundil Kinar","Lakhimpuria","Lakhimpuria Nepali","Malbhuk Chapari","Na-Basa Gaon","Padumphula Gaon"),
				"Rajgarh" => array("1 No. Bishnupur","1 No. Bishnupur Pohukhowa","1 No. Rampur Megela","2 No.Bishnupur Bargohain","2 No. Bishnupur Pohukhowa","2 No.Rampur Megela","Bishnupur Bhatikhuti","Chandrapur","Dail Gaon","Dopani Bihiya","Dopani Borgaon","Dopani Gaon","Haripur","Na-Gaon","No.1 Na-Gaon","No.2 Na-Gaon"),
				"Santipur" => array("1 No.Santipur","2 No.Santipur","3 No.Santipur","4 No.Santipur","Naharbari","Shilghat Tarani"),
				"Sunpura" => array("Bil Bosti Sunpura","Bil Gaon","Bor Dhania","Borgoya Deori Gaon","Burdhania No-2","Dalapani","Na-Patia (Naptia Nadiyal)","Naptiya Ahom","Natun Balijan","Saru Dhania","Sunpura Gaon","Udaipur Deori")),
				
								
                "Saikhowa" => array("Araimuria" => array("Ajukha Gaon","Arhai Muria Gaon","Bisani Mukh Gaon No.1 (Bisani Mukh Gaon)","Bisani Mukh N.C.","Bookapathar Gaon","Bookapathar Khanda","Dighal Mechaki Gaon","Dighal Mesaki N.C.(2)"), 
				"Dangari" => array("Ajukha N.C.No.1","Ajukha N.C.No.2","Ajukha N.C.No.3","Bhereka N.C.No.1","Bhereka N.C.No.2","Bihia Gaon","Dangari Chring","Dangari Gaon","Dangari Pathar","Dhanjan T.E. 136/133 Nlr","Kailashpur T.E.26 No.W.L.","Khagarijan (Khagarijan No.1)","Lawpati Gaon No.1","Lawpati Gaon No.2","Phol Bari Habi Gaon","Phol Bari N.C.","Sada Siva T.E. 118/14","Sada Siva T.E. 337 Nlr","Sapmari Gaon No.2 N.C.","Sapmari No.1"),
				"Dhola-Dhadum" => array("Ahom Gaon","Bar Dhadum Gaon","Bojal Gaon","Dhala Gaon","Hatikhowa","Kakajan Sonari","Khaloi Gaon","Nepali Chiring","Sarudhadum Gaon","Singsi Gaon","Tirowal Pathar Gaon"),
				"Gakhirbheti" => array("Badal Pathar No.1","Badal Pathar No.2","Betoni Gaon","Borchakali N.C.","Gakhir Bheti Gaon","Kaitia Gaon .No.1","Kaitia Gaon.No.2","Laina Gaon","Laina T.E.51 Nlr","Longpit No.1","Longpit No.2","Misimikota No.1","Misimikota No.2","Na-Gaon","Na-Gaon Gakhir Bheti","Somua Gaon","Sumaijan T.E.30 No.Wl","Tamuli No.1","Tamuli No.2"),
				"Hahkhati" => array("Dirakmukh N.C.","Hahkhati Miri Gaon N.C.","Hahkhati N.C.","Hahkhati Nepali N.C.","Hahkhati T.E. Gt.No.1 Nlr","Halua Pathar N.C.","Lawpani N.C.","Lawpani N.C. (2)","Puali Pathar N.C.","Tenga Pani N.C.","(Upar)Sisini N.C.","Uppar Lawpani N.C."),
				"Khobang" => array("Khobang T.E.35/98 No.Nlr","Khobong T.E. 105 Fs.","Khowang 17/21 No. Nlr","Khowang Gaon","Khowang T.E.110/74 Wl.","Khowang T.E.21 No. Nlr","Talap T.E.100 Fs.","Tipuk T.E. 102 (1) Fs."),
				"Megela" => array("Bor Pathar N.C.","Bor Pathar No.1","Bor Pathar No.2","Bor Pathar No.3","Bor Pathar No.4","Chengeli Gaon","Kaka Sonari","Kula Pathar No.1","Kula Pathar No.2","Lukhorang N.C.","Lukhrong Gaon","Lukhrong Pathar","Megala Gaon No.1","Megala Gaon No.2","Megala T.E.No.349 Nlr","Salaguri Gaon","Sonari No.1","Sonari No.2"),
				"Na-Barmura" => array("Garai Mari N.C.","Gohain Gaon","Hatighuli N.C.","Kaliapani Vill. N.C.","Kapahtoli N.C.No.1","Kapahtoli N.C.No.2","Na-Bormura N.C.No.3","Naw Kata Gaon N.C.","No.1 Na-Bormura Gaon","No.2 Na-Bormura N.C.","Phelai Gaon N.C."),
				"Saikhowa" => array("Ajukha N.C.No.2","Bhabang Khal Gaon","Bormura Gaon","Bormura Miri Pathar","Khutipathar Gaon","Laphangkula Gaon","Miri Gaon","No.1 Dhola Bagan (No.1 Dhola Te.120/133 Fs.)","No.2 Dhola Bagan (No.2 Dhola T.E. 120/133)","Saikhowa Gaon"),
				"Talap" => array("Chamguri Gaon","Era Gaon","Khari Gaon","Kokora Toli Gaon","Samaguri Habi Gaon","Talap 36 Fs.","Talap T.E.100/41/99/100 Fs. (Talap 100 No. Fs.)","Talap T.E. 99/100/102 Fs.","Talap Town","Tenga Gaon"))
				
  
			);

            foreach ($blocks as $block => $panchayats) {
                echo "<option value='$block'>$block</option>";
            }
           ?>
        </select><br><br>

         Select the Panchayat :<br> 
        <select class="input" name="panchayat" id="panchayat" value="" required onchange="showExtraFields(this.value)">
            <option value="">Select Panchayat</option>
        </select><br><br>

         Select the Revenue Village :<br> 
        <select class="input" name="revenue_village" id="revenue_village" required onchange="showExtraFields(this.value)">
            <option value="">Select Revenue Village</option>
        </select><br><br>
		
		Enter the address :<br>
		<input class="input" type="text" name="address" id="address" value="">
        <br><br>
    

    <script>
        $(document).ready(function(){
            $("#block").change(function(){
                var block = $(this).val();
                $.ajax({
                    url: "get_panchayats.php",
                    type: "POST",
                    data: {block: block},
                    dataType: "json",
                    success: function(data){
                        $("#panchayat").html(data.panchayats);
                        $("#revenue_village").html("<option value=''>Select Revenue Village</option>");
                    }
                });
            });

            $("#panchayat").change(function(){
                var panchayat = $(this).val();
                $.ajax({
                    url: "get_revenue_villages.php",
                    type: "POST",
                    data: {panchayat: panchayat},
                    dataType: "json",
                    success: function(data){
                        $("#revenue_village").html(data.revenue_villages);
                    }
                });
            });
        });
    </script>
					
					
					
					
				</select>
				<!--Select the Sector Name:<br><br>
                <select class="input" id="sector" name="sector" value="" required onchange="showExtraFields(this.value)">
                    <option value="ASSAM">ASSAM</option>
					
					</select><br><br>!-->
				Enter the Subcenter/ HWC Name:<br>
				<input class="input" type="text" name="subcenter" id="subcenter" value="" required >
                <br><br>
				






				
				Name of the ASHA :<br><input class="input" type="text" name="sperson" id="sperson" value="<?php echo $username; ?>" readonly>
               <br>
				Phone No. of the ASHA :<br><input class="input" type="text" name="personno" id="personno" value="<?php echo $password; ?>" readonly >
                <br>
				DESIGNATION<br><input class="input" type="text" name="desi" id="desi" value="<?php echo $designation; ?>" readonly >
                <br>
				Name of the  Woman :<br><input class="input" type="text" name="pagwoman" id="pagwoman" value="" required >
                <br>
				Woman Age :<br><input class="input" type="text" name="pagwomanage" id="pagwomanage" value="" required >
                <br>
				
				Husband / woman Mobile  no :<br><input class="input" type="text" name="hmno" id="hmno" value="" required >
              </span><br>
				
				
    
   

    <script>
        function toggleImageInput() {
            var menstruationCard = document.getElementById("menstruationCard");
            var imageInput = document.getElementById("imageInput");

            if (menstruationCard.value === "yes") {
                imageInput.style.display = "block";
            } else {
                imageInput.style.display = "none";
            }
        }
    </script>

        <input class="submit" type="submit" value="Submit" name="submit"> &nbsp &nbsp &nbsp
		<button class="submit" type="button" onclick="cancel()">Cancel</button>
		<script>
    function showAdditionalInfo() {
        var selectBox = document.getElementById("pregnant");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        if (selectedValue === "yes") {
            document.getElementById("additionalInfo").style.display = "block";
        } else {
            document.getElementById("additionalInfo").style.display = "none";
        }
    }
	
	function cancel() {
        window.location.href = "startextra.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"; // Redirect to readygo.php with Woman ID
    }
</script>

                <!--<div id="patientNoQuestion" style="display: none;">
                    Enter Patient Number: <br><input class="input" type="text" name="patientNumber" id="patientNumber">
                </div>
                 
                <input class="submit" type="button" onClick="getDateAndTime(); confSubmit(this.form);" value="Submit" >!-->

                <script type="text/javascript">
                    function showExtraFields(value) {
                        var pregnancyQuestion = document.getElementById('pregnancyQuestion');
                        var patientNoQuestion = document.getElementById('patientNoQuestion');

                        // Reset fields
                        pregnancyQuestion.style.display = 'none';
                        patientNoQuestion.style.display = 'none';

                        // Show extra fields based on designation
                        if (value === 'ANM' || value === 'ASHA' || value === 'ASHA SUPERVISOR' || value === 'MPW') {
                            pregnancyQuestion.style.display = 'block';
                        } else if (value === 'CHO') {
                            patientNoQuestion.style.display = 'block';
                        }
                    }

                    function getDateAndTime() {
                        var currentDate = new Date();
                        var dateField = document.getElementById('date');
                        var timeField = document.getElementById('time');

                        var year = currentDate.getFullYear();
                        var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
                        var day = ("0" + currentDate.getDate()).slice(-2);

                        var hours = currentDate.getHours();
                        var minutes = ("0" + currentDate.getMinutes()).slice(-2);
                        var seconds = ("0" + currentDate.getSeconds()).slice(-2);

                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        hours = ("0" + hours).slice(-2);

                        var dateString = year + "-" + month + "-" + day;
                        var timeString = hours + ":" + minutes + ":" + seconds + ' ' + ampm;

                        dateField.value = dateString;
                        timeField.value = timeString;

                        // Get geo location
                        getLocation();
                    }

                    function confSubmit(form) {
                        if (confirm("Are you sure you want to submit the form?")) {
                            form.submit();
                        } else {
                            alert("You decided not to submit the form!");
                        }
                    }

                    // Get initial date and time when the page loads
                    window.onload = function() {
                        getDateAndTime();
                    };

                    // Get geo location
                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else {
                            alert("Geolocation is not supported by this browser.");
                        }
                    }

                    function showPosition(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;
                        var geoLocationField = document.getElementById("geoLocation");
                        geoLocationField.value = "Latitude: " + latitude + ", Longitude: " + longitude;
                    }
                </script>
    </form>
</body>
</html>



<!--html ends here-->










<?php
} else {
    echo "Session variables are not set.";
}
?>
