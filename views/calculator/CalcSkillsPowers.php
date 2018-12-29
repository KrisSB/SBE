<script type="text/javascript">
	//JavaScript for the Skills & Powers Tab
	
        function updatePowers() {
            var table = document.getElementById('powersTable');
            
            for(var i = 0; i < playerArrays.powersClassArray.length; i++) {
                var playerClass = playerArrays.powersClassArray[i];
                if((playerClass === charPlayer.profName) || (playerClass === charPlayer.basClassName)) {
                
                    var row = table.insertRow(-1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    
                    cell2.id = "powMin" + i;
                    cell3.id = "powMax" + i;
                    cell4.id = "powTrain" + i;
                    
                    cell1.innerHTML = playerArrays.powersNameArray[i];
                    cell3.innerHTML = 0;
                    cell4.innerHTML = 0;
                    cell5.innerHTML = "<input type=\"text\" value=\"0\" onkeyup=\"powersTrain(" + i + ")\" id=\"powCurTrain" + i + "\">";
                    
                    charPlayer.powers.push(i);
                    
                    powersDamage(i);
                }
            }
        };
        function updateSkills() {
            var table = document.getElementById('skillsTable');
            
            for(var i = 0; i < playerArrays.skillsClassArray.length; i++) {
                var playerClass = playerArrays.skillsClassArray[i];
                var playerBaseClass = playerArrays.skillsBaseClassArray[i];
                
                if((playerClass === charPlayer.profName) || (playerBaseClass === charPlayer.basClassName) || ((playerClass === "") && (playerBaseClass === ""))) {
                    var row = table.insertRow(-1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    
                    cell1.id = "skl" + playerArrays.skillsNameArray[i];
                    cell2.id = "sklCurLevel" + i;
                    cell3.id = "sklMaxLevel" + i;
                    cell4.id = "sklMaxTrains" + i;
                    cell5.id = "sklCurTrains" + i;
                    
                    cell1.innerHTML = playerArrays.skillsNameArray[i];
                    cell5.innerHTML = 0;
                    cell6.innerHTML = "<input type=\"text\" value=\"0\" onkeyup=\"skillTrain(" + i + ")\" id=\"sklTrain" + i + "\">";
                    
                    charPlayer.skills.push(i);
                    
                    skillTrain(i);
                }
            }
        };
        function skillOnPage() {
            for(var i = 0; i < charPlayer.skills.length; i++) {
                skillTrain(charPlayer.skills[i]);
            }
        };
        function powersDamage(id) {
            
            var powerSkill = playerArrays.powersSkillArray[id];
            var a = 0;
            for(var i = 0; i < playerArrays.skillsNameArray.length; i++) {
            
                if(powerSkill === playerArrays.skillsNameArray[i])
                    a = i;
            
            }
            
            if(playerArrays.powersUntrainedDamageArray[id] === "null") {
                document.getElementById("powMin" + id).innerHTML = "";
                document.getElementById("powMax" + id).innerHTML = "";
            } else {
                
                var powUntrainedDmgArray = playerArrays.powersUntrainedDamageArray[id].split("-");
                var powUntrainedMinDmg = powUntrainedDmgArray[0];
                var powUntrainedMaxDmg = powUntrainedDmgArray[1];

                var powGMedDmgArray = playerArrays.powersGMedDamageArray[id].split("-");
                var powGMedMinDmg = powGMedDmgArray[0];
                var powGMedMaxDmg = powGMedDmgArray[1];

                var pntCurrPowTrains = parseInt(document.getElementById("powTrain" + id).innerHTML);

                var powerMinDmgFinal = ((parseInt(powGMedMinDmg) - parseInt(powUntrainedMinDmg)) * (pntCurrPowTrains / 40)) + parseInt(powUntrainedMinDmg);
		var powerMaxDmgFinal = ((parseInt(powGMedMaxDmg) - parseInt(powUntrainedMaxDmg)) * (pntCurrPowTrains / 40)) + parseInt(powUntrainedMaxDmg);
		var modDmg = 0;
                var powerSkillPercent = parseInt(document.getElementById("sklCurLevel" + a).innerHTML);
                
                document.getElementById("powMin" + id).innerHTML = parseInt(minimumDamage(powerMinDmgFinal, charPlayer.curInt(), charPlayer.curSpr(), powerSkillPercent, powerSkillPercent, modDmg));
                document.getElementById("powMax" + id).innerHTML = parseInt(maximumDamage(powerMaxDmgFinal, charPlayer.curInt(), charPlayer.curSpr(), powerSkillPercent, powerSkillPercent, modDmg));
                
            }
        };
        function powersTrain(id) {
            var powerTrainer = document.getElementById('powCurTrain' + id).value;
            var pntCurPowTrain = document.getElementById('powTrain' + id);
            
            var trnPoints = charPlayer.trnPoints;
            var trnPointsUsed = charPlayer.trnPointsUsed;
            if(isNaN(powerTrainer)) {
                powerTrainer = 0;
                document.getElementById('powCurTrain' + id).value = 0;
            }
            
            if((trnPoints - (trnPointsUsed + parseInt(powerTrainer))) <= 0) {
                powerTrainer = parseInt(powerTrainer) + (trnPoints - trnPointsUsed);
                document.getElementById("powCurTrain" + id).value = parseInt(powerTrainer);
            }
            if(powerTrainer > 40) {
                powerTrainer = 40;
                document.getElementById('powCurTrain' + id).value = 40;
            }
            if(parseInt(powerTrainer) < 0) {
                powerTrainer = 0;
                document.getElementById('powCurTrain' + id).value = 0;
            }
            
            pntCurPowTrain.innerHTML = parseInt(powerTrainer);
            
            charPlayer.trnPointsUsed = trainPointsUsed();
            document.getElementById("trainingPoints").innerHTML = charPlayer.trnPoints - charPlayer.trnPointsUsed;
            
            powersDamage(id);
        };
        function skillTrain(id) {
            var sklTrainer = document.getElementById("sklTrain" + id).value;
            var maxTrains = parseInt(document.getElementById("sklMaxTrains" + id).innerHTML);
            
            var trnPoints = charPlayer.trnPoints;
            var trnPointsUsed = charPlayer.trnPointsUsed;
            
            if(isNaN(sklTrainer)) {
                sklTrainer = 0;
                document.getElementById("sklTrain" + id).value = 0;
            }
            if((trnPoints - (trnPointsUsed + parseInt(sklTrainer))) <= 0) {
                sklTrainer = parseInt(sklTrainer) + (trnPoints - trnPointsUsed);
                document.getElementById("sklTrain" + id).value = sklTrainer;
            }
            if(sklTrainer > maxTrains) {
                document.getElementById("sklTrain" + id).value = maxTrains;
            }
            if(parseInt(sklTrainer) < 0) {
                sklTrainer = 0;
                document.getElementById("sklTrain" + id).value = 0;
            }
            
            document.getElementById("sklCurTrains" + id).innerHTML = parseInt(document.getElementById("sklTrain" + id).value);
            document.getElementById("sklMaxTrains" + id).innerHTML = playerArrays.skillTrainsArray[charPlayer.int];
            document.getElementById("sklCurLevel" + id).innerHTML = skillPercent(playerArrays.skillStatBaseArray[id].toLowerCase(),parseInt(document.getElementById("sklCurTrains" + id).innerHTML));
            document.getElementById("sklMaxLevel" + id).innerHTML = skillPercent(playerArrays.skillStatBaseArray[id].toLowerCase(),parseInt(document.getElementById("sklMaxTrains" + id).innerHTML));
            
            charPlayer.trnPointsUsed = trainPointsUsed();
            
            document.getElementById("trainingPoints").innerHTML = charPlayer.trnPoints - charPlayer.trnPointsUsed;
        };	
        function trainPointsUsed() {
            var a = 0;
            for(var i = 0; i < charPlayer.skills.length; i++) {
                a += parseInt(document.getElementById('sklCurTrains' + charPlayer.skills[i]).innerHTML);   
            }
            for(var i = 0; i < charPlayer.powers.length; i++) {
                a += parseInt(document.getElementById('powTrain' + charPlayer.powers[i]).innerHTML);
            }
            return a;
        }
        function skillPercent(statBase,skillLevel) { 
			
            var baseSkillLevel = parseInt((75 + (3 * charPlayer.int) + (2 * charPlayer[statBase])) / 20);
            var totalSkillLevel = 0;
            if(skillLevel > 130) {
		totalSkillLevel += ((skillLevel - 130) * (1/4));
		skillLevel = 130;
            }
            if(skillLevel > 110) {
                totalSkillLevel += ((skillLevel - 100) * (1/3));
		skillLevel = 110;
            }
            if(skillLevel > 90) {
                totalSkillLevel += ((skillLevel - 90) * (1/2));
                skillLevel = 90;
            }	
            if(skillLevel > 10) {
                totalSkillLevel += (skillLevel - 10);
                skillLevel = 10;
            }
            totalSkillLevel += (skillLevel * 2);
            return parseInt(baseSkillLevel + totalSkillLevel);
        };
        function initTrainingPoints() {
            
            var trainPoints = 0;
			
            if(charPlayer.raceName === "Human") {
                trainPoints += 58;
            }
            if((charPlayer.basClassName === "Fighter") || (charPlayer.basClassName === "Rogue")) {
                trainPoints += 588;
            } else if((charPlayer.basClassName === "Healer") || (charPlayer.basClassName === "Mage")){
                trainPoints += 646;
            }
            charPlayer.trnPoints = trainPoints;
            document.getElementById("trainingPoints").innerHTML = charPlayer.trnPoints;
        };
        function trainingPoints() {
            
        };
		
</script>