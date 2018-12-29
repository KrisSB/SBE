<script type="text/javascript">
    var charGear = new playerGear();        //Object Created from playerGear()
    //sets the ID of weapon to the character
    function setWeap(id,check) {
        if(check.checked)
            charGear.weapMainID = id;
        else
            charGear.weapMainID = null;
    }
    function setPrefix(id,slot) {
        if(slot === "Main")
            charGear.weapMPrefixID = id;
    }
    function setSuffix(id,slot) {
        if(slot === "Main")
            charGear.weapMSuffixID = id;
    }
    function getWeapStats(slot) {
        var tabMinAff, tabMaxAff, tabNotesAff, charPreWeapID, 
                charPreWeapVal, charPreWeapType, charSufWeapID, charSufWeapVal , 
                charSufWeapType, charMinDmg, charMaxDmg = null;
        if(slot === "Main") {
            tabMinAff = document.getElementById('weapMinMain');
            tabMaxAff = document.getElementById('weapMaxMain');
            tabNotesAff = document.getElementById('weapNotesMain');
            charPreWeapID = charGear.weapMPrefixID;
            charPreWeapVal = charGear.weapMPrefixValue();
            charPreWeapType = charGear.weapMPrefixType();
            charSufWeapID = charGear.weapMSuffixID;
            charSufWeapVal = charGear.weapMSuffixValue();
            charSufWeapType = charGear.weapMSuffixType();
            charMinDmg = charGear.weapMTotalMinDmg();
            charMaxDmg = charGear.weapMTotalMaxDmg();
            
        }
        tabMinAff.innerHTML = charMinDmg;
        tabMaxAff.innerHTML = charMaxDmg;
        
        var gearNotes = "";
        if(charPreWeapID !== null)
            gearNotes +=  charPreWeapVal + " " + charPreWeapType + " ";
        if((charSufWeapID !== null) && (charSufWeapType !== "Max" && "Min"))
            gearNotes +=  charSufWeapVal + " " + charSufWeapType;
       
        tabNotesAff.innerHTML = gearNotes;
    }
    function unlock() {
        
    }
</script>