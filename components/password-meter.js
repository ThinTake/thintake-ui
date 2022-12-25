/*!
 {{IMPORT root}}
 */

 tt.passwordMeter = function (pwd = '') {
	var nScore=0, nLength=0, nAlphaUC=0, nAlphaLC=0, nNumber=0, nSymbol=0, nMidChar=0, nRequirements=0, nAlphasOnly=0, nNumbersOnly=0, nUnqChar=0, nRepChar=0, nRepInc=0, nConsecAlphaUC=0, nConsecAlphaLC=0, nConsecNumber=0, nSeqAlpha=0, nSeqNumber=0, nSeqSymbol=0, nReqChar=0;
	var sAlphas = "abcdefghijklmnopqrstuvwxyz";
	var sNumerics = "01234567890";
	var sSymbols = ")!@#$%^&*()";
	var nMinPwdLen = 8;
    
	nScore = parseInt(pwd.length * 4);
    nLength = pwd.length;
    var arrPwd = pwd.replace(/\s+/g,"").split(/\s*/);
    var arrPwdLen = arrPwd.length;
    
    /* Loop through password to check for Symbol, Numeric, Lowercase and Uppercase pattern matches */
    for (var a=0; a < arrPwdLen; a++) {
        if (arrPwd[a].match(/[A-Z]/g)) {
            nAlphaUC++;
        }
        else if (arrPwd[a].match(/[a-z]/g)) { 
            nAlphaLC++;
        }
        else if (arrPwd[a].match(/[0-9]/g)) { 
            if (a > 0 && a < (arrPwdLen - 1)) { nMidChar++; }
            nNumber++;
        }
        else if (arrPwd[a].match(/[^a-zA-Z0-9_]/g)) { 
            if (a > 0 && a < (arrPwdLen - 1)) { nMidChar++; }
            nSymbol++;
        }
        /* Internal loop through password to check for repeat characters */
        var bCharExists = false;
        for (var b=0; b < arrPwdLen; b++) {
            if (arrPwd[a] == arrPwd[b] && a != b) { /* repeat character exists */
                bCharExists = true;
                /* 
                Calculate icrement deduction based on proximity to identical characters
                Deduction is incremented each time a new match is discovered
                Deduction amount is based on total password length divided by the
                difference of distance between currently selected match
                */
                nRepInc += Math.abs(arrPwdLen/(b-a));
            }
        }
        if (bCharExists) { 
            nRepChar++; 
            nUnqChar = arrPwdLen-nRepChar;
            nRepInc = (nUnqChar) ? Math.ceil(nRepInc/nUnqChar) : Math.ceil(nRepInc); 
        }
    }
    
    /* Check for sequential alpha string patterns (forward and reverse) */
    for (var s=0; s < 23; s++) {
        var sFwd = sAlphas.substring(s,parseInt(s+3));
    }
    
    /* Check for sequential numeric string patterns (forward and reverse) */
    for (var s=0; s < 8; s++) {
        var sFwd = sNumerics.substring(s,parseInt(s+3));
    }
    
    /* Check for sequential symbol string patterns (forward and reverse) */
    for (var s=0; s < 8; s++) {
        var sFwd = sSymbols.substring(s,parseInt(s+3));
    }
    
    /* Modify overall score value based on usage vs requirements */

    /* General point assignment */
    if (nAlphaUC > 0 && nAlphaUC < nLength) {	
        nScore = parseInt(nScore + ((nLength - nAlphaUC) * 2));
    }
    if (nAlphaLC > 0 && nAlphaLC < nLength) {	
        nScore = parseInt(nScore + ((nLength - nAlphaLC) * 2)); 
    }
    if (nNumber > 0 && nNumber < nLength) {	
        nScore = parseInt(nScore + (nNumber * 4));
    }
    if (nSymbol > 0) {	
        nScore = parseInt(nScore + (nSymbol * 6));
    }
    if (nMidChar > 0) {	
        nScore = parseInt(nScore + (nMidChar * 2));
    }
    
    /* Point deductions for poor practices */
    if ((nAlphaLC > 0 || nAlphaUC > 0) && nSymbol === 0 && nNumber === 0) {  // Only Letters
        nScore = parseInt(nScore - nLength);
        nAlphasOnly = nLength;
    }
    if (nAlphaLC === 0 && nAlphaUC === 0 && nSymbol === 0 && nNumber > 0) {  // Only Numbers
        nScore = parseInt(nScore - nLength); 
        nNumbersOnly = nLength;
    }
    if (nRepChar > 0) {  // Same character exists more than once
        nScore = parseInt(nScore - nRepInc);
    }
    if (nConsecAlphaUC > 0) {  // Consecutive Uppercase Letters exist
        nScore = parseInt(nScore - (nConsecAlphaUC * 2)); 
    }
    if (nConsecAlphaLC > 0) {  // Consecutive Lowercase Letters exist
        nScore = parseInt(nScore - (nConsecAlphaLC * 2)); 
    }
    if (nConsecNumber > 0) {  // Consecutive Numbers exist
        nScore = parseInt(nScore - (nConsecNumber * 2));
    }
    if (nSeqAlpha > 0) {  // Sequential alpha strings exist (3 characters or more)
        nScore = parseInt(nScore - (nSeqAlpha * 3));
    }
    if (nSeqNumber > 0) {  // Sequential numeric strings exist (3 characters or more)
        nScore = parseInt(nScore - (nSeqNumber * 3));
    }
    if (nSeqSymbol > 0) {  // Sequential symbol strings exist (3 characters or more)
        nScore = parseInt(nScore - (nSeqSymbol * 3));
    }

    nRequirements = nReqChar;
    if (pwd.length >= nMinPwdLen) { var nMinReqChars = 3; } else { var nMinReqChars = 4; }
    if (nRequirements > nMinReqChars) {  // One or more required characters exist
        nScore = parseInt(nScore + (nRequirements * 2)); 
    }
    if (nScore > 100) {
        nScore = 100;
    } else if (nScore < 0) {
        nScore = 0;
    }

    return nScore;
};