const inputName = document.querySelector("#username")
const inputRepos = document.querySelector("#repos")
const btnRepos = document.getElementById("btnRepos")
const btnCommits = document.getElementById("btnCommits")

const divResult = document.getElementById("divResult")
btnCommits.addEventListener("click", e=> getCommits())

const client_id = 'ee3ddafaacbd42f8e0b6';
const client_secret = 'f18b5e143a7800487f3d9a6d8ba4cc4f711c6bb0';

const fetchUsers = async (user) =>{

}

async function getCommits() {
    clear();
    
    const name = inputName.value
    const repo = inputRepos.value
    console.log(name);
    console.log(repo);

    url="https://api.github.com/search/commits?q=repo:"+name+"/"+repo+" author-date:2018-01-01..2020-12-31"

    const headers = {
        "Accept" : "application/vnd.github.cloak-preview+json"
    }
    const response = await fetch(url, {
        "method" : "GET",
        "headers" : headers
    })
    //"<https://api.github.com/search/commits?q=repo%3Afreecodecamp%2Ffreecodecamp+author-date%3A2019-03-01..2019-03-31&page=2>; rel="next", <https://api.github.com/search/commits?q=repo%3Afreecodecamp%2Ffreecodecamp+author-date%3A2019-03-01..2019-03-31&page=27>; rel="last""
    const result = await response.json()

    var statusHTML = '';

    result.items.forEach(i=>{
        /*
        const img = document.createElement("img")
        img.src = i.author.avatar_url;
        img.style.width="32px"
        img.style.height="32px"
        const anchor = document.createElement("a")
        anchor.href = i.html_url;
        anchor.textContent = i.commit.message.substr(0,120) + "...";
        divResult.appendChild(img)
        divResult.appendChild(anchor)
        divResult.appendChild(document.createElement("br"))
		statusHTML += '<td><img src=' + i.author.avatar_url + ' width="32px" height="32px"></img></td>';
        */

       statusHTML += '<tr>';
       statusHTML += '<td>' + i.commit.author.name + '</td>';
       statusHTML += '<td><a href=' + i.html_url + '>'+i.commit.message.substr(0,120)+'</a></td>';
       statusHTML += '<td>' + i.commit.author.date.substr(0,10) + '</td>';
       statusHTML += '</tr>';
    });

    $('tbody').html(statusHTML);

}

function clear(){
    while(divResult.firstChild) 
        divResult.removeChild(divResult.firstChild)
}