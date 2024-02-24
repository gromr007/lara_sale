
async function loadContent(dataUrlNew) {
    const response = await fetch(dataUrlNew);
    const data = await response.json();
    return data;
}

async function renderContent(dataUrlNew) {

    const content = await loadContent(dataUrlNew);
    const contentContainer = document.querySelector('.content');
    content.articles.forEach(item => {
        const tr = document.createElement('tr');
            for (const property in item) {
                const td = document.createElement('td');
                td.textContent = item[property];
                tr.appendChild(td);
            }
        contentContainer.appendChild(tr);
    });
    localStorage.setItem('urlDataCsv', content.pagination.next_page_url);
}

function handleScroll() {
    const end = document.querySelector('.end');
    const scroll = end.getBoundingClientRect();
    if(scroll.y < 1000) {
        //console.log('ура! конец страницы!');
        const dataUrlNew = localStorage.getItem('urlDataCsv');
        if(dataUrlNew) {
            let arrHashs = JSON.parse(localStorage.getItem('hashsDataCsv'));
            if(!arrHashs) {
                arrHashs = [];
            }
            if(arrHashs.indexOf(dataUrlNew) != -1) {
                //console.log('Элемент присутствует');
            } else {
                //console.log('Добавляем новый путь');
                arrHashs.push(dataUrlNew);
                localStorage.setItem('hashsDataCsv', JSON.stringify(arrHashs));
                renderContent(dataUrlNew);
            }
        }
    }
}

window.addEventListener('scroll', handleScroll);

document.addEventListener("DOMContentLoaded", function(event) {
    localStorage.removeItem('hashsDataCsv');
    //localStorage.clear();
    renderContent('/datacsvs');
});
