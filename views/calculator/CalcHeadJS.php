<script type="text/javascript">
    //Global Variables taken from the MYSQL Database
    var playerArrays = {
        
        weapMinDmg: [<?php
        
            $query = "SELECT * FROM Weapons";
            $result  = mysqli_query($conn,$query);
            $temp = "";
            
            while($row = mysqli_fetch_assoc($result)) {
                
                $temp .= "," . $row["MinDamage"];
                
            }
            echo substr($temp,1);
            
        ?>] ,
        weapMaxDmg: [<?php
        
            $query1 = "SELECT * FROM Weapons";
            $result1  = mysqli_query($conn,$query1);
            $temp1 = "";
            
            while($row = mysqli_fetch_assoc($result1)) {
                
                $temp1 .= "," . $row["MaxDamage"];
                
            }
            echo substr($temp1,1);
            
        ?>] ,
        suffixBonus: [<?php
        
            $query2 = "SELECT * FROM Suffix";
            $result2  = mysqli_query($conn,$query2);
            $temp2 = "";
            
            while($row = mysqli_fetch_assoc($result2)) {
                
                $temp2 .= "," . $row["Bonus"];
                
            }
            echo substr($temp2,1);
            
        ?>] ,               
        suffixEff: [<?php
        
            $query3 = "SELECT * FROM Suffix";
            $result3  = mysqli_query($conn,$query3);
            $temp3 = "";
            
            while($row = mysqli_fetch_assoc($result3)) {
                
                $temp3 .= "," . "\"" . $row["Type"] . "\"";
                
            }
            echo substr($temp3,1);
            
        ?>] ,
        prefixBonus: [<?php
        
            $query4 = "SELECT * FROM Prefix";
            $result4  = mysqli_query($conn,$query4);
            $temp4 = "";
            
            while($row = mysqli_fetch_assoc($result4)) {
                
                $temp4 .= "," . $row["Bonus"];
                
            }
            echo substr($temp4,1);
            
        ?>] ,               
        prefixEff: [<?php
        
            $query5 = "SELECT * FROM Prefix";
            $result5  = mysqli_query($conn,$query5);
            $temp5 = "";

            while($row = mysqli_fetch_assoc($result5)) {
                
                $temp5 .= "," . "\"" . $row["Type"] . "\"";
                
            }
            echo substr($temp5,1);
            
        ?>] ,
        baseHealthBonus: [<?php
				
            $query6 = "SELECT * FROM BaseClass";
            $result6 = mysqli_query($conn,$query6);
            $temp6 = "";
            
            while($row = mysqli_fetch_assoc($result6)) {
				
                $temp6 .= "," . $row['HealthBonus'];
				
            }
            echo substr($temp6,1);
				
        ?>] , 
        promoHealthBonus: [<?php
				
            $query7 = "SELECT * FROM Professions";
            $result7 = mysqli_query($conn,$query7);
            $temp7 = "";
            
            while($row = mysqli_fetch_assoc($result7)) {
				
                $temp7 .= "," . $row['HealthBonus'];
				
            }
            echo substr($temp7,1);
				
	?>] ,
        raceHealthBonus: [<?php
				
            $query8 = "SELECT * FROM Race";
            $result8 = mysqli_query($conn,$query8);
            $temp8 = "";
            
            while($row = mysqli_fetch_assoc($result8)) {
				
                $temp8 .= "," . $row['HealthBonus'];
				
            }
            echo substr($temp8,1);
                                
	?>] ,
        baseManaBonus: [<?php
				
            $query9 = "SELECT * FROM BaseClass";
            $result9 = mysqli_query($conn,$query9);
            $temp9 = "";
            
            while($row = mysqli_fetch_assoc($result9)) {
				
                $temp9 .= "," . $row['ManaBonus'];
				
            }
            echo substr($temp9,1);
				
        ?>] ,
        promoManaBonus: [<?php
				
            $query10 = "SELECT * FROM Professions";
            $result10 = mysqli_query($conn,$query10);
            $temp10 = "";
            
            while($row = mysqli_fetch_assoc($result10)) {
				
                $temp10 .= "," . $row['ManaBonus'];
				
            }
            echo substr($temp10,1);
				
	?>] ,
        raceManaBonus: [<?php
				
            $query11 = "SELECT * FROM Race";
            $result11 = mysqli_query($conn,$query11);
            $temp11 = "";
            
            while($row = mysqli_fetch_assoc($result11)) {
				
                $temp11 .= "," . $row['ManaBonus'];
				
            }
            echo substr($temp11,1);
				
        ?>] ,
        baseStaminaBonus: [<?php
				
            $query12 = "SELECT * FROM BaseClass";
            $result12 = mysqli_query($conn,$query12);
            $temp12 = "";
				
            while($row = mysqli_fetch_assoc($result12)) {
				
                $temp12 .= "," . $row['StaminaBonus'];
				
            }
            echo substr($temp12,1);
				
	?>] ,
        promoStaminaBonus: [<?php
				
            $query13 = "SELECT * FROM Professions";
            $result13 = mysqli_query($conn,$query13);
            $temp13 = "";
            
            while($row = mysqli_fetch_assoc($result13)) {
				
                $temp13 .= "," . $row['StaminaBonus'];
				
            }
            echo substr($temp13,1);
				
        ?>] ,
        raceStaminaBonus: [<?php
				
            $query14 = "SELECT * FROM Race";
            $result14 = mysqli_query($conn,$query14);
            $temp14 = "";
		
            while($row = mysqli_fetch_assoc($result14)) {
				
                $temp14 .= "," . $row['StaminaBonus'];
				
            }
            echo substr($temp14,1);
				
	?>] ,
        traitCosts: [<?php
				
            $query15 = "SELECT * FROM StartingTraits";
            $result15 = mysqli_query($conn,$query15);
            $temp15 = "";
				
            while($row = mysqli_fetch_assoc($result15)) {
				
                $temp15 .= "," . $row['Cost'];
				
            }
            echo substr($temp15,1);
				
	?>] ,
        traitEffects: [<?php
				
            $query16 = "SELECT * FROM StartingTraits";
            $result16 = mysqli_query($conn,$query16);
            $temp16 = "";
				
            while($row = mysqli_fetch_assoc($result16)) {
				
                $temp16 .= "," . "\"" . $row['Effect'] . "\"";
				
            }
            echo substr($temp16,1);
				
	?>] ,
        raceStats: [<?php
				
            $query18 = "SELECT * FROM Race";
            $result18 = mysqli_query($conn,$query18);
            $temp18 = "";
				
            while($row = mysqli_fetch_assoc($result18)) {
				
                $temp18 .= "," . $row['Base Strength'] . "," . $row['Max Strength'] . "," . $row['Base Dexterity'] . "," . $row['Max Dexterity'] . "," . $row['Base Constitution'] . "," . $row['Max Constitution'] . "," . $row['Base Intelligence'] . "," . $row['Max Intelligence'] . "," . $row['Base Spirit'] . "," . $row['Max Spirit'] . "," . $row['StatPoints'];
				
            }
            echo substr($temp18,1);
				
	?>] ,
        racePosBasClasses: [<?php
				
            $query19 = "SELECT * FROM Race";
            $result19 = mysqli_query($conn,$query19);
            $temp19 = "";
				
            while($row = mysqli_fetch_assoc($result19)) {
				
                $temp19 .=  "," . "\"" . $row['BaseClasses'] . "\"";
                
            }
            echo substr($temp19,1);
				
	?>] ,
        basStatArray: [<?php
				
            $query20 = "SELECT * FROM BaseClass";
            $result20 = mysqli_query($conn,$query20);
            $temp20 = "";
				
            while($row = mysqli_fetch_assoc($result20)) {
				
                $temp20 .=  "," . $row['Strength'] . "," . $row['Dexterity'] . "," . $row['Constitution'] . "," . $row['Intelligence'] . "," . $row['Spirit'];
				
            }
            echo substr($temp20,1);
				
	?>] ,
        raceProfPoss: [<?php
				
            $query21 = "SELECT * FROM Race";
            $result21 = mysqli_query($conn,$query21);
            $temp21 = "";
				
            while($row = mysqli_fetch_assoc($result21)) {
				
                $temp21 .=  "," . "\"" . $row['Professions'] . "\"";
                        
            }
            echo substr($temp21,1);
				
	?>] ,
        basClassProfPoss: [<?php
				
            $query22 = "SELECT * FROM BaseClass";
            $result22 = mysqli_query($conn,$query22);
            $temp22 = "";
				
            while($row = mysqli_fetch_assoc($result22)) {
				
                $temp22 .=  "," . "\"" . $row['Professions'] . "\"";
                
            }
            echo substr($temp22,1);
				
	?>] ,
        traitCats: [<?php
				
            $query23 = "SELECT * FROM StartingTraits";
            $result23 = mysqli_query($conn,$query23);
            $temp23 = "";
				
            while($row = mysqli_fetch_assoc($result23)) {
				
                $temp23 .= "," . "\"" . $row['Category'] . "\"";
                
            }
            echo substr($temp23,1);
				
	?>] ,
        traitStatRequirements: [<?php
				
            $query24 = "SELECT * FROM StartingTraits";
            $result24 = mysqli_query($conn,$query24);
            $temp24 = "";
				
            while($row = mysqli_fetch_assoc($result24)) {
				
                $temp24 .= "," . "\"" . $row['Require'] . "\"";
				
            }
            echo substr($temp24,1);
				
	?>] ,
        traitToTraitRequire: [<?php
				
            $query25 = "SELECT * FROM StartingTraits";
            $result25 = mysqli_query($conn,$query25);
            $temp25 = "";
				
            while($row = mysqli_fetch_assoc($result25)) {
				
                $temp25 .= "," . "\"" . $row['TraitRestrict'] . "\"";
                
            }
            echo substr($temp25,1);
				
	?>] ,
        traitRaceRequire: [<?php
				
            $query26 = "SELECT RaceRequire FROM StartingTraits";
            $result26 = mysqli_query($conn,$query26);
            $temp26 = "";
				
            while($row = mysqli_fetch_assoc($result26)) {
				
                $temp26 .= "," . "\"" . $row['RaceRequire'] . "\"";
                
            }
            echo substr($temp26,1);
				
	?>] ,
        traitBaseClassRequire: [<?php
				
            $query27 = "SELECT BaseClassRestrict FROM StartingTraits";
            $result27 = mysqli_query($conn,$query27);
            $temp27 = "";
				
            while($row = mysqli_fetch_assoc($result27)) {
				
                $temp27 .= "," . "\"" . $row['BaseClassRestrict'] . "\"";
		
            }
            echo substr($temp27,1);
				
	?>] ,
        statRuneArray: [<?php
				
            $query32 = "SELECT * FROM StatRunes";
            $result32 = mysqli_query($conn,$query32);
            $temp32 = "";
				
            while($row = mysqli_fetch_assoc($result32)) {
				
		$temp32 .= "," . $row['initBoost'] . "," . $row['Cost'] . "," . $row['maxBoost'];
					
            }
            echo substr($temp32,1);
            
        ?>] , 
        statRuneRequireArray: [<?php
				
            $query33 = "SELECT * FROM StatRunes";
            $result33 = mysqli_query($conn,$query33);
            $temp33 = "";
				
            while($row = mysqli_fetch_assoc($result33)) {
                
		$temp33 .= "," . $row['Require'];
					
            }
            echo substr($temp33,1);
	?>] , 
        powersClassArray: [<?php
        
            $query34 = "SELECT Class FROM powers";
            $result34 = mysqli_query($conn,$query34);
            $temp34 = "";
				
            while($row = mysqli_fetch_assoc($result34)) {
                
		$temp34 .= "," . "\"" . $row['Class'] . "\"";
					
            }
            echo substr($temp34,1);
        
        ?>] , 
        powersNameArray: [<?php
        
            $query35 = "SELECT Name FROM powers";
            $result35 = mysqli_query($conn,$query35);
            $temp35 = "";
				
            while($row = mysqli_fetch_assoc($result35)) {
                
		$temp35 .= "," . "\"" . $row['Name'] . "\"";
					
            }
            echo substr($temp35,1);
        
        ?>] , 
        skillsClassArray: [<?php
        
            $query36 = "SELECT Class FROM skills";
            $result36 = mysqli_query($conn,$query36);
            $temp36 = "";
				
            while($row = mysqli_fetch_assoc($result36)) {
                
		$temp36 .= "," . "\"" . $row['Class'] . "\"";
					
            }
            echo substr($temp36,1);
        
        ?>] , 
        skillsNameArray: [<?php
        
            $query37 = "SELECT Name FROM skills";
            $result37 = mysqli_query($conn,$query37);
            $temp37 = "";
				
            while($row = mysqli_fetch_assoc($result37)) {
                
		$temp37 .= "," . "\"" . $row['Name'] . "\"";
					
            }
            echo substr($temp37,1);
        
        ?>] , 
        skillsBaseClassArray: [<?php
        
            $query38 = "SELECT BaseClass FROM skills";
            $result38 = mysqli_query($conn,$query38);
            $temp38 = "";
				
            while($row = mysqli_fetch_assoc($result38)) {
                
		$temp38 .= "," . "\"" . $row['BaseClass'] . "\"";
					
            }
            echo substr($temp38,1);
        
        ?>] , 
        powersUntrainedDamageArray: [<?php
        
            $query39 = "SELECT untrainedDmgRange FROM powers";
            $result39 = mysqli_query($conn,$query39);
            $temp39 = "";
				
            while($row = mysqli_fetch_assoc($result39)) {
                
		$temp39 .= "," . "\"" .  $row['untrainedDmgRange'] . "\"";
					
            }
            echo substr($temp39,1);
        
        ?>] , 
        powersGMedDamageArray: [<?php
        
            $query40 = "SELECT GMedDmgRange FROM powers";
            $result40 = mysqli_query($conn,$query40);
            $temp40 = "";
				
            while($row = mysqli_fetch_assoc($result40)) {
                
		$temp40 .= "," .  "\"" . $row['GMedDmgRange'] . "\"";
                
            }
            echo substr($temp40,1);
        
        ?>] , 
        powersSkillArray: [<?php
        
            $query41 = "SELECT Focus FROM powers";
            $result41 = mysqli_query($conn,$query41);
            $temp41 = "";
				
            while($row = mysqli_fetch_assoc($result41)) {
                
		$temp41 .= "," . "\"" .  $row['Focus'] . "\"";
                
            }
            echo substr($temp41,1);
        
        ?>] , 
        skillStatBaseArray: [<?php
        
            $query42 = "SELECT StatBase FROM skills";
            $result42 = mysqli_query($conn,$query42);
            $temp42 = "";
				
            while($row = mysqli_fetch_assoc($result42)) {
                
		$temp42 .= "," . "\"" .  $row['StatBase'] . "\"";
                
            }
            echo substr($temp42,1);
        
        ?>] , 
        skillTrainsArray: [29, 29, 29, 29, 29, //0 to 4
            29, 32, 34, 36, 38, //5 to 9
            40, 42, 43, 45, 47, //10 to 14
            48, 49, 51, 52, 53, //15 to 19
            55, 56, 57, 58, 59, //20 to 24
            60, 62, 63, 64, 65, //25 to 29
            66, 67, 68, 68, 69, //30 to 34
            70, 71, 72, 73, 74, //35 to 39
            75, 76, 76, 77, 78, //40 to 44
            79, 80, 80, 81, 82, //45 to 49
            83, 83, 84, 85, 85, //50 to 54
            86, 87, 88, 88, 89, //55 to 59
            90, 90, 91, 92, 92, //60 to 64
            93, 94, 94, 95, 95, //65 to 69
            96, 97, 97, 98, 99, //70 to 74
            99, 100, 100, 101, 101, //75 to 79
            102, 103, 103, 104, 104, //80 to 84
            105, 105, 106, 106, 107, //85 to 89
            108, 109, 109, 110, 110, //90 to 94
            111, 112, 112, 113, 113, //95 to 99
            114, 115, 115, 116, 116, //100 to 104
            117, 118, 118, 119, 119, //105 to 109
            120, 121, 121, 122, 122, //110 to 114
            123, 124, 124, 125, 125, //115 to 119
            126, 127, 127, 128, 128, //120 to 124
            129, 130, 130, 131, 131, //125 to 129
            132, 133, 133, 134, 134, //130 to 134
            135, 136, 136, 137, 137, //135 to 139
            138, 139, 139, 140, 140, //140 to 144
            141, 142, 142, 143, 143, //145 to 149
            144, 145, 145, 146, 146, //150 to 154
            147, 148, 148, 149, 149, //155 to 159
            150, 151, 151, 152, 152, //160 to 164
            153, 154, 154, 155, 155, //165 to 169
            156, 157, 157, 158, 158, //170 to 174
            159, 160, 160, 161, 161, //175 to 179
            162, 163, 163, 164, 164, //180 to 184
            165, 166, 166, 167, 167, //185 to 189
            168] //190
    };
    
    function player() {
     
        //Character Stats
        this.str = 0;
        this.dex = 0; 
        this.con = 0;
        this.int = 0;
        this.spr = 0;
        
        //Character Buffs
        this.strBuff = 0;
        this.dexBuff = 0;
        this.conBuff = 0;
        this.intBuff = 0;
        this.sprBuff = 0;
        
        //Character Identity
        this.basClass = null;
        this.basClassName = null;
        this.prof = null;
        this.profName = null;
        this.race = null;
        this.raceName = null;
        
        //Stat Point
        this.statPointsRemaining = null;
        
        this.strRune = 0;
        this.dexRune = 0;
        this.conRune = 0;
        this.intRune = 0;
        this.sprRune = 0;
        
        //Character Stats after buffs
        this.curStr = function() { return (this.str + this.strBuff); };
        this.curDex = function() { return (this.dex + this.dexBuff); };
        this.curCon = function() { return (this.con + this.conBuff); };
        this.curInt = function() { return (this.int + this.intBuff); };
        this.curSpr = function() { return (this.spr + this.sprBuff); };
        
        this.traitBasStr = 0;
        this.traitBasDex = 0;
        this.traitBasCon = 0;
        this.traitBasInt = 0;
        this.traitBasSpr = 0;
        
        this.traitMaxStr = 0;
        this.traitMaxDex = 0;
        this.traitMaxCon = 0;
        this.traitMaxInt = 0;
        this.traitMaxSpr = 0;
        
        //Character Base Stats
        this.basStr = function() { return setBaseStat(this.race, this.basClass, 0, this.traitBasStr); };
        this.basDex = function() { return setBaseStat(this.race, this.basClass, 1, this.traitBasDex); };
        this.basCon = function() { return setBaseStat(this.race, this.basClass, 2, this.traitBasCon); };
        this.basInt = function() { return setBaseStat(this.race, this.basClass, 3, this.traitBasInt); };
        this.basSpr = function() { return setBaseStat(this.race, this.basClass, 4, this.traitBasSpr); };
        
        //Character Max Stats
        this.maxStr = function() { return setMaxStat(this.race, this.strRune, 0, this.traitMaxStr); };
        this.maxDex = function() { return setMaxStat(this.race, this.dexRune, 1, this.traitMaxDex); };
        this.maxCon = function() { return setMaxStat(this.race, this.conRune, 2, this.traitMaxCon); };
        this.maxInt = function() { return setMaxStat(this.race, this.intRune, 3, this.traitMaxInt); };
        this.maxSpr = function() { return setMaxStat(this.race, this.sprRune, 4, this.traitMaxSpr); };
        
        this.traitByStat = [<?php 
            $query28 = "SELECT * FROM StartingTraits";
            $result28 = mysqli_query($conn,$query28);
            $temp28 = "";
				
            while($row = mysqli_fetch_assoc($result28)) {
				
                $temp28 .= "," . "0";
		
            }
            echo substr($temp28,1);
        ?>];
        this.traitByTrait = [<?php 
            $query29 = "SELECT * FROM StartingTraits";
            $result29 = mysqli_query($conn,$query29);
            $temp29 = "";
				
            while($row = mysqli_fetch_assoc($result29)) {
				
                $temp29 .= "," . "0";
		
            }
            echo substr($temp29,1);
        ?>];
        this.traitByRace = [<?php 
            $query30 = "SELECT * FROM StartingTraits";
            $result30 = mysqli_query($conn,$query30);
            $temp30 = "";
				
            while($row = mysqli_fetch_assoc($result30)) {
				
                $temp30 .= "," . "0";
		
            }
            echo substr($temp30,1);
        ?>];
        this.traitByBaseClass = [<?php 
            $query31 = "SELECT * FROM StartingTraits";
            $result31 = mysqli_query($conn,$query31);
            $temp31 = "";
            
				
            while($row = mysqli_fetch_assoc($result31)) {
				
                $temp31 .= "," . "0";
		
            }
            echo substr($temp31,1);
        ?>];
        
        this.skills = [];
        this.powers = [];
        
        this.trnPoints = 0;
        this.trnPointsUsed = 0;
        
        this.healthBonus = 0;
        this.manaBonus = 0;
        this.stamBonus = 0;
        
        this.f = 39 + (75 - 59) * 0.1;
        this.g = 30 + (75 - 59) * 0.1;
        
        //Character Health, Mana, Stamina Methods
        this.health = function() {
            var toughness = 0;
            return ((((this.f * playerArrays.baseHealthBonus[this.basClass]) + (this.g * playerArrays.promoHealthBonus[this.prof])) * (0.3 + (0.005 * this.curCon())) + (this.curCon() + playerArrays.raceHealthBonus[this.race])) * (1 + toughness / 400)) + this.healthBonus;
        };
        this.mana = function() {
            return (((this.f * playerArrays.baseManaBonus[this.basClass]) + (this.g * playerArrays.promoManaBonus[this.prof])) * (0.3 + (0.005 * this.curSpr())) + (this.curSpr() + playerArrays.raceManaBonus[this.race])) + this.manaBonus;
        };
        this.stam = function() {
            var athletics = 0;
            return ((((this.f * playerArrays.baseStaminaBonus[this.basClass]) + (this.g * playerArrays.promoStaminaBonus[this.prof])) * (0.3 + (0.005 * this.curCon())) + (this.curCon() + playerArrays.raceStaminaBonus[this.race])) * (1 + athletics / 300)) + this.stamBonus;
	};

        //Character Atr and Def Methods
        this.atr = function() {
            
        };	
        this.def = function() {
            
        };

    }
    //Gets the base stats for the Character
    function setBaseStat(race, baseClass, stat, traitbonus) {
        var tempStat = 0;
        if(race !== null)
            tempStat += playerArrays.raceStats[(race * 11) + (stat * 2)];     //Finds the races base stat in the raceStats Array
        if(baseClass !== null)
            tempStat += playerArrays.basStatArray[(baseClass * 5) + stat];    //Finds the base classes base stat in the basStatArray Array
        
        tempStat += traitbonus;
        return tempStat;
    }
    
    //Gets the max Stats for the Character
    function setMaxStat(race, rune, stat, traitbonus) {
     
        var tempStat = 0;
        if(this.race !== 'null')
            tempStat += playerArrays.raceStats[(race * 11) + (stat * 2) + 1];     //Finds the races max stat within raceStat Array
        if(this.rune !== 'null')
            tempStat += playerArrays.statRuneArray[(rune * 3) + 2];
        
        tempStat += traitbonus;
        return tempStat;
     
    }

    //playerG)ear Constructor
    function playerGear() {
        
        this.weapMainID = null;
        this.weapMainMinDmg = function() { return (this.weapMainID === null) ? 0 : playerArrays.weapMinDmg[this.weapMainID]; };
        this.weapMainMaxDmg = function() { return (this.weapMainID === null) ? 0 : playerArrays.weapMaxDmg[this.weapMainID]; };
        
        this.weapMPrefixID = null;
        this.weapMPrefixValue = function() { return playerArrays.prefixBonus[this.weapMPrefixID]; };
        this.weapMPrefixType = function() { return playerArrays.prefixEff[this.weapMPrefixID]; };
        
        this.weapMSuffixID = null;
        this.weapMSuffixValue = function() { return playerArrays.suffixBonus[this.weapMSuffixID]; };
        this.weapMSuffixType = function() { return playerArrays.suffixEff[this.weapMSuffixID]; };
        
        this.weapMTotalMinDmg = function() { return (this.weapMSuffixType() === "Min") ? this.weapMainMinDmg() + this.weapMSuffixValue() : this.weapMainMinDmg(); };
        this.weapMTotalMaxDmg = function() { return (this.weapMSuffixType() === "Max") ? this.weapMainMaxDmg() + this.weapMSuffixValue() : this.weapMainMaxDmg(); };
        
        this.weapMAtrBonus = function() { return (this.weapMPrefixType === "Atr") ? this.weapMPrefixValue : 0; };

        this.weapOffID = null;
        
    }
    var charPlayer = new player();      //Creates the object charPlayer from the function player()
</script>