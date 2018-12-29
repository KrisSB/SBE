	<script type="text/javascript">
	//JavaScript for the Character Creation Tab
                
                //Activates the following commands When someone picks a race
                function onRaceChange() {
                    getRace();
                    initStats();
                    raceChangeDefaults();
                    setStats(); 
                    raceBaseClassPoss();
                    document.getElementById('basClass').disabled=false;
                    
                };
		//gets the Race selected by the user
		function getRace() {
                    var race = parseInt(document.getElementById('race').value);
                    if(race >= 0) {
                        charPlayer.race = race;
                        charPlayer.raceName = getSelectedText('race');
                    }
		};
                function initStats() {
                    charPlayer.str = charPlayer.basStr();
                    charPlayer.dex = charPlayer.basDex();
                    charPlayer.con = charPlayer.basCon();
                    charPlayer.int = charPlayer.basInt();
                    charPlayer.spr = charPlayer.basSpr();
                        
                    charPlayer.statPointsRemaining = playerArrays.raceStats[(charPlayer.race * 11) + 10];
                    
                };
                //Sets Characters stats to displayed by the user
                function setStats() {
                    
                    var stats = ["Str","Dex","Con","Int","Spr"];
                    
                    for(var i = 0; i < stats.length; i++) {
                        var lowerCaseStat = stats[i].toLowerCase();
                        
                        document.getElementById('bas' + stats[i]).innerHTML = charPlayer['bas' + stats[i]]();
                        document.getElementById('max' + stats[i]).innerHTML = charPlayer['max' + stats[i]]();
                        document.getElementById('char' + stats[i]).innerHTML = charPlayer[lowerCaseStat];
                    }
                    
                    document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
                    
                };
                //Sets the defaults in case someone decides to change their race
		function raceChangeDefaults() {
                    
			document.getElementById('basClass').disabled=false;
			document.getElementById('prof').disabled=true;
			document.getElementById('finInitCreation').disabled=true;
			document.getElementById('prof').value = document.getElementById('profDefault').innerHTML;
			document.getElementById('basClass').value = document.getElementById('basClassDefault').innerHTML;
			var traits = document.getElementById('bscTraits').getElementsByTagName('input');
			for(var i = 0; i < playerArrays.traitEffects.length; i++){
				traits[i].checked=false;
			}
			charPlayer.basClass = null;
			charPlayer.prof = null;
                        
		};
		//Figures out which Base Classes are unlocked after choosing the race
		function raceBaseClassPoss() {

			var raceBasClassAry = ["Fighter","Healer","Rogue","Mage"];
			var raceTempArray = playerArrays.racePosBasClasses[charPlayer.race].split("");
                        
			for(var i = 0; i < raceBasClassAry.length; i++) {
				var curBaseClassId = document.getElementById(raceBasClassAry[i]);
				if(parseInt(raceTempArray[i]) === 1) {
					curBaseClassId.style.display="block";
					curBaseClassId.disabled=false;
				} else if(parseInt(raceTempArray[i]) === 0){
					curBaseClassId.style.display="none";
					curBaseClassId.disabled=true;
				}
			}
		};
                //Takes the following actions when someone picks a base class.
                function onBaseClassChange() {
                    getBaseClass();
                    setStats();
                    document.getElementById('prof').disabled=false;
                    profPoss();
                    unlockTraits();         //Unlocks all the traits
                    initTraitRestrict();    //Initial Trait Restrictions
                };
                //gets the base class the user picks
		function getBaseClass() {
                    var baseClass = parseInt(document.getElementById('basClass').value);
                    if(baseClass >= 0) {
                        charPlayer.basClass = baseClass;
                        charPlayer.basClassName = getSelectedText('basClass');
                    }
		};
                //Finds the possible options of professions baed on race and base class
		function profPoss() {
		
			var raceTempArray = playerArrays.raceProfPoss[charPlayer.race].split("");
			var basClassTempArray = playerArrays.basClassProfPoss[charPlayer.basClass].split("");
			var profs = ["Assassin" , "Barbarian" , "Bard" , "Channeler" , "Confessor" , "Crusader" , "Doomsayer" , "Druid" , "Fury" , "Huntress" , "Necromancer" , "Nightstalker" , "Prelate" , "Priest" , "Ranger" , "Scout" , "Sentinel" , "Templar"  , "Thief" , "Warlock" , "Warrior" , "Wizard"];
			for(var i = 0; i < raceTempArray.length; i++) {
				var curProfId = document.getElementById(profs[i]);
				if((parseInt(raceTempArray[i]) === 1) && (parseInt(basClassTempArray[i]) === 1)) {
					curProfId.style.display="block";
					curProfId.disabled=false;
				} else {
					curProfId.style.display="none";
					curProfId.disabled=true;
				}
			}
		};
                function traitCategories(cate) {
			
			var traitContainer = document.getElementById('bscTraits').getElementsByTagName('div');
			for(var i = 0; i < playerArrays.traitCats.length; i++)  {
			
				if(playerArrays.traitCats[i] === cate) {
					traitContainer[i].style.display="block";
				} else {
					traitContainer[i].style.display="none";
				}
				
			}
			
		};
                //Restrict Traits by Stat Requirements
                function restrictTraitByStats() {
                    
                    for(var i = 0; i < playerArrays.traitStatRequirements.length; i++) {
                        if(playerArrays.traitStatRequirements[i] !== "") {
                            var traitStatSplit = playerArrays.traitStatRequirements[i].split("/");  //splits up the string being used
                            var traitStatValue = parseInt(traitStatSplit[0]);   //finds the value of the split
                            var lowerCaseStat = traitStatSplit[1].toLowerCase(); 
                            var charStat = charPlayer[lowerCaseStat];
                            if(charStat >= traitStatValue) {
                                charPlayer.traitByStat[i] = 0;
                            } else {
                                charPlayer.traitByStat[i] = 1;
                            }
                        }
                    }
                    
                }
                //Restrict Trait By Race
                function restrictTraitByRace() {
                    for(var i = 0; i < playerArrays.traitRaceRequire.length; i++) {
                        if(playerArrays.traitRaceRequire[i] !== "") {
                            var traitRaceSplit = playerArrays.traitRaceRequire[i].split(":");
                            for(var x = 0; x < traitRaceSplit.length; x++) {
                                var traitRaceTemp = traitRaceSplit[x].split("/");
                                var traitRaceName = traitRaceTemp[0];
                                var traitRacePro = traitRaceTemp[1];
                                
                                if(traitRacePro === "prohibit") {
                                    if(traitRaceName === charPlayer.raceName)
                                        charPlayer.traitByRace[i] = 1;
                                    else
                                        charPlayer.traitByRace[i] = 0;
                                } else if(traitRacePro === "require"){
                                    if(traitRaceName === charPlayer.raceName)
                                        charPlayer.traitByRace[i] = 0;
                                    else
                                        charPlayer.traitByRace[i] = 1;
                                }
                              
                            } 
                        }
                    }
                };
                function restrictTraitByBaseClass() {
                    for(var i = 0; i < playerArrays.traitBaseClassRequire.length; i++) {
                        if(playerArrays.traitBaseClassRequire[i] !== "") {
                            var traitBaseClassSplit = playerArrays.traitBaseClassRequire[i].split(":");
                            for(var x = 0; x < traitBaseClassSplit.length; x++) {				
                                if(traitBaseClassSplit[x] !== charPlayer.basClssName) {
                                    charPlayer.traitByBaseClass[i] = 1;
                                } else {
                                    charPlayer.traitByBaseClass[i] = 0;
                                }
                            } 
                        }
                    }
                };
                //Restrict Trait if another trait is in use
                function restrictTraitByTrait(id) {
                    var traits = document.getElementById('bscTraits').getElementsByTagName('input');
                    for(var i = 0; i < playerArrays.traitToTraitRequire.length; i++) {
                        if(traits[id].checked) {
                            if((playerArrays.traitToTraitRequire[i] === playerArrays.traitToTraitRequire[id]) && (i !== id) && (playerArrays.traitToTraitRequire[i] !== "")) {
                                charPlayer.traitByTrait[i] = 1;
                            }
                        } else {
                            if((playerArrays.traitToTraitRequire[i] === playerArrays.traitToTraitRequire[id]) && (i !== id) ) {
                                charPlayer.traitByTrait[i] = 0;
                            }
                        }
                    }
                };
                //Unlocks all of the traits once base class is picked
                function unlockTraits() {
                    var traits = document.getElementById('bscTraits').getElementsByTagName('input');
                    for(var i = 0; i < playerArrays.traitCosts.length; i++) {
                        traits[i].disabled=false;
                    }
                    restrictTraitByStats();
                    restrictTraitByRace();
                    restrictTraitByBaseClass();
                };
                function initTraitRestrict() {
                    var traits = document.getElementById('bscTraits').getElementsByTagName('input');
                    for(var i = 0; i < playerArrays.traitRaceRequire.length; i++) {
                        if((charPlayer.traitByBaseClass[i] === 1) || (charPlayer.traitByRace[i] === 1) || (charPlayer.traitByStat[i] === 1)) {
                            traits[i].disabled=true;
                        } else {
                            traits[i].disabled=false;
                        }
                    }
                }
                function onTraitChange() {    
                    var traits = document.getElementById('bscTraits').getElementsByTagName('input');
                    for(var i = 0; i < playerArrays.traitRaceRequire.length; i++) {
                        if((charPlayer.traitByBaseClass[i] === 1) || (charPlayer.traitByRace[i] === 1) || (charPlayer.traitByStat[i] === 1) || (charPlayer.traitByTrait[i] === 1)) {
                            traits[i].disabled=true;
                        } else {
                            traits[i].disabled=false;
                        }
                    }
                };
                function traitEffects(id) {
                    var traitEffect = playerArrays.traitEffects[id].split(":");
                    var traits = document.getElementById('bscTraits').getElementsByTagName('input');
                    if(traits[id].checked) {
			for(var i = 0; i < traitEffect.length; i++) {
                            var traitValues = traitEffect[i].split("/");
                            var statEffected = charPlayer[traitValues[1]];
                            var effect = traitValues[0];
                            if(statEffected !== null) {
                                charPlayer[traitValues[1]] += parseInt(effect);
                            }
                        }
                        charPlayer.statPointsRemaining -= playerArrays.traitCosts[id];
                    } else {
                        for(var i = 0; i < traitEffect.length; i++) {
                            var traitValues = traitEffect[i].split("/");
                            var statEffected = charPlayer[traitValues[1]];
                            var effect = traitValues[0];
                            if(statEffected !== null) {
                                charPlayer[traitValues[1]] -= parseInt(effect); 
                            }
			}
                        charPlayer.statPointsRemaining += playerArrays.traitCosts[id];
                    }
                    setStats();
                }
		function profChange() {
                    var prof = parseInt(document.getElementById('prof').value);
                    if(prof >= 0) {
			charPlayer.prof = prof;
                        charPlayer.profName = getSelectedText('prof');
			document.getElementById('finInitCreation').disabled=false;
                    }
		};
		function addStat(statChanged) {
                    
                    var lowerCaseStat = statChanged.toLowerCase();
                    var pntStat = document.getElementById('pnt' + statChanged).value;
                    var curStat = charPlayer[lowerCaseStat];
                    var maxStat = charPlayer['max' + statChanged]();
                        
                    if(isNaN(parseInt(pntStat))) {
                        pntStat = 0;
                    }
                    var x = parseInt(pntStat);
                    var statPoints = charPlayer.statPointsRemaining;
                    if(x > statPoints) {
                        x = statPoints;
                    }
                    var check = curStat + x;
                    if(check > maxStat) {
                        charPlayer.statPointsRemaining -= (maxStat - curStat);
                        charPlayer[lowerCaseStat] = maxStat;
                    } else {
                        charPlayer.statPointsRemaining -= x;
                        charPlayer[lowerCaseStat] = check;
                    }
                    document.getElementById('char' + statChanged).innerHTML = charPlayer[lowerCaseStat];
                    document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
                    restrictTraitByStats();
                    onTraitChange();
                    restrictStatRunes(statChanged);
                    
                    
		
		};
		function minusStat(statChanged) {
                    
                    var lowerCaseStat = statChanged.toLowerCase();
                    var pntStat = document.getElementById('pnt' + statChanged).value;
                    var curStat = charPlayer[lowerCaseStat];	
                    var basStat = charPlayer['bas' + statChanged]();
                    
                    if(isNaN(parseInt(pntStat))) {
                        pntStat = 0;
                    }
                    var check = curStat - parseInt(pntStat);
                    if(check < basStat - 5 ) {
			charPlayer.statPointsRemaining += curStat - (basStat - 5);
			charPlayer[lowerCaseStat] = basStat - 5;
                    } else {
			charPlayer.statPointsRemaining += parseInt(pntStat);
			charPlayer[lowerCaseStat] = check;
                    }
                    
                    document.getElementById('char' + statChanged).innerHTML = charPlayer[lowerCaseStat];
                    document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
                    restrictTraitByStats();
                    onTraitChange();
                    restrictStatRunes(statChanged);
			
		};
		function maxStat(statChanged) {
                        var lowerCaseStat = statChanged.toLowerCase();
			var maxStat = charPlayer['max' + statChanged]();
			var curStat = charPlayer[lowerCaseStat];
			var statPoints = charPlayer.statPointsRemaining;
			if((maxStat - curStat) > statPoints) {
				charPlayer[lowerCaseStat] += statPoints;
				charPlayer.statPointsRemaining = 0;
			} else {
				charPlayer.statPointsRemaining -= (maxStat - curStat);
				charPlayer[lowerCaseStat] = maxStat;
			}
                        document.getElementById('char' + statChanged).innerHTML = charPlayer[lowerCaseStat];
                        document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
			restrictTraitByStats();
                        onTraitChange();
                        restrictStatRunes(statChanged);
                        
		};
		function minStat(statChanged) {
                        var lowerCaseStat = statChanged.toLowerCase();
			var curStat = charPlayer[lowerCaseStat];
			var basStat = charPlayer['bas' + statChanged]();
                        
			charPlayer.statPointsRemaining += (curStat - (basStat - 5));
			charPlayer[lowerCaseStat] = basStat - 5;
                        
                        document.getElementById('char' + statChanged).innerHTML = charPlayer[lowerCaseStat];
                        document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
			restrictTraitByStats();
                        onTraitChange();
                        restrictStatRunes(statChanged);
                        
		};
		function statRunes(statChanged,id) {
			
                    var statRune = parseInt(document.getElementById(statChanged + 'Runes').value);
                    if(statRune >= 0) {
                            
			var statPoints = charPlayer.statPointsRemaining;
			var curStat = charPlayer[statChanged.toLowerCase()];
                        
                        var statRuneEquipped = charPlayer[statChanged.toLowerCase() + 'Rune'];
                        
			charPlayer.statPointsRemaining += playerArrays.statRuneArray[(statRuneEquipped * 3) + 1];
			charPlayer.statPointsRemaining -= playerArrays.statRuneArray[(statRune * 3) + 1];
                        
			charPlayer[statChanged.toLowerCase()] -= playerArrays.statRuneArray[(statRuneEquipped * 3)];
			charPlayer[statChanged.toLowerCase()] += playerArrays.statRuneArray[(statRune * 3)];
                        
                        charPlayer[statChanged.toLowerCase() + 'Rune'] = statRune;
                        var maxStat = charPlayer['max' + statChanged]();
                        document.getElementById('max' + statChanged).innerHTML = maxStat;
                        document.getElementById('char' + statChanged).innerHTML = charPlayer[statChanged.toLowerCase()];
                        document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
			if(curStat > maxStat) {
                            statPoints += (curStat - maxStat); 
                            curStat = maxStat;
                        }
                    }
		}
		function restrictStatRunes(statChanged) {
			
			curStat = charPlayer[statChanged.toLowerCase()];
			var options = document.getElementById(statChanged + 'Runes').getElementsByTagName('option');
			for(var i = 0; i < playerArrays.statRuneRequireArray.length; i++) {
				
				if(curStat >= playerArrays.statRuneRequireArray[i]) {
					options[i + 1].disabled=false;
				} else {
					options[i + 1].disabled=true;
				}
				
			}
			
		}
		//Fills the Character Creation Page and also used when the character concs up
		function finInitCreation() {
			var checkbox = document.getElementById('finInitCreation');
			if(checkbox.checked) {
				document.getElementById('bscTraits').style.display="none";
				document.getElementById('bscTraitCate').style.display="none";
				document.getElementById('bscRunes').style.display="block";
				document.getElementById('race').disabled=true;
				document.getElementById('basClass').disabled=true;
				document.getElementById('prof').disabled=true;
				document.getElementById('finInitCreation').disabled=true;
				charPlayer.statPointsRemaining += 206;
                                document.getElementById('statPoints').innerHTML = charPlayer.statPointsRemaining;
                                
                                initTrainingPoints();
                                updateSkills();
                                updatePowers();
			}
		};

</script>