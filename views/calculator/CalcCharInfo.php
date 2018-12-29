<script type="text/javascript">
    function fillCharacter() {
        
        document.getElementById('characterStr').innerHTML = charPlayer.curStr();
        document.getElementById('characterDex').innerHTML = charPlayer.curDex();
        document.getElementById('characterCon').innerHTML = charPlayer.curCon();
        document.getElementById('characterInt').innerHTML = charPlayer.curInt();
        document.getElementById('characterSpr').innerHTML = charPlayer.curSpr();
        
        document.getElementById('healthValue').innerHTML = parseInt(charPlayer.health());
        document.getElementById('manaValue').innerHTML = parseInt(charPlayer.mana());
        document.getElementById('staminaValue').innerHTML = parseInt(charPlayer.stam());
        
    }
    function concPot() {
        var conc = document.getElementById('concPot');
        if(conc.checked === true) {
            charPlayer.strBuff += 55;
            charPlayer.dexBuff += 55;
            charPlayer.conBuff += 55;
            charPlayer.intBuff += 55;
            charPlayer.sprBuff += 55;
        } else {
            charPlayer.strBuff -= 55;
            charPlayer.dexBuff -= 55;
            charPlayer.conBuff -= 55;
            charPlayer.intBuff -= 55;
            charPlayer.sprBuff -= 55;
        }
        
        
        fillCharacter();
    }
</script>