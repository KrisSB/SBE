<div id="content">
            
            <ul id="CalcNav">
                <li id="NavBasic" value="Character Creation" onclick="changePage('Basic')">Character Creation</li>
                <li id="NavPoints" value="Powers" onclick="changePage('Points'), fillCharacter(),skillOnPage()">Skills & Powers</li>
                <li id="NavGear" value="Gear" onclick="changePage('Gear')">Gear</li>
                <li id="NavCharacter" value="Character Information" onclick="changePage('Character'),fillResists(), fillCharacter()">Character Information</li>
                <li id="NavResists" value="Resists" onclick="changePage('Resists'),fillResists()">Resists</li>
            </ul>
            <span id="test"></span>
            <div id="Basic">
                <span id="bscRace">
                    <select id="race" onchange="onRaceChange()" onkeyup="onRaceChange()">
                        <option>Select a Race...</option>
                        <?php
                            $query = "SELECT * FROM Race";
                            $result = mysqli_query($conn,$query);
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)) {
                            
                                echo "<option value=$i>" . $row['Race'] . "</option>
                                ";
                                $i++;
                            }
                        ?>
                    </select>
                </span>
                <span id="bscBase">
                    <select id="basClass" onchange="onBaseClassChange()" onkeyup="onBaseClassChange()" disabled>
                        <option id="basClassDefault">Select a Base Class...</option>
                        <?php
                            $query = "SELECT * FROM BaseClass";
                            $result = mysqli_query($conn,$query);
                            $i = 0;
                                                    while($row = mysqli_fetch_assoc($result)) {
                            
                                echo "<option id=\"" . $row['BaseClass'] . "\" value=$i style=\"display:none\" disabled>" . $row['BaseClass'] . "</option>
                                ";
                                $i++;
                            }
                        ?>
                    </select>
                </span>
                <span id="bscProf">
                    <select id="prof" onchange="profChange()" onkeyup="profChange()" disabled>
                        <option id="profDefault">Select a Profession...</option>
                        <?php
                            $prof = array("Assassin" , "Barbarian" , "Bard" , "Channeler" , "Confessor" , "Crusader" , "Doomsayer" , "Druid" , "Fury" , "Huntress" , "Necromancer" , "Nightstalker" , "Prelate" , "Priest" , "Ranger" , "Scout" , "Sentinel" , "Templar"  , "Thief" , "Warlock" , "Warrior" , "Wizard");
                            for($i = 0; $i < count($prof); $i++) {
                                echo "<option id=\"$prof[$i]\" value=$i style=\"display:none\" disabled>$prof[$i]</option>";
                            }
                        ?>
                    </select>
                </span>
                <span>
                    <input type="checkbox" id="finInitCreation" onclick="finInitCreation()" disabled><span id="finTitle"> Finished Start-up</span>
                </span>
                <div id="bscStats">
                    <table>
                        <tr>
                            <td>Stat</td>
                            <td>Base</td>
                            <td>Max</td>
                            <td>Character</td>
                            <td COLSPAN = 5>Training</td>
                        </tr>
                        <?php
                            $ary1 = array("Strength","Dexterity","Constitution","Intelligence","Spirit");
                            $ary2 = array("Str","Dex","Con","Int","Spr");
                            for($i = 0; $i < count($ary1); $i++) {
                            echo "<tr>
                                <td>$ary1[$i]:</td>
                                <td><span id=\"bas" . $ary2[$i] . "\">0</span></td>
                                <td><span id=\"max" . $ary2[$i] . "\">0</span></td>
                                <td><span id=\"char" . $ary2[$i] . "\">0</span></td>
                                <td><input type=\"text\" value=\"5\" id=\"pnt" . $ary2[$i] . "\"></td>
                                <td><input type=\"button\" value=\"+\" id=\"plus" . $ary2[$i] . "\" onclick=\"addStat('$ary2[$i]')\"></td>
                                <td><input type=\"button\" value=\"-\" id=\"minus" . $ary2[$i] . "\" onclick=\"minusStat('$ary2[$i]')\"></td>
                                <td><input type=\"button\" value=\"Max\" id=\"plusMax" . $ary2[$i] . "\" onclick=\"maxStat('$ary2[$i]')\"></td>
                                <td><input type=\"button\" value=\"Min\" id=\"minusMin" . $ary2[$i] . "\" onclick=\"minStat('$ary2[$i]')\"></td>
                            </tr>
                            ";
                            }
                        ?>
                        <tr>
                            <td COLSPAN="4">Points Left:</td>
                            <td COLSPAN="5"><span id="statPoints">0</span></td>
                        </tr>
    
                    </table>
                </div>
                <div id="bscRunes">
                    <?php
                    
                        $runeArray = array("Strength","Dexterity","Constitution","Intelligence","Spirit");
                        $runeArray2 = array("Str","Dex","Con","Int","Spr");
                        for($i = 0; $i < count($runeArray); $i++) {
                        
                        echo "<select id=\"$runeArray2[$i]Runes\" onchange=\"statRunes('$runeArray2[$i]',$i)\" onkeyup=\"statRunes('$runeArray2[$i]',$i)\">
                            <option>$runeArray[$i] Runes...</option>
                            <option value=0>No Rune</option>
                            <option value=1 disabled>Enhanced $runeArray[$i]</option>
                            <option value=2 disabled>Exceptional $runeArray[$i]</option>
                            <option value=3 disabled>Amazing $runeArray[$i]</option>
                            <option value=4 disabled>Incredible $runeArray[$i]</option>
                            <option value=5 disabled>Great $runeArray[$i]</option>
                            <option value=6 disabled>Heroic $runeArray[$i]</option>
                            <option value=7 disabled>Legendary $runeArray[$i]</option>
                            <option value=8 disabled>$runeArray[$i] of the Gods</option>
                        </select>
                        ";
                        }
                    
                    ?>
                </div>
                <div id="bscTraitCate">
                    <?php
                        $traitCateArray = array("Strength","Dexterity","Constitution","Intelligence","Spirit","Resists","Misc","Weapon","Armor");
                        for($i = 0; $i < count($traitCateArray); $i++) {
                            echo "<input type=\"button\" value=\"$traitCateArray[$i]\" onclick=\"traitCategories(this.value)\">";
                        }
                    ?>
                </div>
                <div id="bscTraits">
                    <?php
                        $query = "SELECT * FROM StartingTraits";
                        $result = mysqli_query($conn,$query);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<div class=\"traitDiv\"><input type=\"checkbox\" disabled id=\"startTrait$i\" onclick=\"restrictTraitByTrait(" . $i . "),onTraitChange(),traitEffects($i)\"> " . $row['Name'] . "</div>
                            ";
                            $i++;
                        } 
                        
                    
                    ?>
                </div>
            </div>
            <div id="Points">
                <span>Training Points:</span><span id="trainingPoints">0</span>
                <div id="pntSkills">
                    <div id="pntTitleSkills">Skills</div>
                    <table id="skillsTable">
                        <tr>
                            <td>Skill</td>
                            <td>Current Skill Level</td>
                            <td>Max Skill Level</td>
                            <td>Max Trains</td>
                            <td>Current Trains</td>
                            <td>Train Skills:</td>
                        </tr>
                        
                    </table>
                </div>
                <div id="pntTitlePowers">Powers</div>
                <div id="pntPowers">
                    <table id="powersTable">
                        <tr>    
                            <td>Spell Name</td>
                            <td>Min Damage</td>
                            <td>Max Damage</td>
                            <td>Current</td>
                            <td>Train Power</td>
                        </tr>
                                                
                    </table>
                </div>
                
            </div>
            <div id="Gear">
                            <ul id="navWeapon">
                                <li>Main Hand</li>
                                <li>Off Hand</li>
                            </ul>
                            <div id="geaWeapons">
                                
                                    <?php   
                                    
                                        function test($slot,$conn) {
                                            $preSuf = array("Prefix","Suffix");
                                            for($y = 0; $y < count($preSuf); $y++) {
                                                echo "<select onchange=\"set$preSuf[$y](this.value,'$slot'),getWeapStats('$slot')\" onkeyup=\"set$preSuf[$y](this.value,'$slot'),getDmg()\">
                                                <option>Select a $preSuf[$y]...</option>";
                                                $query = "SELECT * FROM $preSuf[$y]";
                                                $result = mysqli_query($conn,$query);
                                                
                                                $j = 0;
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if($row['Requirements'] === $slot) {
                                                        echo "<option value=$j>" . $row['Name'] . "</option>";
                                                    }
                                                    $j++;
                                                }
                                                echo "</select>";
                                            }
                                            
                                        }
                                    
                                        $geaWeapons = array("Main","Off");
                                        for($i = 0; $i < count($geaWeapons); $i++) {
                                            echo "<div id=\"gea$geaWeapons[$i]\">";
                                            test($geaWeapons[$i],$conn);
                                            $query = "SELECT * FROM Weapons";
                                            $result = mysqli_query($conn,$query);

                                            $x = 0;
                                            while($row = mysqli_fetch_assoc($result)) {
                                                if($row['Slot'] == $geaWeapons[$i]) {
                                                    echo "<input type=\"checkbox\" id=\"" . $row['Slot'] . "$x\" onclick=\"setWeap($x,this),getWeapStats('$geaWeapons[$i]')\">"  . $row['Name'];
                                                }
                                                $x++;
                                            }
                                            echo "</div>";
                                        }
                                    ?>
                                <div id="geaInfo">
                                    <table>
                                        <tr>
                                            <td COLSPAN="4">Weapons</td>
                                        </tr>
                                        <tr>
                                            <td>Slot</td>
                                            <td>Min Dmg</td>
                                            <td>Max Dmg</td>
                                            <td>Additional Notes</td>
                                        </tr>
                                        <tr>
                                            <td>Main</td>
                                            <td id="weapMinMain">0</td>
                                            <td id="weapMaxMain">0</td>
                                            <td id="weapNotesMain"></td>
                                    </table>
                                </div>
                            </div>
                        </div>
            <div id="Character">
    
                <span id="characterRace">Race</span>
                <span id="characterClass">Class</span>
                <span><input type="checkbox" id="concPot" onclick="concPot()"> Conc Pot</span><br />
                <span>Health: </span><span id="healthValue">0</span> <span>Mana: </span><span id="manaValue">0</span> <span>Stamina: </span><span id="staminaValue">0</span>
                <table>
                    <tr>
                        <td>Stat</td>
                        <td>Current</td>
                    </tr>
                    <?php
                        $ary1 = array("Strength","Dexterity","Constitution","Intelligence","Spirit");
                        $ary2 = array("Str","Dex","Con","Int","Spr");
                        for($i = 0; $i < count($ary1); $i++) {
                            echo "<tr>
                                <td>$ary1[$i]</td>
                                <td><span id=\"character" . $ary2[$i] . "\">0</span></td>
                            </tr>";
                        }
                    ?>
                </table>
                
                <table>
                    <tr>
                        <td>Slashing</td>
                        <td>Piercing</td>
                        <td>Crushing</td>
                    </tr>
                    <tr>
                        <td id="charSlash">0</td>
                        <td id="charPierce">0</td>
                        <td id="charCrush">0</td>
                    </tr>           
                </table>
                <div>
                    <span>Attack Rating</span><div id="attackRatingCharacter">0</div>
                    <span>Damage Range</span><div><span id="minWeaponDmg">0</span> - <span id="maxWeaponDmg">0</span></div>
                </div>
            </div>
            <div id="Resists">
                <table>
                    <tr>
                        <td>Resist Type:</td>
                        <td>Resist Value:</td>
                    </tr>
                <?php
                    $query = "SELECT * FROM Resists";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)) {
                    
                        echo "<tr><td>" . $row['Name'] .  "</td><td id=\"res" . $row['Name'] . "\">0</td></tr>";
                    
                    }
                ?>
                </table>
            </div>
             
        </div>
        
    </div>
    <?php
        require "CalcCharCreation.php";
        require "CalcSkillsPowers.php";
        require "CalcCharInfo.php";
        require "CalcGear.php";
        require "CalcResists.php";
    ?>
    <script type="text/javascript">
        //Global Functions
        //Switches the page
        function changePage(id) {
            document.getElementById('Basic').style.display="none";
            document.getElementById('Points').style.display="none";
            document.getElementById('Gear').style.display="none";
            document.getElementById('Character').style.display="none";
            document.getElementById('Resists').style.display="none";
            document.getElementById(id).style.display="block";
                        document.getElementById('NavBasic').style.backgroundImage="url('images/calcnav.jpg')";
            document.getElementById('NavPoints').style.backgroundImage="url('images/calcnav.jpg')";
            document.getElementById('NavGear').style.backgroundImage="url('images/calcnav.jpg')";
            document.getElementById('NavCharacter').style.backgroundImage="url('images/calcnav.jpg')";
            document.getElementById('NavResists').style.backgroundImage="url('images/calcnav.jpg')";
                        document.getElementById('Nav' + id).style.backgroundImage="url('images/calcnav2.jpg')";
        };
        function minimumDamage (wpnMin, statPri, statSec, skillPri, skillSec, modDmg) {
    
            var dmg = (wpnMin * ( (0.0315 * Math.pow(statPri, 0.75)) + (0.042 * Math.pow(statSec, 0.75)) + (0.01 * (skillPri + skillSec))));
            if(modDmg > 0) {
                dmg = ((modDmg / 100) + 1) * dmg;
            };
            return dmg;
    
        };
        function maximumDamage (wpnMax, statPri, statSec, skillPri, skillSec, modDmg) {
    
            var dmg = (wpnMax * ( (0.0785 * Math.pow(statPri, 0.75)) + (0.016 * Math.pow(statSec, 0.75)) + (0.0075 * (skillPri + skillSec))));
            if(modDmg > 0) {
                dmg = ((modDmg / 100) + 1) * dmg;
            };
            return dmg;
        
        };
        function getSelectedText(elementId) {
                var elt = document.getElementById(elementId);

                if (elt.selectedIndex === -1)
                    return null;

                return elt.options[elt.selectedIndex].text;
        }
    </script>