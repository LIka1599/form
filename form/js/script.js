
    var errorName = document.getElementById("error-name");
    if (errorName) {
        var userName = document.querySelector("#name");
        userName.classList.add("error");
    }

    var errorEmail = document.getElementById("error-email");
    if (errorEmail) {
        var  email = document.querySelector("#email");
        email.classList.add("error");
    }

    var errorYear = document.getElementById("error-year");
    if (errorYear) {
        var year = document.querySelector("#year");
        year.classList.add("error");
    }

    var errorTopic = document.getElementById("error-topic");
    if (errorTopic) {
        var topic = document.querySelector("#topic");
        topic.classList.add("error");
    }

    var errorQuestion = document.getElementById("error-question");
    if (errorQuestion) {
        var question = document.querySelector("#question");
        question.classList.add("error");
    }

    var errorTopic = document.getElementById("error-topic");
    if (errorTopic) {
        var topic = document.querySelector("#topic");
        topic.classList.add("error");
    }

for (year = 1920; year <= 2020; year++) 
{
    let options = document.createElement("OPTION");
    document.getElementById("year").appendChild(options).innerHTML = year;
}

