const BITLY_API_KEY = "79c83aea865140c51cfb35d1bbb8880e69161b8b";


const form = document.querySelector("form");


const longUrlInput = document.querySelector("#longUrl");


const shortUrlParagraph = document.querySelector("#shortUrl");

const headers = {
"Authorization": `Bearer ${BITLY_API_KEY}`,
"Content-Type": "application/json"
};

form.addEventListener("submit", event => {
event.preventDefault();

const longUrl = longUrlInput.value.trim();

const apiEndpoint = "https://api-ssl.bitly.com/v4/bitlinks";


const body = JSON.stringify({ "long_url": longUrl });



fetch(apiEndpoint, { method: "POST", headers, body })
    .then(response => response.json())
    .then(json => {
    shortUrlParagraph.textContent = json.link;
    })
    .catch(error => console.error(error));

    const myDiv = document.getElementById("addButton");
    if (myDiv.querySelector("button")){
        console.log("Button Copy sudah ada");
    }else{
        const myButton = document.createElement("button");
        myButton.innerText = "Copy";
        myButton.setAttribute("onClick", "copyText()");
        myButton.setAttribute("id", "buttonCopy");
        myDiv.appendChild(myButton);
    }

    const buttonCopy = document.getElementById('buttonCopy');
    buttonCopy.addEventListener('click', () => {
    buttonCopy.parentNode.removeChild(buttonCopy);
    const myPopup = document.getElementById("myPopup");
    myPopup.style.display = "block";
    setTimeout(function() {
        myPopup.style.display = "none";
    }, 2000);

});



});

const inputField = document.getElementById("longUrl");
const deleteIcon = document.getElementById("deleteIcon");
deleteIcon.addEventListener("click", function() {
  inputField.value = "";
});

function copyText() {
    const text = document.getElementById("shortUrl").innerText;
    navigator.clipboard.writeText(text)
      .then(() => {
        console.log("Text copied to clipboard");
        document.removeChild("button");
      })
      .catch((err) => {
        console.error("Error copying text: ", err);
      });
}








