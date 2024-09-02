const paragraphs = [
    "Aya ya kwanza: Hii ni aya ya kwanza.",
    "Aya ya pili: Hii ni aya ya pili.",
    "Aya ya tatu: Hii ni aya ya tatu.",
    "Aya ya nne: Hii ni aya ya nne."
];

let currentParagraph = 0;

function showParagraph(index) {
    document.getElementById("paragraph").innerText = paragraphs[index];
}

function nextParagraph() {
    if (currentParagraph < paragraphs.length - 1) {
        currentParagraph++;
    } else {
        currentParagraph = 0; // Rudi kwenye aya ya kwanza baada ya kumaliza zote
    }
    showParagraph(currentParagraph);
}

// Onyesha aya ya kwanza wakati ukurasa unapopakiwa
window.onload = function() {
    showParagraph(currentParagraph);
};
  
//expand

