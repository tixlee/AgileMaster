const inputUser = document.querySelector("#name")
const inputRepo = document.querySelector("#repo")
const btnIssues = document.getElementById("btnIssues")

const table = document.getElementById("table")

btnIssues.addEventListener("click", getIssues)

async function getIssues() {
    clear();

    const name = inputUser.value
    const repo = inputRepo.value
    console.log(name);
    console.log(repo);

    const url = "https://api.github.com/search/issues?q=repo:"+name+"/"+repo+" type:issue"
    const response = await fetch(url)
    const result = await response.json()

    
    var statusHTML = '';

    result.items.forEach(i=>{
    statusHTML += '<tr>';
    statusHTML += '<td>' + i.user.login + '</td>';
    statusHTML += '<td><a href=' + i.html_url + '>'+i.title+'</a></td>';
    statusHTML += '<td>' + i.state + '</td>';
    statusHTML += '<td>' + i.created_at.substr(0,10) + '</td>';
    statusHTML += '<td>' + i.updated_at.substr(0,10) + '</td>';
    statusHTML += '</tr>';
    });

    $('#issue').html(statusHTML);

}

function clear(){
    while(divResult.firstChild) 
        divResult.removeChild(divResult.firstChild)
}